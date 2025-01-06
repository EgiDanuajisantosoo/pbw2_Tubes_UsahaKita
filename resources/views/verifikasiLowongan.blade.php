<x-layout>
    <x-slot:title>Wishlist</x-slot:title>
    <x-slot:content>





        <div class="bg-blue-900 rounded-lg shadow-lg overflow-hidden flex items-center justify-center ">
            <div class="mx-auto px-6 py-12 text-center">
                <!-- Main Heading -->
                <h1 class="text-3xl font-semibold text-white">
                    Verifikasi Perusahaan
                </h1>
                <!-- Subheading -->
                <p class="mt-3 text-lg text-white">
                    Semoga anda di terima oleh perusahaan yang anda harapkan
                </p>
            </div>
        </div>

        <x-aksi></x-aksi>


        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 py-8">


            <!-- Cards Container -->
            {{-- <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 "> --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 min-h-[180px]">



                <!-- Card 2 -->
                @foreach ($detailVerif as $detailVerifikasi)
                    @if ($detailVerifikasi->status_permintaan == 'pendding')
                        <!-- Card 2 -->
                        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between mt-8">
                            <div class="flex justify-between">
                                <h3 class="text-2xl font-bold text-gray-700">
                                    {{ $detailVerifikasi->lowongan->perusahaan->nama_perusahaan }}</h3>
                                <div
                                    class="flex items-center gap-1 bg-blue-100 text-blue-600 rounded-lg flex justify-center items-center px-3 py-1">
                                    <p class=" text-xs font-medium ">
                                        Sedang Menunggu
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 110-16 8 8 0 010 16zm-.5-12h1v4.25l3.22 1.93-.5.86L11.5 13V8z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-gray-500 mt-1">Nama Lowongan : {{ $detailVerifikasi->lowongan->nama_lowongan }}</p>
                            <p class="text-gray-500 mt-1">Modal : {{ $detailVerifikasi->modal_usaha }}</p>
                            <div class="flex gap-3 mt-6">
                                <a href="detailLowonganBisnis/{{ $detailVerifikasi->lowongan->id }}"> <button
                                    class=" bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                                    Lihat Lowongan
                                </button></a>
                            </div>
                        </div>
                    @elseif ($detailVerifikasi->status_permintaan == 'diterima')
                        <!-- Card 2 -->
                        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between mt-8">
                            <div class="flex justify-between">
                                <h3 class="text-2xl font-bold text-gray-700">
                                    {{ $detailVerifikasi->lowongan->perusahaan->nama_perusahaan }}</h3>
                                <div
                                    class="flex items-center gap-1 bg-green-100 text-green-600 rounded-lg flex justify-center items-center px-6 py-1">
                                    <p class=" text-xs font-medium ">
                                        Diterima
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 16.2l-4.2-4.2-1.4 1.4L9 19 21 7l-1.4-1.4z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-gray-500 mt-1">Nama Lowongan : {{ $detailVerifikasi->lowongan->nama_lowongan }}</p>
                            <p class="text-gray-500 mt-1">Modal : {{ $detailVerifikasi->modal_usaha }}</p>
                            <div class="flex gap-3 mt-6">
                                <a href="detailLowonganBisnis/{{ $detailVerifikasi->lowongan->id }}"> <button
                                    class=" bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                                    Lihat Lowongan
                                </button></a>
                            </div>
                        </div>
                    @else
                        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between mt-8">
                            <div class="flex justify-between">
                                <h3 class="text-2xl font-bold text-gray-700">
                                    {{ $detailVerifikasi->lowongan->perusahaan->nama_perusahaan }}</h3>
                                <div
                                    class="flex items-center gap-1 bg-red-100 text-red-600 rounded-lg flex justify-center items-center px-6 py-1">
                                    <p class=" text-xs font-medium ">
                                        Ditolak
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M18.3 5.7l-1.4-1.4L12 9.2 7.1 4.3 5.7 5.7l4.9 4.9-4.9 4.9 1.4 1.4L12 13l4.9 4.9 1.4-1.4-4.9-4.9z" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-gray-500 mt-1">Nama Lowongan : {{ $detailVerifikasi->lowongan->nama_lowongan }}</p>
                            <p class="text-gray-500 mt-1">Modal : {{ $detailVerifikasi->modal_usaha }}</p>

                            <div class="flex gap-3 mt-6">
                                <a href="detailLowonganBisnis/{{ $detailVerifikasi->lowongan->id }}"> <button
                                        class=" bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                                        Lihat Lowongan
                                    </button></a>

                            </div>
                        </div>
                    @endif
                @endforeach







            </div>
        </div>






    </x-slot:content>
</x-layout>
