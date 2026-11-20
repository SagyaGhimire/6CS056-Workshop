
<x-layouts.app title="Create Course">

    <h1>Create Course</h1>

    <form action="{{ route('courses.store') }}" method="POST">

        @csrf

        <x-courses.form :course="new \App\Models\Course()" />

        <button type="submit" class="btn">
            Create Course
        </button>

        <a href="{{ route('courses.index') }}">Back to Courses</a>

    </form>

</x-layouts.app>
