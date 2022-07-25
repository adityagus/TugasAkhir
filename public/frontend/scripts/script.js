const { default: Swal } = require("sweetalert2");

const periode = document.querySelector('#tanggal p');
const tanggal = new Date().getDate();
periode.innerHTML = 'Periode' + tanggal;
console.log(tanggal);
