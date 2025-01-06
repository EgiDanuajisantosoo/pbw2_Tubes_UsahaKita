<x-layout>
    <x-slot:title>Perusahaan</x-slot:title>
    <x-slot:content>
        <section class="py-10 my-auto dark:bg-gray-900">
            <div class="lg:w-[80%] md:w-[90%] xs:w-[96%] mx-auto flex gap-4">
                <div
                    class="lg:w-[88%] md:w-[80%] sm:w-[88%] xs:w-full mx-auto shadow-2xl p-4 rounded-xl h-fit self-center dark:bg-gray-800/40">
                    <!--  -->
                    <div class="">
                        <h1
                            class="lg:text-3xl md:text-2xl sm:text-xl xs:text-xl font-serif font-extrabold mb-2 dark:text-white">
                            Profile
                        </h1>
                        <h2 class="text-grey text-sm mb-4 dark:text-gray-400">Edit Profile</h2>
                        <form action="{{ route('profileUser.update', ['id' => $dataProfile->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Cover Image -->
                            <div id='preview_Bgimg'
                                class="w-full rounded-sm bg-cover bg-center bg-no-repeat items-center" style="background-image: url('{{ asset('storage/' . $dataProfile->banner) }}');">
                                <!-- Profile Image -->
                                <div id='preview_img' class="mx-auto flex justify-center w-[141px] h-[141px] bg-blue-300/20 rounded-full bg-cover bg-center bg-no-repeat"
                                    style="background-image: url('{{ asset('storage/' . $dataProfile->foto_profile) }}');"> 
                                    <div class="bg-white/90 rounded-full w-6 h-6 text-center ml-28 mt-4">

                                        <input type="file" name="profile" id="upload_profile"
                                            onchange="loadFile(event)" hidden >

                                        <label for="upload_profile">
                                            <svg data-slot="icon" class="w-6 h-5 text-blue-700" fill="none"
                                                stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z">
                                                </path>
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <!--  -->
                                    <input type="file" onchange="loadFileBanner(event)" name="banner" id="upload_cover" hidden>

                                    <div
                                        class="bg-white flex items-center gap-1 rounded-tl-md px-2 text-center font-semibold">
                                        <label for="upload_cover"
                                            class="inline-flex items-center gap-1 cursor-pointer">Cover

                                            <svg data-slot="icon" class="w-6 h-5 text-blue-700" fill="none"
                                                stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z">
                                                </path>
                                            </svg>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <h2 class="text-center mt-1 font-semibold dark:text-gray-300">Upload Profile and Cover Image
                            </h2>
                            <div
                                class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full">
                                <div class="w-full  mb-4 mt-6">
                                    <label for="" class="mb-2 dark:text-gray-300">Slogan</label>
                                    <input type="text" name="slogan" value="{{ $dataProfile->slogan }}"
                                        class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                        placeholder="Motivasi anda">
                                </div>
                                <div class="w-full  mb-4 mt-6">
                                    <label for="" class="mb-2 dark:text-gray-300">No Telp</label>
                                    <input type="text" name="no_telp" value="{{ $dataProfile->no_telp }}"
                                        class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                        placeholder="Nomor Telp">
                                </div>
                                <div class="w-full  mb-4 lg:mt-6">
                                    <label for="" class=" dark:text-gray-300">Jenis Kelamin</label>
                                    <select name="jenis_kelamin"
                                        class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800">
                                        @if ($dataProfile->jenis_kelamin == "Pria")
                                        <option value="Pria" selected>Pria</option>
                                        @else
                                        <option value="Wanita" selected>Wanita</option>
                                        @endif
                                    </select>

                                </div>
                            </div>

                            <div
                                class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full">
                                <div class="w-full">
                                    <h3 class="dark:text-gray-300 mb-2">Keahlian</h3>
                                    <input type="text" name="keahlian" value="{{ implode(', ', $KeahlianArray) }}"
                                        class="w-full text-grey border-2 rounded-lg p-4 pl-2 pr-2 dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                        placeholder="Komunikasi,Kepemimpinan,Keuangan">
                                </div>
                                <div class="w-full">
                                    <h3 class="dark:text-gray-300 mb-2">Pengalaman</h3>
                                    <input type="text" name="pengalaman" value="{{ implode(', ', $PengalamanArray) }}"
                                        class="w-full text-grey border-2 rounded-lg p-4 pl-2 pr-2 dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                        placeholder="google,microsoft">
                                </div>
                            </div>
                            <div
                                class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full">
                                <div class="w-full">
                                    <h3 class="dark:text-gray-300 mb-2">Pendidikan</h3>
                                    <input type="text" name="pendidikan" value="{{ implode(', ', $PendidikanArray) }}"
                                        class="w-full text-grey border-2 rounded-lg p-4 pl-2 pr-2 dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                        placeholder="S1 Management Bisnis">
                                </div>
                                <div class="w-full">
                                    <h3 class="dark:text-gray-300 mb-2">Sertifikasi</h3>
                                    <input type="text" name="sertifikasi" value="{{ implode(', ', $SertifikasiArray) }}"
                                        class="w-full text-grey border-2 rounded-lg p-4 pl-2 pr-2 dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                        placeholder="Sertifikasi Digital Marketing,Project Management Professional">
                                </div>
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
                            <div class="w-full rounded-lg bg-blue-500 mt-4 text-white text-lg font-semibold">
                                <button type="submit" class="w-full p-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script>
            let prov = '{{ $dataProfile->provinsi }}';
            let kota = '{{ $dataProfile->kota }}';
            let kec = '{{ $dataProfile->kecamatan }}';
            let kel = '{{ $dataProfile->kelurahan }}';
        
            document.addEventListener("DOMContentLoaded", () => {
                // Memuat data provinsi saat halaman dimuat
                loadOptions('/api/provinces', 'provinsi', prov).then(() => {
                    // Memuat data kota berdasarkan provinsi yang terpilih
                    let selectedProv = document.querySelector('#provinsi option:checked');
                    if (selectedProv) {
                        loadOptions(`/api/regencies/${selectedProv.getAttribute('data-id')}`, 'kota', kota).then(() => {
                            let selectedKota = document.querySelector('#kota option:checked');
                            if (selectedKota) {
                                loadOptions(`/api/districts/${selectedKota.getAttribute('data-id')}`, 'kecamatan', kec).then(() => {
                                    let selectedKec = document.querySelector('#kecamatan option:checked');
                                    if (selectedKec) {
                                        loadOptions(`/api/villages/${selectedKec.getAttribute('data-id')}`, 'kelurahan', kel);
                                    }
                                });
                            }
                        });
                    }
                });
        
                // Event listener untuk perubahan dropdown
                document.getElementById('provinsi').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    loadOptions(`/api/regencies/${id}`, 'kota').then(() => {
                        clearDropdown('kecamatan');
                        clearDropdown('kelurahan');
                    });
                });
        
                document.getElementById('kota').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    loadOptions(`/api/districts/${id}`, 'kecamatan').then(() => {
                        clearDropdown('kelurahan');
                    });
                });
        
                document.getElementById('kecamatan').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    loadOptions(`/api/villages/${id}`, 'kelurahan');
                });
            });
        
            async function loadOptions(url, elementId, selectedValue = '') {
                try {
                    const response = await axios.get(url);
                    let options = '<option value="">Pilih</option>';
                    response.data.forEach(item => {
                        options += `<option value="${item.name}" data-id="${item.id}" ${item.name === selectedValue ? 'selected' : ''}>${item.name}</option>`;
                    });
                    document.getElementById(elementId).innerHTML = options;
                } catch (error) {
                    console.error(`Gagal memuat data untuk ${elementId}:`, error);
                }
            }
        
            function clearDropdown(elementId) {
                document.getElementById(elementId).innerHTML = '<option value="">Pilih</option>';
            }
        </script>
        
        
        <script>
            var loadFile = function(event) {
                var input = event.target;
                var file = input.files[0];
        
                if (file && file.type.startsWith('image/')) {
                    var previewDiv = document.getElementById('preview_img');
                    
                    var objectURL = URL.createObjectURL(file);
                    previewDiv.style.backgroundImage = `url(${objectURL})`;
        
                    previewDiv.onload = function() {
                        URL.revokeObjectURL(objectURL);
                    };
                } else {
                    alert('Please upload a valid image file.');
                }
            };
        </script>
        <script>
            var loadFileBanner = function(event) {
                var input = event.target;
                var file = input.files[0];
        
                if (file && file.type.startsWith('image/')) {
                    var previewDiv = document.getElementById('preview_Bgimg');
                    
                    var objectURL = URL.createObjectURL(file);
                    previewDiv.style.backgroundImage = `url(${objectURL})`;
        
                    previewDiv.onload = function() {
                        URL.revokeObjectURL(objectURL);
                    };
                } else {
                    alert('Please upload a valid image file.');
                }
            };
        </script>
        
    </x-slot:content>
</x-layout>
