@extends('auth.main')

@section('content')
<div class="container mt-5">
    <h1>Edit Family</h1>

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

    <!-- Family Edit Form -->
    <form action="{{ route('family.update', $family->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name</label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name', $family->name) }}" 
                required 
                aria-describedby="nameHelp"
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email</label>
            <input 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                id="email" 
                name="email" 
                value="{{ old('email', $family->email) }}" 
                aria-describedby="emailHelp"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Age Field -->
        <div class="form-group">
            <label for="age">Age</label>
            <input 
                type="number" 
                class="form-control @error('age') is-invalid @enderror" 
                id="age" 
                name="age" 
                value="{{ old('age', $family->age) }}" 
                required 
                aria-describedby="ageHelp"
            >
            @error('age')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Qualification Field -->
        <div class="form-group">
            <label for="qualification">Qualification</label>
            <input 
                type="text" 
                class="form-control @error('qualification') is-invalid @enderror" 
                id="qualification" 
                name="qualification" 
                value="{{ old('qualification', $family->qualification) }}" 
                required 
                aria-describedby="qualificationHelp"
            >
            @error('qualification')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Address Field -->
        <div class="form-group">
            <label for="address">Address</label>
            <textarea 
                class="form-control @error('address') is-invalid @enderror" 
                id="address" 
                name="address" 
                rows="4" 
                required 
                aria-describedby="addressHelp"
            >{{ old('address', $family->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
