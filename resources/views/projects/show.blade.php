@extends('layouts.app')

@section('content')
    <div class="form-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ $project->title }}</h1>
            <div>
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            @if($project->image)
                <img src="{{ $project->image_url }}" class="card-img-top" alt="{{ $project->title }}">
            @endif
            <div class="card-body">
                <p class="card-text">
                    <strong>Status:</strong> 
                    <span class="badge bg-{{ $project->status == 'published' ? 'success' : 'secondary' }}">
                        {{ ucfirst($project->status) }}
                    </span>
                </p>
                
                @if($project->description)
                    <div class="mb-3">
                        <h5>Description</h5>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                @endif
                
                @if($project->project_url)
                    <div class="mb-3">
                        <h5>Project URL</h5>
                        <a href="{{ $project->project_url }}" target="_blank">{{ $project->project_url }}</a>
                    </div>
                @endif
            </div>
        </div>

        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to Projects</a>
    </div>
@endsection