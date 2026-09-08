@extends('layouts.app')

@section('title', 'Report Item - Reclaim')

@section('content')
<div class="min-h-screen bg-gray-50">

    <div class="flex">

        {{-- SIDEBAR --}}
        <aside class="w-72 min-h-screen bg-gray-900 text-white p-6">

            <div class="mb-10">
                <h1 class="text-2xl font-bold tracking-wide">RECLAIM</h1>
                <p class="text-sm text-gray-400">LOST & FOUND</p>
            </div>

            <nav class="space-y-2">

                <a href="{{ route('items.index') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-gray-800">
                    Lost & Found
                </a>

                <a href="#"
                   class="block px-4 py-3 rounded-lg hover:bg-gray-800">
                    Manage Items & Claims
                </a>

                <a href="{{ route('admin.dashboard') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-gray-800">
                    Admin Dashboard
                </a>

                <a href="#"
                   class="block px-4 py-3 rounded-lg hover:bg-gray-800">
                    My Reports & Claims
                </a>

                {{-- ACTIVE --}}
                <a href="{{ route('items.create') }}"
                   class="block px-4 py-3 rounded-lg bg-orange-500 text-white font-semibold">
                    Report Item
                </a>

                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-gray-800">
                    Dashboard
                </a>

            </nav>
        </aside>


        {{-- MAIN CONTENT --}}
        <main class="flex-1 p-10">

            {{-- HEADER --}}
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900">
                    Report Item
                </h2>

                <p class="mt-2 text-gray-500">
                    Laporkan barang yang hilang atau ditemukan.
                </p>
            </div>


            {{-- FORM CARD --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">

                <form action="{{ route('items.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- JENIS LAPORAN --}}
                    <div class="mb-8">

                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            Pilih jenis laporan
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- BARANG HILANG --}}
                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    name="type"
                                    value="lost"
                                    class="peer sr-only"
                                    checked
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


                            {{-- BARANG DITEMUKAN --}}
                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    name="type"
                                    value="found"
                                    class="peer sr-only"
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
                    </div>


                    {{-- FORM GRID --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                        {{-- KOLOM KIRI --}}
                        <div class="space-y-5">

                            {{-- NAMA BARANG --}}
                            <div>
                                <label for="name"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Barang
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Contoh: Dompet Kulit Coklat"
                                    class="w-full rounded-lg border border-gray-300
                                           px-4 py-3
                                           focus:border-orange-500
                                           focus:ring-orange-500"
                                    required
                                >
                            </div>


                            {{-- KATEGORI --}}
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
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Dokumen">Dokumen</option>
                                    <option value="Dompet">Dompet</option>
                                    <option value="Kunci">Kunci</option>
                                    <option value="Tas">Tas</option>
                                    <option value="Pakaian">Pakaian</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>


                            {{-- LOKASI --}}
                            <div>
                                <label for="location"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Lokasi
                                </label>

                                <input
                                    type="text"
                                    id="location"
                                    name="location"
                                    placeholder="Contoh: Perpustakaan Lantai 2"
                                    class="w-full rounded-lg border border-gray-300
                                           px-4 py-3
                                           focus:border-orange-500
                                           focus:ring-orange-500"
                                    required
                                >
                            </div>


                            {{-- TANGGAL --}}
                            <div>
                                <label for="date"
                                       class="block text-sm font-medium text-gray-700 mb-2">
                                    Tanggal Kejadian
                                </label>

                                <input
                                    type="date"
                                    id="date"
                                    name="date"
                                    class="w-full rounded-lg border border-gray-300
                                           px-4 py-3
                                           focus:border-orange-500
                                           focus:ring-orange-500"
                                    required
                                >
                            </div>


                            {{-- DESKRIPSI --}}
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
                                    required
                                ></textarea>
                            </div>

                        </div>


                        {{-- KOLOM KANAN --}}
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Barang
                                <span class="text-gray-400">(Opsional)</span>
                            </label>

                            <label for="image"
                                   class="flex flex-col items-center justify-center
                                          w-full h-72
                                          rounded-xl
                                          border-2 border-dashed border-green-300
                                          bg-green-50
                                          cursor-pointer
                                          hover:bg-green-100
                                          transition">

                                <div class="text-center px-6">

                                    <div class="text-5xl mb-4">
                                        📷
                                    </div>

                                    <p class="font-semibold text-gray-700">
                                        Upload Foto Barang
                                    </p>

                                    <p class="text-sm text-gray-500 mt-2">
                                        Klik untuk memilih foto
                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">
                                        JPG, JPEG, PNG
                                    </p>

                                </div>

                                <input
                                    id="image"
                                    type="file"
                                    name="image"
                                    accept="image/*"
                                    class="hidden"
                                >
                            </label>


                            {{-- INFO --}}
                            <div class="mt-6 p-4 rounded-lg bg-gray-50">
                                <p class="text-sm text-gray-500">
                                    Pastikan informasi yang kamu masukkan sudah benar
                                    sebelum mengirim laporan.
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- BUTTON --}}
                    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">

                        <button
                            type="submit"
                            class="px-6 py-3 rounded-lg
                                   bg-orange-500
                                   text-white
                                   font-semibold
                                   hover:bg-orange-600
                                   transition">
                            Kirim Laporan
                        </button>

                    </div>

                </form>

            </div>

        </main>

    </div>

</div>
@endsection