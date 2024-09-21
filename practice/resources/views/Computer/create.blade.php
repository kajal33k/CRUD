@extends('auth.main')

@section('content')
<div class="container mt-5">
    <h1>Create Computer</h1>

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

    <!-- Computer Form -->
    <form action="{{ route('computer.store') }}" method="POST">
        @csrf

        <!-- Computer Name Field -->
        <div class="form-group">
            <label for="name">Computer Name</label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name') }}" 
                required 
                aria-describedby="nameHelp"
                placeholder="Enter computer name"
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Brand Field -->
        <div class="form-group">
            <label for="brand">Brand</label>
            <input 
                type="text" 
                class="form-control @error('brand') is-invalid @enderror" 
                id="brand" 
                name="brand" 
                value="{{ old('brand') }}" 
                required 
                aria-describedby="brandHelp"
                placeholder="Enter computer brand"
            >
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Processor Field -->
        <div class="form-group">
            <label for="processor">Processor</label>
            <input 
                type="text" 
                class="form-control @error('processor') is-invalid @enderror" 
                id="processor" 
                name="processor" 
                value="{{ old('processor') }}" 
                required 
                aria-describedby="processorHelp"
                placeholder="Enter processor details"
            >
            @error('processor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- RAM Field -->
        <div class="form-group">
            <label for="ram">RAM (GB)</label>
            <input 
                type="number" 
                class="form-control @error('ram') is-invalid @enderror" 
                id="ram" 
                name="ram" 
                value="{{ old('ram') }}" 
                required 
                aria-describedby="ramHelp"
                placeholder="Enter RAM in GB"
            >
            @error('ram')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Storage Field -->
        <div class="form-group">
            <label for="storage">Storage (GB)</label>
            <input 
                type="number" 
                class="form-control @error('storage') is-invalid @enderror" 
                id="storage" 
                name="storage" 
                value="{{ old('storage') }}" 
                required 
                aria-describedby="storageHelp"
                placeholder="Enter storage capacity in GB"
            >
            @error('storage')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Price Field -->
        <div class="form-group">
            <label for="price">Price ($)</label>
            <input 
                type="number" 
                step="0.01" 
                class="form-control @error('price') is-invalid @enderror" 
                id="price" 
                name="price" 
                value="{{ old('price') }}" 
                required 
                aria-describedby="priceHelp"
                placeholder="Enter price in USD"
            >
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
