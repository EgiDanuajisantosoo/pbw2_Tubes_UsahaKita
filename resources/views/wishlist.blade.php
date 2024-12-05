<x-layout>
    <x-slot:title>Wishlist</x-slot:title>
    <x-slot:content>





        <div class="bg-blue-900 rounded-lg shadow-lg overflow-hidden flex items-center justify-center">
            <div class="mx-auto px-6 py-12 text-center">
                <!-- Main Heading -->
                <h1 class="text-3xl font-semibold text-white">
                    Wishlist
                </h1>
                <!-- Subheading -->
                <p class="mt-3 text-lg text-white">
                    Simpan lowongan yang anda minati dan mulai berbisnis
                </p>
            </div>
        </div>

        <x-aksi></x-aksi>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 py-8">


            <!-- Cards Container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">


                <!-- Card 2 -->
                @foreach ($detailWishlist as $detailWishlists)
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between mt-8">
                    <div class="flex justify-between">

                        <h3 class="text-2xl font-bold text-gray-700">{{ $detailWishlists->lowongan->perusahaan->nama_perusahaan }}</h3>
                        <form id="delete-form" action="{{ route('delete.wishlist', $detailWishlists->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="submit" onclick="confirmDelete()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 hover:text-red-700"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M3 6h18v2H3V6zm2 3h14l-1.1 12.1c-.1.6-.5 1-1.1 1H7.2c-.6 0-1.1-.4-1.2-1L5 9zm4 2v7h2v-7H9zm4 0v7h2v-7h-2zM15.5 4l-1-1h-5l-1 1H3v2h18V4h-5.5z" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-gray-500 mt-1">{{ $detailWishlists->lowongan->nama_lowongan }}</p>
                    <div class="flex gap-3 mt-6">
                        <button class=" bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                            Lihat Lowongan
                        </button>
                    </div>
                </div>
                @endforeach
              


                {{-- <button class="show-example-btn" aria-label="Try me! Example: A confirm dialog, with a function attached to the 'Confirm'-button">Try me!</button> --}}






            </div>
        </div>





        <script>
            function confirmDelete() {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form').submit();
                    }
                });
            }
        </script>
    </x-slot:content>
</x-layout>
