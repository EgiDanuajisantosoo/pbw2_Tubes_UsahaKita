<x-layout>
    <x-slot:title>Setting Akun</x-slot:title>
    <x-slot:content>



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
                    <button class="text-blue-600 text-sm font-medium hover:text-blue-700" onClick="openModalEmail()">Edit</button>
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

                <!-- Hapus Akun -->
                <div class="border-t pt-6">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600">Hapus Akun</p>

                        <button class="text-red-600 text-sm font-medium hover:text-red-700">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal EMail --}}
        <div id="modalEmail" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <form action="{{ route('ganti.email') }}" method="POST" class="space-y-4 bg-white rounded-lg p-6 shadow-md max-w-md w-full">
                @csrf
                <div class="flex justify-between">
                    <h1>Edit Email</h1>
                    <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeModalEmail()" >
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

        <div id="modalPassword" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <form action="#" method="POST" class="space-y-4 bg-white rounded-lg p-6 shadow-md max-w-md w-full">
                <div class="flex justify-between">
                    <h1>Edit Password</h1>
                    <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeModalPassword()" >
                        &times;
                    </button>
                </div>
                <div>
                    <input type="text" name="company_name" placeholder="Password saat ini"
                        class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <input type="text" name="company_name" placeholder="Password Baru"
                        class="w-full mt-2 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <input type="text" name="company_name" placeholder="Konfirmasi Password"
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
