
<x-layouts.app title="Courses">

    <h1>Courses</h1>

    <a href="{{ route('courses.create') }}" class="btn">
        Create New Course
    </a>

    <br><br>

    @forelse($courses as $course)

        <div>
            <h2>{{ $course->name }}</h2>

            <p>Description: {{ $course->description }}</p>
            <p>Duration: {{ $course->duration }} weeks</p>
            <p>Fee: {{ $course->fee }}</p>
            <p>Difficulty: {{ $course->difficulty }}</p>
            <p>Active: {{ $course->is_active ? 'Yes' : 'No' }}</p>

            <a href="{{ route('courses.show', $course) }}">
                View
            </a>

            <a href="{{ route('courses.edit', $course) }}">
                Edit
            </a>

            <x-delete-form
                :action="route('courses.destroy', $course)"
            />

            <hr>
        </div>

    @empty

        <p>No courses found.</p>

    @endforelse

</x-layouts.app>
