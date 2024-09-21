@extends('auth.main')

@section('content')
<div class="container mt-5">
    <h1>Edit Flower Details</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Flower Form -->
    <form action="{{ route('flower.update', $flower->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Species Field -->
        <div class="form-group">
            <label for="species">Species</label>
            <input type="text" class="form-control @error('species') is-invalid @enderror" id="species" name="species" value="{{ old('species', $flower->species) }}" required>
            @error('species')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Flower Type Field -->
        <div class="form-group">
            <label for="flower_type">Flower Type</label>
            <input type="text" class="form-control @error('flower_type') is-invalid @enderror" id="flower_type" name="flower_type" value="{{ old('flower_type', $flower->flower_type) }}" required>
            @error('flower_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Plant Type Field -->
        <div class="form-group">
            <label for="plant_type">Plant Type</label>
            <input type="text" class="form-control @error('plant_type') is-invalid @enderror" id="plant_type" name="plant_type" value="{{ old('plant_type', $flower->plant_type) }}" required>
            @error('plant_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Upload Field -->
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
            @if($flower->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $flower->image) }}" alt="Current Flower Image" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Flower</button>
    </form>
</div>
@endsection
