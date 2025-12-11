// ==================
// GENERATE KALENDER
// ==================

const bulanTahun = document.getElementById("bulanTahun");
const calendarGrid = document.getElementById("calendarGrid");
const tanggalLabel = document.getElementById("tanggalLabel");

let selectedDates = [];

function generateCalendar() {
    const today = new Date();
    const year = today.getFullYear();
    const month = today.getMonth();

    bulanTahun.textContent = today.toLocaleString("id-ID", {
        month: "long",
        year: "numeric"
    });

    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    calendarGrid.innerHTML = "";

    for (let i = 0; i < firstDay; i++) {
        calendarGrid.innerHTML += `<div class="empty"></div>`;
    }

    for (let date = 1; date <= lastDate; date++) {
        const div = document.createElement("div");
        div.classList.add("date-item");
        div.textContent = date;

        div.onclick = () => selectDate(date);

        calendarGrid.appendChild(div);
    }
}

generateCalendar();

// =======================
// PILIH TANGGAL
// =======================

function selectDate(date) {
    if (selectedDates.includes(date)) return;

    selectedDates.push(date);
    selectedDates.sort((a, b) => a - b);

    if (selectedDates.length > 2) {
        selectedDates.shift();
    }

    updateDateUI();
}

function updateDateUI() {
    const allDates = document.querySelectorAll(".date-item");

    allDates.forEach(d => {
        d.classList.remove("selected");
        if (selectedDates.includes(parseInt(d.textContent))) {
            d.classList.add("selected");
        }
    });

    tanggalLabel.textContent =
        selectedDates.length === 0
            ? "Belum memilih tanggal"
            : selectedDates.length === 1
                ? `Tanggal dipilih: ${selectedDates[0]}`
                : `Tanggal dipilih: ${selectedDates[0]} & ${selectedDates[1]}`;

    document.getElementById("tanggal1").value = selectedDates[0] || "";
    document.getElementById("tanggal2").value = selectedDates[1] || "";

    document.getElementById("pertemuan_1").value = selectedDates[0] || "";
    document.getElementById("pertemuan_2").value = selectedDates[1] || "";
}

// =======================
// SET JAM + VALIDASI
// =======================

function setTime(number) {
    const jamMulai = document.getElementById("jamMulai" + number).value;

    if (!jamMulai) return;

    // Maksimal jam 12:00
    if (jamMulai > "12:00") {
        alert("Jam kursus maksimal jam 12:00 siang.");
        document.getElementById("jamMulai" + number).value = "";
        document.getElementById("outputJam" + number).innerHTML = "";
        return;
    }

    const jamSelesai = hitungSelesai(jamMulai);

    document.getElementById("jamSelesai" + number).value = jamSelesai;

    document.getElementById("outputJam" + number).innerHTML =
        `Jam: ${jamMulai} - ${jamSelesai}`;
}

function hitungSelesai(startTime) {
    const [h, m] = startTime.split(":").map(Number);
    const end = new Date();
    end.setHours(h);
    end.setMinutes(m + 60);

    return end.toTimeString().slice(0, 5);
}
