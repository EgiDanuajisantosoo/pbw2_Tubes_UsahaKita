<x-layout>
    <x-slot:title>Wishlist</x-slot:title>
    <x-slot:content>





        <div class="bg-blue-900 rounded-lg shadow-lg overflow-hidden flex items-center justify-center">
            <div class="mx-auto px-6 py-12 text-center">
                <!-- Main Heading -->
                <h1 class="text-3xl font-semibold text-white">
                    Perusahaan yang bergabung
                </h1>
                <!-- Subheading -->
                <p class="mt-3 text-lg text-white">
                    Manfaatkan kesempatan ini dengan baik karena perusahaan telah mempercayaimu
                </p>
            </div>
        </div>

        <x-aksi></x-aksi>


        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 py-8">


            <!-- Cards Container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 min-h-[180px]">

                <!-- Card 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between mt-8">
                    <div class="flex justify-between">
                        <h3 class="text-2xl font-bold text-gray-700">Company A</h3>
                        <p class=" text-xs font-medium bg-green-100 text-green-600 rounded-lg flex justify-center items-center px-6 py-1">
                        Bekerja Sama
                        </p>
                    </div>
                    <p class="text-gray-500 mt-1">Looking for: Technical Co-Founder</p>
                    <div class="flex gap-3 mt-6">
                        <button class=" bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                            Lihat Lowongan
                        </button>
                    </div>
                </div>

                   <!-- Card 2 -->
                   <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between mt-8">
                    <div class="flex justify-between">
                        <h3 class="text-2xl font-bold text-gray-700">Company B</h3>
                        <p class=" text-xs font-medium bg-green-100 text-green-600 rounded-lg flex justify-center items-center px-6 py-1">
                        Bekerja Sama
                        </p>
                    </div>
                    <p class="text-gray-500 mt-1">Looking for: Technical Co-Founder</p>
                    <div class="flex gap-3 mt-6">
                        <button class=" bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                            Lihat Lowongan
                        </button>
                    </div>
                </div>

                   <!-- Card 2 -->
                   <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between mt-8">
                    <div class="flex justify-between">
                        <h3 class="text-2xl font-bold text-gray-700">Company C</h3>
                        <p class=" text-xs font-medium bg-red-100 text-red-600 rounded-lg flex justify-center items-center px-6 py-1">
                        Berakhir
                        </p>
                    </div>
                    <p class="text-gray-500 mt-1">Looking for: Technical Co-Founder</p>
                    <div class="flex gap-3 mt-6">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                            Lihat Lowongan
                        </button>
                    </div>
                </div>






            </div>
        </div>






    </x-slot:content>
</x-layout>
