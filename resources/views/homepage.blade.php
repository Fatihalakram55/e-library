{{-- @dd($title) --}}
@extends('layouts.main')

@section('konten')

{{-- ── HERO ── --}}
<section class="relative bg-slate-800 rounded-2xl overflow-hidden mb-6 px-8 pt-12 pb-0">
    <div class="flex items-end gap-12 max-w-5xl mx-auto">

        {{-- Left text --}}
        <div class="flex-1 pb-10">
            <span class="inline-flex items-center gap-1.5 bg-slate-900 text-white text-xs px-3 py-1 rounded-full border border-slate-700 mb-5">
                <span class="w-1.5 h-1.5 bg-indigo-300 rounded-full inline-block"></span>
                Platform Literasi Digital
            </span>
            <h2 class="text-4xl font-bold leading-tight text-white mb-4">
                Temukan Buku<br/>
                <span class="text-indigo-300">Favoritmu</span> di Sini
            </h2>
            <p class="text-white text-sm leading-relaxed mb-7 max-w-sm">
                Akses ribuan koleksi buku digital, kelola peminjaman, dan tingkatkan literasimu dari mana saja dan kapan saja.
            </p>
            <a href="/hall"
               class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-800 text-white text-sm font-semibold px-6 py-3 rounded-xl transition-colors duration-200">
                <i class="fa-solid fa-book-open"></i>
                Jelajahi Koleksi
            </a>
        </div>

        {{-- Right: stacked book covers --}}
        <div class="flex items-end gap-3 shrink-0">
            @foreach($books->take(3) as $book)
                @if($book->cover)
                    <img src="{{ Storage::url($book->cover) }}"
                @else
                    <img src="https://picsum.photos/seed/hero{{ $loop->index }}/100/150"
                @endif
                    class="rounded-t-xl object-cover shadow-xl {{ $loop->first || $loop->last ? 'h-36 w-24 opacity-60 mb-4' : 'h-48 w-28' }}"
                    alt="{{ $book->name }}" />
            @endforeach
        </div>

    </div>
</section>

{{-- ── STATS ── --}}
<div class="bg-slate-800 rounded-2xl px-8 py-5 mb-6">
    <div class="flex justify-around items-center">
        <div class="text-center">
            <p class="text-white text-2xl font-bold">44 Juta</p>
            <p class="text-white text-xs mt-1">Transaksi per Hari</p>
        </div>
        <div class="w-px h-10 bg-slate-700"></div>
        <div class="text-center">
            <p class="text-white text-2xl font-bold">$119 T</p>
            <p class="text-white text-xs mt-1">Aset Dikelola</p>
        </div>
        <div class="w-px h-10 bg-slate-700"></div>
        <div class="text-center">
            <p class="text-white text-2xl font-bold">46.000</p>
            <p class="text-white text-xs mt-1">Pengguna Baru/Tahun</p>
        </div>
    </div>
</div>

{{-- ── LATEST BOOKS ── --}}
<section class="mb-8">

    <div class="max-w-2xl mx-auto text-center mb-10">
        <h2 class="text-3xl font-bold text-slate-800">Buku Terbaru</h2>
        <p class="mt-3 text-sm text-gray-500 leading-relaxed max-w-xl mx-auto">
            Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($books as $book)
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden group transition-all duration-200 hover:-translate-y-1 hover:shadow-xl">

                {{-- Cover --}}
                <div class="overflow-hidden h-52 relative">
                    @if($book->cover)
                        <img src="{{ Storage::url($book->cover) }}"
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                             alt="{{ $book->name }}" />
                    @else
                        <img src="https://cdn.rareblocks.xyz/collection/celebration/images/blog/1/blog-post-1.jpg"
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                             alt="{{ $book->name }}" />
                    @endif

                    {{-- Hover overlay --}}
                    <div class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                        <a href="/hall/book/{{ $book->slug }}"
                           class="bg-white text-slate-900 text-xs font-semibold px-5 py-2 rounded-xl hover:bg-blue-50 transition-colors">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <div class="p-5">
                    {{-- Category badge --}}
                    <span class="inline-flex px-3 py-1 text-xs font-semibold tracking-widest uppercase rounded-full {{ $book->category_color }}">
                        {{ $book->category->name }}
                    </span>

                    {{-- Title --}}
                    <p class="mt-4 text-base font-semibold leading-snug">
                        <a href="/hall/book/{{ $book->slug }}"
                           class="text-slate-900 hover:text-blue-600 capitalize transition-colors">
                            {{ $book->name }}
                        </a>
                    </p>

                    {{-- Excerpt --}}
                    <p class="mt-2 text-sm text-gray-500 leading-relaxed">
                        {{ Str::limit($book->body, 150) }}
                    </p>

                    {{-- Divider --}}
                    <div class="h-0 mt-6 mb-4 border-t-2 border-dashed border-gray-200"></div>

                    {{-- Author & date --}}
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1.5 text-xs font-bold tracking-widest text-gray-500 uppercase">
                            <i class="fa-solid fa-user text-blue-500 text-[10px]"></i>
                            <a href="/hall?author={{ $book->author->slug }}"
                               class="hover:text-blue-600 transition-colors">
                                {{ $book->author->name }}
                            </a>
                        </span>
                        <span class="flex items-center gap-1 text-xs text-gray-400">
                            <i class="fa-solid fa-clock text-[10px]"></i>
                            {{ optional($book->published_at)->diffForHumans() ?? 'Belum terbit' }}
                        </span>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

    {{-- View all --}}
    <div class="text-center mt-10">
        <a href="/hall"
           class="inline-flex items-center gap-2 border-2 border-slate-800 text-slate-800 hover:bg-slate-800 hover:text-white text-sm font-semibold px-7 py-3 rounded-xl transition-all duration-200">
            <i class="fa-solid fa-book"></i>
            Lihat Semua Buku
        </a>
    </div>

</section>
@endsection