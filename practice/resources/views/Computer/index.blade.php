
@extends('auth.main') 

@section('content')
<div class="container mt-5">
    <h1>Manage Computers</h1>

    <!-- Display success or error messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Computers List -->
    <h2>List of Computers</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Processor</th>
                <th>RAM</th>
                <th>Storage</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($computers as $computer)
                <tr>
                    <td>{{ $computer->id }}</td>
                    <td>{{ $computer->name }}</td>
                    <td>{{ $computer->brand }}</td>
                    <td>{{ $computer->processor }}</td>
                    <td>{{ $computer->ram }}</td>
                    <td>{{ $computer->storage }}</td>
                    <td>
                        <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('computer.destroy', $computer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add New Computer Form -->
    <h2>Add New Computer</h2>
    <form action="{{ route('computer.store') }}" method="POST">
        @csrf

        <!-- Computer Name Field -->
        <div class="form-group">
            <label for="name">Name</label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name') }}" 
                required
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
            >
            @error('processor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- RAM Field -->
        <div class="form-group">
            <label for="ram">RAM</label>
            <input 
                type="text" 
                class="form-control @error('ram') is-invalid @enderror" 
                id="ram" 
                name="ram" 
                value="{{ old('ram') }}" 
                required
            >
            @error('ram')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Storage Field -->
        <div class="form-group">
            <label for="storage">Storage</label>
            <input 
                type="text" 
                class="form-control @error('storage') is-invalid @enderror" 
                id="storage" 
                name="storage" 
                value="{{ old('storage') }}" 
                required
            >
            @error('storage')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Computer</button>
    </form>
</div>
@endsection
