<x-layout>
    <x-slot:title>dashboard</x-slot:title>
    <x-slot:content>
        <div x-data="{ openTambahLowongan: false, openEditLowongan: false, openDeleteModal: false, selectedLowongan: {} }" class="flex min-h-screen bg-gray-100">
            <x-dashboard></x-dashboard>



            <!-- Modal Tambah Lowongan -->
            <div x-show="openTambahLowongan"
                x-effect="document.body.style.overflow = openTambahLowongan ? 'hidden' : 'auto'"
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg max-w-3xl w-full overflow-y-auto max-h-[90vh] p-6 relative"
                    @click.away="openTambahLowongan = false">
                    <button @click="openTambahLowongan = false"
                        class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">&times;</button>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tambah Lowongan Bisnis</h2>
                    <form action="{{ route('tambah.lowongan') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-gray-700 mt-10">Judul Lowongan</label>
                            <input type="text" name="nama_lowongan" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-gray-700">Jumlah Lowongan</label>
                            <input type="number" name="jumlah" min="1" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-gray-700">Modal Usaha</label>
                            <input type="text" name="modal_usaha" min="1" id="rupiah"
                                class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label for="requirement" class=" text-gray-700">
                                Requirement <span class="text-xs text-gray-500">(pisahkan dengan ',')</span>
                            </label>
                            <textarea name="requirement" id="requirement" rows="3"
                                class="w-full p-3 border border-black rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 resize-none"
                                placeholder="Contoh: Gaji kompetitif, Asuransi kesehatan, Bonus tahunan"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="benefit" class=" text-gray-700">
                                Benefit <span class="text-xs text-gray-500">(pisahkan dengan ',')</span>
                            </label>
                            <textarea name="benefit" id="benefit" rows="3"
                                class="w-full p-3 border border-black rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 resize-none"
                                placeholder="Contoh: Gaji kompetitif, Asuransi kesehatan, Bonus tahunan"></textarea>
                        </div>

                        <div class="md:flex md:row md:space-x-4 w-full text-xs">
                            <div class="w-full flex flex-col mb-3">
                                <label class="font-semibold text-gray-600 py-2">Provinsi:<abbr
                                        title="required">*</abbr></label>
                                <select
                                    class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    name="provinsi" id="provinsi" required>
                                    <option value="">Pilih</option>
                                </select>
                                @error('provinsi')
                                    <p class="text-red text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full flex flex-col mb-3">
                                <label class="font-semibold text-gray-600 py-2">Kabupaten/Kota:<abbr
                                        title="required">*</abbr></label>
                                <select
                                    class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    name="kota" id="kota" required>
                                    <option value="">Pilih</option>
                                </select>
                                @error('kota')
                                    <p class="text-red text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="md:flex md:row md:space-x-4 w-full text-xs">
                            <div class="w-full flex flex-col mb-3">
                                <label class="font-semibold text-gray-600 py-2">Kecamatan:<abbr
                                        title="required">*</abbr></label>
                                <select
                                    class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    name="kecamatan" id="kecamatan" required>
                                    <option value="">Pilih</option>
                                </select>
                                @error('kecamatan')
                                    <p class="text-red text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full flex flex-col mb-3">
                                <label class="font-semibold text-gray-600 py-2">Kelurahan/Desa<abbr
                                        title="required">*</abbr></label>
                                <select
                                    class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                    name="kelurahan" id="kelurahan" required>
                                    <option value="">Pilih</option>
                                </select>
                                @error('kelurahan')
                                    <p class="text-red text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <label class="font-semibold text-gray-600 py-2">Tag<abbr title="required">*</abbr></label>
                        <div class="grid grid-rows-4 grid-flow-col gap-4">
                            @foreach ($tag as $tags)
                                <div class="flex">
                                    <input type="checkbox" name="tags[]" value="{{ $tags->id }}"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                        id="hs-checkbox-group-{{ $tags->id }}">
                                    <label for="hs-checkbox-group-{{ $tags->id }}"
                                        class="text-sm text-gray-500 ms-3">{{ $tags->nama_tag }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="button" @click="openTambahLowongan = false"
                                class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <main class="flex-1 p-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <header class="flex justify-between items-center mb-4">
                        <h1 class="text-xl font-semibold">Tambah Lowongan Bisnis</h1>
                        <button @click="openTambahLowongan = true"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            + Tambah Lowongan
                        </button>
                    </header>
                    <!-- Tabel Lowongan -->
                    <div class="overflow-x-auto mt-8">
                        <table class="min-w-full bg-white border">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-6 py-3 border-b">Judul</th>
                                    <th class="px-6 py-3 border-b">Jumlah</th>
                                    {{-- <th class="px-6 py-3 border-b">Requirement</th>
                                    <th class="px-6 py-3 border-b">Benefit</th> --}}
                                    <th class="px-6 py-3 border-b">Lokasi</th>
                                    <th class="px-6 py-3 border-b">tag</th>
                                    <th class="px-6 py-3 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tableLowongan as $lowongan)
                                    @php
                                        $requirementsArray = json_decode($lowongan->requirement, true);
                                        $benefitArray = json_decode($lowongan->benefit, true);
                                    @endphp
                                    <tr class="hover:bg-gray-50">
                                        <td class="border px-4 py-2">
                                            {{ $lowongan->nama_lowongan }}
                                        </td>
                                        <td class="border px-4 py-2 text-center">
                                            {{ $lowongan->jumlah_lowongan }}</td>
                                        {{-- <td class="border px-4 py-2">
                                            @foreach ($requirementsArray as $requirement)
                                                <li> {{ $requirement }} </li>
                                            @endforeach
                                        </td>
                                        <td class="border px-4 py-2">
                                            @foreach ($benefitArray as $requirement)
                                                <li> {{ $requirement }} </li>
                                            @endforeach
                                        </td> --}}
                                        <td class="px-6 py-4 border-b">
                                            {{ $lowongan->provinsi }},{{ $lowongan->kota }},{{ $lowongan->kelurahan }},{{ $lowongan->kelurahan }}
                                        </td>

                                        <td class="border px-4 py-2">
                                            @forelse ($lowongan->tags as $no=>$tagTambah)
                                                @if ($no == $lowongan->tags->count() - 1)
                                                    {{ $tagTambah->nama_tag }}
                                                @else
                                                    {{ $tagTambah->nama_tag }} ,
                                                @endif
                                            @empty
                                            @endforelse
                                        </td>

                                        <td class="border px-4 py-2">
                                            <div class="flex justify-center space-x-2">
                                                <!-- Tombol Edit -->
                                                <button
                                                    @click="selectedLowongan = {{ $lowongan }}; openEditLowongan = true"
                                                    class="flex items-center px-3 py-3 text-sm bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-200">
                                                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 20h9M16.5 3.5l5 5m-5-5L3 18v5h5L21 6.5z" />
                                                    </svg>
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <button
                                                    @click="selectedLowongan = {{ $lowongan }}; openDeleteModal = true"
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Edit Lowongan -->
                    <div x-show="openEditLowongan"
                        x-effect="document.body.style.overflow = openEditLowongan ? 'hidden' : 'auto'"
                        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50"
                        style="overflow-y: scroll">
                        <div class="bg-white rounded-lg shadow-lg max-w-3xl w-full overflow-y-auto max-h-[90vh] p-6 relative"
                            @click.away="openEditLowongan = false">
                            <button @click="openEditLowongan = false"
                                class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">&times;</button>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4 mt-20">Edit Lowongan Bisnis</h2>
                            <form x-bind:action="`/dashboardBusinesman/${selectedLowongan.id}`" method="POST"
                                class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class="block text-gray-700">Judul Lowongan</label>
                                    <input type="text" name="nama_lowongan"
                                        x-model="selectedLowongan.nama_lowongan" class="w-full p-2 border rounded">
                                </div>
                                <div>
                                    <label class="block text-gray-700">Jumlah Lowongan</label>
                                    <input type="number" name="jumlah" x-model="selectedLowongan.jumlah_lowongan"
                                        min="1" class="w-full p-2 border rounded">
                                </div>
                                <div>
                                    <label class="block text-gray-700">Modal Usaha</label>
                                    <input type="number" name="modal_usaha" x-model="selectedLowongan.modal_usaha"
                                        min="1" class="w-full p-2 border rounded">
                                </div>
                                <div>
                                    <label class="block text-gray-700">Requirement</label>
                                    <textarea name="requirement" rows="3" class="w-full p-2 border rounded">
@isset($requirementsArray)
@foreach ($requirementsArray as $requirement)
{{ $requirement }},
@endforeach
@else
Tidak ada data yang tersedia.
@endisset
</textarea>
                                </div>
                                <div>
                                    <label class="block text-gray-700">Benefit</label>
                                    <textarea name="benefit" rows="2" class="w-full p-2 border rounded">@isset($benefitArray)@foreach ($benefitArray as $requirement){{ $requirement }},@endforeach @else Tidak ada data yang tersedia.@endisset</textarea>
                                </div>
                                <div class="md:flex md:row md:space-x-4 w-full text-xs">
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Provinsi:</label>
                                        <select
                                            class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            name="provinsi" id="Editprovinsi" x-model="selectedLowongan.provinsi"
                                            required>
                                            <option value="" selected>Pilih</option>
                                        </select>
                                    </div>
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Kabupaten/Kota:</label>
                                        <select
                                            class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            name="kota" id="Editkota" x-model="selectedLowongan.kota" required>
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="md:flex md:row md:space-x-4 w-full text-xs">
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Kecamatan:</label>
                                        <select
                                            class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            name="kecamatan" id="Editkecamatan" x-model="selectedLowongan.kecamatan"
                                            required>
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Kelurahan/Desa:</label>
                                        <select
                                            class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            name="kelurahan" id="Editkelurahan" x-model="selectedLowongan.kelurahan"
                                            required>
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                                <label class="font-semibold text-gray-600 py-2">Tag<abbr
                                        title="required">*</abbr></label>
                                <div class="grid grid-rows-4 grid-flow-col gap-4">
                                    @foreach ($tag as $tags)
                                        <div class="flex">
                                            <input type="checkbox" name="tags[]" value="{{ $tags->id }}"
                                                class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                id="hs-checkbox-group-{{ $tags->id }}">
                                            <label for="hs-checkbox-group-{{ $tags->id }}"
                                                class="text-sm text-gray-500 ms-3">{{ $tags->nama_tag }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="flex justify-end gap-2">
                                    <button type="button" @click="openEditLowongan = false"
                                        class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Hapus dengan Animasi -->
                    <div x-show="openDeleteModal" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        x-effect="document.body.style.overflow = openDeleteModal ? 'hidden' : 'auto'"
                        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">

                        <div class="relative bg-white rounded-lg shadow max-w-md w-full p-6">
                            <!-- Tombol Close -->
                            <button type="button" @click="openDeleteModal = false"
                                class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">
                                &times;
                            </button>

                            <!-- Konten Modal -->
                            <div class="text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah Anda yakin ingin menghapus
                                    lowongan <span class="font-bold" x-text="selectedLowongan.nama_lowongan"></span>?
                                </h3>
                                <div class="flex justify-center gap-4">
                                    <!-- Tombol Konfirmasi Hapus -->
                                    <button @click="hapusLowongan(selectedLowongan); openDeleteModal = false"
                                        class="px-5 py-2.5 bg-red-600 text-white rounded hover:bg-red-800">
                                        Ya, Hapus
                                    </button>
                                    <!-- Tombol Batal -->
                                    <button @click="openDeleteModal = false"
                                        class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
        </div>

        {{-- form tambah lowongan --}}
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                axios.get('/api/provinces')
                    .then(response => {
                        let options = '<option value="">Pilih</option>';
                        document.getElementById('provinsi').innerHTML = '<option value="">Pilih</option>';
                        document.getElementById('kecamatan').innerHTML = '<option value="">Pilih</option>';
                        document.getElementById('kelurahan').innerHTML = '<option value="">Pilih</option>';
                        response.data.forEach(item => {
                            options +=
                                `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                        });
                        document.getElementById('provinsi').innerHTML = options;
                    });

                document.getElementById('provinsi').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    axios.get(`/api/regencies/${id}`)
                        .then(response => {
                            let options = '<option value="">Pilih</option>';
                            document.getElementById('kecamatan').innerHTML =
                                '<option value="">Pilih</option>';
                            document.getElementById('kelurahan').innerHTML =
                                '<option value="">Pilih</option>';
                            response.data.forEach(item => {
                                options +=
                                    `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                            });
                            document.getElementById('kota').innerHTML = options;
                        });
                });

                document.getElementById('kota').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    axios.get(`/api/districts/${id}`)
                        .then(response => {
                            let options = '<option value="">Pilih</option>';
                            document.getElementById('kelurahan').innerHTML =
                                '<option value="">Pilih</option>';
                            response.data.forEach(item => {
                                options +=
                                    `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                            });
                            document.getElementById('kecamatan').innerHTML = options;
                        });
                });

                document.getElementById('kecamatan').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    axios.get(`/api/villages/${id}`)
                        .then(response => {
                            let options = '<option value="">Pilih</option>';
                            response.data.forEach(item => {
                                options += `<option value="${item.name}">${item.name}</option>`;
                            });
                            document.getElementById('kelurahan').innerHTML = options;
                        });
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                axios.get('/api/provinces')
                    .then(response => {
                        let options = '<option value="">Pilih</option>';
                        document.getElementById('Editprovinsi').innerHTML = '<option value="">Pilih</option>';
                        document.getElementById('Editkecamatan').innerHTML = '<option value="">Pilih</option>';
                        document.getElementById('Editkelurahan').innerHTML = '<option value="">Pilih</option>';
                        response.data.forEach(item => {
                            options +=
                                `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                        });
                        document.getElementById('Editprovinsi').innerHTML = options;
                    });

                document.getElementById('Editprovinsi').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    axios.get(`/api/regencies/${id}`)
                        .then(response => {
                            let options = '<option value="">Pilih</option>';
                            document.getElementById('Editkecamatan').innerHTML =
                                '<option value="">Pilih</option>';
                            document.getElementById('Editkelurahan').innerHTML =
                                '<option value="">Pilih</option>';
                            response.data.forEach(item => {
                                options +=
                                    `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                            });
                            document.getElementById('Editkota').innerHTML = options;
                        });
                });

                document.getElementById('Editkota').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    axios.get(`/api/districts/${id}`)
                        .then(response => {
                            let options = '<option value="">Pilih</option>';
                            document.getElementById('Editkelurahan').innerHTML =
                                '<option value="">Pilih</option>';
                            response.data.forEach(item => {
                                options +=
                                    `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                            });
                            document.getElementById('Editkecamatan').innerHTML = options;
                        });
                });

                document.getElementById('Editkecamatan').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    axios.get(`/api/villages/${id}`)
                        .then(response => {
                            let options = '<option value="">Pilih</option>';
                            response.data.forEach(item => {
                                options += `<option value="${item.name}">${item.name}</option>`;
                            });
                            document.getElementById('Editkelurahan').innerHTML = options;
                        });
                });
            });
        </script>

        {{-- Form Edit Lowongan --}}
        {{-- <script>
            document.addEventListener("DOMContentLoaded", () => {
                axios.get('/api/provinces')
                    .then(response => {
                        const provinsiSelect = document.getElementById('Editprovinsi');
                        let options = '<option value="">Pilih</option>';
                        response.data.forEach(item => {
                            options += `<option value="${item.name}">${item.name}</option>`;
                        });
                        provinsiSelect.innerHTML = options;
                    })
                    .catch(error => console.error('Error fetching provinces:', error));

                document.getElementById('Editprovinsi').addEventListener('change', function() {
                    const id = this.value;
                    const kotaSelect = document.getElementById('Editkota');
                    const kecamatanSelect = document.getElementById('Editkecamatan');
                    const kelurahanSelect = document.getElementById('Editkelurahan');

                    kotaSelect.innerHTML = '<option value="">Pilih</option>';
                    kecamatanSelect.innerHTML = '<option value="">Pilih</option>';
                    kelurahanSelect.innerHTML = '<option value="">Pilih</option>';

                    if (id) {
                        axios.get(`/api/regencies/${id}`)
                            .then(response => {
                                let options = '<option value="">Pilih</option>';
                                response.data.forEach(item => {
                                    options += `<option value="${item.name}">${item.name}</option>`;
                                });
                                kotaSelect.innerHTML = options;
                            })
                            .catch(error => console.error('Error fetching regencies:', error));
                    }
                });

                document.getElementById('Editkota').addEventListener('change', function() {
                    const id = this.value;
                    const kecamatanSelect = document.getElementById('Editkecamatan');
                    const kelurahanSelect = document.getElementById('Editkelurahan');

                    kecamatanSelect.innerHTML = '<option value="">Pilih</option>';
                    kelurahanSelect.innerHTML = '<option value="">Pilih</option>';

                    if (id) {
                        axios.get(`/api/districts/${id}`)
                            .then(response => {
                                let options = '<option value="">Pilih</option>';
                                response.data.forEach(item => {
                                    options += `<option value="${item.name}">${item.name}</option>`;
                                });
                                kecamatanSelect.innerHTML = options;
                            })
                            .catch(error => console.error('Error fetching districts:', error));
                    }
                });

                document.getElementById('Editkecamatan').addEventListener('change', function() {
                    const id = this.value;
                    const kelurahanSelect = document.getElementById('Editkelurahan');

                    kelurahanSelect.innerHTML = '<option value="">Pilih</option>';

                    if (id) {
                        axios.get(`/api/villages/${id}`)
                            .then(response => {
                                let options = '<option value="">Pilih</option>';
                                response.data.forEach(item => {
                                    options += `<option value="${item.name}">${item.name}</option>`;
                                });
                                kelurahanSelect.innerHTML = options;
                            })
                            .catch(error => console.error('Error fetching villages:', error));
                    }
                });
            });
        </script> --}}
        <script>
            function hapusLowongan(lowongan) {
                // Simulasi aksi hapus, ganti dengan logika backend yang sesuai
                alert(`Lowongan "${lowongan.judul}" telah dihapus!`);
            }
        </script>
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

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? "." : "";
                    rupiah += separator + ribuan.join(".");
                }

                rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
            }
        </script>


    </x-slot:content>
</x-layout>
