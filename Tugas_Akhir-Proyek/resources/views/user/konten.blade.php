@extends('layouts.app')

@section('content')
<style>
    .custom-breadcrumb {
        background-color: #f8f9fa;
        padding: 12px 20px;
        border-radius: 8px;
        display: inline-block;
    }

    .custom-breadcrumb .breadcrumb-item a {
        text-decoration: none;
        color: #0d6efd;
        font-weight: 500;
    }

    .custom-breadcrumb .breadcrumb-item a:hover {
        color: #0a58ca;
    }

    .custom-breadcrumb .breadcrumb-item.active {
        color: #6c757d;
    }

    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: none;
        }
    }
</style>

<div class="container py-5 fade-in">
    <div class="text-center mb-4">
        <h1 class="fw-bold">{{ $konten->title }}</h1>
        <nav aria-label="breadcrumb" class="custom-breadcrumb mt-3">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.kategori', $konten->subcategory->category->slug ?? '#') }}">
                        {{ $konten->subcategory->category->name ?? 'Kategori' }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $konten->title }}</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow-sm p-4 fade-in" style="animation-delay: 0.2s;">
        <div class="text-center">
            @if($konten->image_path)
                <img src="{{ asset('storage/' . $konten->image_path) }}" class="img-fluid mb-4"
                     style="max-width: 600px; border-radius: 12px;" alt="Gambar">
            @endif
        </div>

        <div class="text-center mb-2">
            <span class="text-muted">
                Kategori: {{ $konten->subcategory->category->name ?? '-' }} /
                {{ $konten->subcategory->name ?? '-' }}
            </span>
        </div>

        <div class="content-body mx-auto mt-3" style="max-width: 800px; text-align: justify;">
            {!! nl2br(e($konten->description)) !!}
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('user.home') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
