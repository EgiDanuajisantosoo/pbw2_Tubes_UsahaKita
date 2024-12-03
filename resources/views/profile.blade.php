<x-layout>
    <x-slot:title>Profile</x-slot:title>

    <x-slot:content>
        <div class="max-w-6xl mx-auto my-10 rounded-md shadow-md bg-gray-300 shadow-gray-500">
            <div class="bg-white shadow-md">
                <div class="relative rounded-md">
                    <img class="h-64 w-full object-cover rounded-t-md"
                        src="{{ asset('storage/' . $profilUser->banner) }}"
                        alt="image description">
                    <h1
                        class="absolute bottom-4 left-4 md:left-20 lg:left-40 xl:left-72 antialiased font-poppins text-white text-3xl md:text-5xl">
                        NTT Data Center
                    </h1>
                    <img class="absolute top-40 md:top-48 left-4 md:left-10 ring-4 ring-white rounded-full h-36 w-36 md:h-52 md:w-52 border-black object-cover object-center"
                        src="{{ asset('storage/' . $profilUser->foto_profile) }}"
                        alt="image description">
                </div>

                <div class="relative h-screen max-h-2">
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
                </div>

                <div class="flex flex-wrap md:flex-nowrap pt-28 md:pt-36 pb-10 px-5 gap-8">
                    <div class="w-full">
                        <h2 class="text-2xl md:text-4xl font-roboto">{{ $profilUser->user->nama_depan }} {{ $profilUser->user->nama_belakang }}</h2>
                        <div class="inline-flex">
                            <p class="text-sm font-semibold">Alamat: <span class="text-gray-500 font-normal">{{ $profilUser->kota }} ,{{ $profilUser->provinsi }}</span></p>
                        </div>
                        <p class="font-semibold text-gray-700">Expert in meowing and scratching comfy!</p>
                        <div class="inline-flex gap-2 mt-8 md:mt-12">
                            <button class="py-2 px-3 rounded-md text-sm text-white bg-blue-700">Invite To
                                Project</button>
                            <button class="py-2 px-3 rounded-md text-sm ring-1 ring-gray-400">Contact</button>
                            <button class="py-2 px-3 rounded-md text-sm ring-1 ring-gray-400">Agenda</button>
                        </div>
                    </div>
                    <div class="w-full">
                        <p class="text-gray-700 font-roboto font-semibold mt-6">Keahlian (4)</p>
                        <div class="m-2 text-sm font-roboto">
                            <div class="inline-flex flex-wrap gap-x-5 mb-4">
                                <p>Google Ads Management</p>
                                <p>Social Ads Management</p>
                            </div>
                            <div class="inline-flex flex-wrap gap-x-5">
                                <p>Content SEO</p>
                                <p>Content SEO</p>
                                <p class="text-blue-500">+22 More</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white mt-5 p-5 shadow-md">
                <h2 class="text-lg font-semibold">Pernah Bekerja Sama Dengan Perusahaan:</h2>
                <div class="flex flex-wrap items-center gap-8 mt-4">
                    <img class="h-12" src="{{ URL::asset('/logo/google.png') }}" alt="Google">
                    <img class="h-12" src="{{ URL::asset('/logo/microsoft.png') }}" alt="Microsoft">
                </div>
            </div>

            <div class="bg-white mt-5 p-5 shadow">
                <h2 class="text-lg font-semibold">Pendidikan</h2>
                <p class="text-gray-500 text-sm mt-2">Effective Data, AWS and ACC have agreed to implement and maintain
                </p>
            </div>

            <hr class="h-0.5 bg-gray-300 shadow-md">

            <div class="bg-white p-5">
                <h2 class="text-lg font-semibold">Sertifikasi</h2>
                <p class="text-xs text-gray-500 mb-3">May 2020 - Present</p>
                <p class="text-sm text-gray-800">The mission is to build the biggest online community for education,
                    learning, and talent development employers and freelancers</p>
            </div>
        </div>
    </x-slot:content>
</x-layout>
