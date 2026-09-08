@extends('layouts.app')

@section('title', 'Detail Barang - Reclaim')

@section('content')

<div class="min-h-screen bg-white">

    {{-- =========================
         TOP NAVBAR
    ========================== --}}

    <x-navbar />


    {{-- =========================
         CONTENT
    ========================== --}}

    <div class="flex">


        {{-- =========================
             SIDEBAR
        ========================== --}}

        <aside class="w-[276px]
                      min-h-[calc(100vh-114px)]
                      bg-[#202324]
                      text-white
                      px-2
                      py-6
                      flex-shrink-0">

            {{-- SIDEBAR LOGO --}}
            <div class="px-5 mb-8">

                <h2 class="text-[22px] font-bold">
                    RECLAIM
                </h2>

                <p class="text-[11px]
                          text-gray-400
                          font-semibold">
                    LOST & FOUND
                </p>

            </div>


            {{-- MENU --}}

            <div class="space-y-2">


                {{-- LOST & FOUND --}}
                <a href="#"
                   class="block px-10 py-3
                          rounded-xl
                          hover:bg-[#303435]
                          transition">

                    <p class="text-[15px] font-semibold">
                        Lost & Found
                    </p>

                    <p class="text-[11px] text-gray-400">
                        List barang yang hilang & ditemukan
                    </p>

                </a>


                {{-- MANAGE ITEMS --}}
                <a href="#"
                   class="block px-10 py-3
                          rounded-xl
                          bg-[#303435]">

                    <p class="text-[15px] font-semibold">
                        Manage Items & Claims
                    </p>

                    <p class="text-[11px] text-gray-400">
                        Kelola barang & klaim masuk
                    </p>

                </a>


                {{-- ADMIN DASHBOARD --}}
                <a href="#"
                   class="block px-10 py-3
                          rounded-xl
                          hover:bg-[#303435]
                          transition">

                    <p class="text-[15px] font-semibold">
                        Admin Dashboard
                    </p>

                    <p class="text-[11px] text-gray-400">
                        Dashboard untuk admin
                    </p>

                </a>


                {{-- MY REPORTS --}}
                <a href="#"
                   class="block px-10 py-3
                          rounded-xl
                          hover:bg-[#303435]
                          transition">

                    <p class="text-[15px] font-semibold">
                        My Reports & Claims
                    </p>

                    <p class="text-[11px] text-gray-400">
                        Laporan & klaim saya
                    </p>

                </a>


                {{-- REPORT ITEM --}}
                <a href="#"
                   class="block px-10 py-3
                          rounded-xl
                          hover:bg-[#303435]
                          transition">

                    <p class="text-[15px] font-semibold">
                        Report Item
                    </p>

                    <p class="text-[11px] text-gray-400">
                        Laporkan barang hilang / ditemukan
                    </p>

                </a>


                {{-- DASHBOARD --}}
                <a href="#"
                   class="block px-10 py-3
                          rounded-xl
                          hover:bg-[#303435]
                          transition">

                    <p class="text-[15px] font-semibold">
                        Dashboard
                    </p>

                    <p class="text-[11px] text-gray-400">
                        Dashboard umum
                    </p>

                </a>


                {{-- DETAIL BARANG --}}
                <a href="#"
                   class="block px-10 py-3
                          rounded-xl
                          hover:bg-[#303435]
                          transition">

                    <p class="text-[15px] font-semibold">
                        Detail Barang
                    </p>

                    <p class="text-[11px] text-gray-400">
                        Lihat detail informasi barang
                    </p>

                </a>


                {{-- REGISTER --}}
                <a href="#"
                   class="block px-10 py-3
                          rounded-xl
                          hover:bg-[#303435]
                          transition">

                    <p class="text-[15px] font-semibold">
                        Register
                    </p>

                    <p class="text-[11px] text-gray-400">
                        Buat akun baru
                    </p>

                </a>


                {{-- LOGIN --}}
                <a href="#"
                   class="block px-10 py-3
                          rounded-xl
                          hover:bg-[#303435]
                          transition">

                    <p class="text-[15px] font-semibold">
                        Login
                    </p>

                    <p class="text-[11px] text-gray-400">
                        Masuk ke akun
                    </p>

                </a>

            </div>

        </aside>


        {{-- =========================
             MAIN CONTENT
        ========================== --}}

        <main class="flex-1
                     min-h-[calc(100vh-114px)]
                     px-[80px]
                     py-[142px]">

            <div class="max-w-[1065px]
                        mx-auto
                        grid grid-cols-2
                        gap-[40px]">


                {{-- =========================
                     FOTO BARANG
                ========================== --}}

                <div class="h-[572px]
                            bg-[#EFF9F1]
                            rounded-[20px]
                            p-[30px]">

                    <div class="w-full
                                h-[307px]
                                bg-white
                                rounded-[15px]
                                flex items-center
                                justify-center">

                        <span class="text-[15px]
                                     font-semibold
                                     text-gray-500">

                            FOTO BARANG

                        </span>

                    </div>

                </div>


                {{-- =========================
                     DETAIL BARANG
                ========================== --}}

                <div class="h-[572px]
                            border border-gray-300
                            rounded-[20px]
                            px-[40px]
                            py-[40px]
                            flex flex-col">


                    {{-- TITLE --}}
                    <div>

                        <h2 class="text-[28px]
                                   font-bold
                                   text-gray-900">

                            {{ $item->name }}

                        </h2>

                        <p class="mt-3
                                  text-[14px]
                                  font-semibold
                                  text-[#EE6D3A]">

                            {{ $item->status }}

                        </p>

                    </div>


                    {{-- INFORMATION --}}
                    <div class="mt-[40px]
                                space-y-[28px]">


                        {{-- KATEGORI --}}
                        <div class="grid grid-cols-[1fr_1.2fr]
                                    items-center">

                            <span class="text-[13px]
                                         text-gray-500">

                                Kategori

                            </span>

                            <span class="text-[13px]
                                         font-semibold
                                         text-gray-900">

                                {{ $item->category }}

                            </span>

                        </div>


                        {{-- LOKASI --}}
                        <div class="grid grid-cols-[1fr_1.2fr]
                                    items-center">

                            <span class="text-[13px]
                                         text-gray-500">

                                Lokasi

                            </span>

                            <span class="text-[13px]
                                         font-semibold
                                         text-gray-900">

                                {{ $item->location }}

                            </span>

                        </div>


                        {{-- TANGGAL --}}
                        <div class="grid grid-cols-[1fr_1.2fr]
                                    items-center">

                            <span class="text-[13px]
                                         text-gray-500">

                                Tanggal

                            </span>

                            <span class="text-[13px]
                                         font-semibold
                                         text-gray-900">

                                {{ $item->date }}

                            </span>

                        </div>


                        {{-- WAKTU --}}
                        <div class="grid grid-cols-[1fr_1.2fr]
                                    items-center">

                            <span class="text-[13px]
                                         text-gray-500">

                                Waktu

                            </span>

                            <span class="text-[13px]
                                         font-semibold
                                         text-gray-900">

                                {{ $item->time }}

                            </span>

                        </div>


                        {{-- PELAPOR --}}
                        <div class="grid grid-cols-[1fr_1.2fr]
                                    items-center">

                            <span class="text-[13px]
                                         text-gray-500">

                                Pelapor

                            </span>

                            <span class="text-[13px]
                                         font-semibold
                                         text-gray-900">

                                {{ $item->reporter }}

                            </span>

                        </div>

                    </div>


                    {{-- CONTACT BUTTON --}}
                    <div class="mt-auto">

                        <button
                            class="w-full
                                   h-[55px]
                                   rounded-[10px]
                                   bg-[#EE6D3A]
                                   text-white
                                   text-[14px]
                                   font-bold
                                   hover:bg-[#DD5F30]
                                   transition">

                            Hubungi Pelapor

                        </button>

                    </div>

                </div>

            </div>

        </main>

    </div>

</div>

@endsection