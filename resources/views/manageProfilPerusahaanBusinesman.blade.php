<x-layout>
    <x-slot:title>Manage Perusahaan</x-slot:title>
    <x-slot:content>
        <div class="flex min-h-screen bg-gray-100 ">
           <x-dashboard></x-dashboard>

            <!-- Profile Section -->
            <div class="flex-1 p-5 ">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">

                    <div class="flex items-center p-6 bg-blue-600 md:mb-[30px]">
                        <img class="w-24 h-24 rounded-full border-4 border-white shadow-md"
                            src="https://via.placeholder.com/150" alt="Logo Perusahaan">
                        <div class="ml-6">
                            <h3 class="text-2xl font-semibold text-white">Nama Perusahaan</h3>
                            <p class="text-white opacity-80">Bidang Industri</p>
                        </div>
                    </div>

                    <div class="flex-1 p-5  " x-data="{ openEditProfilePerusahaan: false }">
                        <!-- Button to Open Modal Perusahaan -->
                        <div class="flex justify-end md:mb-[30px]">
                            <button @click="openEditProfilePerusahaan = true"
                                class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700">
                                Edit Profil
                            </button>
                        </div>

                        <!-- Modal Background Overlay Perusahaan -->
                        <div x-show="openEditProfilePerusahaan"
                            x-effect="document.body.style.overflow = openEditProfilePerusahaan ? 'hidden' : 'auto'"
                            class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
                            style="display: none;">

                            <!-- Modal Content Perusahaan -->
                            <div @click.away="openEditProfilePerusahaan = false"
                                class="bg-white rounded-lg shadow-lg w-3/4 max-w-5xl p-8 relative z-50 overflow-y-auto max-h-[85vh]">
                                <button @click="openEditProfilePerusahaan = false"
                                        class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">&times;</button>

                                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Edit Profil Perusahaan</h2>



                                <!-- Form Edit Profile Perusahaan -->
                                <form action="#" method="POST" class="space-y-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Nama Perusahaan -->
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Nama
                                                Perusahaan</label>
                                            <input type="text" name="company_name" placeholder="Nama Perusahaan"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>

                                        <!-- Nama Pemilik -->
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Nama Pemilik
                                                Perusahaan</label>
                                            <input type="text" name="owner_name" placeholder="Nama Pemilik"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>

                                        <!-- Bidang Industri -->
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Bidang
                                                Industri</label>
                                            <input type="text" name="industry" placeholder="Bidang Industri"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>

                                        <!-- Email -->
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Email</label>
                                            <input type="email" name="email" placeholder="Email Perusahaan"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>

                                        <!-- Phone -->
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Phone</label>
                                            <input type="text" name="phone" placeholder="Nomor Telepon Perusahaan"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>

                                        <!-- Alamat -->
                                        <div class="col-span-2">
                                            <label class="block text-gray-700 font-semibold mb-2">Alamat</label>
                                            <textarea name="address" rows="3" placeholder="Alamat Perusahaan"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                        </div>

                                        <!-- Tentang Perusahaan -->
                                        <div class="col-span-2">
                                            <label class="block text-gray-700 font-semibold mb-2">Tentang
                                                Perusahaan</label>
                                            <textarea name="description" rows="4" placeholder="Deskripsi Singkat Tentang Perusahaan"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                        </div>
                                    </div>

                                    <!-- Button Actions -->
                                    <div class="flex justify-end mt-8">
                                        <button type="button" @click="openEditProfilePerusahaan = false"
                                            class="px-5 py-3 bg-gray-300 text-gray-800 rounded-lg mr-4">Batal</button>
                                        <button type="submit"
                                            class="px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="content"> --}}
                    <!-- Kontak Section -->
                    <div class="md:mb-[30px] bg-gray-50 border-l-4 border-blue-500 shadow-md rounded-lg p-6 ">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Kontak</h3>
                        <p class="text-gray-600"><b>Email:</b> zeeasadel@example.com</p>
                        <p class="text-gray-600"><b>Phone:</b> +62 812 3456 7890</p>
                    </div>
                    <!-- Nama Pemilik Section -->
                    <div class="md:mb-[30px] bg-gray-50 border-l-4 border-blue-500 shadow-md rounded-lg p-6 ">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Nama Pemilik Perusahaan</h3>
                        <p class="text-gray-600">Zee</p>
                    </div>

                    <!-- Alamat Section -->
                    <div class="md:mb-[30px] bg-gray-50 border-l-4 border-blue-500 shadow-md rounded-lg p-6 ">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Alamat Perusahaan</h3>
                        <p class="text-gray-600">Jalan Darjo</p>
                    </div>

                    <!-- Deskripsi Perusahaan Section -->
                    <div class="md:mb-[30px] bg-gray-50 border-l-4 border-blue-500 shadow-md rounded-lg p-6 ">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Perusahaan</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Kami adalah perusahaan yang bergerak di bidang pengembangan bakat dan memberikan
                            kesempatan
                            kerja di berbagai bidang. Fokus kami adalah membantu perusahaan dan individu berkembang
                            bersama. Kami berkomitmen untuk memberikan layanan terbaik kepada para klien dan mitra
                            kerja
                            kami.
                        </p>
                    </div>



                    <div class=" md:mb-[30px] bg-gray-50 border-l-4 border-blue-500 shadow-md rounded-lg p-6 ">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">List Lowongan Bisnis</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                            {{-- Card --}}
                            <div class="relative bg-white p-4 rounded-lg shadow-lg flex flex-col items-center"
                                x-data="{ openEditProfileLowongan: false }">

                                <button @click="openEditProfileLowongan = true"
                                    class= "absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 20h9m-3.39-3.39l-1.67 1.67a2 2 0 01-2.83 0L3 12V7a1 1 0 011-1h5l9.61 9.61z" />
                                    </svg>
                                </button>




                                <div x-show="openEditProfileLowongan"
                                    x-effect="document.body.style.overflow = openEditProfileLowongan ? 'hidden' : 'auto'"
                                    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
                                    style="display: none;">



                                    <!-- Modal Content -->
                                    <div @click.away="openEditProfileLowongan = false"
                                        class="bg-white rounded-lg shadow-lg w-3/4 max-w-5xl p-8 relative z-50 overflow-y-auto max-h-[85vh]">

                                        <button @click="openEditProfileLowongan = false"
                                        class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">&times;</button>

                                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Profil Lowongan
                                            Bisnis</h2>

                                        <!-- Form Edit Profile -->
                                        <form action="#" method="POST" class="space-y-4">
                                            <div>
                                                <label class="block text-gray-700 font-semibold">Nama Lowongan
                                                    Bisnis</label>
                                                <input type="text" name="company_name"
                                                    placeholder="Nama Perusahaan"
                                                    class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            </div>

                                            <div>
                                                <label class="block text-gray-700 font-semibold">Alamat Cabang
                                                    Perusahaan</label>
                                                <textarea name="address" rows="3" placeholder="Alamat Perusahaan"
                                                    class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                            </div>

                                            <div>
                                                <label class="block text-gray-700 font-semibold">Kualifikasi</label>
                                                <textarea name="address" rows="3" placeholder="Alamat Perusahaan"
                                                    class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                            </div>

                                            <div>
                                                <label class="block text-gray-700 font-semibold">Keuntungan</label>
                                                <textarea name="address" rows="3" placeholder="Alamat Perusahaan"
                                                    class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                            </div>

                                            <!-- Button Actions -->
                                            <div class="flex justify-end mt-6">
                                                <button type="button" @click="openEditProfileLowongan = false"
                                                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg mr-2">Batal</button>
                                                <button type="submit"
                                                    class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700">Simpan</button>


                                            </div>
                                        </form>
                                    </div>
                                </div>




                                <img src="https://via.placeholder.com/100" alt="Danone Logo" class="w-16 h-16 mb-2">
                                <h2 class="text-lg font-semibold">Danone</h2>
                                <p class="text-gray-600">⭐ 4.3 • 70 Ulasan</p>
                                <button class="mt-3 bg-blue-500 text-white py-1 px-4 rounded">11 Pekerjaan</button>
                            </div>



                            <div x-data="{ openTambahLowongan: false }"
                                class="relative bg-white p-4 rounded-lg shadow-lg flex flex-col items-center justify-center">
                                <button type="button" @click="openTambahLowongan = true"
                                    class="text-blue-500 hover:text-blue-700">
                                    <!-- Plus Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>

                                <div x-show="openTambahLowongan"
                                    x-effect="document.body.style.overflow = openTambahLowongan ? 'hidden' : 'auto'"
                                    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
                                    style="display: none;">



                                    <!-- Modal Content -->
                                    <div @click.away="openTambahLowongan = false"
                                        class="bg-white rounded-lg shadow-lg w-3/4 max-w-5xl p-8 relative z-50 overflow-y-auto max-h-[85vh]">

                                        <button @click="openTambahLowongan = false"
                                        class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">&times;</button>

                                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tambah Lowongan Bisnis
                                            Bisnis</h2>

                                        <!-- Form Edit Profile -->
                                        <form action="#" method="POST" class="space-y-4">
                                            <div>
                                                <label class="block text-gray-700 font-semibold">Nama Lowongan
                                                    Bisnis</label>
                                                <input type="text" name="company_name"
                                                    placeholder="Nama Perusahaan"
                                                    class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            </div>

                                            <div>
                                                <label class="block text-gray-700 font-semibold">Alamat Cabang
                                                    Perusahaan</label>
                                                <textarea name="address" rows="3" placeholder="Alamat Perusahaan"
                                                    class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                            </div>

                                            <div>
                                                <label class="block text-gray-700 font-semibold">Kualifikasi</label>
                                                <textarea name="address" rows="3" placeholder="Alamat Perusahaan"
                                                    class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                            </div>

                                            <div>
                                                <label class="block text-gray-700 font-semibold">Keuntungan</label>
                                                <textarea name="address" rows="3" placeholder="Alamat Perusahaan"
                                                    class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                            </div>

                                            <!-- Button Actions -->
                                            <div class="flex justify-end mt-6" x-data="{ openEditProfileLowongan: false }">
                                                <button type="button" @click="openTambahLowongan = false"
                                                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg mr-2">Batal</button>
                                                <button type="submit"
                                                    class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700">Simpan</button>


                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>

    </x-slot:content>
</x-layout>
