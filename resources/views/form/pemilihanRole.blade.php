<x-layout-form>
    <x-slot:title>Pemilihan Role</x-slot:title>
    <x-slot:content>
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-gray-100 shadow-2xl rounded-lg w-8/12 shadow-2xl p-8 md:w-3/2">
                <h1 class="text-3xl font-bold mb-4 text-center">Your account has been successfully created!</h1>
                <p class="text-sm text-center mb-8">Choose Your Role</p>
                <form action="{{ route('pickRole') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Businessman box -->
                        <div class="relative bg-white rounded-xl shadow-md p-6 hover:shadow-2xl transition duration-300" id="businessmanBox">
                            <input type="radio" id="businessman" name="role" value="2" class="absolute top-4 right-4">
                            <label for="businessman" class="flex flex-col items-center cursor-pointer">
                                <img src="[link_to_businessman_svg]" alt="Businessman Icon" class="w-16 h-16 mx-auto mb-4">
                                <h2 class="text-md font-semibold text-center">Businessman</h2>
                                <p class="text-sm text-justify mt-2">Sebagai seorang Business Man, Anda diharapkan untuk memimpin dan mengelola berbagai aspek dalam dunia bisnis dengan tujuan utama untuk mengembangkan dan memperluas jaringan bisnis...</p>
                            </label>
                        </div>

                        <!-- Business Partner box -->
                        <div class="relative bg-white rounded-lg shadow-md p-6 hover:shadow-2xl transition duration-300" id="businessPartnerBox">
                            <input type="radio" id="business-partner" name="role" value="3" class="absolute top-4 right-4">
                            <label for="business-partner" class="flex flex-col items-center cursor-pointer">
                                <img src="[link_to_business_partner_svg]" alt="Business Partner Icon" class="w-16 h-16 mx-auto mb-4">
                                <h2 class="text-md font-semibold text-center">Business Partner</h2>
                                <p class="text-gray-700 text-sm text-justify mt-2">Sebagai seorang Business Partner, Anda akan berperan sebagai mitra strategis dalam menciptakan peluang bisnis yang saling menguntungkan...</p>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6 space-x-4">
                        <button type="button" onclick="window.history.back();" class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300 transition">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600 transition">Select</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            // Ambil elemen radio button berdasarkan ID
            const businessmanRadio = document.getElementById('businessman');
            const businessPartnerRadio = document.getElementById('business-partner');
            const businessmanBox = document.getElementById('businessmanBox');
            const businessPartnerBox = document.getElementById('businessPartnerBox');

            // Fungsi untuk menambahkan kelas bg-blue-400 pada elemen box yang sesuai
            function toggleBlur(event) {
                // Toggle kelas untuk memberikan efek visual
                if (event.target === businessmanRadio) {
                    businessmanBox.classList.add('bg-blue-400');
                    businessPartnerBox.classList.remove('bg-blue-400');
                } else if (event.target === businessPartnerRadio) {
                    businessPartnerBox.classList.add('bg-blue-400');
                    businessmanBox.classList.remove('bg-blue-400');
                }
            }

            // Menambahkan event listener untuk perubahan pada radio buttons
            businessmanRadio.addEventListener('change', toggleBlur);
            businessPartnerRadio.addEventListener('change', toggleBlur);

            // Inisialisasi untuk setel kondisi awal, jika salah satu radio sudah dipilih sebelumnya
            if (businessmanRadio.checked) {
                businessmanBox.classList.add('bg-blue-400');
            } else if (businessPartnerRadio.checked) {
                businessPartnerBox.classList.add('bg-blue-400');
            }
        </script>
    </x-slot:content>
</x-layout-form>
