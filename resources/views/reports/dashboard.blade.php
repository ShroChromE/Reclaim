@extends('layouts.app')

@section('title', 'Dashboard - Reclaim')

@section('content')

<div class="min-h-screen bg-white flex">

    {{-- SIDEBAR --}}
    <x-sidebar />

    {{-- MAIN CONTENT --}}
    <main class="flex-1 min-h-screen px-[3.75rem] py-[3.125rem]">

        <div class="max-w-[100rem] mx-auto">

            {{-- HEADER --}}
            <div>
                <h1 class="text-[2.125rem] font-bold text-gray-900">
                    Dashboard
                </h1>

                <p class="mt-1 text-[0.9375rem] text-gray-500">
                    Ringkasan sistem Lost & Found sekolah.
                </p>
            </div>


            {{-- STATISTICS --}}
            <div class="mt-7 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

                {{-- TOTAL BARANG --}}
                <div class="border border-gray-200 rounded-[0.9375rem] p-5">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-[#DFF4E3]"></div>

                        <div>
                            <p class="text-[1.75rem] leading-none font-bold text-gray-900">
                                28
                            </p>

                            <p class="mt-1 text-[0.875rem] font-semibold text-gray-500">
                                Total Barang
                            </p>
                        </div>

                    </div>

                    <p class="mt-4 text-[0.8125rem] text-gray-500">
                        Semua barang
                    </p>

                </div>


                {{-- HILANG --}}
                <div class="border border-gray-200 rounded-[0.9375rem] p-5">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-[#FCEACB]"></div>

                        <div>
                            <p class="text-[1.75rem] leading-none font-bold text-gray-900">
                                12
                            </p>

                            <p class="mt-1 text-[0.875rem] font-semibold text-gray-500">
                                Hilang
                            </p>
                        </div>

                    </div>

                    <p class="mt-4 text-[0.8125rem] text-gray-500">
                        Laporan barang hilang
                    </p>

                </div>


                {{-- DITEMUKAN --}}
                <div class="border border-gray-200 rounded-[0.9375rem] p-5">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-[#DFF4E3]"></div>

                        <div>
                            <p class="text-[1.75rem] leading-none font-bold text-gray-900">
                                14
                            </p>

                            <p class="mt-1 text-[0.875rem] font-semibold text-gray-500">
                                Ditemukan
                            </p>
                        </div>

                    </div>

                    <p class="mt-4 text-[0.8125rem] text-gray-500">
                        Barang ditemukan
                    </p>

                </div>


                {{-- DIKEMBALIKAN --}}
                <div class="border border-gray-200 rounded-[0.9375rem] p-5">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl bg-[#FDE4DA]"></div>

                        <div>
                            <p class="text-[1.75rem] leading-none font-bold text-gray-900">
                                8
                            </p>

                            <p class="mt-1 text-[0.875rem] font-semibold text-gray-500">
                                Dikembalikan
                            </p>
                        </div>

                    </div>

                    <p class="mt-4 text-[0.8125rem] text-gray-500">
                        Sudah kembali
                    </p>

                </div>

            </div>


            {{-- LOWER CONTENT --}}
            <div class="mt-12 grid grid-cols-1 xl:grid-cols-5 gap-10">

                {{-- KATEGORI TERBANYAK --}}
                <div class="xl:col-span-3">

                    <h2 class="text-[1.25rem] font-bold text-gray-900">
                        Kategori Terbanyak
                    </h2>

                    <div class="mt-4 border border-gray-200 rounded-[0.9375rem] p-7">

                        <div class="space-y-7">

                            {{-- TAS --}}
                            <div class="flex items-center gap-5">

                                <div class="w-16">
                                    <p class="text-[0.875rem] font-semibold text-gray-900">
                                        Tas
                                    </p>
                                </div>

                                <div class="flex-1">
                                    <div class="h-3 rounded-full bg-gray-100 overflow-hidden">
                                        <div
                                            class="h-full rounded-full bg-[#DFF4E3]"
                                            style="width: 100%;">
                                        </div>
                                    </div>
                                </div>

                                <p class="w-5 text-right text-[0.8125rem] text-gray-500">
                                    9
                                </p>

                            </div>


                            {{-- DOMPET --}}
                            <div class="flex items-center gap-5">

                                <div class="w-16">
                                    <p class="text-[0.875rem] font-semibold text-gray-900">
                                        Dompet
                                    </p>
                                </div>

                                <div class="flex-1">
                                    <div class="h-3 rounded-full bg-gray-100 overflow-hidden">
                                        <div
                                            class="h-full rounded-full bg-[#DFF4E3]"
                                            style="width: 67%;">
                                        </div>
                                    </div>
                                </div>

                                <p class="w-5 text-right text-[0.8125rem] text-gray-500">
                                    6
                                </p>

                            </div>


                            {{-- BOTOL MINUM --}}
                            <div class="flex items-center gap-5">

                                <div class="w-16">
                                    <p class="text-[0.875rem] font-semibold text-gray-900">
                                        Botol Minum
                                    </p>
                                </div>

                                <div class="flex-1">
                                    <div class="h-3 rounded-full bg-gray-100 overflow-hidden">
                                        <div
                                            class="h-full rounded-full bg-[#DFF4E3]"
                                            style="width: 56%;">
                                        </div>
                                    </div>
                                </div>

                                <p class="w-5 text-right text-[0.8125rem] text-gray-500">
                                    5
                                </p>

                            </div>


                            {{-- HP --}}
                            <div class="flex items-center gap-5">

                                <div class="w-16">
                                    <p class="text-[0.875rem] font-semibold text-gray-900">
                                        HP
                                    </p>
                                </div>

                                <div class="flex-1">
                                    <div class="h-3 rounded-full bg-gray-100 overflow-hidden">
                                        <div
                                            class="h-full rounded-full bg-[#DFF4E3]"
                                            style="width: 44%;">
                                        </div>
                                    </div>
                                </div>

                                <p class="w-5 text-right text-[0.8125rem] text-gray-500">
                                    4
                                </p>

                            </div>


                            {{-- BUKU --}}
                            <div class="flex items-center gap-5">

                                <div class="w-16">
                                    <p class="text-[0.875rem] font-semibold text-gray-900">
                                        Buku
                                    </p>
                                </div>

                                <div class="flex-1">
                                    <div class="h-3 rounded-full bg-gray-100 overflow-hidden">
                                        <div
                                            class="h-full rounded-full bg-[#DFF4E3]"
                                            style="width: 33%;">
                                        </div>
                                    </div>
                                </div>

                                <p class="w-5 text-right text-[0.8125rem] text-gray-500">
                                    3
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- BARANG TERBARU --}}
                <div class="xl:col-span-2">

                    <h2 class="text-[1.25rem] font-bold text-gray-900">
                        Barang Terbaru
                    </h2>

                    <div class="mt-4 border border-gray-200 rounded-[0.9375rem] overflow-hidden">

                        {{-- HEADER TABLE --}}
                        <div class="grid grid-cols-3 px-5 py-4 border-b border-gray-200">

                            <p class="text-[0.75rem] font-semibold text-gray-500">
                                Barang
                            </p>

                            <p class="text-[0.75rem] font-semibold text-gray-500">
                                Status
                            </p>

                            <p class="text-[0.75rem] font-semibold text-gray-500">
                                Tanggal
                            </p>

                        </div>


                        {{-- ITEM 1 --}}
                        <div class="grid grid-cols-3 px-5 py-6 border-b border-gray-200">

                            <p class="text-[0.8125rem] font-bold text-gray-900">
                                Dompet Hitam
                            </p>

                            <p class="text-[0.8125rem] font-semibold text-gray-900">
                                Hilang
                            </p>

                            <p class="text-[0.8125rem] font-semibold text-gray-900">
                                18 Mei
                            </p>

                        </div>


                        {{-- ITEM 2 --}}
                        <div class="grid grid-cols-3 px-5 py-6 border-b border-gray-200">

                            <p class="text-[0.8125rem] font-bold text-gray-900">
                                Botol Minum
                            </p>

                            <p class="text-[0.8125rem] font-semibold text-gray-900">
                                Ditemukan
                            </p>

                            <p class="text-[0.8125rem] font-semibold text-gray-900">
                                17 Mei
                            </p>

                        </div>


                        {{-- ITEM 3 --}}
                        <div class="grid grid-cols-3 px-5 py-6">

                            <p class="text-[0.8125rem] font-bold text-gray-900">
                                Tas Ransel
                            </p>

                            <p class="text-[0.8125rem] font-semibold text-gray-900">
                                Hilang
                            </p>

                            <p class="text-[0.8125rem] font-semibold text-gray-900">
                                16 Mei
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

@endsection