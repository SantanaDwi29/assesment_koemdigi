<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (!empty($title)) ? $title : 'Insom Coffee Shop'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50">
    <header x-data="{ isOpen: false }" class="bg-slate-900 text-white shadow-lg sticky top-0 z-50">
        <nav class="container mx-auto flex justify-between items-center p-4">
            <a href="<?php echo base_url(); ?>" class="flex items-center space-x-3">
                <img src="<?php echo base_url('assets/img/lambang.png'); ?>" alt="Logo" class="h-14 w-14">
                <span class="text-2xl font-bold">Insom Coffee</span>
            </a>

            <ul class="hidden md:flex items-center space-x-8 text-sm font-semibold">
                <li><a href="<?php echo base_url('dashboard'); ?>" class="hover:text-amber-400 transition-colors duration-300">Home</a></li>
                <li><a href="<?php echo base_url('produk'); ?>" class="hover:text-amber-400 transition-colors duration-300">Produk</a></li>

                <li><a href="<?php echo base_url('visimisi'); ?>" class="hover:text-amber-400 transition-colors duration-300">Visi & Misi</a></li>
                <li><a href="<?php echo base_url('kontak'); ?>" class="hover:text-amber-400 transition-colors duration-300">Kontak</a></li>
                <li x-data="{ open: false }" @click.away="open = false" class="relative">
                    <a @click.prevent="open = !open" href="#" class="flex items-center gap-1 hover:text-amber-400 transition-colors duration-300 cursor-pointer">
                        <span>Tentang Kami</span>
                        <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                    </a>
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2"
                        class="absolute -left-4 mt-2 w-48 bg-slate-800 rounded-md shadow-lg py-2 z-20"
                        style="display: none;">
                        <a href="<?php echo base_url('tentang/profile'); ?>" class="block px-4 py-2 text-sm text-white hover:bg-slate-700">Profil Perusahaan</a>
                        <a href="<?php echo base_url('tentang/pengalaman'); ?>" class="block px-4 py-2 text-sm text-white hover:bg-slate-700">Pengalaman</a>
                        <a href="<?php echo base_url('tentang/kelebihan'); ?>" class="block px-4 py-2 text-sm text-white hover:bg-slate-700">Kelebihan Kami</a>
                    </div>
                </li>
            </ul>
            <div class="md:hidden">
                <button @click="isOpen = !isOpen" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <!-- untuk moble pada bagian tentang kami -->
        <div x-show="isOpen" @click.away="isOpen = false" class="md:hidden bg-slate-800" x-transition>
            <a href="<?php echo base_url('dashboard'); ?>" class="block px-4 py-2 text-sm hover:bg-slate-700">Home</a>
            <a href="<?php echo base_url('produk'); ?>" class="block px-4 py-2 text-sm hover:bg-slate-700">Produk</a>
            <a href="<?php echo base_url('visimisi'); ?>" class="block px-4 py-2 text-sm hover:bg-slate-700">Visi & Misi</a>
            <a href="<?php echo base_url('kontak'); ?>" class="block px-4 py-2 text-sm hover:bg-slate-700">Kontak</a>
            <div x-data="{ open: false }">
                <a @click.prevent="open = !open" href="#" class="flex items-center justify-between w-full px-4 py-2 text-sm hover:bg-slate-70t-700 cursor-pointer">
                    <span>Tentang Kami</span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                </a>
                <div x-show="open" x-transition class="pl-8 bg-slate-900">
                    <a href="<?php echo base_url('tentang/profile'); ?>" class="block px-4 py-2 text-sm hover:bg-slate-700">Profil Perusahaan</a>
                    <a href="<?php echo base_url('tentang/pengalaman'); ?>" class="block px-4 py-2 text-sm hover:bg-slate-700">Pengalaman</a>
                    <a href="<?php echo base_url('tentang/kelebihan'); ?>" class="block px-4 py-2 text-sm hover:bg-slate-700">Kelebihan Kami</a>
                </div>
            </div>
        </div>
    </header>

    <section class="relative h-64 md:h-96 bg-cover bg-center" style="background-image: url('<?php echo base_url('assets/img/header.png'); ?>');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white p-4">
            <h1 class="text-4xl md:text-6xl font-bold text-center">Selamat Datang di Insom Coffee</h1>
            <p class="text-xl md:text-2xl mt-4 text-center italic">Tempat di Mana Malam Menjadi Lebih Hidup</p>
        </div>
    </section>
    <div class="container mx-auto p-4 md:p-8 lg:p-16 flex flex-col md:flex-row gap-8">
        <aside class="w-full md:w-64 flex-shrink-0">
            <div class="bg-white p-4 rounded-lg shadow-md">
                <nav class="space-y-4">
                    <div>
                        <div x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center justify-between w-full py-2 px-3 rounded-lg text-slate-600 font-semibold hover:bg-slate-100 transition-colors duration-200 cursor-pointer">
                                <span>Artikel</span>
                                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" x-transition class="mt-2 space-y-1 pl-4">
                                <?php if (!empty($sidebar_artikel)): ?>
                                    <?php foreach ($sidebar_artikel as $artikel_item): ?>
                                        <a href="<?php echo base_url('artikel/baca/' . $artikel_item->slug); ?>" class="flex items-center gap-2 py-2 px-3 rounded-lg text-slate-600 hover:bg-slate-100 transition-colors duration-200">
                                            <span>&#x2022; <?php echo htmlspecialchars($artikel_item->judul); ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <span class="text-xs text-slate-500 pl-3">Belum ada artikel.</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2 border-t pt-4">
                        <a href="<?php echo base_url('galeri'); ?>" class="block py-2 px-3 rounded-lg text-slate-600 font-semibold hover:bg-slate-100 transition-colors duration-200">Event Galery</a>
                        <a href="<?php echo base_url('klien'); ?>" class="block py-2 px-3 rounded-lg text-slate-600 font-semibold hover:bg-slate-100 transition-colors duration-200">Klien kami</a>
                    </div>
                    <?php if ($this->session->userdata('Level') == 'admin'): ?>
                        <div class="space-y-2 border-t pt-4">
                            <h3 class="text-xs uppercase text-slate-500 font-semibold tracking-wider px-3">Menu Admin</h3>

                            <a href="<?php echo base_url('produk/manajemen'); ?>" class="flex items-center gap-3 py-2 px-3 rounded-lg text-slate-600 font-semibold hover:bg-slate-100 transition-colors duration-200">
                                <i class="fa-solid fa-box-open w-4 text-purple-500"></i>
                                <span>Manajemen Produk</span>
                            </a>
                            <a href="<?php echo base_url('artikel/manajemen'); ?>" class="flex items-center gap-3 py-2 px-3 rounded-lg text-slate-600 font-semibold hover:bg-slate-100 transition-colors duration-200">
                                <i class="fa-solid fa-newspaper w-4 text-cyan-500"></i>
                                <span>Manajemen Artikel</span>
                            </a>
                            <a href="<?php echo base_url('galeri/manajemen'); ?>" class="flex items-center gap-3 py-2 px-3 rounded-lg text-slate-600 font-semibold hover:bg-slate-100 transition-colors duration-200">
                                <i class="fa-solid fa-images w-4 text-pink-500"></i>
                                <span>Manajemen Galeri</span>
                            </a>
                        </div>
                    <?php endif; ?>

                </nav>
                <div class="p-4 border-t mt-6 space-y-2">
                    <?php if ($this->session->userdata('logged_in')): ?>

                        <div class="text-center">
                            <p class="text-sm text-slate-600">Halo,</p>
                            <p class="font-bold text-slate-800 truncate"><?php echo $this->session->userdata('Username'); ?></p>
                        </div>
                        <a href="<?php echo base_url('auth/logout'); ?>" class="block w-full text-center py-2 px-4 rounded-lg bg-red-600 text-white font-bold hover:bg-red-700 transition-colors duration-200">
                            Logout
                        </a>

                    <?php else: ?>

                        <a href="<?php echo base_url('auth/register'); ?>" class="block w-full text-center py-2 px-4 rounded-lg bg-slate-800 text-white font-bold hover:bg-slate-700 transition-colors duration-200">
                            Sign Up
                        </a>
                        <a href="<?php echo base_url('auth'); ?>" class="block w-full text-center py-2 px-4 rounded-lg text-slate-600 hover:bg-slate-100 transition-colors duration-200">
                            Sign In
                        </a>

                    <?php endif; ?>
                </div>
            </div>
        </aside>

        <main class="flex-1">
            <?php
            if (!empty($konten)) {
                echo $konten;
            } else {
            ?>
                <section class="text-center">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">Surga Bagi Para Pemimpi & Pekerja Keras</h2>
                    <div class="max-w-3xl mx-auto text-slate-700 text-base md:text-lg space-y-4 text-left">
                        <p>Selamat datang di rumah. <strong>Insom Coffee Shop</strong> adalah jawaban untuk Anda. Jelajahi menu di samping untuk melihat artikel atau galeri kami atau menu yang ada diatas. Dan anda dapat melakukan register atau log in untuk menjadi bagian dari kami</p>
                    </div>
                </section>
            <?php
            }
            ?>
        </main>
    </div>

    <footer class="bg-slate-900 text-white p-6 mt-8">
        <div class="container mx-auto text-center text-sm">
            <p class="font-semibold">© 2025 Insom Coffee Shop. All rights reserved.</p>
            <p class="text-slate-400 mt-1">Design by I Made Santana Dwiananda</p>
        </div>
    </footer>
</body>

</html>