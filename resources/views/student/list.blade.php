<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>

    <h1>Students</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="/students/create">Create New Student</a>

    <br><br>

    @forelse($students as $student)
<a href="/students/{{ $student->id }}">View</a>

<a href="/students/{{ $student->id }}/edit">Edit</a>

<form action="/students/{{ $student->id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')

    <button type="submit">
        Delete
    </button>
</form>
        <div>
            <h2>{{ $student->name }}</h2>

            <p>Email: {{ $student->email }}</p>
            <p>Phone: {{ $student->phone }}</p>
            <p>Address: {{ $student->address }}</p>
            <p>Date of Birth: {{ $student->date_of_birth }}</p>

            <hr>
        </div>

    @empty

        <p>No students found.</p>

    @endforelse

</body>
</html>
