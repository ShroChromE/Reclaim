@extends('layouts.app')

@section('title', 'Manage Items & Claims - Reclaim')

@section('content')

<div class="min-h-screen bg-white flex">

    <x-sidebar />

    <main class="flex-1 min-h-screen px-[3.75rem] py-[3.125rem]">
        <div class="max-w-[100rem] mx-auto">
            <h1 class="text-[2.125rem] font-bold text-gray-900">
                Manage Items & Claims
            </h1>
            <p class="mt-2 text-gray-500">
                Kelola semua barang dan klaim yang masuk.
            </p>

            <div class="mt-8 bg-[#EFF8F1] rounded-[0.9375rem] p-5 flex items-center justify-between">
                @php
                    $tabs = [
                        'all' => 'Semua Barang',
                        'lost' => 'Barang Hilang',
                        'found' => 'Barang Ditemukan',
                        'claims' => 'Klaim Masuk',
                    ];
                @endphp

                <div class="flex gap-8">
                    @foreach ($tabs as $value => $label)
                        <a href="{{ route('admin.items.index', ['tab' => $value]) }}"
                           class="text-[0.9375rem] font-semibold transition
                                  {{ $tab === $value ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                <a href="{{ route('items.create') }}"
                   class="h-[3.4375rem] px-8 rounded-xl bg-[#EE6D3A] text-white
                          text-[0.875rem] font-bold hover:bg-[#DD5F30] transition
                          flex items-center justify-center">
                    + Tambah Barang
                </a>
            </div>

            <div class="mt-6">
                <input type="text" placeholder="Cari barang..."
                       class="w-full h-[3.4375rem] rounded-[0.9375rem] border border-gray-200 px-5
                              text-[0.875rem] focus:outline-none focus:ring-2 focus:ring-[#EE6D3A]">
            </div>

            <div class="mt-6">
                <div class="grid grid-cols-6 px-2 py-3 text-[0.8125rem] font-semibold text-gray-500 border-b border-gray-200">
                    <span>Barang</span>
                    <span>Jenis</span>
                    <span>Pelapor</span>
                    <span>Tanggal</span>
                    <span>Status</span>
                    <span>Klaim</span>
                </div>
                @forelse ($items as $item)
                    <div class="grid grid-cols-6 items-center px-2 py-5 border-b border-gray-100">
                        <span class="text-[0.9375rem] font-bold text-gray-900">
                            {{ $item->name }}
                        </span>
                        <span class="text-[0.875rem] text-gray-700">
                            {{ $item->type === 'lost' ? 'Hilang' : 'Ditemukan' }}
                        </span>
                        <span class="text-[0.875rem] text-gray-700">{{ $item->reporter }}</span>
                        <span class="text-[0.875rem] text-gray-700">{{ $item->date }}</span>
                        <span class="text-[0.875rem] text-gray-700">{{ $item->status_label }}</span>
                        <span class="text-[0.9375rem] font-bold text-gray-900">{{ $item->claims_count }}</span>
                    </div>
                @empty
                    <p class="py-10 text-center text-gray-500 text-[0.875rem]">
                        Tidak ada barang pada kategori ini.
                    </p>
                @endforelse
            </div>
        </div>
    </main>
</div>

@endsection