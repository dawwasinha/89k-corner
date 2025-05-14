<html lang="en">
<head>
  <title>89K - Corner</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="preconnect" href="https://fonts.gstatic.com"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Readex+Pro:400,500,600,700&amp;subset=latin"/>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&amp;display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="css/tailwind/tailwind.min.css"/>
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('LOGO_KOS.png') }}"/>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js" defer="defer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <meta name="description" content="Kos putri nyaman, strategis, dan murah di Ketintang dekat kampus Unesa dan Telkom Surabaya. Pilihan terbaik untuk mahasiswa dan pekerja.">
  <meta name="keywords" content="kos, kos ketintang, kos unesa, kos murah, kos putri, kos strategis, kos dekat kampus">
  <meta name="author" content="89K - Corner">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="antialiased bg-body text-body font-body">
  <div>
    <div>
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
                          <div class="hidden md:block"><a class="inline-flex py-2.5 px-4 items-center justify-center text-sm font-medium text-teal-900 hover:text-white border border-teal-900 hover:bg-teal-900 rounded-full transition duration-200" href="/login">Login</a></div>
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
          
          <div class="relative pt-36 bg-cover bg-center" style="background-image: url('{{ asset('images/hero2.jpg') }}');">
              <div class="container mx-auto px-4 relative">
                  <div class="max-w-lg xl:max-w-xl mx-auto mb-12 lg:mb-0 text-center">
                      <h1 class="font-heading text-white text-4xl xs:text-6xl xl:text-7xl tracking-tight mb-8 font-extrabold">
                          Kos Strategis, Hidup Lebih Praktis
                      </h1>
                      <p class="text-xl text-white mb-10 capitalize font-extrabold">
                          Kos putri nyaman strategis dekat kampus Unesa Ketintang Dan Telkom Surabaya.
                      </p>

                      <div class="flex flex-col sm:flex-row justify-center"><a class="inline-flex py-4 px-6 mb-3 sm:mb-0 sm:mr-4 items-center justify-center text-lg font-medium text-white hover:text-teal-900 border border-teal-900 hover:border-lime-500 bg-teal-900 hover:bg-lime-500 rounded-full transition duration-200" href="/room">Booking Now</a></div>
                  </div>
                  <div class="flex -mx-4 items-end relative">
                      <div class="w-1/3 xs:w-1/2 lg:w-auto px-4 h-24 lg:h-48"></div>
                      <div class="w-2/3 xs:w-1/2 lg:w-auto ml-auto px-4"><img class="block w-1/2 md:w-64 lg:w-auto ml-auto" src="#" alt=""/></div>
                  </div>
              </div>
              <div class="absolute bottom-0 left-0 w-screen py-12 bg-gradient-to-t from-orange-50 to-transparent"></div>
          </div>

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
    </div>

    <!-- <section class="py-12 lg:py-24 bg-orange-50">
      <div class="container mx-auto px-4">
        <div class="max-w-lg mx-auto lg:max-w-none">
          <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-1/2 px-4 mb-16 lg:mb-0">
              <div class="max-w-lg">
                <p class="text-2xl font-medium mb-20">Our commitment to green energy is paving the way for a cleaner, healthier planet. </p>
                <div>
                  <div class="cursor-pointer text-gray-500" x-data="{ accordion: false }" x-on:click.prevent="accordion = !accordion" :class="{'text-black mb-8': accordion, 'text-gray-500 mb-0': !accordion }">
                    <div class="relative">
                      <div class="inline-block relative">
                        <h4 class="text-5xl">EV charging</h4>
                        <div class="relative transition duration-250" x-ref="container" :style="accordion ? 'width: ' + $refs.container.scrollWidth + 'px' : 'opacity: 0'">
                          <div class="absolute bottom-0 left-0 -mb-6 transform translate-y-1/2 w-full border-b-2 border-gray-100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="relative overflow-hidden h-0 pr-5 mt-12 duration-500" x-ref="container" :style="accordion ? 'height: ' + $refs.container.scrollHeight + 'px' : ''">
                      <p class="text-lg text-gray-600 mb-12">Solar panels convert sunlight into electricity. Photovoltaic (PV) cells on these panels capture the energy from the sun and convert it into electrical power.</p><a class="absolute bottom-0 left-0 inline-block text-lg font-medium text-black hover:text-lime-600" href="#">Learn more</a>
                    </div>
                  </div>
                  <div class="cursor-pointer text-gray-500" x-data="{ accordion: false }" x-on:click.prevent="accordion = !accordion" :class="{'text-black mb-8': accordion, 'text-gray-500 mb-0': !accordion }">
                    <div class="relative">
                      <div class="inline-block relative">
                        <h4 class="text-5xl">Solar Energy</h4>
                        <div class="relative transition duration-250" x-ref="container" :style="accordion ? 'width: ' + $refs.container.scrollWidth + 'px' : 'opacity: 0'">
                          <div class="absolute bottom-0 left-0 -mb-6 transform translate-y-1/2 w-full border-b-2 border-gray-100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="relative overflow-hidden h-0 pr-5 mt-12 duration-500" x-ref="container" :style="accordion ? 'height: ' + $refs.container.scrollHeight + 'px' : ''">
                      <p class="text-lg text-gray-600 mb-12">Solar panels convert sunlight into electricity. Photovoltaic (PV) cells on these panels capture the energy from the sun and convert it into electrical power.</p><a class="absolute bottom-0 left-0 inline-block text-lg font-medium text-black hover:text-lime-600" href="#">Learn more</a>
                    </div>
                  </div>
                  <div class="cursor-pointer text-gray-500" x-data="{ accordion: false }" x-on:click.prevent="accordion = !accordion" :class="{'text-black mb-8': accordion, 'text-gray-500 mb-0': !accordion }">
                    <div class="relative">
                      <div class="inline-block relative">
                        <h4 class="text-5xl">Wind Energy</h4>
                        <div class="relative transition duration-250" x-ref="container" :style="accordion ? 'width: ' + $refs.container.scrollWidth + 'px' : 'opacity: 0'">
                          <div class="absolute bottom-0 left-0 -mb-6 transform translate-y-1/2 w-full border-b-2 border-gray-100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="relative overflow-hidden h-0 pr-5 mt-12 duration-500" x-ref="container" :style="accordion ? 'height: ' + $refs.container.scrollHeight + 'px' : ''">
                      <p class="text-lg text-gray-600 mb-12">Solar panels convert sunlight into electricity. Photovoltaic (PV) cells on these panels capture the energy from the sun and convert it into electrical power.</p><a class="absolute bottom-0 left-0 inline-block text-lg font-medium text-black hover:text-lime-600" href="#">Learn more</a>
                    </div>
                  </div>
                  <div class="cursor-pointer text-gray-500" x-data="{ accordion: false }" x-on:click.prevent="accordion = !accordion" :class="{'text-black mb-8': accordion, 'text-gray-500 mb-0': !accordion }">
                    <div class="relative">
                      <div class="inline-block relative">
                        <h4 class="text-5xl">Hydropower</h4>
                        <div class="relative transition duration-250" x-ref="container" :style="accordion ? 'width: ' + $refs.container.scrollWidth + 'px' : 'opacity: 0'">
                          <div class="absolute bottom-0 left-0 -mb-6 transform translate-y-1/2 w-full border-b-2 border-gray-100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="relative overflow-hidden h-0 pr-5 mt-12 duration-500" x-ref="container" :style="accordion ? 'height: ' + $refs.container.scrollHeight + 'px' : ''">
                      <p class="text-lg text-gray-600 mb-12">Solar panels convert sunlight into electricity. Photovoltaic (PV) cells on these panels capture the energy from the sun and convert it into electrical power.</p><a class="absolute bottom-0 left-0 inline-block text-lg font-medium text-black hover:text-lime-600" href="#">Learn more</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full lg:w-1/2 px-4"><img class="block w-full lg:max-w-md h-full lg:ml-auto" src="quantam-assets/features/image-right.png" alt=""/></div>
          </div>
        </div>
      </div>
    </section> -->

    <section class="py-12 lg:py-24 bg-orange-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-20">
          <h2 class="font-heading font-bold text-6xl text-[#0c4f4a] mb-6">Our Advantages</h2>
          <p class="text-lg text-[#0c4f4a] opacity-80">We are committed to a sustainable future</p>
        </div>
        <div class="max-w-md mx-auto lg:max-w-none">
          <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-1/3 px-4 mb-8 lg:mb-0">
              <div class="h-full py-10 px-5 xs:px-10 bg-white rounded-2xl shadow-md">
                  <div class="flex items-center justify-start mb-8">
                      <svg width="48" height="48" viewbox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#BEF264"></path>
                          <path d="M24 10.6667C20.6863 10.6667 18 13.353 18 16.6667C18 19.9805 20.6863 22.6667 24 22.6667C27.3137 22.6667 30 19.9805 30 16.6667C30 13.353 27.3137 10.6667 24 10.6667Z" fill="#022C22"></path>
                          <path d="M24 24.0001C17.6563 24.0001 13.2222 28.6949 12.6725 34.542C12.6374 34.9156 12.7613 35.2868 13.014 35.5644C13.2667 35.8419 13.6246 36.0001 14 36.0001H34C34.3753 36.0001 34.7332 35.8419 34.9859 35.5644C35.2386 35.2868 35.3626 34.9156 35.3274 34.542C34.7778 28.6949 30.3437 24.0001 24 24.0001Z" fill="#022C22"></path>
                      </svg>
                      <span class="block ml-4 text-base lg:text-xl font-medium">Akses Mudah</span>
                  </div>
                <p class="text-gray-700">Berada di dekat pusat kota, kampus, mall, serta fasilitas umum seperti minimarket, dan transportasi umum.</p>
              </div>
            </div>
            <div class="w-full lg:w-1/3 px-4 mb-8 lg:mb-0">
              <div class="h-full py-10 px-5 xs:px-10 bg-white rounded-2xl shadow-md">
                  <div class="flex items-center justify-start mb-8">
                  <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#BEF264"></path>
                      <rect x="10" y="20" width="28" height="18" rx="4" fill="#022C22"/>
                      <path d="M16 20V14C16 9.58172 19.5817 6 24 6C28.4183 6 32 9.58172 32 14V20" stroke="#022C22" stroke-width="4" stroke-linecap="round"/>
                      <circle cx="24" cy="29" r="2" fill="#BEF264"/>
                      <path d="M24 31V34" stroke="#BEF264" stroke-width="4" stroke-linecap="round"/>
                  </svg>

                      <span class="block ml-4 text-base lg:text-xl font-medium">Keamanan Tinggi</span>
                  </div>
                  
                  <p class="text-gray-700">Keamanan 24/7 dengan CCTV dan akses kontrol.</p>
              </div>
            </div>
            <div class="w-full lg:w-1/3 px-4">
              <div class="h-full py-10 px-5 xs:px-10 bg-white rounded-2xl shadow-md">
                  <div class="flex items-center justify-start mb-8">
                      <svg width="48" height="48" viewbox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z" fill="#BEF264"></path>
                          <path d="M13.3333 12C12.597 12 12 12.597 12 13.3333V14.6667C12 20.5577 16.7756 25.3333 22.6667 25.3333V34.6667C22.6667 35.403 23.2636 36 24 36C24.7364 36 25.3333 35.403 25.3333 34.6667V29.3333C31.2244 29.3333 36 24.5577 36 18.6667V17.3333C36 16.597 35.403 16 34.6667 16H33.3333C29.961 16 26.9541 17.565 24.9994 20.0084C23.8183 15.4035 19.6399 12 14.6667 12H13.3333Z" fill="#022C22"></path>
                      </svg>
                      <span class="block ml-4  text-base lg:text-xl font-medium">Lingkungan sehat</span>
                  </div>
                  
                  <p class="text-gray-700">Desain Industrial yang kekinian nyaman dan bersih.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section x-data="{ activeSlide: 1 }" class="py-12 lg:py-24 xl:py-32 bg-teal-900 relative overflow-hidden">
      <img class="absolute top-0 left-0 w-full h-full" src="{{ asset('images/bg-light-lines.png') }}" alt=""/>
      <div class="container mx-auto px-4 relative">
        <div class="flex flex-wrap items-center mb-12 md:mb-20 -mx-4">
          <div class="w-full md:w-1/2 px-4 mb-12 md:mb-0">
            <h1 class="font-heading font-bold text-white text-5xl sm:text-6xl mb-4">Testimonials</h1>
          </div>
          <div class="w-full md:w-1/2 px-4">
            <div class="flex items-center justify-end">
              <!-- Tombol Sebelumnya -->
              <button class="inline-block text-black hover:text-lime-500 mr-1" x-on:click="activeSlide = Math.max(1, activeSlide - 1)">
                <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.5 29.1667L8.33333 20.0001L17.5 10.8334" stroke="currentColor" stroke-width="1.5"></path>
                  <path d="M8.33329 20L31.6666 20" stroke="currentColor" stroke-width="1.5"></path>
                </svg>
              </button>
              <!-- Tombol Selanjutnya -->
              <button class="inline-block text-black hover:text-lime-500" x-on:click="activeSlide = Math.min(2, activeSlide + 1)">
                <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M22.5 10.8333L31.6667 19.9999L22.5 29.1666" stroke="currentColor" stroke-width="1.5"></path>
                  <path d="M31.6666 20H8.33331" stroke="currentColor" stroke-width="1.5"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Wrapper untuk Slide -->
        <div class="overflow-hidden relative">
          <div class="flex transition-transform duration-700 ease-in-out"
            :style="'transform: translateX(-' + (activeSlide - 1) * 100 + '%)'">
            <!-- Slide 1 -->
            <div class="relative flex-shrink-0 w-full sm:w-87 h-full sm:h-112 mr-8 overflow-hidden">
              <div class="absolute bottom-0 left-0 w-full p-4">
                <div class="p-4 bg-white rounded-xl">
                  <span class="block font-medium">Nadya - Telkom University  - S1 Sistem Informasi</span>
                  <span class="text-sm text-gray-700">Aman, nyaman dan bersih juga. Karena hampir tiap hari di sapu dan pel sama penjaga kosannya, termasuk murah untuk kosan putri yg bersih</span>
                </div>
              </div>
              <img class="block w-full h-full object-cover rounded-2xl" src="{{ asset('images/team/nadya.png') }}" alt=""/>
            </div>

            <!-- Slide 2 -->
            <div class="relative flex-shrink-0 w-full sm:w-87 h-full sm:h-112 mr-8 overflow-hidden">
              <div class="absolute bottom-0 left-0 w-full p-4">
                <div class="p-4 bg-white rounded-xl">
                  <span class="block font-medium">Zefanya - Universitas Negeri Surabaya - S1 Ilmu Hukum

                  </span>
                  <span class="text-sm text-gray-700">Menurutku udah enak banget si di kost 89K. Dengan harga yang menurutku termasuk murah untuk kost di dekat kampus dibandingkan dengan kost yang lain
                </div>
              </div>
              <img class="block w-full h-full object-cover rounded-2xl" src="{{ asset('images/team/zefanya.png') }}" alt=""/>
            </div>

            <div class="relative flex-shrink-0 w-full sm:w-87 h-full sm:h-112 mr-8 overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full p-4">
              <div class="p-4 bg-white rounded-xl"><span class="block font-medium">Salsabilla - Universitas Negeri Surabaya - D4 Manajemen Informatika</span>                                  <span class="text-sm text-gray-700">Menurutku nyaman dan bersih apalagi lokasi dekat dengan kampus terbilang murah dibandingkan dengan kos yang lain dengan fasilitas dan kenyamanan yang diberikan.</span></div>
            </div><img class="block w-full h-full object-cover rounded-2xl" src="{{ asset('images/team/salsa.png') }}" alt=""/>
          </div>
          <div class="relative flex-shrink-0 w-full sm:w-87 h-full sm:h-112 mr-8 overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full p-4">
              <div class="p-4 bg-white rounded-xl"><span class="block font-medium">Kayla - Universitas Negeri Surabaya - S1 Pendidikan Tata Rias</span>                                  <span class="text-sm text-gray-700">Merasa nyaman karena tempatnya bersih, semua kebutuhan alat disediakan
dan harganya murah dengan fasilitas yang lengkap dan kamar sebagus itu
</span></div>
            </div><img class="block w-full h-full object-cover rounded-2xl" src="{{ asset('images/team/kayla.png') }}" alt=""/>
          </div>
          <div class="relative flex-shrink-0 w-full sm:w-87 h-full sm:h-112 mr-8 overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full p-4">
              <div class="p-4 bg-white rounded-xl"><span class="block font-medium">Syahra - Universitas Negeri Surabaya - S1 Pendidikan Teknologi Informasi</span>                                  
              <span class="text-sm text-gray-700">Saya sangat puas tinggal di Kost 89K, tempatnya nyaman, bersih, dan aman karena ada CCTV. Dapurnya juga bersih dan rapi ada ibu penjaga yang selalu rutin membersihkan area kost. Kost ini juga aesthetic banget, bikin betah!</span></div>
            </div><img class="block w-full h-full object-cover rounded-2xl" src="{{ asset('images/team/syahra.png') }}" alt=""/>
          </div>
          <!-- <div class="relative flex-shrink-0 w-full sm:w-87 h-full sm:h-112 mr-8 overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full p-4">
              <div class="p-4 bg-white rounded-xl"><span class="block font-medium">Jenny Wilson</span>                                  
              <span class="text-sm text-gray-700">Senior Sustainability Consultant</span></div>
            </div><img class="block w-full h-full object-cover rounded-2xl" src="{{ asset('images/team/photo-worker-1.png') }}" alt=""/>
          </div>
          <div class="relative flex-shrink-0 w-full sm:w-87 h-full sm:h-112 mr-8 overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full p-4">
              <div class="p-4 bg-white rounded-xl"><span class="block font-medium">Cameron Williamson</span>                                  
              <span class="text-sm text-gray-700">Senior Sustainability Consultant</span></div>
            </div><img class="block w-full h-full object-cover rounded-2xl" src="{{ asset('images/team/photo-worker-2.png') }}" alt=""/>
          </div>
          <div class="relative flex-shrink-0 w-full sm:w-87 h-full sm:h-112 mr-8 overflow-hidden">
            <div class="absolute bottom-0 left-0 w-full p-4">
              <div class="p-4 bg-white rounded-xl"><span class="block font-medium">Courtney Henry</span>                                  
              <span class="text-sm text-gray-700">Energy Analysts</span></div>
            </div><img class="block w-full h-full object-cover rounded-2xl" src="{{ asset('images/team/photo-worker-3.png') }}" alt=""/>
          </div> -->
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

  </div>
</body>
</html>