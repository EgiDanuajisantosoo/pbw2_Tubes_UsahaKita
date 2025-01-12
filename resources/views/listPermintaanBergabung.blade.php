<x-layout>
    <x-slot:title>List Permintaan Bergabung</x-slot:title>
    <x-slot:content>
        <div class="flex min-h-screen bg-gray-100 ">
            <x-dashboard></x-dashboard>
            <main class="flex-1 p-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <header class="flex justify-between items-center mb-4">
                        <h1 class="text-xl font-semibold">List Permintaan Bergabung</h1>
                    </header>

                    <!-- Tabel Isi -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border px-4 py-2 w-2 text-center">No</th>
                                    <th class="border px-4 py-2 w-48 text-center">Nama User</th>
                                    <th class="border px-4 py-2 w-32 text-center">Bisnis yang ingin Diambil</th>
                                    <th class="border px-4 py-2 w-32 text-center">Contact User</th>
                                    <th class="border px-4 py-2 w-16 text-center">Modal yang Ditawarkan</th>
                                    <th class="border px-4 py-2 w-48 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listBergabung as $no => $listBergabungs)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $no + 1 }}</td>
                                        <td class="border px-4 py-2"> <a class="font-medium text-blue-600 dark:text-blue-800 hover:underline"
                                                href="/profile/{{ $listBergabungs->user->id }}">{{ $listBergabungs->user->nama_depan }}
                                                {{ $listBergabungs->user->nama_belakang }}</a></td>
                                        <td class="border px-4 py-2"> <a class="font-medium text-blue-600 dark:text-blue-800 hover:underline"
                                                href="/detailLowonganBisnis/{{ $listBergabungs->lowongan_id }}">{{ $listBergabungs->lowongan->nama_lowongan }}</a></td>
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
                                        <td class="border px-4 py-2">
                                            {{ 'Rp. ' . number_format($listBergabungs->modal_usaha, 0, ',', '.') }}
                                        </td>
                                        <td class="border px-4 py-2 text-center">
                                            <div class="flex justify-center space-x-2">
                                                <!-- Tombol Terima -->
                                                <button
                                                    onclick="confirmActionTerima('/terima/{{ $listBergabungs->id }}', 'Terima')"
                                                    class="flex items-center px-3 py-1 text-sm bg-green-500 text-white rounded-full hover:bg-green-600 transition duration-200">
                                                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Terima
                                                </button>

                                                <!-- Tombol Tolak -->
                                                <button
                                                    onclick="confirmActionTolak('/tolak/{{ $listBergabungs->id }}', 'Tolak')"
                                                    class="flex items-center px-3 py-1 text-sm bg-red-500 text-white rounded-full hover:bg-red-600 transition duration-200">
                                                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Tolak
                                                </button>
                                            </div>
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

        {{-- form --}}
        <form id="action-formTerima" action="" method="POST" style="display: none;">
            @csrf
            @method('PUT')
        </form>

        <form id="action-formTolak" action="" method="POST" style="display: none;">
            @csrf
            @method('PUT')
            <input type="text" name="alasan" id="alasan"></input>
        </form>


        <script>
            function confirmActionTerima(actionUrl, actionText) {
                Swal.fire({
                    title: `Apakah Anda yakin ingin ${actionText}?`,
                    text: "Data ini tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: `Ya, ${actionText}!`,
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('action-formTerima').action = actionUrl;
                        document.getElementById('action-formTerima').submit();
                    }
                });
            }

            function confirmActionTolak(actionUrl, actionText) {
                (async () => {
                        const {
                            value: text
                        } = await Swal.fire({
                                input: "textarea",
                                inputLabel: "Message",
                                inputPlaceholder: "Type your message here...",
                                inputAttributes: {
                                    "aria-label": "Type your message here"
                                },
                                showCancelButton: true
                            });
                            if (text) {
                                document.getElementById('alasan').value = text;
                                document.getElementById('action-formTolak').action = actionUrl;
                                document.getElementById('action-formTolak').submit();
                                // Swal.fire(text);
                                // console.log(text);

                            }
                        })()
                    // Swal.fire({
                    //     title: `Apakah Anda yakin ingin ${actionText}?`,
                    //     text: "Data ini tidak dapat dikembalikan!",
                    //     icon: 'warning',
                    //     showCancelButton: true,
                    //     confirmButtonColor: '#3085d6',
                    //     cancelButtonColor: '#d33',
                    //     confirmButtonText: `Ya, ${actionText}!`,
                    //     cancelButtonText: 'Batal'
                    // }).then((result) => {
                    //     if (result.isConfirmed) {
                    //         document.getElementById('action-form').action = actionUrl;
                    //         document.getElementById('action-form').submit();
                    //     }
                    // });
                }
                // function confirmAction(actionUrl, actionText) {
                //     Swal.fire({
                //         title: `Apakah Anda yakin ingin ${actionText}?`,
                //         text: "Data ini tidak dapat dikembalikan!",
                //         icon: 'warning',
                //         showCancelButton: true,
                //         confirmButtonColor: '#3085d6',
                //         cancelButtonColor: '#d33',
                //         confirmButtonText: `Ya, ${actionText}!`,
                //         cancelButtonText: 'Batal'
                //     }).then((result) => {
                //         if (result.isConfirmed) {
                //             document.getElementById('action-form').action = actionUrl;
                //             document.getElementById('action-form').submit();
                //         }
                //     });
                // }
        </script>
    </x-slot:content>
</x-layout>
