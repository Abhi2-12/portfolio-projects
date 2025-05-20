@extends('layouts.app')

@section('content')
    <h1>Edit Project</h1>

    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title*</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $project->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="project_url" class="form-label">Project URL</label>
            <input type="url" class="form-control" id="project_url" name="project_url" value="{{ $project->project_url }}">
        </div>

        <div class="mb-3">
            <label for="current_image" class="form-label">Current Image</label><br>
            @if($project->image)
                <img src="{{ asset('images/' . $project->image) }}" width="150" class="mb-2"><br>
            @endif
            <label for="image" class="form-label">New Image (Leave blank to keep current)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="draft" {{ $project->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $project->status == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection