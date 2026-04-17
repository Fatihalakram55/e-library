@extends('layouts.main')

@section('konten')

{{-- ── HERO ── --}}
<div class="relative bg-slate-800 rounded-2xl px-8 py-10 text-center overflow-hidden mb-5">
    <span class="inline-block bg-slate-900 text-white text-xs px-4 py-1 rounded-full border border-slate-700 mb-4 tracking-wide">
        Platform Literasi Digital
    </span>
    <h2 class="text-3xl font-bold text-white mb-3">Perpustakaan Digital untuk Semua</h2>
    <p class="text-slate-300 text-sm leading-relaxed max-w-xl mx-auto mb-6">
        Platform e-library modern yang dirancang untuk memudahkan akses koleksi buku, mengelola peminjaman, dan mendukung kegiatan literasi secara digital kapan saja dan di mana saja.
    </p>
    <div class="flex justify-center gap-3">
        <img src="https://picsum.photos/seed/library1/120/80" class="rounded-lg object-cover h-20 w-28 opacity-70" alt="library" />
        <img src="https://picsum.photos/seed/library2/120/80" class="rounded-lg object-cover h-20 w-28 opacity-80" alt="library" />
        <img src="https://picsum.photos/seed/library3/120/80" class="rounded-lg object-cover h-20 w-28 opacity-70" alt="library" />
    </div>
</div>

{{-- ── STATS ── --}}
<div class="grid grid-cols-3 gap-4 mb-5">
    <div class="bg-white rounded-xl border border-gray-200 p-5 text-center transition-all duration-200 hover:-translate-y-1 hover:shadow-lg">
        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mx-auto mb-3 text-lg">📚</div>
        <p class="text-2xl font-bold text-slate-900">12.400+</p>
        <p class="text-xs text-gray-400 mt-1">Koleksi Buku</p>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-5 text-center transition-all duration-200 hover:-translate-y-1 hover:shadow-lg">
        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mx-auto mb-3 text-lg">👥</div>
        <p class="text-2xl font-bold text-slate-900">3.800+</p>
        <p class="text-xs text-gray-400 mt-1">Anggota Aktif</p>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-5 text-center transition-all duration-200 hover:-translate-y-1 hover:shadow-lg">
        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mx-auto mb-3 text-lg">📖</div>
        <p class="text-2xl font-bold text-slate-900">9.200+</p>
        <p class="text-xs text-gray-400 mt-1">Peminjaman Selesai</p>
    </div>
</div>

{{-- ── FEATURES & TEAM ── --}}
<div class="grid grid-cols-2 gap-4 mb-5">

    {{-- Features --}}
    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <h3 class="text-sm font-semibold text-slate-900 pb-3 mb-4 border-b border-gray-100">Fitur Utama</h3>
        <div class="space-y-4">
            <div class="flex gap-3">
                <div class="w-2 h-2 rounded-full bg-blue-600 mt-1.5 flex-shrink-0"></div>
                <div>
                    <p class="text-sm font-semibold text-slate-800">Katalog Digital</p>
                    <p class="text-xs text-gray-500 leading-relaxed mt-0.5">Jelajahi ribuan koleksi buku dengan pencarian cepat berdasarkan judul, penulis, atau kategori.</p>
                </div>
            </div>
            <div class="flex gap-3">
                <div class="w-2 h-2 rounded-full bg-blue-600 mt-1.5 flex-shrink-0"></div>
                <div>
                    <p class="text-sm font-semibold text-slate-800">Peminjaman Online</p>
                    <p class="text-xs text-gray-500 leading-relaxed mt-0.5">Proses peminjaman dan pengembalian buku secara digital tanpa perlu datang ke perpustakaan.</p>
                </div>
            </div>
            <div class="flex gap-3">
                <div class="w-2 h-2 rounded-full bg-blue-600 mt-1.5 flex-shrink-0"></div>
                <div>
                    <p class="text-sm font-semibold text-slate-800">Notifikasi Otomatis</p>
                    <p class="text-xs text-gray-500 leading-relaxed mt-0.5">Pengingat batas peminjaman dan info ketersediaan buku dikirim secara otomatis.</p>
                </div>
            </div>
            <div class="flex gap-3">
                <div class="w-2 h-2 rounded-full bg-blue-600 mt-1.5 flex-shrink-0"></div>
                <div>
                    <p class="text-sm font-semibold text-slate-800">Manajemen Anggota</p>
                    <p class="text-xs text-gray-500 leading-relaxed mt-0.5">Pengelolaan data anggota dan riwayat peminjaman yang terintegrasi dan mudah diakses.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Team --}}
    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <h3 class="text-sm font-semibold text-slate-900 pb-3 mb-4 border-b border-gray-100">Tim Pengembang</h3>
        <div class="grid grid-cols-2 gap-3">
            <div class="bg-gray-50 rounded-xl border border-gray-100 p-3 text-center transition-all duration-200 hover:-translate-y-1 hover:shadow-md">
                <img src="https://picsum.photos/seed/person1/56/56" class="w-12 h-12 rounded-full object-cover mx-auto mb-2 ring-2 ring-blue-200" alt="Rizky D." />
                <p class="text-xs font-semibold text-slate-800">Rizky D.</p>
                <p class="text-[10px] text-gray-400 mt-0.5">Project Lead</p>
            </div>
            <div class="bg-gray-50 rounded-xl border border-gray-100 p-3 text-center transition-all duration-200 hover:-translate-y-1 hover:shadow-md">
                <img src="https://picsum.photos/seed/person2/56/56" class="w-12 h-12 rounded-full object-cover mx-auto mb-2 ring-2 ring-blue-200" alt="Annisa N." />
                <p class="text-xs font-semibold text-slate-800">Annisa N.</p>
                <p class="text-[10px] text-gray-400 mt-0.5">UI/UX Designer</p>
            </div>
            <div class="bg-gray-50 rounded-xl border border-gray-100 p-3 text-center transition-all duration-200 hover:-translate-y-1 hover:shadow-md">
                <img src="https://picsum.photos/seed/person3/56/56" class="w-12 h-12 rounded-full object-cover mx-auto mb-2 ring-2 ring-blue-200" alt="Bagas F." />
                <p class="text-xs font-semibold text-slate-800">Bagas F.</p>
                <p class="text-[10px] text-gray-400 mt-0.5">Frontend Dev</p>
            </div>
            <div class="bg-gray-50 rounded-xl border border-gray-100 p-3 text-center transition-all duration-200 hover:-translate-y-1 hover:shadow-md">
                <img src="https://picsum.photos/seed/person4/56/56" class="w-12 h-12 rounded-full object-cover mx-auto mb-2 ring-2 ring-blue-200" alt="Dewi M." />
                <p class="text-xs font-semibold text-slate-800">Dewi M.</p>
                <p class="text-[10px] text-gray-400 mt-0.5">Backend Dev</p>
            </div>
        </div>
        <div class="mt-3 bg-blue-50 rounded-lg p-3 border border-blue-100">
            <p class="text-xs text-blue-900 leading-relaxed">Dikembangkan sebagai proyek tugas akhir mahasiswa Teknik Informatika untuk memodernisasi sistem perpustakaan konvensional.</p>
        </div>
    </div>
</div>

{{-- ── VISION ── --}}
<div class="bg-slate-800 rounded-xl p-5 flex items-center gap-5 mb-5">
    <div class="w-14 h-14 rounded-xl bg-slate-700 flex items-center justify-center text-2xl flex-shrink-0">🎯</div>
    <div class="flex-1">
        <h3 class="text-white font-semibold text-sm mb-1">Visi &amp; Misi</h3>
        <p class="text-slate-300 text-xs leading-relaxed">Menjadi platform perpustakaan digital terdepan yang mendorong budaya membaca dan kemudahan akses informasi bagi seluruh lapisan masyarakat, dengan teknologi yang andal dan antarmuka yang ramah pengguna.</p>
    </div>
    <div class="flex gap-2 flex-shrink-0">
        <img src="https://picsum.photos/seed/reading1/72/72" class="w-16 h-16 rounded-lg object-cover opacity-80" alt="reading" />
        <img src="https://picsum.photos/seed/reading2/72/72" class="w-16 h-16 rounded-lg object-cover opacity-70" alt="reading" />
    </div>
</div>

{{-- ── CONTACT ── --}}
<div class="grid grid-cols-3 gap-4">
    <div class="bg-white rounded-xl border border-gray-200 p-4 flex items-center gap-3 transition-all duration-200 hover:-translate-y-1 hover:shadow-md">
        <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center text-base flex-shrink-0">✉️</div>
        <div>
            <p class="text-[10px] text-gray-400 uppercase tracking-wide">Email</p>
            <p class="text-sm font-semibold text-slate-800">elibrary@mail.com</p>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-4 flex items-center gap-3 transition-all duration-200 hover:-translate-y-1 hover:shadow-md">
        <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center text-base flex-shrink-0">📍</div>
        <div>
            <p class="text-[10px] text-gray-400 uppercase tracking-wide">Lokasi</p>
            <p class="text-sm font-semibold text-slate-800">Jl. Pendidikan No. 12, Jakarta</p>
        </div>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-4 flex items-center gap-3 transition-all duration-200 hover:-translate-y-1 hover:shadow-md">
        <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center text-base flex-shrink-0">📞</div>
        <div>
            <p class="text-[10px] text-gray-400 uppercase tracking-wide">Telepon</p>
            <p class="text-sm font-semibold text-slate-800">+62 21 1234 5678</p>
        </div>
    </div>
</div>

@endsection