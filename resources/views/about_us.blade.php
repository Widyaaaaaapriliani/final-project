@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <section class="py-24 relative px-32">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
            <div class="w-full justify-start items-center xl:gap-12 gap-10 grid lg:grid-cols-2 grid-cols-1">
                <div class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex">
                    <div class="w-full flex-col justify-center items-start gap-8 flex">
                        <div class="flex-col justify-start lg:items-start items-center gap-4 flex">
                            <h6 class="text-xl font-bold leading-relaxed" style="color: #20750b;">Tentang Kami</h6>
                            <div class="w-full flex-col justify-start lg:items-start items-center gap-3 flex">
                            <h2 class="text-4xl font-bold font-manrope leading-normal lg:text-start text-center" style="color: #20750b;">
                                    Kisah Kami di Lumbung Pangan
                            </h2>
                                <p class="text-gray-500 text-base font-normal leading-relaxed lg:text-start text-center">
                                    Lumbung Pangan hadir sebagai solusi penyedia pangan berkualitas, mendukung ketahanan pangan
                                    berkelanjutan, dan memberdayakan komunitas petani lokal melalui distribusi yang adil dan
                                    efisien.
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex-col justify-center items-start gap-6 flex">
                            <div class="w-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                    <h4 class="text-2xl font-bold font-manrope leading-9" style="color: #20750b;">10+ Tahun</h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Berkontribusi pada Ketahanan
                                        Pangan</p>
                                </div>
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                    <h4 class="text-2xl font-bold font-manrope leading-9" style="color: #20750b;">500+ Produk</h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Pilihan Pangan Lokal dan Organik</p>
                                </div>
                            </div>
                            <div class="w-full h-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                <div
                                    class="w-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                    <h4 class="text-2xl font-bold font-manrope leading-9" style="color: #20750b;">20+ Mitra Petani</h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Memberdayakan Komunitas Lokal</p>
                                </div>
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                    <h4 class="text-2xl font-bold font-manrope leading-9" style="color: #20750b;">95% Pelanggan Puas</h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Kepercayaan adalah Prioritas Kami</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="w-full lg:justify-start justify-center items-start flex">
                    <div
                        class="sm:w-[564px] w-full sm:h-[646px] h-full sm:bg-gray-100 rounded-3xl sm:border border-gray-200 relative">
                        <img class="sm:mt-5 sm:ml-5 w-full h-full rounded-3xl object-cover"
                            src="images/about.jpg"
                            alt="Lumbung Pangan image" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
