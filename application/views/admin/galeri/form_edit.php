
<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
    
    <?php if ($this->session->flashdata('success')): ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
        <p><?php echo $this->session->flashdata('success'); ?></p>
    </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
        <p><?php echo $this->session->flashdata('error'); ?></p>
    </div>
    <?php endif; ?>

    <div class="border-b pb-6">
        <h1 class="text-3xl font-bold text-slate-800">Edit Event: <?= htmlspecialchars($event->nama_event) ?></h1>
        <p class="text-slate-500 mt-1">Ubah detail event di bawah ini.</p>
        
        <form action="<?= base_url('galeri/proses_update'); ?>" method="POST" class="space-y-6 mt-4">
            <input type="hidden" name="id_event" value="<?= $event->id_event ?>">
            <div>
                <label for="nama_event" class="block text-sm font-medium text-slate-700">Nama Event</label>
                <input type="text" name="nama_event" id="nama_event" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500" value="<?= htmlspecialchars($event->nama_event) ?>">
            </div>
            <div>
                <label for="tanggal_event" class="block text-sm font-medium text-slate-700">Tanggal Event</label>
                <input type="date" name="tanggal_event" id="tanggal_event" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500" value="<?= $event->tanggal_event ?>">
            </div>
            <div>
                <label for="deskripsi_event" class="block text-sm font-medium text-slate-700">Deskripsi Singkat</label>
                <textarea name="deskripsi_event" id="deskripsi_event" rows="4" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500"><?= htmlspecialchars($event->deskripsi_event) ?></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="py-2 px-6 rounded-lg bg-amber-500 text-white font-bold hover:bg-amber-600 transition-colors">Update Detail Event</button>
            </div>
        </form>
    </div>

    <div class="border-b py-6">
        <h2 class="text-2xl font-bold text-slate-800">Kelola Foto Saat Ini (<?= count($event->photos) ?> foto)</h2>
        <?php if (!empty($event->photos)): ?>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
            <?php foreach($event->photos as $photo): ?>
            <div class="relative group">
                <img src="<?= base_url('assets/img/galeri/'.$photo->nama_file) ?>" class="w-full h-32 object-cover rounded-md">
                <a href="<?= base_url('galeri/hapus_foto/'.$photo->id_foto.'/'.$event->id_event) ?>" 
                   onclick="return confirm('Yakin ingin hapus foto ini?')"
                   class="absolute top-1 right-1 bg-red-600 text-white rounded-full h-6 w-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                   <i class="fa-solid fa-times text-xs"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <p class="text-slate-500 mt-2">Belum ada foto di event ini.</p>
        <?php endif; ?>
    </div>

    <div class="pt-6">
        <h2 class="text-2xl font-bold text-slate-800">Tambah Foto Baru</h2>
        <form action="<?= base_url('galeri/tambah_foto'); ?>" method="POST" enctype="multipart/form-data" class="space-y-6 mt-4">
            <input type="hidden" name="id_event" value="<?= $event->id_event ?>">
            <div>
                <label for="fotos" class="block text-sm font-medium text-slate-700">Pilih Foto (Bisa lebih dari satu)</label>
                <input type="file" name="fotos[]" id="fotos" multiple required class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                <p class="text-xs text-slate-500 mt-1">Tahan tombol Ctrl (atau Cmd di Mac) untuk memilih beberapa file.</p>
            </div>
            <div class="flex justify-end gap-4">
                 <a href="<?= base_url('galeri/manajemen'); ?>" class="py-2 px-6 rounded-lg bg-slate-200 text-slate-700 font-bold hover:bg-slate-300 transition-colors">Selesai & Kembali</a>
                <button type="submit" class="py-2 px-6 rounded-lg bg-slate-800 text-white font-bold hover:bg-slate-700 transition-colors">Upload Foto Baru</button>
            </div>
        </form>
    </div>

</div>
