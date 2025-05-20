@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1>@yield('title', 'Add New Project')</h1>

        <form method="POST" action="@yield('form-action', route('projects.store'))" enctype="multipart/form-data">
            @csrf
            @yield('method')

            <div class="mb-3">
                <label for="title" class="form-label">Title*</label>
                <input type="text" class="form-control" id="title" name="title" 
                       value="{{ old('title', $project->title ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" 
                          rows="3">{{ old('description', $project->description ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="project_url" class="form-label">Project URL</label>
                <input type="url" class="form-control" id="project_url" name="project_url"
                       value="{{ old('project_url', $project->project_url ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image @yield('image-required', '*')</label>
                <input type="file" class="form-control" id="image" name="image" 
                       @yield('image-attributes', 'required') accept="image/*">
                <small class="text-muted">Max 2MB (JPEG, PNG, JPG, GIF)</small>
                @yield('current-image')
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status*</label>
                <select class="form-select" id="status" name="status" required>
                    @foreach(['draft' => 'Draft', 'published' => 'Published'] as $value => $label)
                        <option value="{{ $value }}" {{ old('status', $project->status ?? '') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">@yield('button-text', 'Create Project')</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection