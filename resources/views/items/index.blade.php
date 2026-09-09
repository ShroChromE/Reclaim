@extends('layouts.app')

@section('title', 'Lost & Found - Reclaim')

@section('content')

<div class="min-h-screen bg-white flex">

    <x-sidebar />

    <main class="flex-1 min-h-screen px-[3.75rem] py-[3.125rem]">
        <div class="max-w-[100rem] mx-auto">
            <h1 class="text-[2.125rem] font-bold text-gray-900">
                Lost & Found
            </h1>
            <p class="mt-2 text-gray-500">
                Daftar barang hilang dan ditemukan di lingkungan sekolah.
            </p>

            <form method="GET" action="{{ route('items.index') }}"
                  class="mt-8 bg-[#EFF8F1] rounded-[0.9375rem] p-5
                         flex flex-col md:flex-row gap-3 items-stretch">

                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari nama barang, lokasi, atau kategori..."
                       class="flex-1 h-[3.4375rem] rounded-xl border border-gray-200 px-4
                              text-[0.875rem] focus:outline-none focus:ring-2 focus:ring-[#EE6D3A]">

                <select name="category"
                        class="h-[3.4375rem] rounded-xl border border-gray-200 px-4
                               text-[0.875rem] font-semibold bg-white">
                    <option value="">Semua Kategori</option>
                    <option value="elektronik">Elektronik</option>
                    <option value="aksesoris">Aksesoris</option>
                    <option value="tas">Tas</option>
                </select>

                <select name="status"
                        class="h-[3.4375rem] rounded-xl border border-gray-200 px-4
                               text-[0.875rem] font-semibold bg-white">
                    <option value="">Semua Status</option>
                    <option value="lost">Hilang</option>
                    <option value="found">Ditemukan</option>
                    <option value="returned">Sudah Dikembalikan</option>
                </select>

                <button type="submit"
                        class="h-[3.4375rem] px-8 rounded-xl bg-[#EE6D3A] text-white
                               text-[0.875rem] font-bold hover:bg-[#DD5F30] transition">
                    Cari
                </button>

            </form>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-5">

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $totalEntries }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Total Barang</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Semua barang terdaftar</p>
                </div>

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $lostItems }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Hilang</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Barang yang hilang</p>
                </div>

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $foundItems }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Ditemukan</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Barang yang ditemukan</p>
                </div>

                <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                    <div class="flex items-baseline gap-3">
                        <span class="text-[2rem] font-bold text-gray-900">{{ $returnedItems }}</span>
                        <span class="text-[0.9375rem] font-semibold text-gray-900">Sudah Dikembalikan</span>
                    </div>
                    <p class="mt-1 text-[0.8125rem] text-gray-500">Barang sudah kembali</p>
                </div>

            </div>

            <div class="mt-10 flex gap-8 border-b border-gray-200">
                @php
                    $tabs = [
                        '' => 'Semua',
                        'lost' => 'Hilang',
                        'found' => 'Ditemukan',
                        'returned' => 'Sudah Dikembalikan',
                    ];
                @endphp

                @foreach ($tabs as $value => $label)
                    <a href="{{ route('items.index', array_filter(['status' => $value ?: null, 'search' => request('search')])) }}"
                       class="pb-4 text-[0.9375rem] font-semibold transition
                              {{ request('status', '') === $value
                                    ? 'text-gray-900 border-b-2 border-[#EE6D3A]'
                                    : 'text-gray-500 hover:text-gray-900' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <div class="mt-6">
                <div class="grid grid-cols-6 px-2 py-3 text-[0.8125rem] font-semibold text-gray-500 border-b border-gray-200">
                    <span>Barang</span>
                    <span>Jenis</span>
                    <span>Lokasi</span>
                    <span>Tanggal</span>
                    <span>Status</span>
                    <span>Aksi</span>
                </div>
                @forelse ($items as $item)
                    <div class="grid grid-cols-6 items-center px-2 py-5 border-b border-gray-100">
                        <span class="text-[0.9375rem] font-bold text-gray-900">
                            {{ $item->name }}
                        </span>
                        <span class="text-[0.875rem] font-semibold
                                     {{ $item->type === 'lost' ? 'text-[#EE6D3A]' : 'text-green-600' }}">
                            {{ $item->type === 'lost' ? 'Hilang' : 'Ditemukan' }}
                        </span>
                        <span class="text-[0.875rem] text-gray-700">{{ $item->location }}</span>
                        <span class="text-[0.875rem] text-gray-700">
                            {{ $item->date->format('d M Y') }}
                        </span>
                        <span class="text-[0.875rem] text-gray-500">
                            {{ $item->status_label }}
                        </span>
                        <a href="{{ route('items.show', $item->id) }}"
                           class="inline-block h-[2.625rem] px-5 rounded-lg border border-gray-300
                                  flex items-center justify-center text-[0.8125rem] font-semibold
                                  hover:bg-gray-50 transition w-fit">
                            Lihat Detail
                        </a>
                    </div>
                @empty
                    <p class="py-10 text-center text-gray-500 text-[0.875rem]">
                        Belum ada barang yang cocok dengan pencarian ini.
                    </p>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $items->links() }}
            </div>
        </div>
    </main>
</div>

@endsection