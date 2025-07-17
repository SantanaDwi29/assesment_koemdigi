<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Manajemen Artikel</h1>
            <p class="text-slate-500 mt-1">Kelola semua artikel Anda dari sini.</p>
        </div>
        <a href="<?php echo base_url('artikel/tambah'); ?>" class="py-2 px-5 rounded-lg bg-slate-800 text-white font-bold hover:bg-slate-700 transition-colors flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span>Tambah Artikel</span>
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
                    <th class="p-4">Judul Artikel</th>
                    <th class="p-4">Penulis</th>
                    <th class="p-4">Tanggal Dibuat</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                <?php if (!empty($all_artikel)): ?>
                    <?php foreach ($all_artikel as $artikel): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 font-semibold text-slate-800"><?php echo htmlspecialchars($artikel->judul); ?></td>
                        <td class="p-4"><?php echo htmlspecialchars($artikel->penulis); ?></td>
                        <td class="p-4"><?php echo date('d M Y', strtotime($artikel->tanggal_dibuat)); ?></td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="<?php echo base_url('artikel/edit/'.$artikel->id_artikel); ?>" class="py-2 px-3 rounded-lg bg-amber-500 text-white font-bold hover:bg-amber-600 transition-colors text-sm">Edit</a>
                                <a href="<?php echo base_url('artikel/hapus/'.$artikel->id_artikel); ?>" class="py-2 px-3 rounded-lg bg-red-600 text-white font-bold hover:bg-red-700 transition-colors text-sm" onclick="return confirm('Anda yakin ingin menghapus artikel ini?');">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center p-4">Belum ada artikel. Silakan tambah artikel baru.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>