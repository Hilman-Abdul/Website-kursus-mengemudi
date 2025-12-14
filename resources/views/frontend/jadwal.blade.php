<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jadwal Kursus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
</head>
<body>

<div class="container mt-5" style="max-width:700px;">
    <div class="calendar-wrapper">

        <h3 class="calendar-header text-center" id="bulanTahun"></h3>
        <div class="calendar-grid" id="calendarGrid"></div>

        <p class="text-center mt-3" id="tanggalLabel">Belum memilih tanggal</p>

        <!-- WARNING -->
        <div id="warningJadwal"
             class="alert alert-danger text-center"
             style="display:none;">
            ⚠️ Jadwal belum dipilih
        </div>

        <form action="{{ route('jadwal.store') }}"
              method="POST"
              id="jadwalForm"
              class="mt-3">
            @csrf

            <input type="hidden" id="tanggal1" name="tanggal1">
            <input type="hidden" id="tanggal2" name="tanggal2">

            <label class="form-label text-center w-100">Jam Kursus</label>

            <div class="row justify-content-center">

                <!-- HARI 1 -->
                <div class="col-6">
                    <label class="form-label text-center w-100">Hari 1</label>
                    <input type="time"
                           id="jamMulai1"
                           name="jam_mulai1"
                           class="form-control"
                           onchange="setTime(1)">
                    <input type="hidden" id="jamSelesai1" name="jam_selesai1">
                    <div id="outputJam1" class="mt-2 text-center"></div>
                </div>

                <!-- HARI 2 -->
                <div class="col-6">
                    <label class="form-label text-center w-100">Hari 2 (Opsional)</label>
                    <input type="time"
                           id="jamMulai2"
                           name="jam_mulai2"
                           class="form-control"
                           onchange="setTime(2)">
                    <input type="hidden" id="jamSelesai2" name="jam_selesai2">
                    <div id="outputJam2" class="mt-2 text-center"></div>
                </div>

            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('paket.batal') }}" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
            </div>
        </form>

    </div>
</div>

<script>
/* =======================================================
   VARIABEL GLOBAL
======================================================= */
let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectedDates = [];
let booked = [];

const bulanNama = [
 "Januari","Februari","Maret","April","Mei","Juni",
 "Juli","Agustus","September","Oktober","November","Desember"
];

/* =======================================================
   LOAD BOOKED
======================================================= */
function loadBookedDates() {
 fetch("/jadwal/booked")
  .then(res => res.json())
  .then(data => {
    booked = data.map(t => Number(t.split("-")[2]));
    renderCalendar();
  })
  .catch(() => renderCalendar());
}

/* =======================================================
   RENDER KALENDER
======================================================= */
function renderCalendar() {

 let firstDay = new Date(currentYear,currentMonth,1).getDay();
 let lastDate = new Date(currentYear,currentMonth+1,0).getDate();

 document.getElementById("bulanTahun").innerText =
   `${bulanNama[currentMonth]} ${currentYear}`;

 let html = "";

 for(let i=0;i<firstDay;i++) html += `<div class="day empty"></div>`;

 for(let i=1;i<=lastDate;i++){

   let tanggalLoop = new Date(currentYear,currentMonth,i);
   let lewat = tanggalLoop < new Date(today.getFullYear(),today.getMonth(),today.getDate());

   if(booked.includes(i)){
     html += `<div class="day booked">${i}</div>`;
   }else if(lewat){
     html += `<div class="day passed">${i}</div>`;
   }else{
     html += `<div class="day available" id="day-${i}" onclick="pilihTanggal(${i})">${i}</div>`;
   }
 }

 document.getElementById("calendarGrid").innerHTML = html;
}

/* =======================================================
   PILIH TANGGAL
======================================================= */
function pilihTanggal(hari){

 let cell = document.getElementById("day-"+hari);

 if(cell.classList.contains("selected")){
   cell.classList.remove("selected");
   selectedDates = selectedDates.filter(x => x !== hari);
 }else{
   if(selectedDates.length === 2){
     alert("Maksimal 2 tanggal");
     return;
   }
   cell.classList.add("selected");
   selectedDates.push(hari);
 }

 updateTanggalLabel();
 updateHiddenDate();
}

/* =======================================================
   LABEL
======================================================= */
function updateTanggalLabel(){
 if(selectedDates.length === 0){
   tanggalLabel.innerText = "Belum memilih tanggal";
   return;
 }

 tanggalLabel.innerHTML = selectedDates
  .sort((a,b)=>a-b)
  .map((t,i)=>`Hari ${i+1}: <b>${t} ${bulanNama[currentMonth]} ${currentYear}</b>`)
  .join("<br>");
}

/* =======================================================
   HIDDEN DATE
======================================================= */
function updateHiddenDate(){

 selectedDates.sort((a,b)=>a-b);

 tanggal1.value = "";
 tanggal2.value = "";

 if(selectedDates[0])
   tanggal1.value = `${currentYear}-${String(currentMonth+1).padStart(2,'0')}-${String(selectedDates[0]).padStart(2,'0')}`;

 if(selectedDates[1])
   tanggal2.value = `${currentYear}-${String(currentMonth+1).padStart(2,'0')}-${String(selectedDates[1]).padStart(2,'0')}`;
}

/* =======================================================
   JAM 6 JAM
======================================================= */
function setTime(i){

 let startInput = document.getElementById("jamMulai"+i);
 let endInput   = document.getElementById("jamSelesai"+i);
 let output     = document.getElementById("outputJam"+i);

 if(!startInput.value) return;

 let [jam,menit] = startInput.value.split(":").map(Number);

 if(menit !== 0 || jam < 8 || jam > 12){
   alert("Jam mulai 08:00 - 12:00 & menit 00");
   startInput.value="";
   output.innerHTML="";
   return;
 }

 let end = jam + 6;
 if(end > 18){
   alert("Jam selesai max 18:00");
   startInput.value="";
   output.innerHTML="";
   return;
 }

 startInput.value = `${String(jam).padStart(2,'0')}:00`;
 endInput.value   = `${String(end).padStart(2,'0')}:00`;
 output.innerHTML = `<b>${startInput.value} - ${endInput.value}</b>`;
}

/* =======================================================
   VALIDASI SUBMIT
======================================================= */
document.getElementById("jadwalForm").addEventListener("submit",function(e){

 let t1 = tanggal1.value;
 let j1 = jamMulai1.value;
 let t2 = tanggal2.value;
 let j2 = jamMulai2.value;

 let warning = document.getElementById("warningJadwal");

 if(!t1 || !j1){
   e.preventDefault();
   warning.style.display="block";
   warning.innerText=" Jadwal Hari 1 wajib dipilih";
   return;
 }

 if(t2 && !j2){
   e.preventDefault();
   warning.style.display="block";
   warning.innerText="⚠️ Jam Hari 2 belum dipilih";
   return;
 }

 warning.style.display="none";
});

/* =======================================================
   INIT
======================================================= */
loadBookedDates();
</script>

</body>
</html>
