
<html lang="en">
  <head>
    <title>89K - Corner</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Readex+Pro:400,500,600,700&amp;subset=latin"/>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/tailwind/tailwind.min.css"/>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.png"/>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js" defer="defer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  </head>
    <body class="antialiased bg-body text-body font-body">
        <section class="bg-orange-50" x-data="{ mobileNavOpen: false }">
            <nav class="py-6 border-b">
                <div class="container mx-auto px-4">
                    <div class="relative flex items-center justify-end">
                        <ul class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden md:flex">
                            <li class="mr-8"><a class="inline-block text-teal-900 hover:text-teal-700 font-medium" href="/">Home</a></li>
                            <li class="mr-8"><a class="inline-block text-teal-900 hover:text-teal-700 font-medium" href="/about">About Us</a></li>
                            <li class="mr-8"><a class="inline-block text-teal-900 hover:text-teal-700 font-medium" href="/contact">Contact</a></li>
                            <li><a class="inline-block text-teal-900 hover:text-teal-700 font-medium" href="/room">Room</a></li>
                        </ul>
                        <div class="flex items-center justify-end">
                            <div class="hidden md:block"><a class="inline-flex py-2.5 px-4 items-center justify-center text-sm font-medium text-teal-900 hover:text-white border border-teal-900 hover:bg-teal-900 rounded-full transition duration-200" href="/login">Get Started</a></div>
                            <button class="md:hidden navbar-burger text-teal-900 hover:text-teal-800" x-on:click="mobileNavOpen = !mobileNavOpen">
                                <svg width="32" height="32" viewbox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.19995 23.2H26.7999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M5.19995 16H26.7999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M5.19995 8.79999H26.7999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="hidden fixed top-0 left-0 bottom-0 w-full xs:w-5/6 xs:max-w-md z-50" :class="{'block': mobileNavOpen, 'hidden': !mobileNavOpen}">
              <div class="fixed inset-0 bg-violet-900 opacity-20" x-on:click="mobileNavOpen = !mobileNavOpen"></div>
              <nav class="relative flex flex-col py-7 px-10 w-full h-full bg-white overflow-y-auto">
              <div class="flex items-center justify-between">
                  <div class="flex items-center"><a class="inline-flex py-2.5 px-4 mr-6 items-center justify-center text-sm font-medium text-teal-900 hover:text-white border border-teal-900 hover:bg-teal-900 rounded-full transition duration-200" href="#">Login</a>
                  <button x-on:click="mobileNavOpen = !mobileNavOpen">
                      <svg width="32" height="32" viewbox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M23.2 8.79999L8.80005 23.2M8.80005 8.79999L23.2 23.2" stroke="#1D1F1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                  </button>
                  </div>
              </div>
              <div class="pt-20 pb-12 mb-auto">
                  <ul class="flex-col">
                  <li class="mb-6"><a class="inline-block text-teal-900 hover:text-teal-700 font-medium" href="/">Home</a></li>
                  <li class="mb-6"><a class="inline-block text-teal-900 hover:text-teal-700 font-medium" href="/about">About Us</a></li>
                  <li class="mb-6"><a class="inline-block text-teal-900 hover:text-teal-700 font-medium" href="/contact">Contact</a></li>
                  <li class="mb-6"><a class="inline-block text-teal-900 hover:text-teal-700 font-medium" href="/room">Room</a></li>
                  </ul>
              </div>
              <div class="flex items-center justify-between">
                <a class="inline-flex items-center text-lg font-medium text-teal-900" href="#">
                      <span class="ml-2">89K - Corner</span>
                </a>
              </div>
              </nav>
            </div>
        </section>

        <section class="py-4 lg:py-8 bg-orange-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="font-heading font-bold text-6xl text-[#0c4f4a] mb-2">About Us</h2>
                    <p class="text-lg text-[#0c4f4a] opacity-80">Meet our company</p>
                </div>

                <div class="max-w-4xl mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="space-y-4 md:col-span-2 lg:col-span-3">
                            <img src="{{ asset('images/about/depan.jpg') }}" alt="rumah3" class="w-full rounded-2xl shadow-lg"/>
                            <p class="text-gray-700 text-sm md:text-base text-justify">
                                Kos 89k hadir dengan misi untuk menyediakan akomodasi yang praktis, aman, dan
                                terjangkau bagi mahasiswa dan karyawan. Dengan berbagai fasilitas lengkap dan
                                lokasi yang strategis, Kos 89k menjadi pilihan utama bagi mereka yang
                                membutuhkan tempat tinggal yang mendukung kenyamanan dan produktivitas.
                            </p>
                            <p class="text-gray-700 text-sm md:text-base text-justify">
                                Kami memahami bahwa tempat tinggal yang nyaman sangat berpengaruh pada
                                kualitas hidup dan produktivitas. Oleh karena itu, Kos 89k menawarkan berbagai
                                fasilitas terbaik, seperti Wi-Fi cepat, ruang bersama, dapur lengkap, laundry room,
                                dan keamanan 24 jam, semua dalam satu tempat yang mudah diakses. Setiap
                                kamar dirancang dengan kenyamanan dan fungsionalitas yang tinggi, memberikan
                                suasana yang ideal untuk beristirahat setelah hari yang panjang.
                            </p>
                        </div>

                        <div class="space-y-4">
                            <img src="{{ asset('images/about/about_us2.jpg') }}" alt="about_us2" class="w-full rounded-2xl shadow-lg"/>
                        </div>
                        <div class="space-y-4">
                            <img src="{{ asset('images/about/about_us3.jpg') }}" alt="about_us3" class="w-full rounded-2xl shadow-lg"/>
                        </div>
                        <div class="space-y-4">
                            <img src="{{ asset('images/about/about_us4.jpg') }}" alt="about_us4" class="w-full rounded-2xl shadow-lg"/>
                        </div>
                        <div class="space-y-4">
                            <img src="{{ asset('images/about/about_us.jpg') }}" alt="about_us1" class="w-full rounded-2xl shadow-lg"/>
                        </div>
                        <div class="space-y-4">
                            <img src="{{ asset('images/about/about_us1.jpg') }}" alt="about_us1" class="w-full rounded-2xl shadow-lg"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="relative py-12 lg:py-24 bg-orange-50 overflow-hidden">
            <img class="absolute bottom-0 left-0" src="quantam-assets/footer/waves-lines-left-bottom.png" alt=""/>
            <div class="container px-4 mx-auto relative">
                <div class="flex flex-wrap mb-16 -mx-4">
                    <div class="w-full lg:w-3/12 px-4 mb-8 lg:mb-0">
                        <a class="inline-block mb-4" href="#">
                            <img src="LOGO_KOS.png" alt="Logo" class="w-32"/>
                        </a>
                        <p class="text-gray-600 text-sm">Kos putri nyaman strategis dekat kampus Unesa Ketintang dan Telkom Surabaya.</p>
                    </div>
                    
                    <div class="w-full md:w-6/12 lg:w-5/12 px-4 mb-8 lg:mb-0">
                        <div class="flex flex-wrap -mx-4">
                            <div class="w-1/3 px-4">
                                <h3 class="mb-4 font-bold">Company</h3>
                                <ul>
                                    <li class="mb-2"><a class="text-gray-600 hover:text-lime-500" href="#">About Us</a></li>
                                    <li class="mb-2"><a class="text-gray-600 hover:text-lime-500" href="#">Contact</a></li>
                                    <li class="mb-2"><a class="text-gray-600 hover:text-lime-500" href="#">Rooms</a></li>
                                </ul>
                            </div>
                            <div class="w-1/3 px-4">
                                <h3 class="mb-4 font-bold">Support</h3>
                                <ul>
                                    <li class="mb-2"><a class="text-gray-600 hover:text-lime-500" href="#">FAQ</a></li>
                                    <li class="mb-2"><a class="text-gray-600 hover:text-lime-500" href="#">Help Center</a></li>
                                    <li class="mb-2"><a class="text-gray-600 hover:text-lime-500" href="#">Terms & Policies</a></li>
                                </ul>
                            </div>
                            <div class="w-1/3 px-4">
                                <h3 class="mb-4 font-bold">Follow Us</h3>
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-600 hover:text-blue-500"><i class="fab fa-facebook text-xl"></i></a>
                                    <a href="#" class="text-gray-600 hover:text-blue-400"><i class="fab fa-twitter text-xl"></i></a>
                                    <a href="#" class="text-gray-600 hover:text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
                                    <a href="#" class="text-gray-600 hover:text-red-600"><i class="fab fa-youtube text-xl"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full md:w-6/12 lg:w-4/12 px-4">
                        <div class="max-w-sm p-6 bg-teal-900 rounded-2xl mx-auto md:mr-0">
                            <h5 class="text-xl font-medium text-white mb-4">Dapatkan Info Terbaru</h5>
                            <p class="text-sm text-white opacity-80 mb-4">Masukkan email Anda untuk mendapatkan informasi terbaru dari kami.</p>
                            <div class="flex flex-col">
                                <input class="h-12 w-full px-4 py-1 text-white placeholder-gray-500 border border-[#FFF7ED] ring-offset-0 focus:ring-2 focus:border-none focus:ring-lime-500 shadow rounded-full" type="email" placeholder="Your e-mail..."/>
                                <button class="h-12 inline-flex mt-3 py-1 px-5 items-center justify-center font-medium text-teal-900 border border-lime-500 hover:border-white bg-lime-500 hover:bg-white rounded-full transition duration-200">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-wrap justify-between items-center py-4 border-t">
                    <p class="text-sm text-gray-500">&copy; 2025 89K - Corner. All rights reserved.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-500 text-sm hover:text-lime-500">Privacy Policy</a>
                        <a href="#" class="text-gray-500 text-sm hover:text-lime-500">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>