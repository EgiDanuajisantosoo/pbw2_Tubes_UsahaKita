<x-layout>
    <x-slot:title>Profile</x-slot:title>

    <x-slot:content>
        <div class="max-w-6xl mx-auto my-10 rounded-md shadow-md bg-gray-300 shadow-gray-500">
            <div class="bg-white shadow-md">
                <div class="relative rounded-md">
                    <img class="h-64 w-full object-cover rounded-t-md"
                        src="{{ $profilUser == null ? asset('img/defaultBanner.jpeg') : asset('storage/' . $profilUser->banner) }}"
                        alt="image description">

                    <h1
                        class="absolute bottom-4 left-4 md:left-20 lg:left-40 xl:left-72 antialiased font-poppins text-white text-3xl md:text-5xl">
                        NTT Data Center
                    </h1>
                    <img class="absolute top-40 md:top-48 left-4 md:left-10 ring-4 ring-white rounded-full h-36 w-36 md:h-52 md:w-52 border-black object-cover object-center"
                        src="{{ $profilUser == null ? asset('img/defaultProfil.jpg') : asset('storage/' . $profilUser->foto_profile) }}"
                        alt="image description">
                </div>

                <div class="relative h-screen max-h-2">
                    @if (Auth::id() == $namaUser->id && $profilUser == null)
                        <a href="{{ route('profileUser.create') }}">
                            <button type="button"
                                class="absolute top-4 right-4 inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2" />
                                </svg>
                                Settings
                            </button>
                        </a>
                    @elseif (Auth::id() == $namaUser->id && $profilUser != null)
                        <a href="{{ route('profileUser.create') }}">
                            <button type="button"
                                class="absolute top-4 right-4 inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2" />
                                </svg>
                                Settings
                            </button>
                        </a>
                    @endif
                </div>

                <div class="flex flex-wrap md:flex-nowrap pt-28 md:pt-36 pb-10 px-5 gap-8">
                    <div class="w-full">
                        <h2 class="text-2xl md:text-4xl font-roboto">
                            {{ $namaUser->nama_depan }}
                            {{ $namaUser->nama_belakang }}
                        </h2>
                        <div class="inline-flex">
                            <p class="text-sm font-semibold">Alamat: <span class="text-gray-500 font-normal">
                                    @if ($profilUser == null)
                                        -
                                    @else
                                        {{ $profilUser->kota }}
                                        ,{{ $profilUser->provinsi }}
                                    @endif
                                </span></p>
                        </div>
                        <p class="font-semibold text-gray-700">
                            {{ $profilUser == null ? 'belum ada slogan' : $profilUser->slogan }}</p>
                        <div class="inline-flex gap-2 mt-8 md:mt-12">
                            <button class="py-2 px-3 rounded-md text-sm text-white bg-blue-700">Invite To
                                Project</button>
                            <button class="py-2 px-3 rounded-md text-sm ring-1 ring-gray-400">Contact</button>
                            <button class="py-2 px-3 rounded-md text-sm ring-1 ring-gray-400">Agenda</button>
                        </div>
                    </div>
                    <div class="w-full">
                        <p class="text-gray-700 font-roboto font-semibold mt-6">Keahlian ({{ count($KeahlianArray) }})
                        </p>
                        <div class="m-2 text-sm font-roboto">
                            <div class="inline-flex flex-wrap gap-x-5 mb-4">
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @if ($profilUser == null)
                                        -
                                    @else
                                        @foreach ($KeahlianArray as $no => $keahlian)
                                            @if ($no == 0)
                                                <span
                                                    class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">{{ $keahlian }}</span>
                                            @else
                                                <span
                                                    class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">{{ $keahlian }}</span>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            {{-- @foreach ($benefitArray as $benefit)
                                <li> {{ $benefit }} </li>
                            @endforeach --}}
                            {{-- <div class="inline-flex flex-wrap gap-x-5">
                                <p>Content SEO</p>
                                <p>Content SEO</p>
                                <p class="text-blue-500">+22 More</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white mt-5 p-5 shadow-md">
                <h2 class="text-lg font-semibold">Pernah Bekerja Sama Dengan Perusahaan:</h2>
                <div class="flex gap-2 mt-4">
                    @if ($profilUser == null)
                        -
                    @else
                        @foreach ($PengalamanArray as $no => $pengalaman)
                            @if ($no == 0)
                                <span
                                    class="bg-blue-300 text-blue-700 px-2 py-1 rounded text-sm">{{ $pengalaman }}</span>
                            @else
                                <span
                                    class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">{{ $pengalaman }}</span>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="bg-white mt-5 p-5 shadow">
                <h2 class="text-lg font-semibold">Pendidikan</h2>
                @if ($profilUser == null)
                    -
                @else
                    @foreach ($PendidikanArray as $no => $pendidikan)
                        <p class="text-gray-500 text-sm mt-2">
                            <li>{{ $pendidikan }}</li>
                        </p>
                    @endforeach
                @endif
            </div>

            <hr class="h-0.5 bg-gray-300 shadow-md">

            <div class="bg-white p-5">
                <h2 class="text-lg font-semibold">Sertifikasi</h2>
                @if ($profilUser == null)
                    -
                @else
                    @foreach ($SertifikasiArray as $no => $sertifikasi)
                        <p class="text-gray-500 text-sm mt-2">
                            <li>{{ $sertifikasi }}</li>
                        </p>
                    @endforeach
                @endif
            </div>
        </div>
    </x-slot:content>
</x-layout>
