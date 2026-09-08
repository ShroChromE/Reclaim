@extends('layouts.app')

@section('title', 'Reclaim - Lost & Found')

@section('content')

    {{-- NAVBAR --}}
    <header class="w-full border-b border-gray-200">
        <div class="h-[114px] px-10 flex items-center justify-between">

            {{-- LOGO --}}
            <div class="flex items-center gap-4">

                <div class="w-14 h-14 rounded-2xl bg-[#EE6D3A]
                            flex items-center justify-center
                            text-white text-2xl font-bold">
                    R
                </div>

                <div>
                    <h1 class="text-[25px] font-bold leading-tight">
                        RECLAIM
                    </h1>

                    <p class="text-[13px] text-gray-500">
                        Lost & Found - Sekolah
                    </p>
                </div>

            </div>


            {{-- NAVIGATION --}}
            <nav class="w-[532px] h-[60px] bg-[#EFF8F1]
                       rounded-[15px]
                       flex items-center justify-around px-3">

                <a href="{{ route('homepage') }}"
                   class="px-7 py-5 rounded-xl
                          text-[15px] font-semibold text-gray-900">
                    Cari Barang
                </a>

                <a href="#"
                   class="px-7 py-5 rounded-xl
                          text-[15px] font-semibold text-gray-500
                          hover:text-gray-900 transition">
                    Laporan Hilang
                </a>

                <a href="#"
                   class="px-7 py-5 rounded-xl
                          text-[15px] font-semibold text-gray-500
                          hover:text-gray-900 transition">
                    Laporan Ditemukan
                </a>

            </nav>


            {{-- LOGIN / REGISTER --}}
            <div class="flex items-center gap-3">

                <a href="#"
                   class="h-[60px] px-6
                          rounded-xl border border-gray-300
                          flex items-center justify-center
                          text-[15px] font-semibold
                          hover:bg-gray-50 transition">
                    Masuk
                </a>

                <a href="#"
                   class="h-[60px] px-6
                          rounded-xl bg-[#EE6D3A]
                          text-white
                          flex items-center justify-center
                          text-[15px] font-semibold
                          hover:bg-[#DD5F30] transition">
                    Daftar
                </a>

            </div>

        </div>
    </header>


    {{-- HERO --}}
    <main>

        <section class="max-w-[1910px] min-h-[760px]
                        mx-auto
                        grid grid-cols-2
                        items-center
                        gap-[55px]
                        px-[25px]
                        py-[100px]">


            {{-- HERO LEFT --}}
            <div class="pl-5">

                <h2 class="text-[54px]
                           leading-[1.15]
                           tracking-[-1.5px]
                           font-bold
                           max-w-[700px]">

                    Kehilangan barang?
                    <br>

                    Jangan cuma
                    <span class="text-[#E96B38]">
                        berharap.
                    </span>

                </h2>


                <p class="mt-[35px]
                          max-w-[650px]
                          text-[25px]
                          leading-[1.25]
                          text-[#7C827F]">

                    Reclaim mengumpulkan semua laporan barang
                    hilang dan temuan di satu papan, supaya barangmu
                    lebih cepat balik ke tangan yang benar —
                    tanpa mading, tanpa nebak-nebak grup chat mana.

                </p>


                {{-- BUTTON --}}
                <div class="flex items-center gap-[60px] mt-[55px]">

                    <a href="#"
                        class="w-[255px] h-[92px]
                        rounded-[24px]
                        bg-[#ED6D3B]
                        border border-gray-500
                      text-white
                        flex items-center justify-center
                        text-[20px] font-bold
                      hover:bg-[#DF6030]
                        transition">    
                        Lapor barang hilang
                    </a>


                    <a href="#"
                       class="w-[255px] h-[92px]
                              rounded-[24px]
                              bg-white
                              border border-gray-500
                              text-[#ED6D3B]
                              flex items-center justify-center
                              text-[20px] font-bold
                              hover:bg-gray-50
                              transition">

                        Lapor barang Temuan

                    </a>

                </div>

            </div>


            {{-- PAPAN RECLAIM --}}
            <div class="w-full max-w-[710px]
                        min-h-[390px]
                        bg-[#F1FAF3]
                        rounded-[25px]
                        px-[60px]
                        py-[48px]">

                {{-- HEADER CARD --}}
                <div class="flex items-center justify-between mb-[45px]">

                    <h3 class="text-[25px]
                               font-bold
                               text-[#777E7A]">

                        PAPAN RECLAIM

                    </h3>

                    <span class="text-[23px]
                                 font-bold
                                 text-[#777E7A]">

                        {{ $totalEntries }} ENTRI

                    </span>

                </div>


                {{-- STATISTICS --}}
                <div class="w-full">

                    {{-- HILANG --}}
                    <div class="h-[70px]
                                flex items-center justify-between
                                border-b border-[#ED6D3B]">

                        <span class="text-[21px]
                                     font-medium
                                     text-[#ED6D3B]">

                            Hilang

                        </span>

                        <span class="text-[30px]
                                     font-medium
                                     text-gray-900
                                     pr-[25px]">

                            {{ $lostItems }}

                        </span>

                    </div>


                    {{-- DITEMUKAN --}}
                    <div class="h-[70px]
                                flex items-center justify-between
                                border-b border-[#ED6D3B]">

                        <span class="text-[21px]
                                     font-medium
                                     text-[#ED6D3B]">

                            Ditemukan

                        </span>

                        <span class="text-[30px]
                                     font-medium
                                     text-gray-900
                                     pr-[25px]">

                            {{ $foundItems }}

                        </span>

                    </div>


                    {{-- DIKEMBALIKAN --}}
                    <div class="h-[70px]
                                flex items-center justify-between">

                        <span class="text-[21px]
                                     font-medium
                                     text-[#ED6D3B]">

                            Sudah Dikembalikan

                        </span>

                        <span class="text-[30px]
                                     font-medium
                                     text-gray-900
                                     pr-[25px]">

                            {{ $returnedItems }}

                        </span>

                    </div>

                </div>

            </div>

        </section>

    </main>


    {{-- FOOTER --}}
    <footer class="text-center
                   text-[#68736E]
                   text-[24px]
                   px-5
                   pt-[70px]
                   pb-[45px]">

        Reclaim — dibuat untuk membantu barang kembali ke pemiliknya.

    </footer>

@endsection