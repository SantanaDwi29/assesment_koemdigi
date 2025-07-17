<div class="bg-white p-8 rounded-lg shadow-md text-center">
    
    <div class="text-5xl text-amber-500 mb-4">
        <i class="fa-solid fa-mug-saucer"></i>
    </div>

    <h1 class="text-3xl font-bold text-slate-800">
        Selamat Datang Kembali,
    </h1>
    <p class="text-2xl font-semibold text-slate-700 mt-1">
        <?php echo $this->session->userdata('NamaLengkap'); ?>!
    </p>
    
    <p class="mt-6 text-slate-600 max-w-xl mx-auto">
        Terima kasih telah menjadi bagian dari komunitas Insom Coffee. <br>
        Silakan jelajahi menu di samping untuk melihat artikel terbaru atau menu favorit Anda.
    </p>
</div>