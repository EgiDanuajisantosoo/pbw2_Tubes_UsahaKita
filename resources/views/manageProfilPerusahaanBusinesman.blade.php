<x-layout>
    <x-slot:title>Manage Perusahaan</x-slot:title>
    <x-slot:content>
        <div class="flex min-h-screen bg-gray-100 ">
            <x-dashboard></x-dashboard>

            <!-- Profile Section -->
            <div class="flex-1 p-5 ">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">

                    <div class="flex items-center p-6 bg-blue-600 md:mb-[30px]">
                        <img class="w-24 h-24 rounded-full border-4 border-white shadow-md"
                            src="{{ asset('storage/' . $dataPerusahaan->foto_perusahaan) }}" alt="Logo Perusahaan">
                        <div class="ml-6">
                            <h3 class="text-2xl font-semibold text-white">{{ $dataPerusahaan->nama_perusahaan }}</h3>
                            <p class="text-white opacity-80">{{ $dataPerusahaan->kategori_bisnis->nama_kategori }}</p>
                        </div>
                    </div>

                    <div class="flex-1 p-5" x-data="{ openEditProfilePerusahaan: false }">
                        <!-- Button to Open Modal Perusahaan -->
                        <div class="flex justify-end md:mb-[30px]">
                            <button @click="openEditProfilePerusahaan = true"
                            onclick="editData('{{ $dataPerusahaan->provinsi }}','{{ $dataPerusahaan->kota }}','{{ $dataPerusahaan->kecamatan }}','{{ $dataPerusahaan->kelurahan }}')"
                                class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700">
                                Edit Profil
                            </button>
                        </div>

                        <!-- Modal Background Overlay Perusahaan -->
                        <div x-show="openEditProfilePerusahaan"
                            x-effect="document.body.style.overflow = openEditProfilePerusahaan ? 'hidden' : 'auto'"
                            class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
                            style="display: none;">

                            <!-- Modal Content Perusahaan -->
                            <div @click.away="openEditProfilePerusahaan = false"
                                class="bg-white rounded-lg shadow-lg w-3/4 max-w-5xl p-8 relative z-50 overflow-y-auto max-h-[85vh]">
                                <button @click="openEditProfilePerusahaan = false"
                                    class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">&times;</button>

                                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Edit Profil Perusahaan</h2>

                                <!-- Form Edit Profile Perusahaan -->
                                <form action="{{ route('editProfile',['id' => $dataPerusahaan->id]) }}" method="POST" class="space-y-6">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Nama Perusahaan -->
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Nama
                                                Perusahaan</label>
                                            <input type="text" name="nama_perusahaan" placeholder="Nama Perusahaan"
                                                value="{{ $dataPerusahaan->nama_perusahaan }}"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>

                                        <!-- Nama Pemilik -->
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Nama Pemilik
                                                Perusahaan</label>
                                            <input type="text" name="pemilik_perusahaan" placeholder="Nama Pemilik"
                                                value="{{ $dataPerusahaan->pemilik_perusahaan }}"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>

                                        <!-- Bidang Industri -->
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Bidang
                                                Industri</label>
                                            <select
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 "
                                                required name="kategori">
                                                <option value="">Pilih kategori</option>
                                                <option value="1">Makanan</option>
                                                <option value="2">Minuman</option>
                                                <option value="3">Teknologi</option>
                                                <option value="4">Pendidikan</option>
                                            </select>
                                            @error('kategori')
                                                <p class="text-red text-xs">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Email</label>
                                            <input type="email" name="email_perusahaan" placeholder="Email Perusahaan"
                                                value="{{ $dataPerusahaan->email_perusahaan }}"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>

                                        <!-- Phone -->
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Phone</label>
                                            <input type="text" name="no_telp" placeholder="Nomor Telepon Perusahaan"
                                                value="{{ $dataPerusahaan->no_telp }}"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>

                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Website
                                                Perusahaan</label>
                                            <input type="text" name="website" placeholder="Nomor Telepon Perusahaan"
                                                value="{{ $dataPerusahaan->website_perusahaan }}"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>

                                        <!-- Alamat -->
                                        <div class="col-span-2">
                                            <label class="block text-gray-700 font-semibold mb-2">Alamat</label>
                                            <div class="md:flex md:row md:space-x-4 w-full text-xs">
                                                <div class="w-full flex flex-col mb-3">
                                                    <label class="font-semibold text-gray-600 py-2">Provinsi:<abbr
                                                            title="required">*</abbr></label>
                                                    <select
                                                        class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                                        name="provinsi" id="Editprovinsi" required>
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
                                                        name="kota" id="Editkota" required>
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
                                                        name="kecamatan" id="Editkecamatan" required>
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
                                                        name="kelurahan" id="Editkelurahan" required>
                                                        <option value="">Pilih</option>
                                                    </select>
                                                    @error('kelurahan')
                                                        <p class="text-red text-xs">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 font-semibold mb-2">Detail Alamat</label>
                                            <input type="text" name="alamat_lengkap" placeholder="Jl.abc" value="{{ $dataPerusahaan->alamat_lengkap }}"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>


                                        <!-- Tentang Perusahaan -->
                                        <div class="col-span-2">
                                            <label class="block text-gray-700 font-semibold mb-2">Tentang
                                                Perusahaan</label>
                                            <textarea name="deskripsi" rows="4" placeholder="Deskripsi Singkat Tentang Perusahaan"
                                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $dataPerusahaan->deskripsi }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Button Actions -->
                                    <div class="flex justify-end mt-8">
                                        <button type="button" @click="openEditProfilePerusahaan = false"
                                            class="px-5 py-3 bg-gray-300 text-gray-800 rounded-lg mr-4">Batal</button>
                                        <button type="submit"
                                            class="px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="content"> --}}
                    <!-- Kontak Section -->
                    <div class="md:mb-[30px] bg-gray-50 border-l-4 border-blue-500 shadow-md rounded-lg p-6 ">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Kontak</h3>
                        <p class="text-gray-600"><b>Email:</b> {{ $dataPerusahaan->email_perusahaan }}</p>
                        <p class="text-gray-600"><b>Phone:</b> +{{ $dataPerusahaan->no_telp }}</p>
                    </div>
                    <!-- Nama Pemilik Section -->
                    <div class="md:mb-[30px] bg-gray-50 border-l-4 border-blue-500 shadow-md rounded-lg p-6 ">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Nama Pemilik Perusahaan</h3>
                        <p class="text-gray-600">{{ $dataPerusahaan->pemilik_perusahaan }}</p>
                    </div>

                    <!-- Alamat Section -->
                    <div class="md:mb-[30px] bg-gray-50 border-l-4 border-blue-500 shadow-md rounded-lg p-6 ">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Alamat Perusahaan</h3>
                        <p class="text-gray-600">
                            {{ $dataPerusahaan->provinsi }},{{ $dataPerusahaan->kota }},{{ $dataPerusahaan->kecamatan }},{{ $dataPerusahaan->kelurahan }}
                        </p>
                    </div>

                    <!-- Deskripsi Perusahaan Section -->
                    <div class="md:mb-[30px] bg-gray-50 border-l-4 border-blue-500 shadow-md rounded-lg p-6 ">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Perusahaan</h3>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $dataPerusahaan->deskripsi }}
                        </p>
                    </div>

                    <div class=" md:mb-[30px] bg-gray-50 border-l-4 border-blue-500 shadow-md rounded-lg p-6 ">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">List Lowongan Bisnis</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                            {{-- Card --}}
                            @foreach ($dataPerusahaan->lowongan as $lowongan)
                                <a href="/detailLowonganBisnis/{{ $lowongan->id }}">
                                    <div class="relative bg-white p-4 rounded-lg shadow-lg flex flex-col items-center">
                                        <img src="{{ asset('storage/' . $dataPerusahaan->foto_perusahaan) }}"
                                            alt="Danone Logo" class="w-16 h-16 mb-2">
                                        <h2 class="text-lg font-semibold">{{ $lowongan->nama_lowongan }}</h2>
                                        <p class="text-gray-600">⭐ 4.3 • 70 Ulasan</p>
                                        <p class="mt-3 bg-blue-500 text-white py-1 px-4 rounded">
                                            {{ $lowongan->jumlah_lowongan }} Pekerjaan</p>
                                    </div>
                                </a>
                            @endforeach
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

<script>
    // let lo;
    // let editProv = document.getElementById('Editprovinsi');

    async function editData(provinsi, kota, kecamatan, kelurahan, lowonganId) {

        // Panggilan API untuk mendapatkan provinsi
        await axios.get('/api/provinces')
            .then(response => {
                let options = `<option value="">Pilih</option>`;
                document.getElementById('Editprovinsi').innerHTML = '<option value="">Pilih</option>';
                document.getElementById('Editkota').innerHTML = '<option value="">Pilih</option>';
                document.getElementById('Editkecamatan').innerHTML = '<option value="">Pilih</option>';
                document.getElementById('Editkelurahan').innerHTML = '<option value="">Pilih</option>';
                // let itemProv = "";

                response.data.forEach(item => {
                    if (item.name == provinsi) {
                        // console.log("Provinsi dari API:", item.name);
                        // console.log("Provinsi yang dipilih:", provinsi);
                        // itemProv = item.name;
                        options +=
                            `<option value="${item.name}" data-id="${item.id}" selected>${item.name}</option>`;
                        // var option = document.createElement("option");
                        // option.text = item.name;
                        // option.selected = true;
                        // document.getElementById('Editprovinsi').add(option);
                    } else {
                        options +=
                            `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                        // var option = document.createElement("option");
                        // option.text = item.name;
                        // document.getElementById('Editprovinsi').add(option);
                    }
                });
                // console.log(response.data)
                document.getElementById('Editprovinsi').innerHTML = options;
                // document.getElementById('Editprovinsi').click();
                // document.querySelector(`[value="${itemProv}"]`).selected = true;
                // console.log("Indeks Provinsi Terpilih: " + document.getElementById('Editprovinsi')
                //     .selectedIndex)
            });
        let editProv = await document.getElementById('Editprovinsi');
        // await console.log(editProv)
        const idProv = await editProv.options[editProv.selectedIndex].getAttribute('data-id');
        // await console.log(idProv)
        await axios.get(`/api/regencies/${idProv}`)
            .then(response => {
                let options = `<option value="">Pilih</option>`;
                // document.getElementById('Editkecamatan').innerHTML = '<option value="">Pilih</option>';
                // document.getElementById('Editkelurahan').innerHTML = '<option value="">Pilih</option>';

                response.data.forEach(item => {
                    if (item.name == kota) {
                        options +=
                            `<option value="${item.name}" data-id="${item.id}" selected>${item.name}</option>`;
                    } else {
                        options +=
                            `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                    }
                });
                document.getElementById('Editkota').innerHTML = options;
            });

        // Event listener untuk perubahan pada provinsi
        document.getElementById('Editprovinsi').addEventListener('change', function() {
            const id = this.options[this.selectedIndex].getAttribute('data-id');
            axios.get(`/api/regencies/${id}`)
                .then(responseA => {
                    let options = `<option value="">Pilih</option>`;
                    // document.getElementById('Editkecamatan').innerHTML = '<option value="">Pilih</option>';
                    // document.getElementById('Editkelurahan').innerHTML = '<option value="">Pilih</option>';

                    responseA.data.forEach(item => {
                        if (item.name == kota) {
                            options +=
                                `<option value="${item.name}" data-id="${item.id}" selected>${item.name}</option>`;
                        } else {
                            options +=
                                `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                        }
                    });
                    document.getElementById('Editkota').innerHTML = options;
                });
        });

        let editKota = await document.getElementById("Editkota")
        const idKota = await editKota.options[editKota.selectedIndex].getAttribute('data-id');
        await axios.get(`/api/districts/${idKota}`)
            .then(response => {
                let options = `<option value="">Pilih</option>`;
                document.getElementById('Editkelurahan').innerHTML = '<option value="">Pilih</option>';

                response.data.forEach(item => {
                    if (item.name == kecamatan) {
                        options +=
                            `<option value="${item.name}" data-id="${item.id}" selected>${item.name}</option>`;
                    } else {
                        options +=
                            `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                    }
                });
                document.getElementById('Editkecamatan').innerHTML = options;
            });

        // Event listener untuk perubahan pada kota
        document.getElementById('Editkota').addEventListener('change', function() {
            const id = this.options[this.selectedIndex].getAttribute('data-id');
            axios.get(`/api/districts/${id}`)
                .then(response => {
                    let options = `<option value="">Pilih</option>`;
                    document.getElementById('Editkelurahan').innerHTML =
                        '<option value="">Pilih</option>';

                    response.data.forEach(item => {
                        if (item.name == kecamatan) {
                            options +=
                                `<option value="${item.name}" data-id="${item.id}" selected>${item.name}</option>`;
                        } else {
                            options +=
                                `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                        }
                    });
                    document.getElementById('Editkecamatan').innerHTML = options;
                });
        });

        let editKecamatan = await document.getElementById("Editkecamatan")
        const idKecamatan = await editKecamatan.options[editKecamatan.selectedIndex].getAttribute('data-id');
        await axios.get(`/api/villages/${idKecamatan}`)
            .then(response => {
                let options = `<option value="">Pilih</option>`;
                response.data.forEach(item => {
                    if (item.name == kelurahan) {
                        options +=
                            `<option value="${item.name}" selected>${item.name}</option>`;
                    } else {
                        options += `<option value="${item.name}">${item.name}</option>`;
                    }
                });
                document.getElementById('Editkelurahan').innerHTML = options;
            });

        // Event listener untuk perubahan pada kecamatan
        document.getElementById('Editkecamatan').addEventListener('change', function() {
            const id = this.options[this.selectedIndex].getAttribute('data-id');
            axios.get(`/api/villages/${id}`)
                .then(response => {
                    let options = `<option value="">Pilih</option>`;
                    response.data.forEach(item => {
                        if (item.name == kelurahan) {
                            options +=
                                `<option value="${item.name}" selected>${item.name}</option>`;
                        } else {
                            options += `<option value="${item.name}">${item.name}</option>`;
                        }
                    });
                    document.getElementById('Editkelurahan').innerHTML = options;
                });
        });
    }

    // Event listener untuk tombol Edit Data
    // document.getElementById('editDataBtn').addEventListener('click', function() {
    //     let provinsi = document.getElementById('provinsi').value;
    //     let kota = document.getElementById('kota').value;
    //     let kecamatan = document.getElementById('kecamatan').value;
    //     let kelurahan = document.getElementById('kelurahan').value;
    //     // Memanggil fungsi editData dengan parameter yang dipilih
    //     editData(provinsi, kota, kecamatan, kelurahan);
    // });

    // console.log(lo);
    // alert(`Provinsi yang dipilih: ${lo}`);
</script>
    </x-slot:content>
</x-layout>
