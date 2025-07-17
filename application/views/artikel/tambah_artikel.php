<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-slate-800">Tambah Artikel Baru</h1>
        <p class="text-slate-500 mt-1">Isi detail artikel di bawah ini untuk dipublikasikan.</p>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
        <p class="font-bold">Error Validasi</p>
        <p><?php echo $this->session->flashdata('error'); ?></p>
    </div>
    <?php endif; ?>

    <form action="<?php echo base_url('artikel/simpan'); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        
        <div>
            <label for="judul" class="block text-sm font-medium text-slate-700">Judul Artikel</label>
            <input type="text" name="judul" id="judul" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500" value="<?php echo set_value('judul'); ?>">
        </div>

        <div>
            <label for="penulis" class="block text-sm font-medium text-slate-700">Nama Penulis</label>
            <input type="text" name="penulis" id="penulis" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500" value="<?php echo $this->session->userdata('Username'); // Ambil dari session jika ada ?>">
        </div>

        <div>
            <label for="isi" class="block text-sm font-medium text-slate-700">Isi Artikel</label>
            <textarea name="isi" id="isi" rows="10" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500"><?php echo set_value('isi'); ?></textarea>
             <p class="text-xs text-slate-500 mt-1">Anda bisa menggunakan tag HTML dasar seperti &lt;b&gt;, &lt;i&gt;, &lt;p&gt;, &lt;br&gt; untuk format.</p>
        </div>

        <div>
            <label for="gambar" class="block text-sm font-medium text-slate-700">Gambar Utama Artikel</label>
            <input type="file" name="gambar" id="gambar" class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
            <p class="text-xs text-slate-500 mt-1">Ukuran maks 2MB. Kosongkan jika ingin menggunakan gambar default.</p>
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a href="<?php echo base_url('artikel/manajemen'); ?>" class="py-2 px-6 rounded-lg bg-slate-200 text-slate-700 font-bold hover:bg-slate-300 transition-colors">Batal</a>
            <button type="submit" class="py-2 px-6 rounded-lg bg-slate-800 text-white font-bold hover:bg-slate-700 transition-colors">Simpan Artikel</button>
        </div>

    </form>
</div>