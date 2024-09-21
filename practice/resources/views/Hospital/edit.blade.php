@extends('auth.main')

@section('content')
<div class="container mt-5">
    <h1>Edit Hospital Details</h1>

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

    <!-- Hospital Edit Form -->
    <form action="{{ route('hospital.update', $hospital->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Hospital Name Field -->
        <div class="form-group">
            <label for="hospital_name">Hospital Name</label>
            <input 
                type="text" 
                class="form-control @error('hospital_name') is-invalid @enderror" 
                id="hospital_name" 
                name="hospital_name" 
                value="{{ old('hospital_name', $hospital->hospital_name) }}" 
                required 
                aria-describedby="hospitalNameHelp"
            >
            @error('hospital_name')
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
                value="{{ old('email', $hospital->email) }}" 
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
                value="{{ old('contact_number', $hospital->contact_number) }}" 
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
            >{{ old('address', $hospital->address) }}</textarea>
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
                value="{{ old('specialties', $hospital->specialties) }}" 
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
                type="url" 
                class="form-control @error('website') is-invalid @enderror" 
                id="website" 
                name="website" 
                value="{{ old('website', $hospital->website) }}" 
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
