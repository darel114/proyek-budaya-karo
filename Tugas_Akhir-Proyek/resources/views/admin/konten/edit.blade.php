@extends('layouts.admin')

@section('content')
<div class="container">
    <x-alert />
    <h3 class="mb-4">Edit Konten</h3>
    <div class="card shadow-sm p-4">
        <form method="POST" action="{{ route('admin.konten.update', $konten->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" value="{{ $konten->title }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ $konten->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="sub_category_id" class="form-label">Subkategori</label>
                <select name="sub_category_id" id="sub_category_id" class="form-select" required>
                    @foreach ($subcategories as $sub)
                        <option value="{{ $sub->id }}" {{ $konten->sub_category_id == $sub->id ? 'selected' : '' }}>
                            {{ $sub->category->name }} / {{ $sub->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar (Kosongkan jika tidak ganti)</label><br>
                @if($konten->image_path)
                    <img src="{{ asset('storage/' . $konten->image_path) }}" class="img-thumbnail mb-2" width="200">
                @endif
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.konten.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
