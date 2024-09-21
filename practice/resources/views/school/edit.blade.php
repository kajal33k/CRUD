@extends('auth.main')

@section('content')
<div class="container mt-5">
    <h1>Edit School</h1>

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

    <!-- School Form -->
    <form action="{{ route('school.update', $school->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Indicate that this is a PUT request for updating -->

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $school->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" class="form-control @error('course') is-invalid @enderror" id="course" name="course" value="{{ old('course', $school->course) }}" required>
            @error('course')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="branch">Branch</label>
            <input type="text" class="form-control @error('branch') is-invalid @enderror" id="branch" name="branch" value="{{ old('branch', $school->branch) }}" required>
            @error('branch')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @if($school->image)
                <img src="{{ asset('storage/' . $school->image) }}" alt="School Image" class="mt-2" style="max-width: 200px;">
            @endif
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
