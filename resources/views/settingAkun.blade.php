<x-layout>
    <x-slot:title>Setting Akun</x-slot:title>
    <x-slot:content>

        @if ($errors->has('password_sekarang'))
            <div id="alert-password"
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2 text-center"
                role="alert">
                <span class="block sm:inline">{{ $errors->first('password_sekarang') }}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                    onclick="document.getElementById('alert-password').style.display='none';">
                    <span class="text-red-500 font-bold">&times;</span>
                </button>
            </div>
        @endif


        <div class="max-w-3xl mx-auto mb-24 mt-24 p-6 bg-white shadow-md rounded-lg ">
            <!-- Header -->
            <div class="mb-8 border-b pb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Pengaturan Akun</h1>
                <p class="text-sm text-gray-600">Atur informasi akun Anda di sini</p>
            </div>

            <!-- Form Section -->
            <div class="space-y-6">
                <!-- Email -->
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="text-gray-800 font-medium">{{ $dataUser->email }}</p>
                    </div>
                    <button class="text-blue-600 text-sm font-medium hover:text-blue-700"
                        onClick="openModalEmail()">Edit</button>
                </div>

                <!-- Kata Sandi -->
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Kata Sandi</p>
                        <p class="text-gray-800 font-medium">*********</p>
                    </div>
                    <button class="text-blue-600 text-sm font-medium hover:text-blue-700"
                        onClick="openModalPassword()">Edit</button>
                </div>


            </div>
        </div>

        {{-- Modal EMail --}}
        <div id="modalEmail" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <form action="{{ route('ganti.email') }}" method="POST"
                class="space-y-4 bg-white rounded-lg p-6 shadow-md max-w-md w-full">
                @csrf
                <div class="flex justify-between">
                    <h1>Edit Email</h1>
                    <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeModalEmail()">
                        &times;
                    </button>
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email Baru"
                        class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button" onclick="closeModalEmail()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>


        {{-- Modal Passowrd --}}

        <div id="modalPassword"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <form id="gantiPass" action="{{ route('gantiSandi') }}" method="POST" onsubmit=" return confirmPass()"
                class="space-y-4 bg-white rounded-lg p-6 shadow-md max-w-md w-full">
                @csrf
                <div class="flex justify-between">
                    <h1>Edit Password</h1>
                    <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeModalPassword()">
                        &times;
                    </button>
                </div>
                <div>
                    <input type="password" name="password_sekarang" placeholder="Password saat ini" minlength="8"
                        class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <input type="password" id="password_baru" name="password_baru" placeholder="Password Baru"
                        minlength="8"
                        class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <input type="password" id="konfirmasi_password" name="konfirmasi_password"
                        placeholder="Konfirmasi Password" minlength="8"
                        class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button" onclick="closeModalPassword()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>


        {{-- Modal Hapus --}}












    </x-slot:content>
</x-layout>

<script>
    setTimeout(() => {
        const alertPassword = document.getElementById('alert-password');
        if (alertPassword) {
            alertPassword.style.display = 'none';
        }
    }, 3000);

    function confirmPass() {
        let passBaru = document.getElementById("password_baru").value;
        let konfirPass = document.getElementById("konfirmasi_password").value;

        if (passBaru !== konfirPass) {
            alert('Password Baru dan Konfirmasi Password tidak sesuai.');
            document.getElementById("konfirmasi_password").focus();
            return false;
        }
        return true;
    }

    function openModalEmail() {
        document.getElementById('modalEmail').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModalEmail() {
        document.getElementById('modalEmail').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function openModalPassword() {
        document.getElementById('modalPassword').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModalPassword() {
        document.getElementById('modalPassword').classList.add('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function openModalHapus() {
        document.getElementById('modalHapus').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModalHapus() {
        document.getElementById('modalHapus').classList.add('hidden');
        document.body.classList.add('overflow-hidden');
    }
</script>
