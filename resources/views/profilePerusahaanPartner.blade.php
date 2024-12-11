<x-layout>
    <x-slot:title>Perusahaan</x-slot:title>
    <x-slot:content>


        <div class="flex items-center justify-center min-h-screen p-8">
            <!-- Container Profil Perusahaan yang Lebar -->
            <div class="w-full max-w-4xl bg-white rounded-xl shadow-2xl overflow-hidden">

                <!-- Profil Perusahaan di Atas -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-8 text-center text-white">
                    <div class="w-32 h-32 mx-auto bg-white rounded-full border-4 border-white shadow-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $data->foto_perusahaan) }}" alt="Company Logo"
                            class="w-full h-full object-cover">
                    </div>
                    <h1 class="mt-4 text-3xl font-semibold">{{ $data->nama_perusahaan }}</h1>
                    <p class="mt-2 text-white text-opacity-75">{{ $data->kategori_bisnis->nama_kategori }}</p>
                </div>

                <!-- Informasi dan Deskripsi Perusahaan -->
                <div class="p-10 space-y-8">
                    <!-- Deskripsi Perusahaan -->
                    <div class="space-y-4">
                        <h2 class="text-2xl font-semibold text-gray-800">Tentang Perusahaan</h2>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $data->deskripsi }}
                        </p>
                    </div>

                    <!-- Informasi Kontak dan Alamat -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-gray-800">Nama Pemilik Perusahaan</h3>
                            <p class="text-gray-600">{{ $data->pemilik_perusahaan }}</p>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-gray-800">Alamat</h3>
                            <p class="text-gray-600">{{ $data->alamat_lengkap }}, {{ $data->kota }},
                                {{ $data->provinsi }}, {{ $data->kecamatan }} , {{ $data->kelurahan }}</p>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-lg font-semibold text-gray-800">Kontak</h3>
                            <p class="text-gray-600"><strong>Email:</strong> {{ $data->email_perusahaan }}</p>
                            <p class="text-gray-600"><strong>Telepon:</strong> +{{ $data->no_telp }}</p>
                        </div>
                    </div>

                    <!-- Lowongan Bisnis -->
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Lowongan Bisnis</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <!-- Card Lowongan -->
                            @foreach ($lowongan as $lowongans)
                            <a href="/detailLowonganBisnis/{{ $lowongans->id }}">
                                <div class="relative bg-white p-4 rounded-lg shadow-lg flex flex-col items-center">
                                    <img src="{{ asset('storage/' . $data->foto_perusahaan) }}" alt="Danone Logo" class="w-16 h-16 mb-2">
                                    <h2 class="text-lg font-semibold">{{ $lowongans->nama_lowongan }}</h2>
                                    <p class="text-gray-600">⭐ 4.3 • 70 Ulasan</p>
                                    <p class="mt-3 bg-blue-500 text-white py-1 px-4 rounded">{{ $lowongans->jumlah_lowongan }} Lowongan</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot:content>
</x-layout>
