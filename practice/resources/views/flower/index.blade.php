@extends('auth.main')

@section('content')
<div class="container mt-5">
    <!-- Button to add new flower type -->
    <a href="{{ route('flower.create') }}" class="btn btn-primary mb-3">Add New Flower Type</a>

    <h1>Flower List</h1>

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Flowers Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Species</th>
                <th>Flower Type</th>
                <th>Plant Type</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($flowers as $flower)
                <tr>
                    <td>{{ $flower->id }}</td>
                    <td>{{ $flower->name }}</td>
                    <td>{{ $flower->course }}</td>
                    <td>{{ $flower->branch }}</td>
                    <td>
                        @if($flower->image)
                            <img src="{{ asset('storage/' . $flower->image) }}" alt="{{ $flower->name }}" class="img-thumbnail" style="max-width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('flower.edit', $flower->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('flower.destroy', $flower->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this flower?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No flowers found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
