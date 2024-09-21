@extends('auth.main')
@section('content')
    <div class="container mt-5">

        <a href="{{ route('student.create') }}" class="btn btn-primary">Add New Student</a>

        <h1>Students List</h1>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Students Table -->
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

                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->qulification }}</td>
                        <td>{{ $student->address }}</td>
                        <td colspan="2">
                            <a href="{{route('student.edit',$student->id)}}" class="btn btn-primary">edit</a>
                            <a href="{{route('student.delete',$student->id)}}" class="btn btn-danger ">delete</a>
                        </td>

                    </tr>
                @endforeach
                {{-- @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->qualification }}</td>
                    <td>{{ $student->address }}</td>
                    <td>
                        <!-- Actions such as Edit and Delete can go here -->
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach --}}
            </tbody>
        </table>

    </div>
@endsection
