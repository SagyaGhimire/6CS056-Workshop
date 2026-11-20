
@props(['course'])

<x-form-input
    name="name"
    label="Course Name"
    :value="$course->name"
/>

<x-form-textarea
    name="description"
    label="Description"
    :value="$course->description"
/>

<x-form-input
    name="duration"
    label="Duration (Weeks)"
    type="number"
    :value="$course->duration"
    min="1"
/>

<x-form-input
    name="fee"
    label="Fee"
    type="number"
    :value="$course->fee"
    step="0.01"
    min="0"
/>

<div class="form-group">
    <label for="difficulty">Difficulty</label>

    <select id="difficulty" name="difficulty">
        <option value="">Select Difficulty</option>

        <option value="Easy"
            {{ old('difficulty', $course->difficulty) == 'Easy' ? 'selected' : '' }}>
            Easy
        </option>

        <option value="Medium"
            {{ old('difficulty', $course->difficulty) == 'Medium' ? 'selected' : '' }}>
            Medium
        </option>

        <option value="Hard"
            {{ old('difficulty', $course->difficulty) == 'Hard' ? 'selected' : '' }}>
            Hard
        </option>
    </select>

    @error('difficulty')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <input type="hidden" name="is_active" value="0">

    <label>
        <input
            type="checkbox"
            name="is_active"
            value="1"
            {{ old('is_active', $course->is_active ?? true) ? 'checked' : '' }}
        >
        Active
    </label>

    @error('is_active')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
