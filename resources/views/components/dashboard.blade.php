 <!-- Sidebar -->
 <div class="flex w-[250px]">
    <aside class="w-64 bg-white shadow-lg fixed h-full">
        <div class="p-6">
            <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
        </div>
        <nav>
            <ul>
                <a href="/dashboardBusinesman" class="text-gray-600">
                    <li
                        class="p-4 {{ request()->is('dashboardBusinesman') ? 'bg-gray-200' : 'text-gray-600' }} hover:bg-gray-200">
                        Tambah Lowongan Bisnis
                    </li>
                </a>
                <a href="/manageLowongan" class="text-gray-600">
                    <li
                        class="p-4 {{ request()->is('manageLowongan') ? 'bg-gray-200' : 'text-gray-600' }} hover:bg-gray-200">
                        Manage Lowongan Bisnis</li>
                </a>
                <a href="/listPermintaanBergabung" class="text-gray-600">
                    <li
                        class="p-4 {{ request()->is('listPermintaanBergabung') ? 'bg-gray-200' : 'text-gray-600' }} hover:bg-gray-200">
                        List Permintaan Bergabung</li>
                </a>
                <a href="/listUserBergabung" class="text-gray-600">
                    <li
                        class="p-4 {{ request()->is('listUserBergabung') ? 'bg-gray-200' : 'text-gray-600' }} hover:bg-gray-200">
                        User Bergabung</li>
                </a>
                <a href="/manageProfilPerusahaanBusinesman" class="text-gray-600">
                    <li
                        class="p-4 {{ request()->is('manageProfilPerusahaanBusinesman') ? 'bg-gray-200' : 'text-gray-600' }} hover:bg-gray-200">
                        Manage Profil Perusahaan
                    </li>
                </a>
            </ul>
        </nav>
    </aside>
 </div>

