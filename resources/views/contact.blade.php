
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
    
        <div class="relative pt-36 bg-cover bg-center" style="background-image: url('{{ asset('images/about/depan3.jpg') }}');">
            <div class="container mx-auto px-4 relative">
                <div class="max-w-lg xl:max-w-xl mx-auto mb-12 lg:mb-0 text-center">
                    <h1 class="font-heading text-white text-4xl xs:text-6xl xl:text-7xl tracking-tight mb-8 font-extrabold">
                        Contact Us
                    </h1> 

                    <div class="container mx-auto px-4 py-12">
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                            <div class="w-full shadow-lg rounded-xl text-center">
                                <div class="h-full py-10 px-5 xs:px-10 bg-white rounded-2xl shadow-md">
                                    <div class="flex items-center justify-start mb-4">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="w-12 h-12">
                                        <span class="block md:ml-4 ml-2  text-base lg:text-xl font-medium">Hubungi via WhatsApp</span>
                                    </div>
                                    <p class="text-gray-700 text-left mb-4">Klik tombol di bawah untuk chat langsung via WhatsApp.</p>
                                    <a target="_blank" href="https://wa.me/6281330390247" class="inline-block w-full mt-4 px-6 py-2 bg-teal-900 text-white rounded-full hover:bg-teal-700 transition">Chat WhatsApp</a>
                                </div>
                            </div>

                            <!-- <div class="w-full shadow-lg rounded-xl text-center">
                                <div class="h-full py-10 px-5 xs:px-10 bg-white rounded-2xl shadow-md">
                                    <div class="flex items-center justify-start mb-4">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Gmail_Icon.png" alt="Email" class="w-12 h-12">
                                        <span class="block md:ml-4 ml-2  text-base lg:text-xl font-medium text-left">Kirimkan pertanyaan atau permintaan melalui email kami.</span>
                                    </div>
                                    <p class="text-gray-700 text-left mb-4">Klik tombol di bawah untuk chat langsung via WhatsApp.</p>
                                    <a href="mailto:contact@yourwebsite.com" class="inline-block w-full mt-4 px-6 py-2 bg-teal-900 text-white rounded-full hover:bg-teal-700 transition">Kirim Email</a>
                                </div>
                            </div> -->
                        </div>
                    </div>

                </div>
                <div class="flex -mx-4 items-end relative">
                    <div class="w-1/3 xs:w-1/2 lg:w-auto px-4 h-24 lg:h-48"></div>
                    <div class="w-2/3 xs:w-1/2 lg:w-auto ml-auto px-4"><img class="block w-1/2 md:w-64 lg:w-auto ml-auto" src="#" alt=""/></div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-screen py-12 bg-gradient-to-t from-orange-50 to-transparent"></div>
        </div>
    </section>

    <section class="py-12 lg:py-24 bg-orange-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-20">
                <h2 class="font-heading font-bold text-6xl text-[#0c4f4a] mb-6">Let's Find Us</h2>
                <p class="text-lg text-[#0c4f4a] opacity-80">We are committed to a sustainable future</p>
            </div>
            <div class="max-w-md mx-auto lg:max-w-none">
                <div class="flex flex-wrap -mx-4 justify-center">
                    <div class="w-full lg:w-2/3 px-4">
                        <div class="rounded-xl overflow-hidden shadow-lg">
                            <!-- Google Maps Embed -->
                            <iframe 
                              class="w-full h-96 border-0 mt-8" 
                              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3957.406817661946!2d112.7282828!3d-7.3081103!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbea227b7749%3A0xb979637d586b2a91!2sKost%2089K%20Ketintang!5e0!3m2!1sid!2sid!4v1745255117991!5m2!1sid!2sid" 
                              allowfullscreen="" 
                              loading="lazy" 
                              referrerpolicy="no-referrer-when-downgrade">
                          </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="relative py-12 lg:py-24 bg-orange-50 overflow-hidden">
      <img class="absolute bottom-0 left-0" src="quantam-assets/footer/waves-lines-left-bottom.png" alt=""/>
      <div class="container px-4 mx-auto relative">
        <div class="flex flex-wrap mb-16 -mx-4">
          <!-- Logo & Deskripsi -->
          <div class="w-full lg:w-3/12 px-4 mb-8 lg:mb-0">
            <a class="inline-block mb-4" href="#">
              <img src="LOGO_KOS.png" alt="Logo" class="w-32"/>
            </a>
            <p class="text-gray-600 text-sm">Kos putri nyaman strategis dekat kampus Unesa Ketintang dan Telkom Surabaya.</p>
          </div>
          
          <!-- Navigasi Footer -->
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
          
          <!-- Form Kontak -->
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
        
        <!-- Footer Bawah -->
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