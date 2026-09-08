<header class="h-[114px] border-b border-gray-200 bg-white">
    <div class="h-full px-7 flex items-center justify-between">

        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-[#EE6D3A] flex items-center justify-center text-white text-[27px] font-bold">
                R
            </div>
            <div>
                <h1 class="text-[25px] font-bold leading-tight">RECLAIM</h1>
                <p class="text-[13px] text-gray-500">Lost & Found - Sekolah</p>
            </div>
        </div>

        <nav class="w-[532px] h-[60px] bg-[#EFF8F1] rounded-[15px] flex items-center justify-around px-3">
            <a href="{{ route('items.index') }}"
               class="px-7 py-5 text-[15px] font-semibold transition
                      {{ request()->routeIs('homepage') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }}">
                Cari Barang
            </a>

            <a href="{{ route('items.show') }}"
               class="px-7 py-5 text-[15px] font-semibold transition
                      {{ request()->routeIs('items.detail') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }}">
                Laporan Hilang
            </a>

            <a href="#"
               class="px-7 py-5 text-[15px] font-semibold transition
                      {{ request()->routeIs('items.found') ? 'text-gray-900' : 'text-gray-500 hover:text-gray-900' }}">
                Laporan Ditemukan
            </a>
        </nav>

        {{-- AUTH BUTTONS --}}
        <div class="flex items-center gap-3">
            <a href="#" class="h-[60px] px-6 rounded-xl border border-gray-300 flex items-center justify-center text-[15px] font-semibold hover:bg-gray-50 transition">
                Masuk
            </a>
            <a href="#" class="h-[60px] px-6 rounded-xl bg-[#EE6D3A] text-white flex items-center justify-center text-[15px] font-semibold hover:bg-[#DD5F30] transition">
                Daftar
            </a>
        </div>

    </div>
</header>