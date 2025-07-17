<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-slate-800">Edit Produk</h1>
        <p class="text-slate-500 mt-1">Ubah detail produk di bawah ini.</p>
    </div>

    <form action="<?php echo base_url('produk/proses_update'); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        
        <input type="hidden" name="id_produk" value="<?php echo $produk->id_produk; ?>">

        <div>
            <label for="nama_produk" class="block text-sm font-medium text-slate-700">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500" value="<?php echo $produk->nama_produk; ?>">
        </div>

        <div>
            <label for="kategori" class="block text-sm font-medium text-slate-700">Kategori</label>
            <select name="kategori" id="kategori" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                <option value="Espresso Based" <?php echo ($produk->kategori == 'Espresso Based') ? 'selected' : ''; ?>>Espresso Based</option>
                <option value="Signature" <?php echo ($produk->kategori == 'Signature') ? 'selected' : ''; ?>>Signature</option>
                <option value="Manual Brew" <?php echo ($produk->kategori == 'Manual Brew') ? 'selected' : ''; ?>>Manual Brew</option>
                <option value="Non-Coffee" <?php echo ($produk->kategori == 'Non-Coffee') ? 'selected' : ''; ?>>Non-Coffee</option>
                <option value="Pastries" <?php echo ($produk->kategori == 'Pastries') ? 'selected' : ''; ?>>Pastries</option>
            </select>
        </div>

        <div>
            <label for="harga" class="block text-sm font-medium text-slate-700">Harga</label>
            <input type="number" name="harga" id="harga" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500" value="<?php echo $produk->harga; ?>">
        </div>

        <div>
            <label for="deskripsi" class="block text-sm font-medium text-slate-700">Deskripsi Singkat</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500"><?php echo $produk->deskripsi; ?></textarea>
        </div>

        <div>
             <label for="status" class="block text-sm font-medium text-slate-700">Status Ketersediaan</label>
             <select name="status" id="status" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                 <option value="Tersedia" <?php echo ($produk->status == 'Tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                 <option value="Habis" <?php echo ($produk->status == 'Habis') ? 'selected' : ''; ?>>Habis</option>
             </select>
        </div>

         <div>
            <label class="block text-sm font-medium text-slate-700">Gambar Saat Ini</label>
            <img src="<?php echo base_url('assets/img/produk/'.$produk->gambar); ?>" alt="Gambar Produk" class="mt-2 w-32 h-32 object-cover rounded-md border">
        </div>

        <div>
            <label for="gambar" class="block text-sm font-medium text-slate-700">Ubah Gambar Produk (Kosongkan jika tidak diubah)</label>
            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a href="<?php echo base_url('produk/manajemen'); ?>" class="py-2 px-6 rounded-lg bg-slate-200 text-slate-700 font-bold hover:bg-slate-300 transition-colors">Batal</a>
            <button type="submit" class="py-2 px-6 rounded-lg bg-slate-800 text-white font-bold hover:bg-slate-700 transition-colors">Update Produk</button>
        </div>
    </form>
</div>