<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Manajemen Galeri</h1>
            <p class="text-slate-500 mt-1">Kelola semua event galeri foto Anda.</p>
        </div>
        <a href="<?= base_url('galeri/tambah'); ?>" class="py-2 px-5 rounded-lg bg-slate-800 text-white font-bold hover:bg-slate-700 transition-colors flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Event Baru</span>
        </a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
        <p><?php echo $this->session->flashdata('success'); ?></p>
    </div>
    <?php endif; ?>

    <div class="overflow-x-auto">
        <table class="table-auto w-full text-left text-slate-600">
            <thead class="bg-slate-50 text-sm text-slate-700 uppercase">
                <tr>
                    <th class="p-4">Nama Event</th>
                    <th class="p-4">Tanggal</th>
                    <th class="p-4 text-center">Jumlah Foto</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                <?php if (!empty($events)): ?>
                    <?php foreach($events as $event): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 font-semibold text-slate-800"><?= htmlspecialchars($event->nama_event) ?></td>
                        <td class="p-4"><?= date('d M Y', strtotime($event->tanggal_event)) ?></td>
                        <td class="p-4 text-center"><?= count($event->photos) ?></td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="<?= base_url('galeri/edit/'.$event->id_event) ?>" class="py-2 px-3 rounded-lg bg-amber-500 text-white font-bold hover:bg-amber-600 transition-colors text-sm">Edit</a>
                                <a href="<?= base_url('galeri/hapus/'.$event->id_event) ?>" onclick="return confirm('Yakin ingin hapus event ini? Semua foto di dalamnya akan ikut terhapus.')" class="py-2 px-3 rounded-lg bg-red-600 text-white font-bold hover:bg-red-700 transition-colors text-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center p-6 text-slate-500">
                            Belum ada event galeri. Silakan tambah event baru.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>