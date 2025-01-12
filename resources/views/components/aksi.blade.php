<div class="flex gap-9 mt-9 justify-center items-center">


    <a href="/verifikasiLowongan"
        class="relative py-2 px-3 rounded text-lg {{ request()->is('verifikasiLowongan') ? 'text-blue-700' : 'text-gray-900' }} hover:text-blue-700 md:p-0 light:text-white group">
        Verifikasi Perusahaan
        <span
            class="absolute bottom-0 left-1/2 h-0.5 bg-blue-700 transform -translate-x-1/2 transition-all duration-300 {{ request()->is('verifikasiLowongan') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
    </a>

    <a href="/wishlist"
    class="relative py-2 px-3 rounded text-lg {{ request()->is('wishlist') ? 'text-blue-700' : 'text-gray-900' }} hover:text-blue-700 md:p-0 light:text-white group">
   Wishlist
    <span
        class="absolute bottom-0 left-1/2 h-0.5 bg-blue-700 transform -translate-x-1/2 transition-all duration-300 {{ request()->is('wishlist') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
</a>

<a href="/listBisnisPartner"
class="relative py-2 px-3 rounded text-lg {{ request()->is('listBisnisPartner') ? 'text-blue-700' : 'text-gray-900' }} hover:text-blue-700 md:p-0 light:text-white group">
 Bisnis Dijalankan
<span
    class="absolute bottom-0 left-1/2 h-0.5 bg-blue-700 transform -translate-x-1/2 transition-all duration-300 {{ request()->is('listBisnisPartner') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
</a>
<a href="/permintaanBerhenti"
class="relative py-2 px-3 rounded text-lg {{ request()->is('permintaanBerhenti') ? 'text-blue-700' : 'text-gray-900' }} hover:text-blue-700 md:p-0 light:text-white group">
 Permintaan Berhenti
<span
    class="absolute bottom-0 left-1/2 h-0.5 bg-blue-700 transform -translate-x-1/2 transition-all duration-300 {{ request()->is('permintaanBerhenti') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
</a>







</div>
