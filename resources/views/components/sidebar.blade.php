<aside class="w-[17.25rem] min-h-screen bg-[#202324] text-white px-2 py-6 flex-shrink-0">

    <div class="px-5 mb-8">
        <h2 class="text-[1.375rem] font-bold">RECLAIM</h2>
        <p class="text-[0.6875rem] text-gray-400 font-semibold">LOST & FOUND</p>
    </div>

    <div class="space-y-2">

        <a href="{{ route('items.index') }}"
           class="block px-10 py-3 rounded-xl transition
                  {{ request()->routeIs('items.index') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
            <p class="text-[0.9375rem] font-semibold">Lost & Found</p>
            <p class="text-[0.6875rem] text-gray-400">List barang yang hilang & ditemukan</p>
        </a>

        <a href="{{ route('admin.items.index') }}"
           class="block px-10 py-3 rounded-xl transition
                  {{ request()->routeIs('admin.items.index') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
            <p class="text-[0.9375rem] font-semibold">Manage Items & Claims</p>
            <p class="text-[0.6875rem] text-gray-400">Kelola barang & klaim masuk</p>
        </a>

        <a href="{{ route('admin.dashboard') }}"
           class="block px-10 py-3 rounded-xl transition
                  {{ request()->routeIs('admin.dashboard') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
            <p class="text-[0.9375rem] font-semibold">Admin Dashboard</p>
            <p class="text-[0.6875rem] text-gray-400">Dashboard untuk admin</p>
        </a>

        <a href="{{ route('my-reports.index') }}"
           class="block px-10 py-3 rounded-xl transition
                  {{ request()->routeIs('my-reports.index') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
            <p class="text-[0.9375rem] font-semibold">My Reports & Claims</p>
            <p class="text-[0.6875rem] text-gray-400">Laporan & klaim saya</p>
        </a>

        <a href="{{ route('items.create') }}"
           class="block px-10 py-3 rounded-xl transition
                  {{ request()->routeIs('items.create') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
            <p class="text-[0.9375rem] font-semibold">Report Item</p>
            <p class="text-[0.6875rem] text-gray-400">Laporkan barang hilang / ditemukan</p>
        </a>

        <a href="{{ route('dashboard') }}"
           class="block px-10 py-3 rounded-xl transition
                  {{ request()->routeIs('dashboard') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
            <p class="text-[0.9375rem] font-semibold">Dashboard</p>
            <p class="text-[0.6875rem] text-gray-400">Dashboard umum</p>
        </a>

        <a href="{{ route('items.show', 1) }}"
           class="block px-10 py-3 rounded-xl transition
                  {{ request()->routeIs('items.show') ? 'bg-[#303435]' : 'hover:bg-[#303435]' }}">
            <p class="text-[0.9375rem] font-semibold">Detail Barang</p>
            <p class="text-[0.6875rem] text-gray-400">Lihat detail informasi barang</p>
        </a>

    </div>
</aside>