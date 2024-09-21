@extends('auth.main') <!-- Assuming you have a main layout file 'app.blade.php' in the layouts directory -->

@section('content')
<div class="container mt-5">
    <!-- Link to add a new hospital -->
    <a href="{{ route('hospital.create') }}" class="btn btn-primary mb-3">Add New Hospital</a>

    <h1>Hospital List</h1>

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hospital Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip Code</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hospitals as $hospital)
                <tr>
                    <td>{{ $hospital->id }}</td>
                    <td>{{ $hospital->name }}</td>
                    <td>{{ $hospital->address }}</td>
                    <td>{{ $hospital->city }}</td>
                    <td>{{ $hospital->state }}</td>
                    <td>{{ $hospital->zip_code }}</td>
                    <td>{{ $hospital->phone }}</td>
                    <td>{{ $hospital->email }}</td>
                    <td>{{ $hospital->website }}</td>
                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('hospital.edit', $hospital->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete action wrapped in a form -->
                        <form action="{{ route('hospital.destroy', $hospital->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this hospital?');">
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

