<?php
// Tentukan URL tujuan berdasarkan level pengguna
$kembali_url = base_url('artikel'); // Default untuk pengunjung biasa
if ($this->session->userdata('Level') == 'admin') {
    $kembali_url = base_url('artikel/manajemen'); // Khusus untuk admin
}
?>
<div class="bg-white p-6 md:p-8 rounded-lg shadow-md max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-slate-800"><?= htmlspecialchars($artikel->judul) ?></h1>
    <p class="text-slate-500 mt-2 mb-6">Dipublikasikan pada <?= date('d F Y', strtotime($artikel->tanggal_dibuat)) ?> oleh <?= htmlspecialchars($artikel->penulis) ?></p>

    <img src="<?= base_url('assets/img/artikel/' . $artikel->gambar) ?>" alt="<?= htmlspecialchars($artikel->judul) ?>" class="w-full h-auto max-h-96 object-cover rounded-lg mb-8">

    <div class="prose max-w-none text-slate-700">
        <?= $artikel->isi ?>
    </div>
<?php 
// Hanya tampilkan tombol kembali jika yang login adalah admin
if ($this->session->userdata('Level') == 'admin'): 
?>
<a href="<?= $kembali_url ?>" class="inline-block mt-8 text-amber-600 font-semibold hover:text-amber-700">&larr; Kembali ke Daftar Artikel</a>
<?php endif; ?>
</div>