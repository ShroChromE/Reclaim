@extends('layouts.app')

@section('title', 'Detail Barang - Reclaim')

@section('content')

<div class="min-h-screen bg-white flex">
    <x-sidebar />
    <main class="flex-1 min-h-screen flex items-center px-[3.75rem] py-[3.125rem]">
        <div class="w-full max-w-[66.5625rem] mx-auto">

            @if (session('success'))
                <div class="mb-6 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-2 gap-[2.5rem]">

                <div class="h-[35.75rem] bg-[#EFF9F1] rounded-[1.25rem] p-[1.875rem]">
                    <div class="w-full h-[19.1875rem] bg-white rounded-[0.9375rem] overflow-hidden flex items-center justify-center">
                        @if ($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}"
                                 alt="Foto {{ $item->title }}"
                                 class="w-full h-full object-cover">
                        @else
                            <span class="text-[0.9375rem] font-semibold text-gray-500">
                                TIDAK ADA FOTO
                            </span>
                        @endif
                    </div>

                    <div class="mt-[1.5rem]">
                        <h3 class="text-[0.875rem] font-semibold text-gray-900">Deskripsi</h3>
                        <p class="mt-2 text-[0.8125rem] text-gray-600 leading-relaxed">
                            {{ $item->description }}
                        </p>
                    </div>
                </div>

                <div class="h-[35.75rem] border border-gray-300 rounded-[1.25rem] px-[2.5rem] py-[2.5rem] flex flex-col">
                    <div>
                        <h2 class="text-[1.75rem] font-bold text-gray-900">
                            {{ $item->title }}
                        </h2>
                        <p class="mt-3 text-[0.875rem] font-semibold text-[#EE6D3A]">
                            {{ $item->status_label }}
                        </p>
                    </div>

                    <div class="mt-[2.5rem] space-y-[1.75rem]">
                        <div class="grid grid-cols-[1fr_1.2fr] items-center">
                            <span class="text-[0.8125rem] text-gray-500">Jenis</span>
                            <span class="text-[0.8125rem] font-semibold text-gray-900">
                                {{ $item->type === 'lost' ? 'Barang Hilang' : 'Barang Ditemukan' }}
                            </span>
                        </div>
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
                            <span class="text-[0.8125rem] font-semibold text-gray-900">{{ $item->date->format('d M Y') }}</span>
                        </div>
                        <div class="grid grid-cols-[1fr_1.2fr] items-center">
                            <span class="text-[0.8125rem] text-gray-500">Dilaporkan</span>
                            <span class="text-[0.8125rem] font-semibold text-gray-900">{{ $item->created_at->format('H:i') }} WIB</span>
                        </div>
                        <div class="grid grid-cols-[1fr_1.2fr] items-center">
                            <span class="text-[0.8125rem] text-gray-500">Pelapor</span>
                            <span class="text-[0.8125rem] font-semibold text-gray-900">{{ $item->user->name }}</span>
                        </div>
                    </div>

                    <div class="mt-auto">
                        <a href="mailto:{{ $item->user->email }}?subject={{ rawurlencode('Terkait barang: ' . $item->title) }}"
                           class="flex items-center justify-center w-full h-[3.4375rem] rounded-[0.625rem] bg-[#EE6D3A] text-white text-[0.875rem] font-bold hover:bg-[#DD5F30] transition">
                            Hubungi Pelapor
                        </a>
                    </div>
                </div>

            </div>

            {{-- UBAH STATUS (ADMIN) --}}
            @if (auth()->user()?->isAdmin())
                <div class="mt-[2.5rem] border border-gray-300 rounded-[1.25rem] px-[2.5rem] py-[2.5rem]">
                    <h3 class="text-[1.125rem] font-bold text-gray-900">Ubah Status</h3>

                    <form action="{{ route('items.status.update', $item) }}" method="POST"
                          class="mt-6 grid grid-cols-1 md:grid-cols-[1fr_2fr_auto] gap-4 items-start"
                          data-prevent-double-submit>
                        @csrf

                        <div>
                            <label for="status" class="block text-[0.8125rem] font-medium text-gray-700 mb-2">
                                Status baru
                            </label>
                            <select id="status" name="status"
                                    class="w-full h-[3.4375rem] rounded-lg border border-gray-300 px-4
                                           text-[0.875rem] focus:border-orange-500 focus:ring-orange-500">
                                @foreach (\App\Models\Item::STATUS_LABELS as $value => $label)
                                    <option value="{{ $value }}"
                                        {{ old('status', $item->status) === $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="note" class="block text-[0.8125rem] font-medium text-gray-700 mb-2">
                                Catatan <span class="text-gray-400">(Opsional)</span>
                            </label>
                            <input type="text" id="note" name="note" value="{{ old('note') }}"
                                   placeholder="Contoh: Diambil oleh pemilik di ruang guru"
                                   class="w-full h-[3.4375rem] rounded-lg border border-gray-300 px-4
                                          text-[0.875rem] focus:border-orange-500 focus:ring-orange-500">
                            @error('note')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:pt-[1.7rem]">
                            <button type="submit"
                                    class="h-[3.4375rem] px-6 rounded-lg bg-[#EE6D3A] text-white
                                           text-[0.875rem] font-bold hover:bg-[#DD5F30] transition">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            @endif

            {{-- RIWAYAT STATUS --}}
            <div class="mt-[2.5rem] border border-gray-300 rounded-[1.25rem] px-[2.5rem] py-[2.5rem]">
                <h3 class="text-[1.125rem] font-bold text-gray-900">Riwayat Status</h3>

                <ol class="mt-6 space-y-6 border-l-2 border-gray-200 ml-2">
                    @foreach ($item->statusLogs as $log)
                        <li class="relative pl-6">
                            <span class="absolute -left-[0.5625rem] top-1 w-4 h-4 rounded-full
                                         {{ $loop->first ? 'bg-[#EE6D3A]' : 'bg-gray-300' }}"></span>

                            <p class="text-[0.875rem] font-semibold text-gray-900">
                                {{ \App\Models\Item::STATUS_LABELS[$log->status] ?? $log->status }}
                            </p>
                            <p class="text-[0.75rem] text-gray-500">
                                {{ $log->created_at->format('d M Y, H:i') }} WIB
                                &middot; oleh {{ $log->changedBy->name }}
                            </p>
                            @if ($log->note)
                                <p class="mt-1 text-[0.8125rem] text-gray-600">{{ $log->note }}</p>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>

        </div>
    </main>
</div>

@endsection