var tanpa_rupiah = document.getElementById("tanpa-rupiah");
var tanpa_rupiahA = document.getElementById("tanpa-rupiahA");
var tanpa_rupiahB = document.getElementById("tanpa-rupiahB");
var tanpa_rupiahC = document.getElementById("tanpa-rupiahC");
if (tanpa_rupiah) {
    tanpa_rupiah.addEventListener("keyup", function (e) {
        tanpa_rupiah.value = newformat(this.value);
    });
}
if (tanpa_rupiahA) {
    tanpa_rupiahA.addEventListener("keyup", function (e) {
        tanpa_rupiahA.value = newformat(this.value);
    });
}
if (tanpa_rupiahB) {
    tanpa_rupiahB.addEventListener("keyup", function (e) {
        tanpa_rupiahB.value = newformat(this.value);
    });
}
if (tanpa_rupiahC) {
    tanpa_rupiahC.addEventListener("keyup", function (e) {
        tanpa_rupiahC.value = newformat(this.value);
    });
}

/* Fungsi */
function newformat(value) {
    return value
        .replace(/(?!\.)\D/g, "")
        .replace(/(?<=\..*)\./g, "")
        .replace(/(?<=\.\d\d).*/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}