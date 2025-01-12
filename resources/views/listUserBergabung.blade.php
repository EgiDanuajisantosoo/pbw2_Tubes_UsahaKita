<x-layout>
    <x-slot:title>User yang Bergabung</x-slot:title>
    <x-slot:content>
        <div class="flex min-h-screen bg-gray-100 ">
            <x-dashboard></x-dashboard>
            <main class="flex-1 p-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <header class="flex justify-between items-center mb-4">
                        <h1 class="text-xl font-semibold">User Yang Telah Bergabung</h1>
                    </header>

                    <!-- Tabel Isi -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border px-4 py-2 w-2 text-center">No</th>
                                    <th class="border px-4 py-2 w-48 text-center">Nama User</th>
                                    <th class="border px-4 py-2 w-32 text-center">Kerjasama Bisnis</th>
                                    <th class="border px-4 py-2 w-32 text-center">Contact User</th>
                                    <th class="border px-4 py-2 w-16 text-center">Status</th>
                                    <th class="border px-4 py-2 w-48 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userBergabung as $no => $userBergabungs)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $no + 1 }}</td>
                                        <td class="border px-4 py-2"> <a
                                                href="/profile/{{ $userBergabungs->user_id }}">{{ $userBergabungs->user->nama_depan }}
                                                    {{ $userBergabungs->user->nama_belakang }}</a></td>
                                        <td class="border px-4 py-2"> <a
                                            href="/detailLowonganBisnis/{{ $userBergabungs->lowongan_id }}">{{ $userBergabungs->lowongan->nama_lowongan }}</a></td>
                                        <td class="border px-4 py-2 text-center">
                                            <!-- Tombol WhatsApp -->
                                            <a href="https://wa.me/6281234567890" target="_blank"
                                                class="flex justify-center items-center text-green-500 hover:text-green-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.168 1.607 5.992L0 24l6.219-1.594A11.93 11.93 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm.015 21.994c-1.847 0-3.646-.514-5.209-1.485L6.309 20l-3.297.844.865-3.283-.267-.393c-.994-1.521-1.51-3.292-1.51-5.158C2.1 6.186 6.167 2.1 12 2.1c5.833 0 9.9 4.086 9.9 9.899s-4.067 9.995-9.885 9.995zM8.462 7.344c-.198-.44-.41-.451-.605-.46-.158-.008-.317-.008-.481-.008-.165 0-.431.058-.657.283-.226.226-.867.851-.867 2.07 0 1.219.889 2.396 1.014 2.562.124.165 1.73 2.76 4.267 3.883 2.537 1.123 2.849.867 3.369.827.52-.04 1.683-.683 1.925-1.342.241-.658.241-1.221.172-1.342-.069-.12-.249-.198-.52-.344-.272-.146-1.603-.791-1.85-.882-.248-.091-.428-.135-.605.136-.176.272-.694.883-.851 1.061-.156.178-.314.198-.586.068-.272-.13-1.146-.422-2.18-1.339-.806-.712-1.35-1.591-1.507-1.862-.155-.271-.018-.419.118-.557.121-.121.269-.318.404-.483.134-.165.179-.269.269-.445.09-.176.045-.331-.023-.46-.07-.13-.625-1.593-.88-2.248z" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="border px-4 py-2 text-center">
                                            <!-- Status: Bekerjasama -->
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-200 text-green-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                                Bekerjasama
                                            </span>
                                        </td>
                                        <td class="border px-4 py-2 text-center">
                                            <div class="flex justify-center space-x-2">
                                                <!-- Tombol Akhiri Kerja sama -->
                                                <button onclick="akhiriKerjaSama('{{ $userBergabungs->lowongan_id }}','{{ $userBergabungs->user_id }}','{{ route('Bisnisman.Berhenti')}}')"
                                                    class="flex items-center px-3 py-1 text-sm bg-red-500 text-white rounded-full hover:bg-red-600 transition duration-200">
                                                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M18 12H6" />
                                                    </svg>
                                                    Akhiri Kerja sama
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <form id="BerhentiBekerjaSama" action="" method="POST" style="display: none;">
                                    @csrf
                                    <input type="text" name="id_lowongan" id="id_lowongan" value="" style="display: none;">
                                    <input type="text" name="id_partner" id="id_partner" value="" style="display: none;">
                                </form>
                                <script>
                                    function akhiriKerjaSama(lowongan_id,user_id,url) {
                                        Swal.fire({
                                            title: "Apakah Anda Yakin Mengakhiri Kerja Sama?",
                                            text: "You won't be able to revert this!",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonColor: "#3085d6",
                                            cancelButtonColor: "#d33",
                                            confirmButtonText: "Ya, Akhiri Sekarang!"
                                        }).then((result) => {
                                            document.getElementById('id_lowongan').value = lowongan_id
                                            document.getElementById('id_partner').value = user_id

                                            if (result.isConfirmed) {
                                                Swal.fire({
                                                    title: "Berhasil Mengirimkan Permintaan Ke Admin",
                                                    text: "Silakan Tunggu Konfirmasi Admin dan Partner Anda",
                                                    icon: "success"
                                                });
                                                document.getElementById('BerhentiBekerjaSama').action = url;
                                                document.getElementById('BerhentiBekerjaSama').submit();
                                            }
                                        });
                                    }
                                </script>
                                <tr>
                                    {{-- <td class="border px-4 py-2">2</td>
                                    <td class="border px-4 py-2"><a href="#">Bambang Guling </a></td>
                                    <td class="border px-4 py-2"><a href="#">Saos ABC</a></td>
                                    <td class="border px-4 py-2 text-center">
                                        <!-- Tombol WhatsApp -->
                                        <a href="https://wa.me/6281234567890" target="_blank"
                                            class="flex justify-center items-center text-green-500 hover:text-green-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 0C5.373 0 0 5.373 0 12c0 2.123.553 4.168 1.607 5.992L0 24l6.219-1.594A11.93 11.93 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm.015 21.994c-1.847 0-3.646-.514-5.209-1.485L6.309 20l-3.297.844.865-3.283-.267-.393c-.994-1.521-1.51-3.292-1.51-5.158C2.1 6.186 6.167 2.1 12 2.1c5.833 0 9.9 4.086 9.9 9.899s-4.067 9.995-9.885 9.995zM8.462 7.344c-.198-.44-.41-.451-.605-.46-.158-.008-.317-.008-.481-.008-.165 0-.431.058-.657.283-.226.226-.867.851-.867 2.07 0 1.219.889 2.396 1.014 2.562.124.165 1.73 2.76 4.267 3.883 2.537 1.123 2.849.867 3.369.827.52-.04 1.683-.683 1.925-1.342.241-.658.241-1.221.172-1.342-.069-.12-.249-.198-.52-.344-.272-.146-1.603-.791-1.85-.882-.248-.091-.428-.135-.605.136-.176.272-.694.883-.851 1.061-.156.178-.314.198-.586.068-.272-.13-1.146-.422-2.18-1.339-.806-.712-1.35-1.591-1.507-1.862-.155-.271-.018-.419.118-.557.121-.121.269-.318.404-.483.134-.165.179-.269.269-.445.09-.176.045-.331-.023-.46-.07-.13-.625-1.593-.88-2.248z" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2 text-center">
                                        <!-- Status: Berakhir -->
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-200 text-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Berakhir
                                        </span>
                                    </td>
                                    <td class="border px-4 py-2 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <button
                                                class="flex items-center px-3 py-3 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 7l-1.5 12.5a2 2 0 01-2 1.5H8.5a2 2 0 01-2-1.5L5 7m5 4v6m4-6v6M9 7h6m-7 0h8m-9-3h10M9 4h6" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr> --}}
                                    <!-- Tambahkan baris lainnya -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </x-slot:content>
</x-layout>
