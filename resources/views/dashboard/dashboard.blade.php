@extends('dashboard.layout.main')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
            Selamat datang di halaman dashboard E-Library, {{ auth()->user()->name }}!
        </div>
    </div>
@endsection