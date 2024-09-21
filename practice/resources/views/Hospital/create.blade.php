@extends('auth.main') <!-- or replace with your layout -->

@section('content')
<div class="container mt-5">
    <h1>Create Hospital Details</h1>

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

    <!-- Hospital Form -->
    <form action="{{ route('hospital.store') }}" method="POST">
        @csrf

       
       <!-- Name Field -->
<div class="form-group">
    <label for="name">Hospital Name</label>
    <input 
        type="text" 
        class="form-control @error('name') is-invalid @enderror" 
        id="name" 
        name="name" 
        value="{{ old('name') }}" 
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
                value="{{ old('email') }}" 
                required 
                aria-describedby="emailHelp"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contact Number Field -->
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input 
                type="text" 
                class="form-control @error('contact_number') is-invalid @enderror" 
                id="contact_number" 
                name="contact_number" 
                value="{{ old('contact_number') }}" 
                required 
                aria-describedby="contactNumberHelp"
            >
            @error('contact_number')
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
            >{{ old('address') }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Specialties Field -->
        <div class="form-group">
            <label for="specialties">Specialties</label>
            <input 
                type="text" 
                class="form-control @error('specialties') is-invalid @enderror" 
                id="specialties" 
                name="specialties" 
                value="{{ old('specialties') }}" 
                required 
                aria-describedby="specialtiesHelp"
            >
            @error('specialties')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Website Field -->
        <div class="form-group">
            <label for="website">Website</label>
            <input 
                type="text" 
                class="form-control @error('website') is-invalid @enderror" 
                id="website" 
                name="website" 
                value="{{ old('website') }}" 
                aria-describedby="websiteHelp"
            >
            @error('website')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
