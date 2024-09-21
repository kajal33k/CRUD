@extends('auth.main')

@section('content')
<div class="container mt-5">
    <!-- Button to add new school -->
    <a href="{{ route('school.create') }}" class="btn btn-primary mb-3">Add New School</a>

    <h1>School List</h1>

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Schools Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Branch</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($schools as $school)
                <tr>
                    <td>{{ $school->id }}</td>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->course }}</td>
                    <td>{{ $school->branch }}</td>
                    <td>
                        @if($school->image)
                            <img src="{{ asset('storage/' . $school->image) }}" alt="School Image" class="img-thumbnail" style="max-width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('school.edit', $school->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('school.destroy', $school->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No schools found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
