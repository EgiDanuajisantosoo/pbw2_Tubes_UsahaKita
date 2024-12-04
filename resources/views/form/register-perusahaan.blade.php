{{-- resources/views/form-perusahaan.blade.php --}}
<x-layout-form>
    <x-slot:title>
        Form Perusahaan
    </x-slot:title>

    <x-slot:content>
        <div
            class="min-h-screen flex justify-center bg-center py-12 px-4 sm:px-6 lg:px-8  bg-no-repeat bg-cover relative items-center">
            <div class="absolute bg-white opacity-60 inset-0 z-0"></div>
            <div class="max-w-6xl w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
                <div class="grid gap-8 grid-cols-1">
                    <div class="flex flex-col">
                        <div class="flex flex-col sm:flex-row items-center">
                            <h2 class="font-semibold text-lg mr-auto">Form Perusahaan</h2>
                            <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                        </div>
                        <div class="mt-5">
                            <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="relative flex justify-between space-x-8">
                                    <div class="md:space-y-2 mb-3 w-1/2">
                                        <label class="text-xs font-semibold text-gray-600 py-2">Logo Perusahaan<abbr
                                                class="hidden" title="required">*</abbr></label>
                                        <div class="flex items-center py-6">
                                            <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                                <img class="w-12 h-12 object-cover"
                                                    src="https://static-00.iconduck.com/assets.00/avatar-default-icon-256x256-0627bafp.png"
                                                    alt="Avatar Upload">
                                            </div>
                                            <label class="cursor-pointer">
                                                <span
                                                    class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Browse</span>
                                                <input type="file" name="logo_perusahaan" class="hidden"
                                                    accept="image/*" required>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="md:space-y-2 mb-3 w-1/2">
                                        <label class="text-xs font-semibold text-gray-600 py-2">Logo Perusahaan<abbr
                                                class="hidden" title="required">*</abbr></label>
                                        <div class="flex items-center py-6">
                                            <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                                <img class="w-12 h-12 object-cover"
                                                    src="https://static-00.iconduck.com/assets.00/avatar-default-icon-256x256-0627bafp.png"
                                                    alt="Avatar Upload">
                                            </div>
                                            <label class="cursor-pointer">
                                                <span
                                                    class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Browse</span>
                                                <input type="file" name="foto_ktp" class="hidden" accept="image/*"
                                                    required>
                                            </label>
                                        </div>
                                    </div>
                                </div>



                                <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2">Pemilik Perusahaan <abbr
                                                title="required">*</abbr></label>
                                        <input placeholder="Pemilik Perusahaan"
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            required type="text" name="pemilik_perusahaan"
                                            value="{{ old('pemilik_perusahaan') }}">
                                        @error('pemilik_perusahaan')
                                            <p class="text-red text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2">Nama Perusahaan <abbr
                                                title="required">*</abbr></label>
                                        <input placeholder="Nama Perusahaan"
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            required type="text" name="nama_perusahaan"
                                            value="{{ old('nama_perusahaan') }}">
                                        @error('nama_perusahaan')
                                            <p class="text-red text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2">Email Perusahaan <abbr
                                                title="required">*</abbr></label>
                                        <input placeholder="Email"
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            required type="email" name="email_perusahaan"
                                            value="{{ old('email_perusahaan') }}">
                                        @error('email_perusahaan')
                                            <p class="text-red text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2">No_Tlp Perusahaan <abbr
                                                title="required">*</abbr></label>
                                        <input placeholder="Nomor Telepone Perusahaan"
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            required type="text" name="no_telp" value="{{ old('no_telp') }}">
                                        @error('no_telp')
                                            <p class="text-red text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2">Website Perusahaan</label>
                                    <input type="url" name="website_perusahaan" placeholder="https://"
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                        value="{{ old('website') }}">
                                </div>

                                <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Provinsi: <abbr
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
                                        <label class="font-semibold text-gray-600 py-2">Kabupaten/Kota: <abbr
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
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Kecamatan: <abbr
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
                                        <label class="font-semibold text-gray-600 py-2">Kelurahan/Desa <abbr
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
                                <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">

                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Detail Alamat
                                            Perusahaan</label>
                                        <input placeholder="Alamat"
                                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            type="text" name="alamat_lengkap"
                                            value="{{ old('alamat_lengkap') }}">
                                    </div>
                                    <div class="w-full flex flex-col mb-3">
                                        <label class="font-semibold text-gray-600 py-2">Kategori <abbr
                                                title="required">*</abbr></label>
                                        <select
                                            class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                            required name="kategori">
                                            @foreach ($kategori as $no => $kategoris)
                                                <option value="{{ $no+1 }}">{{ $kategoris->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori')
                                            <p class="text-red text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex-auto w-full mb-1 text-xs space-y-2">
                                    <label class="font-semibold text-gray-600 py-2">Deskripsi Perusahaan <abbr
                                        title="required">*</abbr></label>
                                    <textarea name="deskripsi"
                                        class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg py-4 px-4"
                                        placeholder="Masukkan deskripsi perusahaan">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <p class="text-red text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <p class="text-xs text-red-500 text-right my-3">Bidang yang wajib diisi ditandai dengan
                                    tanda bintang <abbr title="Required field">*</abbr></p>

                                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                    <button type="reset"
                                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">Batalkan</button>
                                    <button type="submit"
                                        class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
    </x-slot:content>
</x-layout-form>
