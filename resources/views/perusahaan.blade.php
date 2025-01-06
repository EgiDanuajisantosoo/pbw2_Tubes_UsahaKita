<x-layout>
    <x-slot:title>Perusahaan</x-slot:title>
    <x-slot:content>
        <!-- Container utama -->
        <div class="bg-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Bagian Header -->
                <div class="bg-blue-900 rounded-lg shadow-lg overflow-hidden p-8 flex items-center justify-between">
                    <div class="text-white">
                        <h1 class="text-3xl font-semibold">Temukan perusahaan yang tepat untuk Anda</h1>
                        <p class="mt-2 text-lg">Semua yang perlu diketahui tentang perusahaan, di satu tempat</p>
                    </div>
                    <img src="https://via.placeholder.com/150" alt="Person" class="h-32 w-32 rounded-full">
                </div>

                <!-- Form Pencarian -->
                <form action="{{ route('search.perusahaan') }}" method="GET" class="mt-6 flex justify-center">
                    <div class="flex w-full max-w-md">
                        <input type="text" placeholder="Cari perusahaan" name="query"
                            class="w-full px-4 py-2 border border-gray-300 rounded-l-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-r-lg hover:bg-blue-800">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contoh Hasil Pencarian -->
        @if ($perusahaan->isEmpty())
            <p class="mb-40 text-center justify-center">Tidak ada hasil yang ditemukan. <a href="/perusahaan"
                    class="text-blue-600 hover:text-blue-400">Kembali Ke Perusahaan</a></p>
        @else
            <div class="container mx-auto p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                    @foreach ($perusahaan as $no => $perusahaans)
                        <!-- Card 1 -->

                        <a href="/profilePerusahaan/{{ $perusahaans->id }}">
                            <div class="bg-white p-4 rounded-lg shadow-lg flex flex-col items-center">
                                @if ($count && $count->foto_perusahaan != 0)
                                    <img src="{{ asset('storage/' . ($count->foto_perusahaan ?? 'default.jpg')) }}"
                                        alt="Danone Logo" class="w-16 h-16 mb-2">
                                @else
                                    <img src="{{ asset('storage/' . ($perusahaans->foto_perusahaan ?? 'default.jpg')) }}"
                                        alt="Danone Logo" class="w-16 h-16 mb-2">
                                @endif

                                <h2 class="text-lg font-semibold">{{ $perusahaans->nama_perusahaan }}</h2>
                                <p class="text-gray-600">⭐ 4.3 • 70 Ulasan</p>
                                @if ($count && $count->total_lowongan != 0)
                                    <button
                                        class="mt-3 bg-blue-500 text-white py-1 px-4 rounded">{{ $count ? $count->total_lowongan : 0 }}
                                        Pekerjaan</button>
                                @else
                                    <button
                                        class="mt-3 bg-blue-500 text-white py-1 px-4 rounded">{{ $perusahaans->lowongan->first()->total_lowongan ?? 0 }}
                                        Pekerjaan</button>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </x-slot:content>
</x-layout>
