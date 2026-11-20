@extends('layouts.app')

@section('title', 'Edit Barang - Reclaim')

@section('content')
<div class="min-h-screen bg-white flex">
    <x-sidebar />
    <main class="flex-1 min-h-screen px-[3.75rem] py-[3.125rem]">
        <div class="max-w-[100rem] mx-auto">
            <div class="mb-8">
                <h1 class="text-[2.125rem] font-bold text-gray-900">
                    Edit Barang
                </h1>
                <p class="mt-2 text-gray-500">
                    Perbarui informasi laporan "{{ $item->title }}".
                </p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">
                <form action="{{ route('items.update', $item) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      data-prevent-double-submit>
                    @csrf
                    @method('PUT')

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            Jenis laporan
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    name="type"
                                    value="lost"
                                    class="peer sr-only"
                                    {{ old('type', $item->type) === 'lost' ? 'checked' : '' }}
                                >
                                <div class="p-5 rounded-xl border-2 border-gray-200
                                            peer-checked:border-orange-500
                                            peer-checked:bg-orange-50
                                            hover:border-orange-300
                                            transition">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-lg
                                                    bg-orange-100
                                                    flex items-center justify-center">
                                            <span class="text-2xl">🔍</span>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900">
                                                Barang Hilang
                                            </h4>
                                            <p class="text-sm text-gray-500">
                                                Laporkan barang yang hilang
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    name="type"
                                    value="found"
                                    class="peer sr-only"
                                    {{ old('type', $item->type) === 'found' ? 'checked' : '' }}
                                >
                                <div class="p-5 rounded-xl border-2 border-gray-200
                                            peer-checked:border-green-500
                                            peer-checked:bg-green-50
                                            hover:border-green-300
                                            transition">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-lg
                                                    bg-green-100
                                                    flex items-center justify-center">
                                            <span class="text-2xl">✓</span>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900">
                                                Barang Ditemukan
                                            </h4>
                                            <p class="text-sm text-gray-500">
                                                Laporkan barang yang ditemukan
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </label>

                        </div>
                        @error('type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-5">
                            <div>
                                <label for="title"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Barang
                                </label>
                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    value="{{ old('title', $item->title) }}"
                                    placeholder="Contoh: Dompet Kulit Coklat"
                                    class="w-full rounded-lg border border-gray-300
                                           px-4 py-3
                                           focus:border-orange-500
                                           focus:ring-orange-500"
                                    required
                                >
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="category"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Kategori
                                </label>
                                <select
                                    id="category"
                                    name="category"
                                    class="w-full rounded-lg border border-gray-300
                                           px-4 py-3
                                           focus:border-orange-500
                                           focus:ring-orange-500"
                                    required
                                >
                                    <option value="">Pilih kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}"
                                            {{ old('category', $item->category) === $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="location"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Lokasi
                                </label>
                                <input
                                    type="text"
                                    id="location"
                                    name="location"
                                    value="{{ old('location', $item->location) }}"
                                    placeholder="Contoh: Perpustakaan Lantai 2"
                                    class="w-full rounded-lg border border-gray-300
                                           px-4 py-3
                                           focus:border-orange-500
                                           focus:ring-orange-500"
                                    required
                                >
                                @error('location')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="date"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Tanggal Kejadian
                                </label>
                                <input
                                    type="date"
                                    id="date"
                                    name="date"
                                    value="{{ old('date', $item->date->toDateString()) }}"
                                    max="{{ now()->toDateString() }}"
                                    class="w-full rounded-lg border border-gray-300
                                           px-4 py-3
                                           focus:border-orange-500
                                           focus:ring-orange-500"
                                    required
                                >
                                @error('date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Deskripsi
                                </label>
                                <textarea
                                    id="description"
                                    name="description"
                                    rows="5"
                                    placeholder="Jelaskan ciri-ciri atau informasi barang..."
                                    class="w-full rounded-lg border border-gray-300
                                           px-4 py-3
                                           focus:border-orange-500
                                           focus:ring-orange-500"
                                    required>{{ old('description', $item->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <span class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Barang
                                <span class="text-gray-400">(Opsional)</span>
                            </span>

                            @if ($item->image_path)
                                <div class="mb-4 rounded-xl border border-gray-200 p-4 flex items-center gap-4">
                                    <img src="{{ asset('storage/' . $item->image_path) }}"
                                         alt="Foto saat ini"
                                         class="h-24 w-24 rounded-lg object-cover">
                                    <label class="flex items-center gap-2 text-[0.875rem] text-gray-700 cursor-pointer">
                                        <input type="checkbox" name="remove_image" value="1"
                                               class="rounded border-gray-300 text-orange-500 focus:ring-orange-500"
                                               {{ old('remove_image') ? 'checked' : '' }}>
                                        Hapus foto saat ini
                                    </label>
                                </div>
                            @endif

                            <label for="image"
                                   class="relative overflow-hidden flex flex-col items-center justify-center
                                          w-full h-72
                                          rounded-xl
                                          border-2 border-dashed border-green-300
                                          bg-green-50
                                          cursor-pointer
                                          hover:bg-green-100
                                          transition">

                                <div id="image-placeholder" class="text-center px-6">
                                    <div class="text-5xl mb-4">📷</div>
                                    <p class="font-semibold text-gray-700">
                                        {{ $item->image_path ? 'Ganti Foto Barang' : 'Upload Foto Barang' }}
                                    </p>
                                    <p class="text-sm text-gray-500 mt-2">
                                        Klik untuk memilih foto
                                    </p>
                                    <p class="text-xs text-gray-400 mt-1">
                                        JPG, JPEG, PNG, WEBP (maks. 2 MB)
                                    </p>
                                </div>

                                <img id="image-preview" src="" alt="Pratinjau foto"
                                     class="hidden absolute inset-0 w-full h-full object-cover">

                                <input
                                    id="image"
                                    type="file"
                                    name="image"
                                    accept=".jpg,.jpeg,.png,.webp"
                                    class="hidden"
                                >
                            </label>
                            @error('image')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @error('remove_image')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end gap-3">
                        <a href="{{ Auth::user()?->isAdmin() ? route('admin.items.index') : route('items.show', $item) }}"
                           class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700
                                  font-semibold hover:bg-gray-50 transition">
                            Batal
                        </a>
                        <button
                            type="submit"
                            class="px-6 py-3 rounded-lg
                                   bg-orange-500
                                   text-white
                                   font-semibold
                                   hover:bg-orange-600
                                   transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
