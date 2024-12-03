<x-layout>
    <x-slot:title>tutupBukaLowongan</x-slot:title>
    <x-slot:content>
        <!-- Sidebar -->
        <div class="flex min-h-screen bg-gray-100">
        <x-dashboard></x-dashboard>

            <main class="flex-1 p-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <header class="flex justify-between items-center mb-4">
                        <h1 class="text-xl font-semibold">Manage Lowongan Bisnis</h1>
                    </header>

                    <!-- Tabel Isi -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border px-4 py-2 w-16 text-center">NO</th>
                                    <th class="border px-4 py-2 w-48 text-center">Judul</th>
                                    <th class="border px-4 py-2 w-32 text-center">Jumlah Lowongan</th>
                                    <th class="border px-4 py-2 w-32 text-center">Lokasi</th>
                                    <th class="border px-4 py-2 w-16 text-center">Status</th>
                                    <th class="border px-4 py-2 w-48 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataLowongan as $no => $dataLowongans)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $no + 1 }}</td>
                                        <td class="border px-4 py-2">{{ $dataLowongans->nama_lowongan }}</td>
                                        <td class="border px-4 py-2">{{ $dataLowongans->jumlah_lowongan }} Lowongan
                                            Tersedia</td>
                                        <td class="border px-4 py-2">
                                            {{ $dataLowongans->provinsi }},{{ $dataLowongans->kota }},{{ $dataLowongans->kecamatan }},{{ $dataLowongans->kelurahan }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            <!-- Status Dibuka -->
                                            @if ($dataLowongans->status == 'buka')
                                                <div
                                                    class="flex items-center justify-center px-2 py-1 text-xs font-medium bg-green-100 text-green-600 rounded-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Dibuka
                                                </div>
                                            @else
                                                <div
                                                    class="flex items-center justify-center px-2 py-1 text-xs font-medium bg-red-100 text-red-600 rounded-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 110 20 10 10 0 010-20z" />
                                                    </svg>
                                                    Ditutup
                                                </div>
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('updateLowonganStatus',['id' => $dataLowongans->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                @if ($dataLowongans->status == 'tutup')
                                                    <button name="buka" type="submit" value="buka"
                                                        class="flex items-center px-3 py-1 text-sm bg-green-500 text-white rounded-full hover:bg-green-600 transition duration-200 mx-auto">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 4v16m8-8H4" />
                                                        </svg>
                                                        Buka
                                                    </button>
                                                @else
                                                    <button name="tutup" type="submit" value="tutup"
                                                        class="flex items-center px-3 py-1 text-sm bg-red-500 text-white rounded-full hover:bg-red-600 transition duration-200 mx-auto">
                                                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        Tutup
                                                    </button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Tambahkan baris lainnya -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </x-slot:content>
</x-layout>
