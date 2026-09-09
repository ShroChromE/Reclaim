@extends('layouts.app')

@section('title', 'Detail Barang - Reclaim')

@section('content')

<div class="min-h-screen bg-white flex">
    <x-sidebar />
    <main class="flex-1 min-h-screen flex items-center px-[3.75rem]">
        <div class="w-full max-w-[66.5625rem] mx-auto grid grid-cols-2 gap-[2.5rem]">

            <div class="h-[35.75rem] bg-[#EFF9F1] rounded-[1.25rem] p-[1.875rem]">
                <div class="w-full h-[19.1875rem] bg-white rounded-[0.9375rem] flex items-center justify-center">
                    <span class="text-[0.9375rem] font-semibold text-gray-500">
                        FOTO BARANG
                    </span>
                </div>
            </div>

            <div class="h-[35.75rem] border border-gray-300 rounded-[1.25rem] px-[2.5rem] py-[2.5rem] flex flex-col">
                <div>
                    <h2 class="text-[1.75rem] font-bold text-gray-900">
                        {{ $item->name }}
                    </h2>
                    <p class="mt-3 text-[0.875rem] font-semibold text-[#EE6D3A]">
                        {{ $item->status }}
                    </p>
                </div>
                <div class="mt-[2.5rem] space-y-[1.75rem]">
                    <div class="grid grid-cols-[1fr_1.2fr] items-center">
                        <span class="text-[0.8125rem] text-gray-500">Kategori</span>
                        <span class="text-[0.8125rem] font-semibold text-gray-900">{{ $item->category }}</span>
                    </div>
                    <div class="grid grid-cols-[1fr_1.2fr] items-center">
                        <span class="text-[0.8125rem] text-gray-500">Lokasi</span>
                        <span class="text-[0.8125rem] font-semibold text-gray-900">{{ $item->location }}</span>
                    </div>
                    <div class="grid grid-cols-[1fr_1.2fr] items-center">
                        <span class="text-[0.8125rem] text-gray-500">Tanggal</span>
                        <span class="text-[0.8125rem] font-semibold text-gray-900">{{ $item->date }}</span>
                    </div>
                    <div class="grid grid-cols-[1fr_1.2fr] items-center">
                        <span class="text-[0.8125rem] text-gray-500">Waktu</span>
                        <span class="text-[0.8125rem] font-semibold text-gray-900">{{ $item->time }}</span>
                    </div>
                    <div class="grid grid-cols-[1fr_1.2fr] items-center">
                        <span class="text-[0.8125rem] text-gray-500">Pelapor</span>
                        <span class="text-[0.8125rem] font-semibold text-gray-900">{{ $item->reporter }}</span>
                    </div>
                </div>
                <div class="mt-auto">
                    <button class="w-full h-[3.4375rem] rounded-[0.625rem] bg-[#EE6D3A] text-white text-[0.875rem] font-bold hover:bg-[#DD5F30] transition">
                        Hubungi Pelapor
                    </button>
                </div>
            </div>

        </div>
    </main>
</div>

@endsection