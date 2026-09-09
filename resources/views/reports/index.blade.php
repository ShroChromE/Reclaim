@extends('layouts.app')

@section('title', 'My Reports & Claims - Reclaim')

@section('content')

<div class="min-h-screen bg-white flex">

    <x-sidebar />

    <main class="flex-1 min-h-screen px-[3.75rem] py-[3.125rem]">
        <div class="max-w-[100rem] mx-auto">
            <h1 class="text-[2.125rem] font-bold text-gray-900">
                My Reports & Claims
            </h1>
            <p class="mt-2 text-gray-500">
                Daftar laporan dan klaim yang pernah kamu buat.
            </p>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-5">

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="w-10 h-10 rounded-xl bg-[#DFF4E3] mb-4"></div>
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $totalReports }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Laporan Saya</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Total laporan</p>
                </div>

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="w-10 h-10 rounded-xl bg-[#FCEACB] mb-4"></div>
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $pendingReports }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Menunggu</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Belum diproses</p>
                </div>

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="w-10 h-10 rounded-xl bg-[#DFF4E3] mb-4"></div>
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $completedReports }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Selesai</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Sudah selesai</p>
                </div>

            </div>

            <h2 class="mt-10 text-[1.375rem] font-bold text-gray-900">Daftar Laporan</h2>

            <div class="mt-4">
                <div class="grid grid-cols-5 px-2 py-3 text-[0.8125rem] font-semibold text-gray-500 border-b border-gray-200">
                    <span>Jenis</span>
                    <span>Barang</span>
                    <span>Tanggal</span>
                    <span>Status</span>
                    <span>Aksi</span>
                </div>
                @forelse ($reports as $report)
                    <div class="grid grid-cols-5 items-center px-2 py-5 border-b border-gray-100">
                        <span class="text-[0.9375rem] font-bold text-gray-900">
                            {{ $report->type }}
                        </span>
                        <span class="text-[0.9375rem] font-bold text-gray-900">
                            {{ $report->item_name }}
                        </span>
                        <span class="text-[0.875rem] text-gray-700">
                            {{ $report->date }}
                        </span>
                        <span class="text-[0.875rem] text-gray-700">
                            {{ $report->status }}
                        </span>
                        <a href="#"
                           class="text-[0.875rem] font-semibold text-gray-900 hover:underline w-fit">
                            Detail
                        </a>
                    </div>
                @empty
                    <p class="py-10 text-center text-gray-500 text-[0.875rem]">
                        Kamu belum membuat laporan apa pun.
                    </p>
                @endforelse
            </div>
        </div>
    </main>
</div>

@endsection