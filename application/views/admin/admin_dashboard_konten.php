<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-slate-800 mb-4">Ringkasan Admin</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-blue-100 p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-blue-500 text-white rounded-full p-3 shadow-lg">
                    <i class="fa-solid fa-users fa-lg"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-blue-800">Total Pengguna</p>
                    <p class="text-2xl font-bold text-blue-900"><?= $total_pengguna; ?></p>
                </div>
            </div>
        </div>

        <div class="bg-green-100 p-6 rounded-lg shadow">
             <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-500 text-white rounded-full p-3 shadow-lg">
                    <i class="fa-solid fa-mug-hot fa-lg"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-green-800">Total Produk</p>
                    <p class="text-2xl font-bold text-green-900"><?= $total_produk; ?></p>
                </div>
            </div>
        </div>

        <div class="bg-yellow-100 p-6 rounded-lg shadow">
             <div class="flex items-center">
                <div class="flex-shrink-0 bg-yellow-500 text-white rounded-full p-3 shadow-lg">
                    <i class="fa-solid fa-newspaper fa-lg"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-yellow-800">Total Artikel</p>
                    <p class="text-2xl font-bold text-yellow-900"><?= $total_artikel; ?></p>
                </div>
            </div>
        </div>
        
    </div>
    
</div>