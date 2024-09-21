@extends('auth.main')

@section('content')
<div class="container mt-5">
    <a href="{{ route('family.create') }}" class="btn btn-primary mb-3">Add New Member</a>

    <h1>Family List</h1>

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Family Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Qualification</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($families as $family)
                <tr>
                    <td>{{ $family->id }}</td>
                    <td>{{ $family->name }}</td>
                    <td>{{ $family->email }}</td>
                    <td>{{ $family->age }}</td>
                    <td>{{ $family->qualification }}</td> <!-- Corrected from 'qulification' to 'qualification' -->
                    <td>{{ $family->address }}</td>
                    <td>
                        <a href="{{ route('family.edit', $family->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <!-- Delete action wrapped in a form -->
                        <form action="{{ route('family.delete', $family->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this member?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
