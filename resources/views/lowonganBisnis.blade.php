<x-layout>
    <x-slot:title>Lowongan Bisnis</x-slot:title>
    <x-slot:content>
        <div class="bg-blue-900 shadow-lg p-8">
            <form action="{{ route('search.lowongan') }}" method="GET"
                class="flex items-center w-full max-w-screen-lg px-10 mx-auto">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" name="query"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                        placeholder="Search branch name..." />
                </div>
                <button type="submit"
                    class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>

        @if (Auth::check())
        @else
            <div class="py-6 flex justify-center">
                <div class="bg-gray-100 rounded-lg shadow-md p-4 w-[1024px] md:w-3/2">
                    <div class="flex justify-center space-x-10 mb-2">
                        <div
                            class="border border-gray-600 text-gray-800 py-2 px-6 rounded-md hover:bg-gray-200 transition">
                            <a href="/login">Masuk</a>
                        </div>
                        <button class="border-b-2 border-gray-600 text-gray-800 hover:border-gray-800 transition"><a
                                href="/register">Daftar</a></button>
                    </div>
                    <p class="text-center text-gray-600">Masuk untuk mengelola Profil Usahakita, menyimpan pencarian,
                        dan
                        melihat lowongan bisnis yang disarankan.</p>
                </div>
            </div>
        @endif
        <div class="py-8">
            <div class="max-w-screen-lg mx-auto">
                <h2 class="text-2xl font-semibold mb-2">Temukan bisnis Anda</h2>
                <p class="text-gray-600 mb-6">Jelajahi lowongan bisnis untuk menemukan bisnis yang tepat bagi Anda.
                    Pelajari tentang tata cara berbisnis, keuntungan, dan modal yang perlu dikeluarkan.</p>
            </div>

            <!-- Card 1 -->
            @if ($lowongan->isEmpty())
                <p class="mb-40 text-center">Tidak ada hasil yang ditemukan. <a href="/lowonganBisnis"
                        class="text-blue-600 hover:text-blue-400">Kembali Ke Lowongan</a></p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-screen-lg mx-auto">
                    @foreach ($lowongan as $lowongans)
                        <a href="/detailLowonganBisnis/{{ $lowongans->id }}" class="block">
                            <div class="bg-white border rounded-lg shadow-md p-4 relative">
                                <div class="flex justify-between items-start">
                                    <h3 class="text-lg font-semibold">{{ $lowongans->nama_lowongan }}</h3>
                                    <span class="text-blue-600 font-semibold">
                                        {{ 'Rp. ' . number_format($lowongans->modal_usaha, 0, ',', '.') }}</span>
                                </div>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @forelse ($lowongans->tags as $no=>$tag)
                                        @if ($no == 0)
                                            <span
                                                class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">{{ $tag->nama_tag }}</span>
                                        @elseif ($no < 3)
                                            <span
                                                class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">{{ $tag->nama_tag }}</span>
                                        @elseif ($no == 4)
                                            <span
                                                class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">{{ $tag->nama_tag }}...</span>
                                        @endif
                                    @empty
                                    @endforelse
                                </div>
                                <div class="mt-4 flex items-center">
                                    @if ($lowongans->perusahaan)
                                        <img src="{{ asset('storage/' . $lowongans->perusahaan->foto_perusahaan) }}"
                                            alt="Company Logo" class="h-10 w-10 mr-2">
                                    @else
                                        <img src="default-logo.png" alt="Company Logo" class="h-10 w-10 mr-2">
                                    @endif
                                    <div>
                                        <p class="text-blue-600 font-medium">
                                            {{ $lowongans->perusahaan->nama_perusahaan }}
                                        </p>
                                        <p class="text-gray-500 text-sm">
                                            {{-- @if (str_word_count(strtolower("{$lowongans->kelurahan}, {$lowongans->kecamatan}, {$lowongans->kota}, {$lowongans->provinsi}")) > 8)
                                                {{ substr(strtolower("{$lowongans->provinsi}, {$lowongans->kota}, {$lowongans->kecamatan}, {$lowongans->kelurahan}"), 0, 200) . ' [..]' }}
                                            @else
                                            {{ strtolower($lowongans->provinsi) }},{{ strtolower($lowongans->kota) }},{{ strtolower($lowongans->kecamatan) }}
                                            @endif --}}

                                            {{ ucwords(strtolower($lowongans->provinsi)) }}
                                        </p>
                                    </div>
                                </div>
                                <p class="text-gray-400 text-xs mt-4">{{ $lowongans->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
            {{ $lowongan->links() }}
        </div>
    </x-slot:content>
</x-layout>
