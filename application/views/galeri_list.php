<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-slate-800"><?= $title ?></h1>
        <p class="mt-2 text-lg text-slate-500">Lihat kembali keseruan dan momen-momen tak terlupakan yang telah kita ciptakan bersama.</p>
    </div>
    <hr class="my-10 border-slate-200">
    <div class="space-y-16">
        <?php if (!empty($events)): foreach ($events as $event): ?>
        <section>
            <div class="mb-6">
                <p class="text-amber-600 font-semibold"><?= date('l, d F Y', strtotime($event->tanggal_event)) ?></p>
                <h2 class="text-3xl font-bold text-slate-700"><?= htmlspecialchars($event->nama_event) ?></h2>
                <p class="mt-2 text-slate-600 w-auto"><?= htmlspecialchars($event->deskripsi_event) ?></p>
            </div>
            <?php if (!empty($event->photos)): ?>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php foreach ($event->photos as $photo): ?>
                <a href="<?= base_url('assets/img/galeri/' . $photo->nama_file) ?>" target="_blank">
                    <img src="<?= base_url('assets/img/galeri/' . $photo->nama_file) ?>" alt="Foto <?= htmlspecialchars($event->nama_event) ?>" class="w-full h-48 object-cover rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300">
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </section>
        <?php endforeach; else: ?>
        <p class="text-center text-slate-500">Belum ada event di galeri.</p>
        <?php endif; ?>
    </div>
</div>