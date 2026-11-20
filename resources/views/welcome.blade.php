@extends('layouts.app')
@section('title', 'Reclaim - Lost & Found')
@section('content')

<div class="h-dvh flex flex-col overflow-y-auto">

    <header class="shrink-0 border-b border-gray-200">
        <div class="h-[clamp(60px,10vh,100px)] px-4 sm:px-8 lg:px-10 flex items-center justify-between gap-3">

            <div class="flex items-center gap-3 sm:gap-4 min-w-0">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Reclaim"
                     class="shrink-0 w-[clamp(36px,6vh,56px)] h-[clamp(36px,6vh,56px)] rounded-xl object-contain">

                <div class="min-w-0">
                    <h1 class="text-[clamp(17px,2.8vh,25px)] font-bold leading-tight">RECLAIM</h1>
                    <p class="text-[clamp(10px,1.5vh,13px)] text-gray-500 truncate">Lost &amp; Found - Sekolah</p>
                </div>
            </div>

            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <a href="{{ route('login') }}"
                   class="h-[clamp(38px,6vh,56px)] px-4 sm:px-6 rounded-xl border border-gray-300
                          flex items-center justify-center text-[clamp(13px,1.9vh,15px)] font-semibold
                          hover:bg-gray-50 transition">
                    Masuk
                </a>

                <a href="{{ route('register') }}"
                   class="h-[clamp(38px,6vh,56px)] px-4 sm:px-6 rounded-xl bg-[#EE6D3A] text-white
                          flex items-center justify-center text-[clamp(13px,1.9vh,15px)] font-semibold
                          hover:bg-[#DD5F30] transition">
                    Daftar
                </a>
            </div>

        </div>
    </header>


    {{-- HERO --}}
    <main class="flex-1 min-h-0 w-full max-w-[1600px] mx-auto
                 grid grid-cols-1 lg:grid-cols-2
                 content-center items-center
                 gap-[clamp(16px,4vh,40px)] lg:gap-14
                 px-5 sm:px-10 lg:px-14 py-4">

        {{-- KIRI --}}
        <div>
            <h2 class="text-[clamp(28px,min(5.2vw,7vh),56px)] leading-[1.12] tracking-[-0.03em] font-bold max-w-[700px]">
                Kehilangan barang?
                <br>
                Jangan cuma <span class="text-[#E96B38]">berharap.</span>
            </h2>

            <p class="mt-[clamp(12px,3vh,32px)] max-w-[620px]
                      text-[clamp(14px,min(2vw,2.8vh),24px)] leading-[1.35] text-[#7C827F]">
                Reclaim mengumpulkan semua laporan barang hilang dan temuan di satu papan,
                supaya barangmu lebih cepat balik ke tangan yang benar —
                tanpa mading, tanpa nebak-nebak grup chat mana.
            </p>

            <a href="{{ route('items.index') }}"
               class="mt-[clamp(16px,4.5vh,48px)] inline-flex items-center justify-center
                      w-full sm:w-auto sm:min-w-[260px]
                      h-[clamp(48px,8vh,84px)] px-10
                      rounded-[clamp(14px,2.4vh,24px)] bg-[#ED6D3B] text-white
                      text-[clamp(16px,2.6vh,22px)] font-bold
                      hover:bg-[#DF6030] transition">
                Cari Barang
            </a>
        </div>


        {{-- KANAN: PAPAN RECLAIM --}}
        <div class="w-full max-w-[640px] lg:justify-self-center bg-[#fff8e8]
                    rounded-[clamp(16px,3vh,25px)]
                    px-[clamp(20px,4vw,56px)] py-[clamp(16px,4vh,44px)]">

            <div class="flex items-center justify-between mb-[clamp(8px,3vh,36px)] text-[#777E7A] font-bold">
                <h3 class="text-[clamp(15px,2.8vh,24px)]">PAPAN RECLAIM</h3>
                <span class="text-[clamp(14px,2.6vh,22px)]">{{ $totalEntries }} ENTRI</span>
            </div>

            <div class="w-full">
                <div class="h-[clamp(38px,7vh,66px)] flex items-center justify-between border-b border-[#ED6D3B]">
                    <span class="text-[clamp(14px,2.5vh,21px)] font-medium text-[#ED6D3B]">Hilang</span>
                    <span class="text-[clamp(18px,3.4vh,30px)] font-medium text-gray-900 pr-4 sm:pr-6">{{ $lostItems }}</span>
                </div>

                <div class="h-[clamp(38px,7vh,66px)] flex items-center justify-between border-b border-[#ED6D3B]">
                    <span class="text-[clamp(14px,2.5vh,21px)] font-medium text-[#ED6D3B]">Ditemukan</span>
                    <span class="text-[clamp(18px,3.4vh,30px)] font-medium text-gray-900 pr-4 sm:pr-6">{{ $foundItems }}</span>
                </div>

                <div class="h-[clamp(38px,7vh,66px)] flex items-center justify-between">
                    <span class="text-[clamp(14px,2.5vh,21px)] font-medium text-[#ED6D3B]">Sudah Dikembalikan</span>
                    <span class="text-[clamp(18px,3.4vh,30px)] font-medium text-gray-900 pr-4 sm:pr-6">{{ $returnedItems }}</span>
                </div>
            </div>

        </div>

    </main>


    {{-- FOOTER --}}
    <footer class="shrink-0 text-center text-[#68736E] text-[clamp(11px,2vh,20px)] px-5 py-[clamp(8px,2vh,24px)]">
        Reclaim — dibuat untuk membantu barang kembali ke pemiliknya.
    </footer>

</div>

@endsection