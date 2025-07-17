<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Manajemen Produk</h1>
            <p class="text-slate-500 mt-1">Kelola semua produk Anda dari sini.</p>
        </div>
        <a href="<?php echo base_url('produk/tambah'); ?>" class="py-2 px-5 rounded-lg bg-slate-800 text-white font-bold hover:bg-slate-700 transition-colors flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span>Tambah Produk</span>
        </a>
    </div>

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

    <div class="overflow-x-auto">
        <table class="table-auto w-full text-left text-slate-600">
            <thead class="bg-slate-50 text-sm text-slate-700 uppercase">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Gambar</th>
                    <th class="p-4">Nama Produk</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">Harga</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                <?php $no = 1; foreach ($all_produk as $produk): ?>
                <tr class="hover:bg-slate-50">
                    <td class="p-4 font-medium"><?php echo $no++; ?></td>
                    <td class="p-4">
                        <img src="<?php echo base_url('assets/img/produk/'.$produk->gambar); ?>" alt="<?php echo htmlspecialchars($produk->nama_produk); ?>" class="w-16 h-16 object-cover rounded-md">
                    </td>
                    <td class="p-4 font-semibold text-slate-800"><?php echo htmlspecialchars($produk->nama_produk); ?></td>
                    <td class="p-4"><?php echo htmlspecialchars($produk->kategori); ?></td>
                    <td class="p-4">Rp <?php echo number_format($produk->harga, 0, ',', '.'); ?></td>
                    <td class="p-4">
                        <?php if ($produk->status == 'Tersedia'): ?>
                            <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Tersedia</span>
                        <?php else: ?>
                            <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Habis</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="<?php echo base_url('produk/edit/'.$produk->id_produk); ?>" class="py-2 px-3 rounded-lg bg-amber-500 text-white font-bold hover:bg-amber-600 transition-colors text-sm">
                                Edit
                            </a>
                            <a href="<?php echo base_url('produk/hapus/'.$produk->id_produk); ?>" class="py-2 px-3 rounded-lg bg-red-600 text-white font-bold hover:bg-red-700 transition-colors text-sm" onclick="return confirm('Anda yakin ingin menghapus produk ini?');">
                                Hapus
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>