@extends('layouts.app')

@section('title', 'Manage Items & Claims - Reclaim')

@section('content')

<div class="min-h-screen bg-white flex">

    <x-sidebar />

    <main class="flex-1 min-h-screen px-[3.75rem] py-[3.125rem]">
        <div class="max-w-[100rem] mx-auto">

            @if (session('success'))
                <div class="mb-6 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-lg bg-red-50 border border-red-200 px-4 py-3 text-red-700">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

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
                           class="flex items-center gap-2 text-[0.9375rem] font-semibold transition
                                  {{ $tab === $value ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }}">
                            {{ $label }}
                            @if ($value === 'claims' && $pendingClaims > 0)
                                <span class="min-w-[1.5rem] h-6 px-2 rounded-full bg-[#EE6D3A] text-white
                                             text-[0.75rem] font-bold flex items-center justify-center">
                                    {{ $pendingClaims }}
                                </span>
                            @endif
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

            <form method="GET" action="{{ route('admin.items.index') }}" class="mt-6">
                <input type="hidden" name="tab" value="{{ $tab }}">
                <input type="text" name="search" value="{{ $search }}"
                       placeholder="{{ $tab === 'claims' ? 'Cari nama barang yang diklaim...' : 'Cari nama barang, lokasi, atau kategori...' }}"
                       class="w-full h-[3.4375rem] rounded-[0.9375rem] border border-gray-200 px-5
                              text-[0.875rem] focus:outline-none focus:ring-2 focus:ring-[#EE6D3A]">
            </form>

            @if ($tab === 'claims')

                {{-- DAFTAR KLAIM --}}
                <div class="mt-6 space-y-4">
                    @forelse ($claims as $claim)
                        <div class="border border-gray-200 rounded-[0.9375rem] p-6">
                            <div class="flex items-start justify-between gap-6">
                                <div>
                                    <a href="{{ route('items.show', $claim->item) }}"
                                       class="text-[1rem] font-bold text-gray-900 hover:underline">
                                        {{ $claim->item->title }}
                                    </a>
                                    <p class="mt-1 text-[0.8125rem] text-gray-500">
                                        Diklaim oleh <span class="font-semibold text-gray-700">{{ $claim->user->name }}</span>
                                        ({{ $claim->user->email }}) &middot; {{ $claim->created_at->format('d M Y, H:i') }}
                                    </p>
                                </div>

                                @php
                                    $badge = [
                                        'pending'  => 'bg-orange-50 text-orange-700 border-orange-200',
                                        'approved' => 'bg-green-50 text-green-700 border-green-200',
                                        'rejected' => 'bg-red-50 text-red-700 border-red-200',
                                    ][$claim->status] ?? '';
                                @endphp
                                <span class="shrink-0 px-3 py-1 rounded-full border text-[0.75rem] font-semibold {{ $badge }}">
                                    {{ \App\Models\Claim::STATUS_LABELS[$claim->status] ?? $claim->status }}
                                </span>
                            </div>

                            <div class="mt-4 rounded-lg bg-gray-50 px-4 py-3">
                                <p class="text-[0.75rem] font-semibold text-gray-500">Bukti kepemilikan</p>
                                <p class="mt-1 text-[0.875rem] text-gray-800">{{ $claim->proof }}</p>
                            </div>

                            @if ($claim->status === 'pending')
                                <form action="{{ route('admin.claims.update', $claim) }}" method="POST"
                                      class="mt-4 flex flex-col md:flex-row gap-3 items-stretch"
                                      data-confirm="Proses klaim ini?">
                                    @csrf
                                    @method('PATCH')

                                    <input type="text" name="admin_note" placeholder="Catatan untuk pengklaim (opsional)"
                                           class="flex-1 h-[3.4375rem] rounded-lg border border-gray-300 px-4
                                                  text-[0.875rem] focus:border-orange-500 focus:ring-orange-500">

                                    <button type="submit" name="decision" value="reject"
                                            class="h-[3.4375rem] px-6 rounded-lg border border-red-200 text-red-600
                                                   text-[0.875rem] font-bold hover:bg-red-50 transition">
                                        Tolak
                                    </button>
                                    <button type="submit" name="decision" value="approve"
                                            class="h-[3.4375rem] px-6 rounded-lg bg-[#EE6D3A] text-white
                                                   text-[0.875rem] font-bold hover:bg-[#DD5F30] transition">
                                        Setujui
                                    </button>
                                </form>
                            @else
                                <p class="mt-4 text-[0.8125rem] text-gray-500">
                                    Diproses oleh {{ $claim->reviewer?->name ?? 'admin' }}
                                    @if ($claim->admin_note)
                                        &middot; Catatan: {{ $claim->admin_note }}
                                    @endif
                                </p>
                            @endif
                        </div>
                    @empty
                        <p class="py-10 text-center text-gray-500 text-[0.875rem]">
                            Belum ada klaim yang masuk.
                        </p>
                    @endforelse
                </div>

                <div class="mt-6">
                    {{ $claims->links() }}
                </div>

            @else

                {{-- DAFTAR BARANG --}}
                <div class="mt-6">
                    <div class="grid grid-cols-7 px-2 py-3 text-[0.8125rem] font-semibold text-gray-500 border-b border-gray-200">
                        <span>Barang</span>
                        <span>Jenis</span>
                        <span>Pelapor</span>
                        <span>Tanggal</span>
                        <span>Status</span>
                        <span>Klaim</span>
                        <span>Aksi</span>
                    </div>

                    @forelse ($items as $item)
                        <div class="grid grid-cols-7 items-center px-2 py-5 border-b border-gray-100">
                            <span class="text-[0.9375rem] font-bold text-gray-900">
                                {{ $item->title }}
                            </span>
                            <span class="text-[0.875rem] text-gray-700">
                                {{ $item->type === 'lost' ? 'Hilang' : 'Ditemukan' }}
                            </span>
                            <span class="text-[0.875rem] text-gray-700">{{ $item->user->name }}</span>
                            <span class="text-[0.875rem] text-gray-700">{{ $item->date->format('d M Y') }}</span>
                            <span class="text-[0.875rem] text-gray-700">{{ $item->status_label }}</span>
                            <span class="flex items-center gap-2 text-[0.9375rem] font-bold text-gray-900">
                                {{ $item->claims_count }}
                                @if ($item->pending_claims_count > 0)
                                    <span class="px-2 py-0.5 rounded-full bg-orange-50 border border-orange-200
                                                 text-orange-700 text-[0.6875rem] font-semibold">
                                        {{ $item->pending_claims_count }} menunggu
                                    </span>
                                @endif
                            </span>
                            <span class="flex items-center gap-2">
                                <a href="{{ route('items.show', $item) }}"
                                   class="h-[2.625rem] px-4 rounded-lg border border-gray-300
                                          flex items-center justify-center text-[0.8125rem] font-semibold
                                          hover:bg-gray-50 transition">
                                    Detail
                                </a>

                                <form action="{{ route('items.destroy', $item) }}" method="POST"
                                      data-confirm="Hapus &quot;{{ $item->title }}&quot;? Riwayat dan klaimnya juga akan terhapus.">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="h-[2.625rem] px-4 rounded-lg border border-red-200 text-red-600
                                                   text-[0.8125rem] font-semibold hover:bg-red-50 transition">
                                        Hapus
                                    </button>
                                </form>
                            </span>
                        </div>
                    @empty
                        <p class="py-10 text-center text-gray-500 text-[0.875rem]">
                            Tidak ada barang pada kategori ini.
                        </p>
                    @endforelse
                </div>

                <div class="mt-6">
                    {{ $items->links() }}
                </div>

            @endif

        </div>
    </main>
</div>

@endsection