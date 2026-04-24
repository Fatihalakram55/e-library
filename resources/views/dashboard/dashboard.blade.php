@extends('dashboard.layout.main')
@section('content')
{{-- Isi bagian ini ke dalam area konten dashboard (kotak merah) --}}

<div class="p-3 space-y-5">

    {{-- ── HEADER ── --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-slate-800">Dashboard</h1>
            <p class="text-sm text-slate-400 mt-0.5">Selamat datang, {{ auth()->user()->name ?? 'Admin' }} 👋</p>
        </div>
        <a href="/dashboard/book/create"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold px-4 py-2 rounded-lg transition-colors duration-200">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
            Tambah Buku
        </a>
    </div>

    {{-- ── STAT CARDS ── --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

        <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs text-slate-400 font-medium uppercase tracking-wide">Total Buku</p>
                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-slate-900">{{ isset($totalBooks) ? number_format($totalBooks) : '0' }}</p>
            <p class="text-[10px] text-emerald-600 font-medium mt-1">koleksi tersedia</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs text-slate-400 font-medium uppercase tracking-wide">Anggota</p>
                <div class="w-8 h-8 bg-emerald-50 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-slate-900">{{ isset($totalUsers) ? number_format($totalUsers) : '0' }}</p>
            <p class="text-[10px] text-emerald-600 font-medium mt-1">user terdaftar</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs text-slate-400 font-medium uppercase tracking-wide">Dipinjam</p>
                <div class="w-8 h-8 bg-amber-50 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-slate-900">{{ isset($activeBorrows) ? number_format($activeBorrows) : '0' }}</p>
            <p class="text-[10px] text-amber-600 font-medium mt-1">
                {{ isset($overdueBorrows) && $overdueBorrows > 0 ? $overdueBorrows.' terlambat' : 'sedang dipinjam' }}
            </p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs text-slate-400 font-medium uppercase tracking-wide">Kategori</p>
                <div class="w-8 h-8 bg-violet-50 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-slate-900">{{ isset($totalCategories) ? $totalCategories : '0' }}</p>
            <p class="text-[10px] text-slate-400 font-medium mt-1">kategori tersedia</p>
        </div>

    </div>

    {{-- ── TABEL PEMINJAMAN + BUKU TERBARU ── --}}
    <div class="grid grid-cols-3 gap-5">

        {{-- Tabel Peminjaman Terbaru --}}
        <div class="col-span-2 bg-white rounded-xl border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-bold text-slate-800">Peminjaman Terbaru</h2>
                <a href="/dashboard/borrow" class="text-xs text-blue-600 hover:text-blue-800 transition-colors">Lihat semua →</a>
            </div>
            <table class="w-full text-xs">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left text-[10px] font-semibold text-slate-400 uppercase tracking-wide pb-2 pr-3">Peminjam</th>
                        <th class="text-left text-[10px] font-semibold text-slate-400 uppercase tracking-wide pb-2 pr-3">Judul Buku</th>
                        <th class="text-left text-[10px] font-semibold text-slate-400 uppercase tracking-wide pb-2 pr-3">Tgl Pinjam</th>
                        <th class="text-left text-[10px] font-semibold text-slate-400 uppercase tracking-wide pb-2 pr-3">Batas</th>
                        <th class="text-left text-[10px] font-semibold text-slate-400 uppercase tracking-wide pb-2">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @isset($recentBorrows)
                        @forelse($recentBorrows as $borrow)
                            @php
                                $daysLeft = now()->diffInDays(
                                    \Carbon\Carbon::parse($borrow->due_date), false
                                );
                            @endphp
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-2.5 pr-3">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-slate-200 flex items-center justify-center flex-shrink-0 text-[10px] font-bold text-slate-600">
                                            {{ strtoupper(substr($borrow->user->name, 0, 1)) }}
                                        </div>
                                        <span class="font-medium text-slate-700 truncate max-w-[90px]">{{ $borrow->user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-2.5 pr-3 text-slate-500 truncate max-w-[110px] capitalize">{{ $borrow->book->name }}</td>
                                <td class="py-2.5 pr-3 text-slate-400">
                                    {{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d M Y') }}
                                </td>
                                <td class="py-2.5 pr-3 text-slate-400">
                                    {{ \Carbon\Carbon::parse($borrow->due_date)->format('d M Y') }}
                                </td>
                                <td class="py-2.5">
                                    @if($borrow->status == 'dikembalikan')
                                        <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-semibold px-2 py-0.5 rounded-full">Dikembalikan</span>
                                    @elseif($borrow->status == 'ditolak')
                                        <span class="bg-red-50 text-red-700 border border-red-200 text-[10px] font-semibold px-2 py-0.5 rounded-full">Ditolak</span>
                                    @elseif($borrow->status == 'dipinjem' && $daysLeft < 0)
                                        <span class="bg-red-50 text-red-700 border border-red-200 text-[10px] font-semibold px-2 py-0.5 rounded-full">Terlambat</span>
                                    @elseif($borrow->status == 'dipinjem' && $daysLeft <= 3)
                                        <span class="bg-amber-50 text-amber-700 border border-amber-200 text-[10px] font-semibold px-2 py-0.5 rounded-full">Segera</span>
                                    @elseif($borrow->status == 'dipinjem')
                                        <span class="bg-blue-50 text-blue-700 border border-blue-200 text-[10px] font-semibold px-2 py-0.5 rounded-full">Dipinjam</span>
                                    @elseif($borrow->status == 'diajukan')
                                        <span class="bg-violet-50 text-violet-700 border border-violet-200 text-[10px] font-semibold px-2 py-0.5 rounded-full">Diajukan</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-10 text-center text-slate-400">Belum ada data peminjaman.</td>
                            </tr>
                        @endforelse
                    @endisset
                </tbody>
            </table>
        </div>

        {{-- Buku Terbaru --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-bold text-slate-800">Buku Terbaru</h2>
                <a href="/dashboard/book" class="text-xs text-blue-600 hover:text-blue-800 transition-colors">Semua →</a>
            </div>
            <div class="space-y-3">
                @isset($recentBooks)
                    @forelse($recentBooks as $book)
                        <div class="flex items-center gap-3 group">
                            @if($book->cover)
                                <img src="{{ Storage::url($book->cover) }}"
                                     class="w-9 h-12 rounded-md object-cover flex-shrink-0"
                                     alt="{{ $book->name }}"/>
                            @else
                                <div class="w-9 h-12 rounded-md bg-slate-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="min-w-0 flex-1">
                                <p class="text-xs font-semibold text-slate-800 truncate capitalize group-hover:text-blue-600 transition-colors">
                                    <a href="/hall/book/{{ $book->slug }}">{{ $book->name }}</a>
                                </p>
                                <p class="text-[10px] text-slate-400 mt-0.5">{{ $book->author->name }}</p>
                                <span class="text-[10px] text-blue-600 font-medium">{{ $book->category->name }}</span>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 text-center py-6">Belum ada buku.</p>
                    @endforelse
                @endisset
            </div>
        </div>

    </div>

    {{-- ── QUICK ACTIONS ── --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">

        <a href="/dashboard/book/create"
           class="bg-blue-600 hover:bg-blue-500 text-white rounded-xl p-4 flex items-center gap-3 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg">
            <div class="w-9 h-9 bg-white bg-opacity-20 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold">Tambah Buku</p>
                <p class="text-[10px] text-blue-200 mt-0.5">Upload koleksi baru</p>
            </div>
        </a>

        <a href="/dashboard/user"
           class="bg-white hover:bg-slate-50 border border-gray-200 rounded-xl p-4 flex items-center gap-3 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md">
            <div class="w-9 h-9 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-800">Kelola User</p>
                <p class="text-[10px] text-slate-400 mt-0.5">Lihat semua anggota</p>
            </div>
        </a>

        <a href="/dashboard/borrow"
           class="bg-white hover:bg-slate-50 border border-gray-200 rounded-xl p-4 flex items-center gap-3 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md">
            <div class="w-9 h-9 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-800">Peminjaman</p>
                <p class="text-[10px] text-slate-400 mt-0.5">
                    @if(isset($pendingBorrows) && $pendingBorrows > 0)
                        {{ $pendingBorrows }} menunggu approval
                    @else
                        Monitor status borrow
                    @endif
                </p>
            </div>
        </a>

        <a href="/dashboard/category"
           class="bg-white hover:bg-slate-50 border border-gray-200 rounded-xl p-4 flex items-center gap-3 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md">
            <div class="w-9 h-9 bg-violet-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h7"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-800">Kategori</p>
                <p class="text-[10px] text-slate-400 mt-0.5">Atur kategori buku</p>
            </div>
        </a>

    </div>

</div>
@endsection