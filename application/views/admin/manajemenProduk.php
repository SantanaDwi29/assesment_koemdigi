<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-slate-800">Tambah Produk Baru</h1>
        <p class="text-slate-500 mt-1">Isi detail produk di bawah ini.</p>
    </div>

    <form action="<?php echo base_url('produk/simpan'); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        
        <div>
            <label for="nama_produk" class="block text-sm font-medium text-slate-700">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
        </div>

        <div>
            <label for="kategori" class="block text-sm font-medium text-slate-700">Kategori</label>
            <select name="kategori" id="kategori" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="Espresso Based">Espresso Based</option>
                <option value="Signature">Signature</option>
                <option value="Manual Brew">Manual Brew</option>
                <option value="Non-Coffee">Non-Coffee</option>
                <option value="Pastries">Pastries</option>
            </select>
        </div>

        <div>
            <label for="harga" class="block text-sm font-medium text-slate-700">Harga</label>
            <input type="number" name="harga" id="harga" required placeholder="Contoh: 32000" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
        </div>

        <div>
            <label for="deskripsi" class="block text-sm font-medium text-slate-700">Deskripsi Singkat</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500"></textarea>
        </div>

        <div>
             <label for="status" class="block text-sm font-medium text-slate-700">Status Ketersediaan</label>
             <select name="status" id="status" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                <option value="Tersedia">Tersedia</option>
                <option value="Habis">Habis</option>
            </select>
        </div>

         <div>
            <label for="gambar" class="block text-sm font-medium text-slate-700">Gambar Produk</label>
            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
            <p class="mt-1 text-sm text-slate-500">Format: jpg, png, maksimal 3MB.</p>
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a href="<?php echo base_url('produk'); ?>" class="py-2 px-6 rounded-lg bg-slate-200 text-slate-700 font-bold hover:bg-slate-300 transition-colors">Batal</a>
            <button type="submit" class="py-2 px-6 rounded-lg bg-slate-800 text-white font-bold hover:bg-slate-700 transition-colors">Simpan Produk</button>
        </div>

    </form>
</div>