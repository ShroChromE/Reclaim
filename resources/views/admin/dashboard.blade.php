@extends('layouts.app')

@section('title', 'Admin Dashboard - Reclaim')

@section('content')

<div class="min-h-screen bg-white flex">

    <x-sidebar />

    <main class="flex-1 min-h-screen px-[3.75rem] py-[3.125rem]">
        <div class="max-w-[100rem] mx-auto">
            <h1 class="text-[2.125rem] font-bold text-gray-900">
                Admin Dashboard
            </h1>
            <p class="mt-2 text-gray-500">
                Ringkasan dan aktivitas sistem Lost & Found.
            </p>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-5">

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="w-10 h-10 rounded-xl bg-[#DFF4E3] mb-4"></div>
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $totalItems }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Total Barang</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Semua barang</p>
                </div>

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="w-10 h-10 rounded-xl bg-[#FCEACB] mb-4"></div>
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $lostReports }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Laporan Hilang</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Perlu ditangani</p>
                </div>

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="w-10 h-10 rounded-xl bg-[#DFF4E3] mb-4"></div>
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $foundItems }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Barang Ditemukan</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Menunggu klaim</p>
                </div>

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="w-10 h-10 rounded-xl bg-[#FBDFDA] mb-4"></div>
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $returnedItems }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Dikembalikan</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Berhasil dikembalikan</p>
                </div>

            </div>

            <div class="mt-10 grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 border border-gray-200 rounded-[0.9375rem] p-6">
                    <h2 class="text-[1.375rem] font-bold text-gray-900 mb-1">Aktivitas Laporan</h2>
                    <p class="text-[0.8125rem] text-gray-500 mb-6">7 Hari Terakhir</p>

                    <div class="flex items-end justify-between gap-4 h-[15rem]">
                        @foreach ($weeklyActivity as $percentage)
                            <div class="flex-1 bg-[#EE6D3A] rounded-t-md" style="--h: {{ $percentage }}%; height: var(--h)"></div>
                        @endforeach
                    </div>
                </div>

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <h2 class="text-[1.375rem] font-bold text-gray-900 mb-6">Status Barang</h2>

                    <div class="space-y-5">
                        @foreach ($statusBarang as $label => $count)
                            <div class="flex items-center justify-between pb-5 border-b border-gray-100 last:border-b-0 last:pb-0">
                                <span class="text-[0.9375rem] font-semibold text-gray-900">{{ $label }}</span>
                                <span class="text-[1.5rem] font-bold text-gray-900">{{ $count }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

@endsection