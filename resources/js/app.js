import './bootstrap';
// Ambil elemen tipe dan kategori dari form
var typeSelect = document.getElementById('type');
var categorySelect = document.getElementById('category');

// Daftar opsi kategori sesuai dengan tipe
var categoryOptions = {
    income: ['wage', 'bonus', 'gift'],
    expense: ['food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation'],
};

// Fungsi untuk mengganti opsi kategori
function updateCategoryOptions() {
    var selectedType = typeSelect.value;
    var options = categoryOptions[selectedType] || [];

    // Bersihkan opsi kategori yang ada
    categorySelect.innerHTML = '';

    // Tambahkan opsi kategori sesuai dengan tipe yang dipilih
    options.forEach(function (category) {
        var option = document.createElement('option');
        option.value = category;
        option.text = category;
        categorySelect.appendChild(option);
    });

    // Jika tidak ada opsi, tambahkan opsi "Uncategorized"
    if (options.length === 0) {
        var uncategorizedOption = document.createElement('option');
        uncategorizedOption.value = 'uncategorized';
        uncategorizedOption.text = 'Uncategorized';
        categorySelect.appendChild(uncategorizedOption);
    }
}

// Panggil fungsi untuk mengisi opsi kategori saat halaman dimuat dan saat tipe berubah
updateCategoryOptions();
typeSelect.addEventListener('change', updateCategoryOptions);
