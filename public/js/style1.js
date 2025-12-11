/* =======================================================
   VARIABEL GLOBAL
======================================================= */
let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();

let selectedDates = [];
let booked = [];   // ← mencegah error undefined

const bulanNama = [
    "Januari","Februari","Maret","April","Mei","Juni",
    "Juli","Agustus","September","Oktober","November","Desember"
];

/* =======================================================
   FETCH DATA BOOKED DARI API LARAVEL
======================================================= */
function loadBookedDates() {

    fetch("/jadwal/booked")
        .then(res => res.json())
        .then(data => {
            // data bentuknya: ["2025-12-05","2025-12-10"]
            booked = data.map(tgl => Number(tgl.split("-")[2]));  
            renderCalendar();
        })
        .catch(err => {
            console.error("Error load booked:", err);
            renderCalendar(); // tetap render meskipun error
        });
}

/* =======================================================
   RENDER KALENDER
======================================================= */
function renderCalendar() {

    let firstDay = new Date(currentYear, currentMonth, 1).getDay();
    let lastDate = new Date(currentYear, currentMonth + 1, 0).getDate();

    document.getElementById("bulanTahun").innerText =
        `${bulanNama[currentMonth]} ${currentYear}`;

    let html = "";

    // kotak kosong sebelum tanggal 1
    for (let i = 0; i < firstDay; i++) {
        html += `<div class="day empty"></div>`;
    }

    // render tanggal
    for (let i = 1; i <= lastDate; i++) {

        let tanggalLoop = new Date(currentYear, currentMonth, i);
        let lewat = tanggalLoop < new Date(today.getFullYear(), today.getMonth(), today.getDate());
        let isToday =
            i === today.getDate() &&
            currentMonth === today.getMonth() &&
            currentYear === today.getFullYear();

        if (booked.includes(i)) {
            html += `<div class="day booked">${i}</div>`;
        }
        else if (lewat) {
            html += `<div class="day passed">${i}</div>`;
        }
        else {
            html += `
                <div class="day available ${isToday ? 'today' : ''}"
                     id="day-${i}"
                     onclick="pilihTanggal(${i})">
                     ${i}
                </div>
            `;
        }
    }

    document.getElementById("calendarGrid").innerHTML = html;
}

/* =======================================================
   PILIH MAX 2 TANGGAL
======================================================= */
function pilihTanggal(hari) {

    let cell = document.getElementById("day-" + hari);

    if (cell.classList.contains("selected")) {
        cell.classList.remove("selected");
        selectedDates = selectedDates.filter(x => x !== hari);
    } else {
        if (selectedDates.length === 2) {
            alert("Anda hanya dapat memilih 2 tanggal.");
            return;
        }
        cell.classList.add("selected");
        selectedDates.push(hari);
    }

    updateTanggalLabel();
    updateHiddenDate();
}

/* =======================================================
   TAMPILKAN LABEL PILIHAN
======================================================= */
function updateTanggalLabel() {
    if (selectedDates.length === 0) {
        document.getElementById("tanggalLabel").innerHTML = "Belum memilih tanggal";
        return;
    }

    let text = selectedDates
        .sort((a,b) => a - b)
        .map((tgl,i) => `Hari ${i+1}: <b>${tgl} ${bulanNama[currentMonth]} ${currentYear}</b>`)
        .join("<br>");

    document.getElementById("tanggalLabel").innerHTML = text;
}

/* =======================================================
   UPDATE HIDDEN INPUT KE FORM
======================================================= */
function updateHiddenDate() {

    selectedDates.sort((a,b) => a - b);

    const t1 = document.getElementById("tanggal1");
    const t2 = document.getElementById("tanggal2");

    t1.value = "";
    t2.value = "";

    if (selectedDates[0]) {
        t1.value = `${currentYear}-${String(currentMonth+1).padStart(2,'0')}-${String(selectedDates[0]).padStart(2,'0')}`;
    }
    if (selectedDates[1]) {
        t2.value = `${currentYear}-${String(currentMonth+1).padStart(2,'0')}-${String(selectedDates[1]).padStart(2,'0')}`;
    }
}

/* =======================================================
   NAVIGASI BULAN NEXT / PREV
======================================================= */
function prevMonth() {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    selectedDates = []; // reset pilihan
    loadBookedDates();
}

function nextMonth() {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    selectedDates = []; 
    loadBookedDates();
}

/* =======================================================
   SETTIME UNTUK JAM 6 JAM
======================================================= */
function setTime(index) {

    let inputStart = document.getElementById("jamMulai" + index);
    let inputEnd   = document.getElementById("jamSelesai" + index);
    let output     = document.getElementById("outputJam" + index);

    let start = inputStart.value;
    if (!start) return;

    let [jam, menit] = start.split(":").map(Number);

    // menit harus 00
    if (menit !== 0) {
        alert("Menit harus 00");
        inputStart.value = "";
        output.innerHTML = "";
        return;
    }

    // jam mulai 08 - 12
    if (jam < 8 || jam > 12) {
        alert("Jam mulai harus antara 08:00 sampai 12:00");
        inputStart.value = "";
        output.innerHTML = "";
        return;
    }

    // durasi 6 jam
    let end = jam + 6;

    // jam selesai maksimal 18:00
    if (end > 18) {
        alert("Jam selesai tidak boleh lebih dari 18:00");
        inputStart.value = "";
        output.innerHTML = "";
        return;
    }

    let startFormatted = `${String(jam).padStart(2,'0')}:00`;
    let endFormatted   = `${String(end).padStart(2,'0')}:00`;

    inputStart.value = startFormatted;
    inputEnd.value   = endFormatted;

    output.innerHTML = `<b>${startFormatted} - ${endFormatted}</b>`;
}

/* =======================================================
   UPDATE PERTEMUAN KE FORM
======================================================= */
function updatePertemuan() {

    const t1 = document.getElementById("tanggal1").value;
    const t2 = document.getElementById("tanggal2").value;

    const jm1 = document.getElementById("jamMulai1").value;
    const jm2 = document.getElementById("jamMulai2").value;

    const p1 = document.getElementById("pertemuan1");
    const p2 = document.getElementById("pertemuan2");

    // Reset dulu
    p1.value = "";
    p2.value = "";

    // Jika tanggal + jam hari 1 lengkap → isi pertemuan_1
    if (t1 && jm1) {
        p1.value = `${t1} ${jm1}:00`;
    }

    // Jika tanggal + jam hari 2 lengkap → isi pertemuan_2
    if (t2 && jm2) {
        p2.value = `${t2} ${jm2}:00`;
    }
}

/* =======================================================
   MULAI LOAD KALENDER
======================================================= */
loadBookedDates();
