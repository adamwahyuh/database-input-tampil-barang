// Untuk memformat Data Harga pada Tabel 
function formatHarga(amount) {
    return new Intl.NumberFormat('id-ID', {
         style: 'currency', currency: 'IDR' 
        }).format(amount);
}

document.addEventListener('DOMContentLoaded', function () {
    const hargaElements = document.querySelectorAll('.Harga-isi');
    hargaElements.forEach(function (element) {
        const hargaValue = parseFloat(element.innerText);
        element.innerText = formatHarga(hargaValue);
    });
    // Untuk Text Timeout selama 2 detik 
    var pesanTersimpanElement = document.getElementById('pesanTersimpan');
    if (pesanTersimpanElement.innerText !== '') {
       // untuk set timer textnya 
        setTimeout(function () {
            pesanTersimpanElement.innerText = '';
        }, 2000); //  milliseconds 2000 = 2S
    }
});




