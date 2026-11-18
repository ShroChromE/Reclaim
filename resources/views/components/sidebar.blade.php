<aside class="w-[17.25rem] flex-shrink-0">

    <div class="fixed top-0 bottom-0 w-[17.25rem] bg-[#202324] text-white px-2 py-6 flex flex-col overflow-y-auto">

        <div class="px-5 mb-8 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Reclaim" class="h-10 w-10 object-contain">
            <div>
                <h2 class="text-[1.375rem] font-bold leading-tight">RECLAIM</h2>
                <p class="text-[0.6875rem] text-gray-400 font-semibold">LOST & FOUND</p>
            </div>
        </div>

        <nav class="space-y-2">

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
        </nav>

        {{-- USER + LOGOUT (pinned to the bottom) --}}
        @auth
            <div class="mt-auto pt-6 border-t border-[#303435]">
                <div class="px-3 pb-4">
                    <p class="text-[1rem] font-bold truncate">{{ auth()->user()->name }}</p>
                    <p class="text-[0.75rem] text-gray-400 truncate">{{ auth()->user()->email }}</p>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="px-2">
                    @csrf
                    <button type="submit"
                            class="w-full h-[3rem] rounded-[0.5rem] bg-[#EE6D3A] text-white
                                   text-[1.5rem] font-bold hover:bg-[#DD5F30] transition">
                        Logout
                    </button>
                </form>
            </div>
        @endauth

    </div>
</aside>