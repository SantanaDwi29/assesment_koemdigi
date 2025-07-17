<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
    
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-slate-800">Tambah Event Galeri Baru</h1>
        <p class="text-slate-500 mt-1">Isi detail event dan unggah foto-fotonya.</p>
    </div>

    <form action="<?= base_url('galeri/simpan'); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        
        <div>
            <label for="nama_event" class="block text-sm font-medium text-slate-700">Nama Event</label>
            <input type="text" name="nama_event" id="nama_event" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
        </div>
        
        <div>
            <label for="tanggal_event" class="block text-sm font-medium text-slate-700">Tanggal Event</label>
            <input type="date" name="tanggal_event" id="tanggal_event" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
        </div>
        
        <div>
            <label for="deskripsi_event" class="block text-sm font-medium text-slate-700">Deskripsi Singkat</label>
            <textarea name="deskripsi_event" id="deskripsi_event" rows="4" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500"></textarea>
        </div>
        
        <div>
            <label for="fotos" class="block text-sm font-medium text-slate-700">Upload Foto (Bisa pilih lebih dari satu)</label>
            <input type="file" name="fotos[]" id="fotos" multiple required class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
        </div>
        
        <div class="flex justify-end gap-4 pt-4">
            <a href="<?= base_url('galeri/manajemen'); ?>" class="py-2 px-6 rounded-lg bg-slate-200 text-slate-700 font-bold hover:bg-slate-300 transition-colors">Batal</a>
            <button type="submit" class="py-2 px-6 rounded-lg bg-slate-800 text-white font-bold hover:bg-slate-700 transition-colors">Simpan Event</button>
        </div>

    </form>
</div>