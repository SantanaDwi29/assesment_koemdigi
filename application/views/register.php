<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Insom Coffee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen py-12">

    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-slate-800">Buat Akun Baru</h1>
            <p class="mt-2 text-sm text-slate-500">Sudah punya akun? <a href="<?php echo base_url('auth'); ?>" class="font-medium text-amber-600 hover:underline">Masuk di sini</a></p>
        </div>

        <?php if($this->session->flashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"><?php echo $this->session->flashdata('error'); ?></span>
            </div>
        <?php endif; ?>
        <div class="text-red-500 text-sm">
            <?php echo validation_errors(); ?>
        </div>

        <form action="<?php echo base_url('auth/process_register'); ?>" method="POST" class="space-y-4">
            <div>
                <label for="NamaLengkap" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                <input type="text" id="NamaLengkap" name="NamaLengkap" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500" value="<?php echo set_value('NamaLengkap'); ?>">
            </div>
             <div>
                <label for="Username" class="block text-sm font-medium text-slate-700">Username</label>
                <input type="text" id="Username" name="Username" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500" value="<?php echo set_value('Username'); ?>">
            </div>
            <div>
                <label for="Password" class="block text-sm font-medium text-slate-700">Password</label>
                <input type="password" id="Password" name="Password" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
            </div>
            <div>
                <label for="passconf" class="block text-sm font-medium text-slate-700">Konfirmasi Password</label>
                <input type="password" id="passconf" name="passconf" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
            </div>
            <div>
                <button type="submit" class="w-full py-3 px-4 rounded-lg bg-slate-800 text-white font-bold hover:bg-slate-700 transition-colors duration-200">
                    Daftar
                </button>
            </div>
        </form>
    </div>

</body>
</html>