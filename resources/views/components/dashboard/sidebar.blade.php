<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto" style="background-color: #20750b
    ;">


        <div class="bg-white p-2 rounded-lg flex justify-center items-center">
            <div class="text-2xl text-slate-700">
                <img src="{{ asset('images/logo1.png') }}" alt="" class="w-40 ">
            </div>
        </div>
        <ul class="space-y-2 font-medium mt-3">
            {{-- <x-dashboard.menulink path="/dashboard" title="Dashboard"><svg xmlns="http://www.w3.org/2000/svg"
                    class="group-hover:stroke-black stroke-white" viewBox="-0.5 -0.5 16 16" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" id="Layout-Grid-Remove--Streamline-Tabler"
                    height="20" width="20">
                    <desc>Layout Grid Remove Streamline Icon: https://streamlinehq.com</desc>
                    <path
                        d="M2.5 3.125a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625H3.125a0.625 0.625 0 0 1 -0.625 -0.625V3.125z"
                        stroke-width="1"></path>
                    <path
                        d="M8.75 3.125a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625h-2.5a0.625 0.625 0 0 1 -0.625 -0.625V3.125z"
                        stroke-width="1"></path>
                    <path
                        d="M2.5 9.375a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625H3.125a0.625 0.625 0 0 1 -0.625 -0.625v-2.5z"
                        stroke-width="1"></path>
                    <path d="M8.75 10.625h3.75" stroke-width="1"></path>
                </svg></x-dashboard.menulink> --}}
            <x-dashboard.menulink path="{{ route('dashboard.products') }}" title="Produk">
                <svg class="group-hover:stroke-black stroke-white" xmlns="http://www.w3.org/2000/svg"
                    viewBox="-0.5 -0.5 16 16" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    id="List-Details--Streamline-Tabler" height="20" width="20">
                    <desc>List Details Streamline Icon: https://streamlinehq.com</desc>
                    <path d="M8.125 3.125h5" stroke-width="1"></path>
                    <path d="M8.125 5.625h3.125" stroke-width="1"></path>
                    <path d="M8.125 9.375h5" stroke-width="1"></path>
                    <path d="M8.125 11.875h3.125" stroke-width="1"></path>
                    <path
                        d="M1.875 3.125a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625H2.5a0.625 0.625 0 0 1 -0.625 -0.625z"
                        stroke-width="1"></path>
                    <path
                        d="M1.875 9.375a0.625 0.625 0 0 1 0.625 -0.625h2.5a0.625 0.625 0 0 1 0.625 0.625v2.5a0.625 0.625 0 0 1 -0.625 0.625H2.5a0.625 0.625 0 0 1 -0.625 -0.625z"
                        stroke-width="1"></path>
                </svg>
            </x-dashboard.menulink>
            <x-dashboard.menulink path="{{ route('dashboard.kategori.index') }}" title="Kategori"><svg
                    class="group-hover:stroke-black stroke-white" xmlns="http://www.w3.org/2000/svg"
                    viewBox="-0.5 -0.5 16 16" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    id="Table-Column--Streamline-Tabler" height="20" width="20">
                    <desc>Table Column Streamline Icon: https://streamlinehq.com</desc>
                    <path
                        d="M1.875 3.125a1.25 1.25 0 0 1 1.25 -1.25h8.75a1.25 1.25 0 0 1 1.25 1.25v8.75a1.25 1.25 0 0 1 -1.25 1.25H3.125a1.25 1.25 0 0 1 -1.25 -1.25V3.125z"
                        stroke-width="1"></path>
                    <path d="M6.25 6.25h6.875" stroke-width="1"></path>
                    <path d="M6.25 1.875v11.25" stroke-width="1"></path>
                    <path d="M5.625 1.875 1.875 5.625" stroke-width="1"></path>
                    <path d="m6.25 4.375 -4.375 4.375" stroke-width="1"></path>
                    <path d="m6.25 7.5 -4.375 4.375" stroke-width="1"></path>
                    <path d="m6.25 10.625 -2.5 2.5" stroke-width="1"></path>
                </svg></x-dashboard.menulink>



            <x-dashboard.menulink path="{{ route('transaksi.showAll') }}" title="Transaksi">
                <svg class="group-hover:stroke-black stroke-white" xmlns="http://www.w3.org/2000/svg"
                    viewBox="-0.5 -0.5 16 16" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    id="Devices-Dollar--Streamline-Tabler" height="20" width="20">
                    <desc>Devices Dollar Streamline Icon: https://streamlinehq.com</desc>
                    <path
                        d="M8.125 11.875V5.625a0.625 0.625 0 0 1 0.625 -0.625h3.75a0.625 0.625 0 0 1 0.625 0.625v0.9375"
                        stroke-width="1"></path>
                    <path
                        d="M11.25 5V3.125a0.625 0.625 0 0 0 -0.625 -0.625H2.5a0.625 0.625 0 0 0 -0.625 0.625v7.5a0.625 0.625 0 0 0 0.625 0.625h5.625"
                        stroke-width="1"></path>
                    <path d="M10 5.625h1.25" stroke-width="1"></path>
                    <path d="M13.125 9.375h-1.5625a0.9375 0.9375 0 0 0 0 1.875h0.625a0.9375 0.9375 0 0 1 0 1.875H10.625"
                        stroke-width="1"></path>
                    <path d="M11.875 13.125v0.625m0 -5v0.625" stroke-width="1"></path>
                </svg>
            </x-dashboard.menulink>
            <x-dashboard.menulink path="{{ route('transaksi.showAllLaporan') }}" title="Laporan"><svg
                    class="group-hover:stroke-black stroke-white" xmlns="http://www.w3.org/2000/svg"
                    viewBox="-0.5 -0.5 16 16" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    id="Table-Column--Streamline-Tabler" height="20" width="20">
                    <desc>Table Column Streamline Icon: https://streamlinehq.com</desc>
                    <path
                        d="M1.875 3.125a1.25 1.25 0 0 1 1.25 -1.25h8.75a1.25 1.25 0 0 1 1.25 1.25v8.75a1.25 1.25 0 0 1 -1.25 1.25H3.125a1.25 1.25 0 0 1 -1.25 -1.25V3.125z"
                        stroke-width="1"></path>
                    <path d="M6.25 6.25h6.875" stroke-width="1"></path>
                    <path d="M6.25 1.875v11.25" stroke-width="1"></path>
                    <path d="M5.625 1.875 1.875 5.625" stroke-width="1"></path>
                    <path d="m6.25 4.375 -4.375 4.375" stroke-width="1"></path>
                    <path d="m6.25 7.5 -4.375 4.375" stroke-width="1"></path>
                    <path d="m6.25 10.625 -2.5 2.5" stroke-width="1"></path>
                </svg>
            </x-dashboard.menulink>
            
            <li>
                <form action="{{ route('logout') }}" method="POST"
                    class="flex items-center p-2  rounded-lg  hover:bg-gray-100 dark:hover:bg-gray-700 group text-slate-50 hover hover:text-slate-900">
                    <svg class="group-hover:stroke-black stroke-white" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 14" id="Login-1--Streamline-Flex" height="20"
                        width="20">
                        <desc>Login 1 Streamline Icon: https://streamlinehq.com</desc>
                        <g id="login-1--arrow-enter-frame-left-login-point-rectangle">
                            <path id="Union" fill-rule="evenodd"
                                d="M2.43686 0.351171C3.36868 0.284845 4.32801 0.250244 5.3075 0.250244c0.97948 0 1.93882 0.034601 2.87063 0.100927C9.41418 0.439153 10.4147 1.37197 10.4743 2.57103c0.0365 0.73374 0.0642 1.48172 0.0824 2.24172l-1.22975 0c0.01097 -0.71519 -0.32018 -1.40211 -0.90503 -1.8381 -0.68139 -0.50795 -1.59084 -0.58863 -2.351 -0.20855 -1.34911 0.67456 -2.61584 1.9413 -3.2904 3.29035 -0.31673 0.63343 -0.31674 1.37902 -0.00003 2.01246 0.67456 1.34916 1.94132 2.61589 3.29043 3.29049 0.76016 0.3801 1.66961 0.2994 2.351 -0.2086 0.58485 -0.436 0.916 -1.1229 0.90503 -1.83805l1.22665 0c-0.0182 0.71705 -0.0448 1.42325 -0.0793 2.11675 -0.0596 1.199 -1.06012 2.1318 -2.29617 2.2198 -0.93181 0.0663 -1.89115 0.1009 -2.87063 0.1009 -0.97949 0 -1.93882 -0.0346 -2.87064 -0.1009 -1.23604 -0.088 -2.236562 -1.0208 -2.296212 -2.2198C0.0696137 10.0016 0.0322266 8.5197 0.0322266 7.00024S0.0696135 3.99893 0.140647 2.57103C0.200298 1.37197 1.20082 0.439153 2.43686 0.351171ZM7.8667 6.06275l0.19534 -1.11102c0.06541 -0.37202 -0.08438 -0.74915 -0.38722 -0.9749 -0.30284 -0.22576 -0.70704 -0.26162 -1.04489 -0.09269 -1.10719 0.5536 -2.17778 1.62419 -2.73138 2.73134 -0.14077 0.28153 -0.14077 0.6129 -0.00002 0.89443 0.55361 1.10724 1.6242 2.17784 2.7314 2.73149 0.33785 0.1689 0.74205 0.133 1.04489 -0.0927 0.30284 -0.22579 0.45263 -0.60292 0.38722 -0.97494L7.8667 8.06275l5.1015 0.00001c0.5523 0.00001 1 -0.44771 1 -0.99999 0 -0.55229 -0.4477 -1 -1 -1.00001l-5.1015 -0.00001Z"
                                clip-rule="evenodd" stroke-width="1"></path>
                        </g>
                    </svg>
                    @csrf
                    <button type="submit" class="w-full text-left ms-3 text-lg ">Logout</button>
                </form>
            </li>
            {{-- <li>
                <a href="{{ $path }}"
                    class="flex items-center p-2  rounded-lg  hover:bg-gray-100 dark:hover:bg-gray-700 group text-slate-50 hover hover:text-slate-900">
                    {{ $slot }}
                    <span class="ms-3 text-lg ">{{ $title }}</span>
                </a>
            </li> --}}





        </ul>

    </div>

</aside>
