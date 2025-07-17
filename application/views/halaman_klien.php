<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
    
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-slate-800">Klien & Komunitas Kami</h1>
        <p class="text-slate-500 mt-2 text-lg">Mereka yang telah menjadi bagian dari perjalanan Insom Coffee.</p>
    </div>

    <div class="text-center mb-12">
        <?php if ($this->session->userdata('logged_in') && $this->session->userdata('Level') != 'admin'): ?>
            <?php if ($user_status->is_client == 0): ?>
                <a href="<?= base_url('klien/tambah_diri') ?>" class="py-3 px-6 rounded-lg bg-amber-500 text-slate-900 font-bold hover:bg-amber-400 transition-colors">
                    Jadikan Saya Bagian dari Klien!
                </a>
            <?php else: ?>
                <p class="text-lg text-green-600 font-semibold">✓ Terima kasih telah menjadi bagian dari komunitas kami!</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>


    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 items-center">
        <?php foreach ($klien_list as $klien): ?>
            <div class="p-4 bg-gray-100 rounded-lg flex flex-col justify-center items-center h-40 text-center transform transition-transform duration-300 hover:scale-105">
                <img src="<?php echo base_url('assets/img/' . $klien->foto_profil); ?>" alt="Logo Klien" class="h-20 w-20 rounded-full object-cover mb-2">
                <span class="font-semibold text-slate-700"><?= htmlspecialchars($klien->Username) ?></span>
            </div>
        <?php endforeach; ?>
    </div>

</div>