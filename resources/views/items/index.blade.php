@extends('layouts.app')

@section('title', 'Lost & Found - Reclaim')

@section('content')

<div class="min-h-screen bg-white">

    <x-navbar />

    <div class="flex">
        <aside class="w-[276px] min-h-[calc(100vh-114px)] bg-[#202324] text-white px-2 py-6 flex-shrink-0">
            
            <div class="px-5 mb-8">
                <h2 class="text-[22px] font-bold">RECLAIM</h2>
                <p class="text-[11px] text-gray-400 font-semibold">LOST & FOUND</p>
            </div>

            <div class="space-y-2">
                
                <a href="{{ route('items.index') }}"
                   class="block px-10 py-3 rounded-xl transition
                          {{ request()->routeIs('items.index') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
                    <p class="text-[15px] font-semibold">Lost & Found</p>
                    <p class="text-[11px] text-gray-400">List barang yang hilang & ditemukan</p>
                </a>

                <a href="{{ route('admin.items.index') }}"
                   class="block px-10 py-3 rounded-xl transition
                          {{ request()->routeIs('admin.items.index') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
                    <p class="text-[15px] font-semibold">Manage Items & Claims</p>
                    <p class="text-[11px] text-gray-400">Kelola barang & klaim masuk</p>
                </a>

                <a href="{{ route('admin.dashboard') }}"
                   class="block px-10 py-3 rounded-xl transition
                          {{ request()->routeIs('admin.dashboard') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
                    <p class="text-[15px] font-semibold">Admin Dashboard</p>
                    <p class="text-[11px] text-gray-400">Dashboard untuk admin</p>
                </a>

                <a href="{{ route('reports.index') }}"
                   class="block px-10 py-3 rounded-xl transition
                          {{ request()->routeIs('my-reports.index') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
                    <p class="text-[15px] font-semibold">My Reports & Claims</p>
                    <p class="text-[11px] text-gray-400">Laporan & klaim saya</p>
                </a>

                <a href="{{ route('items.create') }}"
                   class="block px-10 py-3 rounded-xl transition
                          {{ request()->routeIs('items.create') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
                    <p class="text-[15px] font-semibold">Report Item</p>
                    <p class="text-[11px] text-gray-400">Laporkan barang hilang / ditemukan</p>
                </a>

                <a href="{{ route('dashboard') }}"
                   class="block px-10 py-3 rounded-xl transition
                          {{ request()->routeIs('dashboard') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
                    <p class="text-[15px] font-semibold">Dashboard</p>
                    <p class="text-[11px] text-gray-400">Dashboard umum</p>
                </a>
            </div>
        </aside>

        <main class="flex-1 min-h-[calc(100vh-114px)] px-[60px] py-[50px]">
            <div class="max-w-[1600px] mx-auto">
                <h1 class="text-[34px] font-bold text-gray-900">Lost & Found</h1>
                <p class="mt-2 text-[15px] text-gray-500">
                    Daftar barang hilang dan ditemukan di lingkungan sekolah.
                </p>

                <form method="GET" action="{{ route('items.index') }}"
                      class="mt-8 bg-[#EFF8F1] rounded-[15px] p-5
                             flex flex-col md:flex-row gap-3 items-stretch">

                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari nama barang, lokasi, atau kategori..."
                           class="flex-1 h-[55px] rounded-xl border border-gray-200 px-4
                                  text-[14px] focus:outline-none focus:ring-2 focus:ring-[#EE6D3A]">

                    <select name="category"
                            class="h-[55px] rounded-xl border border-gray-200 px-4
                                   text-[14px] font-semibold bg-white">
                        <option value="">Semua Kategori</option>
                        <option value="elektronik">Elektronik</option>
                        <option value="aksesoris">Aksesoris</option>
                        <option value="tas">Tas</option>
                    </select>

                    <select name="status"
                            class="h-[55px] rounded-xl border border-gray-200 px-4
                                   text-[14px] font-semibold bg-white">
                        <option value="">Semua Status</option>
                        <option value="lost">Hilang</option>
                        <option value="found">Ditemukan</option>
                        <option value="returned">Sudah Dikembalikan</option>
                    </select>

                    <button type="submit"
                            class="h-[55px] px-8 rounded-xl bg-[#EE6D3A] text-white
                                   text-[14px] font-bold hover:bg-[#DD5F30] transition">
                        Cari
                    </button>

                </form>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-5">

                    <div class="border border-gray-200 rounded-[15px] p-6">
                        <div class="flex items-baseline gap-3">
                            <span class="text-[32px] font-bold text-gray-900">{{ $totalEntries }}</span>
                            <span class="text-[15px] font-semibold text-gray-900">Total Barang</span>
                        </div>
                        <p class="mt-1 text-[13px] text-gray-500">Semua barang terdaftar</p>
                    </div>

                    <div class="border border-gray-200 rounded-[15px] p-6">
                        <div class="flex items-baseline gap-3">
                            <span class="text-[32px] font-bold text-gray-900">{{ $lostItems }}</span>
                            <span class="text-[15px] font-semibold text-gray-900">Hilang</span>
                        </div>
                        <p class="mt-1 text-[13px] text-gray-500">Barang yang hilang</p>
                    </div>

                    <div class="border border-gray-200 rounded-[15px] p-6">
                        <div class="flex items-baseline gap-3">
                            <span class="text-[32px] font-bold text-gray-900">{{ $foundItems }}</span>
                            <span class="text-[15px] font-semibold text-gray-900">Ditemukan</span>
                        </div>
                        <p class="mt-1 text-[13px] text-gray-500">Barang yang ditemukan</p>
                    </div>

                    <div class="border border-gray-200 rounded-[15px] p-6">
                        <div class="flex items-baseline gap-3">
                            <span class="text-[32px] font-bold text-gray-900">{{ $returnedItems }}</span>
                            <span class="text-[15px] font-semibold text-gray-900">Sudah Dikembalikan</span>
                        </div>
                        <p class="mt-1 text-[13px] text-gray-500">Barang sudah kembali</p>
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
                           class="pb-4 text-[15px] font-semibold transition
                                  {{ request('status', '') === $value
                                        ? 'text-gray-900 border-b-2 border-[#EE6D3A]'
                                        : 'text-gray-500 hover:text-gray-900' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                <div class="mt-6">
                    <div class="grid grid-cols-6 px-2 py-3 text-[13px] font-semibold text-gray-500 border-b border-gray-200">
                        <span>Barang</span>
                        <span>Jenis</span>
                        <span>Lokasi</span>
                        <span>Tanggal</span>
                        <span>Status</span>
                        <span>Aksi</span>
                    </div>
                    @forelse ($items as $item)
                        <div class="grid grid-cols-6 items-center px-2 py-5 border-b border-gray-100">
                            <span class="text-[15px] font-bold text-gray-900">
                                {{ $item->name }}
                            </span>
                            <span class="text-[14px] font-semibold
                                         {{ $item->type === 'lost' ? 'text-[#EE6D3A]' : 'text-green-600' }}">
                                {{ $item->type === 'lost' ? 'Hilang' : 'Ditemukan' }}
                            </span>
                            <span class="text-[14px] text-gray-700">{{ $item->location }}</span>
                            <span class="text-[14px] text-gray-700">
                                {{ $item->date->format('d M Y') }}
                            </span>
                            <span class="text-[14px] text-gray-500">
                                {{ $item->status_label }}
                            </span>
                            <a href="{{ route('items.show', $item->id) }}"
                               class="inline-block h-[42px] px-5 rounded-lg border border-gray-300
                                      flex items-center justify-center text-[13px] font-semibold
                                      hover:bg-gray-50 transition w-fit">
                                Lihat Detail
                            </a>
                        </div>
                    @empty
                        <p class="py-10 text-center text-gray-500 text-[14px]">
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
</div>

@endsection