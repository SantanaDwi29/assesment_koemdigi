<div class="bg-white p-6 md:p-8 rounded-lg shadow-md">

    <div class="text-center">
        <h1 class="text-4xl font-bold text-slate-800">Menu Pilihan Kami</h1>
        <p class="mt-2 text-lg text-slate-500">Setiap sajian dibuat untuk momen spesial Anda.</p>
    </div>

    <div class="mt-10">

        <?php if (!empty($produk_by_kategori)): ?>
            <?php // Loop pertama: untuk setiap KATEGORI ?>
            <?php foreach ($produk_by_kategori as $kategori => $items): ?>
            
            <section class="mt-12">
                <h2 class="text-3xl font-bold text-slate-700 mb-6 pb-2 border-b-2 border-amber-500">
                    <?php echo html_escape($kategori); // Menampilkan Nama Kategori ?>
                </h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    
                    <?php // Loop kedua: untuk setiap PRODUK dalam kategori ini ?>
                    <?php foreach ($items as $produk): ?>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300 flex flex-col">
                        <img src="<?php echo base_url('assets/img/produk/' . $produk->gambar); ?>" alt="<?php echo html_escape($produk->nama_produk); ?>" class="w-full h-48 object-cover">
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="font-bold text-xl text-slate-800"><?php echo html_escape($produk->nama_produk); ?></h3>
                            <p class="text-sm text-slate-600 mt-1 flex-grow"><?php echo html_escape($produk->deskripsi); ?></p>
                            <div class="mt-4">
                                <p class="text-xl font-extrabold text-amber-600">
                                    <?php echo 'IDR ' . number_format($produk->harga, 0, ',', '.'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </section>

            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center py-16">
                <p class="text-slate-500 text-xl">Mohon maaf, belum ada produk yang tersedia saat ini.</p>
            </div>
        <?php endif; ?>

    </div>

</div>