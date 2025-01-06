<x-layout>
    <x-slot:title>Detail Lowongan Bisnis</x-slot:title>
    <x-slot:content>
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md mt-10">
            <div class="flex items-center mb-4">
                <!-- Logo Perusahaan -->
                <div class="mr-4">
                    <img src="{{ asset('storage/' . $detailLowongan->perusahaan->foto_perusahaan) }}" alt="Logo Company"
                        class="w-16 h-16">
                </div>
                <!-- Informasi Lowongan -->
                <div>
                    <h1 class="text-2xl font-bold">{{ $detailLowongan->nama_lowongan }}</h1>
                    <p class="text-sm text-gray-600">PT {{ $detailLowongan->perusahaan->nama_perusahaan }}</p>
                </div>
            </div>

            <div class="mb-6">
                <!-- Lokasi, Bidang, Status, Gaji -->
                <p class="flex items-center text-gray-700 mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <!-- Ikon lokasi -->
                    </svg>
                    {{ ucwords(strtolower($detailLowongan->kota)) }},{{ ucwords(strtolower($detailLowongan->provinsi)) }}
                </p>
                <p class="flex items-center text-gray-700 mb-2">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <!-- Ikon bidang -->
                    </svg>
                    {{ $detailLowongan->perusahaan->kategori_bisnis->nama_kategori }}
                </p>

                <p class="flex items-center text-gray-700">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <!-- Ikon gaji -->
                    </svg>
                    Mulai Dari Rp {{ $detailLowongan->modal_usaha }}
                </p>
            </div>

            <p class="text-sm text-gray-500 mb-4">Posted {{ $detailLowongan->created_at->diffForHumans() }}</p>

            <!-- Tombol aksi -->
            @if (Auth::check() && Auth::user()->role_id != 2)
                <div class="flex space-x-4">
                    @if ($Lowongan)
                        @if ($Lowongan->status_permintaan == 'diterima')
                            <button
                                class="bg-emerald-100 text-green-800 font-semibold px-4 py-2 rounded hover:bg-emerald-200  active:scale-95 transition duration-300">
                                Bekerja Sama</button>
                        @elseif($Lowongan->status_permintaan == 'pendding')
                            <form id="delete-form"
                                action="{{ route('verifikasiLowongan.Delete', ['id' => $detailLowongan->id]) }} "
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button onclick="confirmDelete()"
                                class="bg-red-100 text-red-500 font-semibold px-4 py-2 rounded hover:bg-red-200  active:scale-95 transition duration-300"
                                type="submit">Batalkan</button>
                        @endif
                    @else
                        <button
                            class="bg-blue-600 text-white font-semibold px-4 py-2 rounded hover:bg-blue-700  active:scale-95 transition duration-300"
                            onclick="openModal()">Berbisnis
                            Sekarang</button>

                    @endif


                    {{-- {{ dd($value->status_permintaan) }} --}}

                    @if (isset($wishlist) && $countWishlist == 1)
                        <form action="{{ route('delete.wishlist', $wishlist->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="bg-emerald-100 text-green-800 font-semibold px-4 py-2 rounded hover:bg-emerald-200  active:scale-95 transition duration-300">
                                Tersimpan</button>
                        </form>
                    @else
                        <form action="{{ route('wishlist', ['id' => $detailLowongan->id]) }} " method="POST">
                            @csrf
                            <button
                                class="bg-sky-100 text-blue-800 font-semibold px-4 py-2 rounded hover:bg-sky-200  active:scale-95 transition duration-300"
                                type="submit">Simpan</button>
                        </form>
                    @endif

                </div>
            @endif

            <!-- Kualifikasi -->
            <div class="mt-8">
                <h2 class="text-lg font-semibold mb-2">Requirement:</h2>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach ($requirementsArray as $requirement)
                        <li> {{ $requirement }} </li>
                    @endforeach
                </ul>
            </div>

            <!-- Benefits -->
            <div class="mt-8">
                <h2 class="text-lg font-semibold mb-2">Benefits:</h2>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach ($benefitArray as $benefit)
                        <li> {{ $benefit }} </li>
                    @endforeach
                </ul>
            </div>

            <!-- About Company -->
            <div class="mt-8">
                <h2 class="text-lg font-semibold mb-2">About the Company:</h2>
                <p class="text-gray-700">
                    {{ $detailLowongan->perusahaan->deskripsi }}
                </p>
            </div>
        </div>

        <!-- Modal -->
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white rounded-lg p-6 shadow-md max-w-md w-full">
                <!-- Header Modal -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Masukkan Modal Usaha</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        &times;
                    </button>
                </div>
                <!-- Isi Modal -->
                <form action="{{ route('verifikasiLowongan.Store', ['id' => $detailLowongan->id]) }}" method="POST" onsubmit="return validateForm({{ $detailLowongan->modal_usaha }})">
                    @csrf
                    <div class="mb-4">
                        <label for="modal_usaha" class="block text-sm font-medium text-gray-700">Modal Usaha yang
                            Ditawarkan</label>
                        <input type="text" name="modal_usaha" id="rupiah"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1"
                            required>
                    </div>
                    <!-- Tombol Modal -->
                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="closeModal()"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Kirim</button>
                    </div>
                </form>
            </div>
        </div>


    </x-slot:content>
</x-layout>
<script>
    var rupiah = document.getElementById("rupiah");
    rupiah.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    // Fungsi untuk validasi minimal Rp. 1.000.000
    function validateForm(minModal) {
        var modalUsahaValue = rupiah.value.replace(/[^0-9]/g, ''); // Mengambil angka saja tanpa format Rupiah
        var modalUsaha = parseInt(modalUsahaValue, 10);
        let format = `Rp. ${minModal.toLocaleString('id-ID', { minimumFractionDigits: 0 })}`;
        if (modalUsaha < minModal) {
            alert("Minimal modal usaha yang ditawarkan adalah "+format);
            return false;
        }
        return true;
    }
</script>
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Apakah Anda yakin membatalkan request?',
            text: "Data akan dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Batalkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
        });
    }

    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>
