<x-layout>
    <x-slot:title>about us</x-slot:title>
    <x-slot:content>

        <!-- Tambahkan AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Hero Section -->

        <div class="bg-cover bg-center h-screen"
            style="background-image: url('https://img.freepik.com/free-photo/colleagues-working-together-project_23-2149286118.jpg?t=st=1733474066~exp=1733477666~hmac=8b43f58cd5f5e0d520a1a2068412664ccd8288597801fe4e912b518b69c2c5d7&w=1380');"
            data-aos="fade-in">
            <div class="absolute inset-0 bg-black opacity-30"></div>
            <div class="max-w-6xl my-auto mx-auto px-6 py-32 text-white" data-aos="fade-up" data-aos-delay="300">
                <h1 class="text-5xl font-bold mt-4">Kebutuhan Anda, Prioritas Kami</h1>
                <a href="#section1" class="">
                    <div class="flex mt-8">
                        <button class="px-4 py-2 bg-white text-black font-medium rounded-md hover:bg-gray-200"
                            data-aos="zoom-in">Selengkapnya</button>
                    </div>
                </a>
            </div>
        </div>

        <!-- Stats Section -->
        <div id="section1" class="p-4">
            {{-- <div class="flex justify-around bg-white shadow-lg rounded-lg max-w-4xl mx-auto mt-6 py-8 px-4 space-y-4 md:space-y-0 md:mt-[200px]"
                data-aos="fade-up" data-aos-delay="300">
                <div class="text-center">
                    <h3 class="text-3xl font-semibold">6 mil</h3>
                    <p class="text-gray-600">The company's annual net income</p>
                </div>
                <div class="text-center">
                    <h3 class="text-3xl font-semibold">315</h3>
                    <p class="text-gray-600">Projects completed worldwide</p>
                </div>
                <div class="text-center">
                    <h3 class="text-3xl font-semibold">120K</h3>
                    <p class="text-gray-600">Employees work in all parts of the world</p>
                </div>

            </div> --}}
            <div class="text-center md:mt-[100px] " data-aos="fade-up" data-aos-delay="400">
                <h1 class="text-3xl font-semibold text-gray-800 mb-4">Tujuan Aplikasi</h1>
                <p class="text-gray-600">Proyek ini bertujuan untuk mengembangkan sebuah aplikasi berbasis web yang berfungsi untuk memudahkan pengusaha dalam mencari rekan bisnis untuk memperluas mitra usaha,
                    <br> ataupun membuka cabang usaha yang telah dirintis oleh pengusaha. Yang pasti dengan Aman dan Mudah.</p>

            </div>
            <a href="#section2" class="">
                <div class="flex space-x-6 mt-8 justify-center">
                    <button
                        class="px-4 p-3 bg-sky-700 border-2 border-sky-700 text-white font-medium rounded-md hover:bg-white hover:text-sky-700"
                        data-aos="fade-up" data-aos-delay="500">Member</button>
                </div>
            </a>
        </div>





        <!-- Team Section -->
        <div class="md:mt-[200px] md:mb-[200px] p-6 "id="section2">
            <div class="text-center md:mt-[100px]" data-aos="fade-up" data-aos-delay="300">
                <h1 class="text-3xl font-semibold text-gray-800 md:mt-[10px]">Member UsahaKita</h1>
            </div>

            <div class="flex justify-center items-start gap-8 p-8 " data-aos="fade-up" data-aos-delay="400">

                <!-- Team Member 1 -->
                <div
                    class="group bg-white p-6 rounded-lg shadow-lg text-center h-[300px] hover:h-[350px] hover:transition duration-700">
                    <div
                        class="w-48 h-48 mx-auto mb-4 overflow-hidden rounded-full group-hover:rounded-none group-hover:transform group-hover:-translate-y-10 duration-700">
                        <img src="https://cdn0-production-images-kly.akamaized.net/GvRUb3iZWoSiF3Lkqm73rjvUdJg=/800x1066/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4702936/original/067069900_1704003692-Zee_JKT48_0.jpg"
                            alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="group-hover:transform group-hover:-translate-y-10 duration-700">
                        <h2 class="text-xl font-semibold text-gray-800 ">Egi Danuajisantoso</h2>
                        <p class="text-gray-600 text-sm font-medium ">Ketua</p>
                    </div>
                    <div class="-mt-6 opacity-0 group-hover:opacity-100 group-hover:transtition-all duration-700">
                        <p>Kontak Saya</p>
                        <div class="flex justify-center items-center gap-8 mt-4 ">
                            <a href="" class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                    class="w-6 h-6 fill-current text-gray-800 hover:text-green-500">
                                    <path
                                        d="M16 .292C7.163.292.293 7.163.293 16c0 2.773.724 5.47 2.096 7.846L.344 31.708l8.02-2.063c2.282 1.203 4.82 1.836 7.633 1.836 8.837 0 15.708-6.871 15.708-15.708C31.708 7.163 24.837.292 16 .292zM16 29.626c-2.517 0-4.94-.67-7.064-1.93l-.506-.3-4.767 1.227 1.26-4.642-.324-.536A13.3 13.3 0 0 1 2.375 16C2.375 8.651 8.651 2.375 16 2.375S29.625 8.651 29.625 16 23.349 29.626 16 29.626zm8.164-9.59c-.447-.223-2.648-1.308-3.058-1.455-.41-.148-.71-.223-1.008.224-.298.447-1.16 1.455-1.42 1.753-.26.298-.52.336-.968.112-.447-.224-1.885-.695-3.587-2.215-1.326-1.182-2.221-2.646-2.484-3.093-.26-.447-.028-.686.197-.91.202-.201.447-.522.671-.783.224-.26.298-.447.447-.746.149-.298.075-.56-.037-.784-.112-.223-1.008-2.422-1.377-3.307-.36-.885-.726-.759-.968-.772-.26-.013-.522-.015-.784-.015-.26 0-.685.074-1.044.56-.36.447-1.373 1.342-1.373 3.27 0 1.927 1.406 3.794 1.604 4.05.197.26 2.743 4.17 6.647 5.847.93.4 1.65.638 2.21.816.93.297 1.775.256 2.444.156.746-.112 2.29-.934 2.612-1.838.336-.93.336-1.726.236-1.838-.099-.112-.36-.186-.806-.41z" />
                                </svg>
                            </a>
                            <a href=https://github.com/EgiDanuajisantosoo"" class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-6 h-6 fill-current text-gray-800 hover:text-black">
                                    <path
                                        d="M12 .297C5.373.297 0 5.67 0 12.297c0 5.303 3.438 9.8 8.207 11.387.6.113.793-.26.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.386-1.333-1.756-1.333-1.756-1.09-.744.083-.729.083-.729 1.205.084 1.84 1.237 1.84 1.237 1.07 1.834 2.807 1.305 3.492.998.107-.775.419-1.305.763-1.605-2.665-.307-5.466-1.334-5.466-5.932 0-1.31.469-2.38 1.236-3.22-.123-.307-.536-1.54.118-3.212 0 0 1.008-.322 3.3 1.23a11.38 11.38 0 0 1 3-.404c1.02.004 2.045.137 3 .404 2.292-1.552 3.3-1.23 3.3-1.23.655 1.672.242 2.905.119 3.212.768.84 1.236 1.91 1.236 3.22 0 4.61-2.805 5.623-5.475 5.92.43.372.823 1.1.823 2.22v3.293c0 .32.192.694.8.576 4.765-1.587 8.2-6.083 8.2-11.387C24 5.67 18.627.297 12 .297z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/in/yourprofile" target="_blank"
                                class="text-gray-600 hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-6 h-6">
                                    <path
                                        d="M20.45 2H3.55A1.55 1.55 0 0 0 2 3.55v16.9A1.55 1.55 0 0 0 3.55 22h16.9A1.55 1.55 0 0 0 22 20.45V3.55A1.55 1.55 0 0 0 20.45 2zM8.33 18.33H5.67V9.67h2.66v8.66zm-1.33-9.9A1.55 1.55 0 1 1 8.55 6.88a1.55 1.55 0 0 1-1.55 1.55zm12.33 9.9h-2.66v-4.11c0-1-.02-2.33-1.42-2.33s-1.64 1.1-1.64 2.24v4.2h-2.66V9.67h2.55v1.18h.03a2.8 2.8 0 0 1 2.52-1.4c2.7 0 3.2 1.78 3.2 4.1v4.78z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div
                    class="group bg-white p-6 rounded-lg shadow-lg text-center h-[300px] hover:h-[350px] hover:transition duration-700">
                    <div
                        class="w-48 h-48 mx-auto mb-4 overflow-hidden rounded-full group-hover:rounded-none group-hover:transform group-hover:-translate-y-10 duration-700">
                        <img src="https://cdn0-production-images-kly.akamaized.net/GvRUb3iZWoSiF3Lkqm73rjvUdJg=/800x1066/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4702936/original/067069900_1704003692-Zee_JKT48_0.jpg"
                            alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="group-hover:transform group-hover:-translate-y-10 duration-700">
                        <h2 class="text-xl font-semibold text-gray-800 ">Abraham Evan K.N</h2>
                        <p class="text-gray-600 text-sm font-medium ">Anggota 1</p>
                    </div>
                    <div class="-mt-6 opacity-0 group-hover:opacity-100 group-hover:transtition-all duration-700">
                        <p>Kontak Saya</p>
                        <div class="flex justify-center items-center gap-8 mt-4 ">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                    class="w-6 h-6 fill-current text-gray-800 hover:text-green-500">
                                    <path
                                        d="M16 .292C7.163.292.293 7.163.293 16c0 2.773.724 5.47 2.096 7.846L.344 31.708l8.02-2.063c2.282 1.203 4.82 1.836 7.633 1.836 8.837 0 15.708-6.871 15.708-15.708C31.708 7.163 24.837.292 16 .292zM16 29.626c-2.517 0-4.94-.67-7.064-1.93l-.506-.3-4.767 1.227 1.26-4.642-.324-.536A13.3 13.3 0 0 1 2.375 16C2.375 8.651 8.651 2.375 16 2.375S29.625 8.651 29.625 16 23.349 29.626 16 29.626zm8.164-9.59c-.447-.223-2.648-1.308-3.058-1.455-.41-.148-.71-.223-1.008.224-.298.447-1.16 1.455-1.42 1.753-.26.298-.52.336-.968.112-.447-.224-1.885-.695-3.587-2.215-1.326-1.182-2.221-2.646-2.484-3.093-.26-.447-.028-.686.197-.91.202-.201.447-.522.671-.783.224-.26.298-.447.447-.746.149-.298.075-.56-.037-.784-.112-.223-1.008-2.422-1.377-3.307-.36-.885-.726-.759-.968-.772-.26-.013-.522-.015-.784-.015-.26 0-.685.074-1.044.56-.36.447-1.373 1.342-1.373 3.27 0 1.927 1.406 3.794 1.604 4.05.197.26 2.743 4.17 6.647 5.847.93.4 1.65.638 2.21.816.93.297 1.775.256 2.444.156.746-.112 2.29-.934 2.612-1.838.336-.93.336-1.726.236-1.838-.099-.112-.36-.186-.806-.41z" />
                                </svg>
                            </a>
                            <a href="https://github.com/evankeane" class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-6 h-6 fill-current text-gray-800 hover:text-black">
                                    <path
                                        d="M12 .297C5.373.297 0 5.67 0 12.297c0 5.303 3.438 9.8 8.207 11.387.6.113.793-.26.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.386-1.333-1.756-1.333-1.756-1.09-.744.083-.729.083-.729 1.205.084 1.84 1.237 1.84 1.237 1.07 1.834 2.807 1.305 3.492.998.107-.775.419-1.305.763-1.605-2.665-.307-5.466-1.334-5.466-5.932 0-1.31.469-2.38 1.236-3.22-.123-.307-.536-1.54.118-3.212 0 0 1.008-.322 3.3 1.23a11.38 11.38 0 0 1 3-.404c1.02.004 2.045.137 3 .404 2.292-1.552 3.3-1.23 3.3-1.23.655 1.672.242 2.905.119 3.212.768.84 1.236 1.91 1.236 3.22 0 4.61-2.805 5.623-5.475 5.92.43.372.823 1.1.823 2.22v3.293c0 .32.192.694.8.576 4.765-1.587 8.2-6.083 8.2-11.387C24 5.67 18.627.297 12 .297z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/in/yourprofile" target="_blank"
                                class="text-gray-600 hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-6 h-6">
                                    <path
                                        d="M20.45 2H3.55A1.55 1.55 0 0 0 2 3.55v16.9A1.55 1.55 0 0 0 3.55 22h16.9A1.55 1.55 0 0 0 22 20.45V3.55A1.55 1.55 0 0 0 20.45 2zM8.33 18.33H5.67V9.67h2.66v8.66zm-1.33-9.9A1.55 1.55 0 1 1 8.55 6.88a1.55 1.55 0 0 1-1.55 1.55zm12.33 9.9h-2.66v-4.11c0-1-.02-2.33-1.42-2.33s-1.64 1.1-1.64 2.24v4.2h-2.66V9.67h2.55v1.18h.03a2.8 2.8 0 0 1 2.52-1.4c2.7 0 3.2 1.78 3.2 4.1v4.78z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div
                    class="group bg-white p-6 rounded-lg shadow-lg text-center h-[300px] hover:h-[350px] hover:transition duration-700">
                    <div
                        class="w-48 h-48 mx-auto mb-4 overflow-hidden rounded-full group-hover:rounded-none group-hover:transform group-hover:-translate-y-10 duration-700">
                        <img src="https://cdn0-production-images-kly.akamaized.net/GvRUb3iZWoSiF3Lkqm73rjvUdJg=/800x1066/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4702936/original/067069900_1704003692-Zee_JKT48_0.jpg"
                            alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="group-hover:transform group-hover:-translate-y-10 duration-700">
                        <h2 class="text-xl font-semibold text-gray-800 ">Naufal Maulana A.S</h2>
                        <p class="text-gray-600 text-sm font-medium ">Anggota 2</p>
                    </div>
                    <div class="-mt-6 opacity-0 group-hover:opacity-100 group-hover:transtition-all duration-700">
                        <p>Kontak Saya</p>
                        <div class="flex justify-center items-center gap-8 mt-4 ">
                            <a href="" class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                    class="w-6 h-6 fill-current text-gray-800 hover:text-green-500">
                                    <path
                                        d="M16 .292C7.163.292.293 7.163.293 16c0 2.773.724 5.47 2.096 7.846L.344 31.708l8.02-2.063c2.282 1.203 4.82 1.836 7.633 1.836 8.837 0 15.708-6.871 15.708-15.708C31.708 7.163 24.837.292 16 .292zM16 29.626c-2.517 0-4.94-.67-7.064-1.93l-.506-.3-4.767 1.227 1.26-4.642-.324-.536A13.3 13.3 0 0 1 2.375 16C2.375 8.651 8.651 2.375 16 2.375S29.625 8.651 29.625 16 23.349 29.626 16 29.626zm8.164-9.59c-.447-.223-2.648-1.308-3.058-1.455-.41-.148-.71-.223-1.008.224-.298.447-1.16 1.455-1.42 1.753-.26.298-.52.336-.968.112-.447-.224-1.885-.695-3.587-2.215-1.326-1.182-2.221-2.646-2.484-3.093-.26-.447-.028-.686.197-.91.202-.201.447-.522.671-.783.224-.26.298-.447.447-.746.149-.298.075-.56-.037-.784-.112-.223-1.008-2.422-1.377-3.307-.36-.885-.726-.759-.968-.772-.26-.013-.522-.015-.784-.015-.26 0-.685.074-1.044.56-.36.447-1.373 1.342-1.373 3.27 0 1.927 1.406 3.794 1.604 4.05.197.26 2.743 4.17 6.647 5.847.93.4 1.65.638 2.21.816.93.297 1.775.256 2.444.156.746-.112 2.29-.934 2.612-1.838.336-.93.336-1.726.236-1.838-.099-.112-.36-.186-.806-.41z" />
                                </svg>
                            </a>
                            <a href="https://github.com/Naufalsh" class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-6 h-6 fill-current text-gray-800 hover:text-black">
                                    <path
                                        d="M12 .297C5.373.297 0 5.67 0 12.297c0 5.303 3.438 9.8 8.207 11.387.6.113.793-.26.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.386-1.333-1.756-1.333-1.756-1.09-.744.083-.729.083-.729 1.205.084 1.84 1.237 1.84 1.237 1.07 1.834 2.807 1.305 3.492.998.107-.775.419-1.305.763-1.605-2.665-.307-5.466-1.334-5.466-5.932 0-1.31.469-2.38 1.236-3.22-.123-.307-.536-1.54.118-3.212 0 0 1.008-.322 3.3 1.23a11.38 11.38 0 0 1 3-.404c1.02.004 2.045.137 3 .404 2.292-1.552 3.3-1.23 3.3-1.23.655 1.672.242 2.905.119 3.212.768.84 1.236 1.91 1.236 3.22 0 4.61-2.805 5.623-5.475 5.92.43.372.823 1.1.823 2.22v3.293c0 .32.192.694.8.576 4.765-1.587 8.2-6.083 8.2-11.387C24 5.67 18.627.297 12 .297z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/in/yourprofile" target="_blank"
                                class="text-gray-600 hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-6 h-6">
                                    <path
                                        d="M20.45 2H3.55A1.55 1.55 0 0 0 2 3.55v16.9A1.55 1.55 0 0 0 3.55 22h16.9A1.55 1.55 0 0 0 22 20.45V3.55A1.55 1.55 0 0 0 20.45 2zM8.33 18.33H5.67V9.67h2.66v8.66zm-1.33-9.9A1.55 1.55 0 1 1 8.55 6.88a1.55 1.55 0 0 1-1.55 1.55zm12.33 9.9h-2.66v-4.11c0-1-.02-2.33-1.42-2.33s-1.64 1.1-1.64 2.24v4.2h-2.66V9.67h2.55v1.18h.03a2.8 2.8 0 0 1 2.52-1.4c2.7 0 3.2 1.78 3.2 4.1v4.78z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div
                    class="group bg-white p-6 rounded-lg shadow-lg text-center h-[300px] hover:h-[350px] hover:transition duration-700">
                    <div
                        class="w-48 h-48 mx-auto mb-4 overflow-hidden rounded-full group-hover:rounded-none group-hover:transform group-hover:-translate-y-10 duration-700">
                        <img src="https://cdn0-production-images-kly.akamaized.net/GvRUb3iZWoSiF3Lkqm73rjvUdJg=/800x1066/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4702936/original/067069900_1704003692-Zee_JKT48_0.jpg"
                            alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="group-hover:transform group-hover:-translate-y-10 duration-700">
                        <h2 class="text-xl font-semibold text-gray-800 ">Danira Ariani</h2>
                        <p class="text-gray-600 text-sm font-medium ">Anggota 3</p>
                    </div>
                    <div class="-mt-6 opacity-0 group-hover:opacity-100 group-hover:transtition-all duration-700">
                        <p>Kontak Saya</p>
                        <div class="flex justify-center items-center gap-8 mt-4 ">
                            <a href="" class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                    class="w-6 h-6 fill-current text-gray-800 hover:text-green-500">
                                    <path
                                        d="M16 .292C7.163.292.293 7.163.293 16c0 2.773.724 5.47 2.096 7.846L.344 31.708l8.02-2.063c2.282 1.203 4.82 1.836 7.633 1.836 8.837 0 15.708-6.871 15.708-15.708C31.708 7.163 24.837.292 16 .292zM16 29.626c-2.517 0-4.94-.67-7.064-1.93l-.506-.3-4.767 1.227 1.26-4.642-.324-.536A13.3 13.3 0 0 1 2.375 16C2.375 8.651 8.651 2.375 16 2.375S29.625 8.651 29.625 16 23.349 29.626 16 29.626zm8.164-9.59c-.447-.223-2.648-1.308-3.058-1.455-.41-.148-.71-.223-1.008.224-.298.447-1.16 1.455-1.42 1.753-.26.298-.52.336-.968.112-.447-.224-1.885-.695-3.587-2.215-1.326-1.182-2.221-2.646-2.484-3.093-.26-.447-.028-.686.197-.91.202-.201.447-.522.671-.783.224-.26.298-.447.447-.746.149-.298.075-.56-.037-.784-.112-.223-1.008-2.422-1.377-3.307-.36-.885-.726-.759-.968-.772-.26-.013-.522-.015-.784-.015-.26 0-.685.074-1.044.56-.36.447-1.373 1.342-1.373 3.27 0 1.927 1.406 3.794 1.604 4.05.197.26 2.743 4.17 6.647 5.847.93.4 1.65.638 2.21.816.93.297 1.775.256 2.444.156.746-.112 2.29-.934 2.612-1.838.336-.93.336-1.726.236-1.838-.099-.112-.36-.186-.806-.41z" />
                                </svg>
                            </a>
                            <a href="" class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="w-6 h-6 fill-current text-gray-800 hover:text-black">
                                    <path
                                        d="M12 .297C5.373.297 0 5.67 0 12.297c0 5.303 3.438 9.8 8.207 11.387.6.113.793-.26.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.386-1.333-1.756-1.333-1.756-1.09-.744.083-.729.083-.729 1.205.084 1.84 1.237 1.84 1.237 1.07 1.834 2.807 1.305 3.492.998.107-.775.419-1.305.763-1.605-2.665-.307-5.466-1.334-5.466-5.932 0-1.31.469-2.38 1.236-3.22-.123-.307-.536-1.54.118-3.212 0 0 1.008-.322 3.3 1.23a11.38 11.38 0 0 1 3-.404c1.02.004 2.045.137 3 .404 2.292-1.552 3.3-1.23 3.3-1.23.655 1.672.242 2.905.119 3.212.768.84 1.236 1.91 1.236 3.22 0 4.61-2.805 5.623-5.475 5.92.43.372.823 1.1.823 2.22v3.293c0 .32.192.694.8.576 4.765-1.587 8.2-6.083 8.2-11.387C24 5.67 18.627.297 12 .297z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/in/yourprofile" target="_blank"
                                class="text-gray-600 hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-6 h-6">
                                    <path
                                        d="M20.45 2H3.55A1.55 1.55 0 0 0 2 3.55v16.9A1.55 1.55 0 0 0 3.55 22h16.9A1.55 1.55 0 0 0 22 20.45V3.55A1.55 1.55 0 0 0 20.45 2zM8.33 18.33H5.67V9.67h2.66v8.66zm-1.33-9.9A1.55 1.55 0 1 1 8.55 6.88a1.55 1.55 0 0 1-1.55 1.55zm12.33 9.9h-2.66v-4.11c0-1-.02-2.33-1.42-2.33s-1.64 1.1-1.64 2.24v4.2h-2.66V9.67h2.55v1.18h.03a2.8 2.8 0 0 1 2.52-1.4c2.7 0 3.2 1.78 3.2 4.1v4.78z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Tambahkan AOS JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

    </x-slot:content>
</x-layout>
