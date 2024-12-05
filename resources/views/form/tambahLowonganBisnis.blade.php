{{-- resources/views/form-perusahaan.blade.php --}}
<x-layout-form>
    <x-slot:title>
        Form Perusahaan
    </x-slot:title>

    <x-slot:content>
        <div
            class="min-h-screen flex justify-center bg-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 bg-no-repeat bg-cover relative items-center">
            <div class="absolute bg-gradient-to-br from-gray-100 via-white to-gray-50 opacity-90 inset-0 z-0"></div>
            <div class="max-w-4xl w-full space-y-8 p-10 bg-white rounded-lg shadow-2xl z-10">
                <div class="grid gap-6">
                    <div class="text-center">
                        <h2 class="font-semibold text-2xl text-gray-800">Form Lowongan Bisnis</h2>
                        <p class="text-gray-500 mt-2">Lengkapi informasi berikut untuk mengajukan lowongan bisnis.</p>
                    </div>

                    <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        <div class="space-y-1">
                            <label class="font-semibold text-gray-700">Nama Lowongan Bisnis <abbr
                                    title="required">*</abbr></label>
                            <input type="text" name="nama_perusahaan" required placeholder="Nama Perusahaan"
                                class="block w-full border border-gray-300 rounded-lg h-10 px-4 text-gray-700 focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                value="{{ old('nama_perusahaan') }}">
                            @error('nama_perusahaan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label class="font-semibold text-gray-700">Alamat Cabang Lowongan</label>
                            <input type="text" name="cabang_pusat" placeholder="Alamat"
                                class="block w-full border border-gray-300 rounded-lg h-10 px-4 text-gray-700 focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                value="{{ old('alamat') }}">
                        </div>

                        <div class="space-y-1">
                            <label class="font-semibold text-gray-700">Kualifikasi <abbr
                                    title="required">*</abbr></label>
                            <textarea name="deskripsi" required placeholder="Masukkan deskripsi perusahaan"
                                class="block w-full min-h-[100px] max-h-[300px] border border-gray-300 rounded-lg py-3 px-4 text-gray-700 focus:border-blue-500 focus:ring focus:ring-blue-200 transition">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label class="font-semibold text-gray-700">Keuntungan</label>
                            <textarea name="keuntungan" placeholder="Masukkan keuntungan perusahaan"
                                class="block w-full min-h-[100px] max-h-[300px] border border-gray-300 rounded-lg py-3 px-4 text-gray-700 focus:border-blue-500 focus:ring focus:ring-blue-200 transition">{{ old('keuntungan') }}</textarea>
                            @error('keuntungan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <p class="text-xs text-gray-500 text-right my-3">Bidang yang wajib diisi ditandai dengan tanda
                            bintang <abbr title="Required field">*</abbr></p>

                        <div class="flex justify-end space-x-3">
                            <button type="reset"
                                class="bg-gray-100 px-5 py-2 rounded-lg text-gray-600 hover:bg-gray-200 transition">Batalkan</button>
                            <button type="submit"
                                class="bg-blue-500 px-5 py-2 rounded-lg text-white hover:bg-blue-600 transition">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-layout-form>
