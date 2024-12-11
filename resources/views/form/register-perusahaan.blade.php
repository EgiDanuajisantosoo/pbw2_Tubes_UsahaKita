{{-- resources/views/form-perusahaan.blade.php --}}
<x-layout-form>
    <x-slot:title>
        Form Perusahaan
    </x-slot:title>

    <x-slot:content>
        <div class="min-h-screen flex justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="w-full max-w-4xl bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 bg-gradient-to-r from-blue-400 to-blue-500 text-white">
                    <h2 class="text-2xl font-bold text-center">Form Perusahaan</h2>
                    <p class="text-center text-sm mt-1">Lengkapi informasi perusahaan dengan detail dan benar.</p>
                </div>

                <div class="p-6">
                    <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Logo Perusahaan -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-1">Logo Perusahaan <span
                                        class="text-red-500">*</span></label>
                                @error('logo_perusahaan')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <div class="flex items-center">
                                    <div class="w-16 h-16 rounded-full border overflow-hidden bg-gray-100">
                                        <img class="w-full h-full object-cover" id="prevLogo"
                                            src="https://static-00.iconduck.com/assets.00/avatar-default-icon-256x256-0627bafp.png"
                                            alt="Logo Perusahaan">
                                    </div>

                                    <label class="ml-4 cursor-pointer">
                                        <span class="bg-blue-400 text-white py-2 px-4 rounded-md hover:bg-blue-500">
                                            Pilih Gambar
                                        </span>
                                        <input type="file" onchange="loadFileLogo(event)" name="logo_perusahaan"
                                            class="hidden" accept="image/*" required>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-1">Foto KTP Pemilik <span
                                        class="text-red-500">*</span></label>
                                @error('foto_ktp')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <div class="flex items-center">
                                    <div class="w-16 h-16 rounded border overflow-hidden bg-gray-100">
                                        <img class="w-full h-full object-cover" id="prevKtp"
                                            src="https://static-00.iconduck.com/assets.00/avatar-default-icon-256x256-0627bafp.png"
                                            alt="Foto KTP">
                                    </div>
                                    <label class="ml-4 cursor-pointer">
                                        <span class="bg-blue-400 text-white py-2 px-4 rounded-md hover:bg-blue-500">
                                            Pilih Gambar
                                        </span>
                                        <input type="file" onchange="loadFileKtp(event)" name="foto_ktp"
                                            class="hidden" accept="image/*" required>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Perusahaan -->
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                            @php
                                $fields = [
                                    [
                                        'label' => 'Pemilik Perusahaan',
                                        'name' => 'pemilik_perusahaan',
                                        'type' => 'text',
                                        'placeholder' => 'Masukkan Nama Pemilik',
                                    ],
                                    [
                                        'label' => 'Nama Perusahaan',
                                        'name' => 'nama_perusahaan',
                                        'type' => 'text',
                                        'placeholder' => 'Masukkan Nama Perusahaan',
                                    ],
                                    [
                                        'label' => 'Email Perusahaan',
                                        'name' => 'email_perusahaan',
                                        'type' => 'email',
                                        'placeholder' => 'Masukkan Email Perusahaan',
                                    ],
                                    [
                                        'label' => 'No Telepon',
                                        'name' => 'no_telp',
                                        'type' => 'text',
                                        'placeholder' => 'Masukkan No Telepon Perusahaan',
                                    ],
                                ];
                            @endphp

                            @foreach ($fields as $field)
                                <div>
                                    <label class="block text-gray-700 text-sm font-medium mb-1">
                                        {{ $field['label'] }}
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input type="{{ $field['type'] }}" name="{{ $field['name'] }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none"
                                        placeholder="{{ $field['placeholder'] }}" required>
                                    @error($field['name'])
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

                        <!-- Alamat dan Kategori -->
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-1">Website Perusahaan</label>
                                <input type="url" name="website_perusahaan"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none"
                                    placeholder="https://contohwebsite.com">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-1">Kategori <span
                                        class="text-red-500">*</span></label>
                                <select name="kategori"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none">
                                    @foreach ($kategori as $no => $kategoris)
                                        @if ($no == 0)
                                            <option value="" selected>Pilih Kategori</option>
                                        @endif
                                        <option value="{{ $no + 1 }}">{{ $kategoris->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- alamat --}}
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-1">Provinsi <span
                                        class="text-red-500">*</span></label>
                                <select name="provinsi" id="provinsi" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-1">Kabupaten/Kota <span
                                        class="text-red-500">*</span></label>
                                <select name="kota" id="kota" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-1">Kecamatan <span
                                        class="text-red-500">*</span></label>
                                <select name="kecamatan" id="kecamatan"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-1">Kelurahan/Desa <span
                                        class="text-red-500">*</span></label>
                                <select name="kelurahan" id="kelurahan" required
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-6">
                            <label class="block text-gray-700 text-sm font-medium mb-1">Detail Alamat Perusahaan
                            </label>
                            <input type="text" name="alamat_lengkap"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none"
                                placeholder="jl.abcde">
                        </div>


                        <!-- Deskripsi -->
                        <div class="mt-6">
                            <label class="block text-gray-700 text-sm font-medium mb-1">Deskripsi Perusahaan</label>
                            <textarea name="deskripsi" rows="4"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring focus:ring-blue-200 focus:outline-none"
                                placeholder="Tulis deskripsi perusahaan..."></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="mt-6 flex justify-end space-x-4">
                            <button type="reset"
                                class="bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200">Batalkan</button>
                            <button type="submit"
                                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
            var loadFileKtp = function(event) {
                var input = event.target;
                var file = input.files[0];
                var type = file.type;

                var output = document.getElementById('prevKtp');


                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>
        <script>
            var loadFileLogo = function(event) {
                var input = event.target;
                var file = input.files[0];
                var type = file.type;

                var output = document.getElementById('prevLogo');


                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            }
        </script>
    </x-slot:content>
</x-layout-form>
