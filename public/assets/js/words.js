//   (Menampilkan jumlah kata)
document.addEventListener('trix-change', function (event) {
    let trixInput = document.getElementById('rancang_bangun');
    let wordCountDisplay = document.getElementById('rancang');

    // Menghitung jumlah kata tanpa menghitung spasi
    let words = trixInput.value.split(/\b\s+\b/).filter(Boolean);
    let count = words.length;

    wordCountDisplay.innerText = count + ' words';
});

document.addEventListener('trix-change', function (event) {
    let trixInput = document.getElementById('tujuan_inovasi');
    let wordCountDisplay = document.getElementById('tujuan');

    // Menghitung jumlah kata tanpa menghitung spasi
    let words = trixInput.value.split(/\b\s+\b/).filter(Boolean);
    let count = words.length;

    wordCountDisplay.innerText = count + ' words';
});

document.addEventListener('trix-change', function (event) {
    let trixInput = document.getElementById('manfaat_diperoleh');
    let wordCountDisplay = document.getElementById('manfaat');

    // Menghitung jumlah kata tanpa menghitung spasi
    let words = trixInput.value.split(/\b\s+\b/).filter(Boolean);
    let count = words.length;

    wordCountDisplay.innerText = count + ' words';
});

document.addEventListener('trix-change', function (event) {
    let trixInput = document.getElementById('hasil_inovasi');
    let wordCountDisplay = document.getElementById('hasil');

    // Menghitung jumlah kata tanpa menghitung spasi
    let words = trixInput.value.split(/\b\s+\b/).filter(Boolean);
    let count = words.length;

    wordCountDisplay.innerText = count + ' words';
});
