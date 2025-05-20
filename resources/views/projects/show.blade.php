@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $project->title }}</h1>
        <div>
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @if($project->image)
                <img src="{{ asset('images/' . $project->image) }}" class="img-fluid mb-3">
            @endif
        </div>
        <div class="col-md-6">
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $project->status == 'published' ? 'success' : 'secondary' }}">
                    {{ ucfirst($project->status) }}
                </span>
            </p>
            
            @if($project->description)
                <p><strong>Description:</strong> {{ $project->description }}</p>
            @endif
            
            @if($project->project_url)
                <p><strong>Project URL:</strong> <a href="{{ $project->project_url }}" target="_blank">{{ $project->project_url }}</a></p>
            @endif
        </div>
    </div>

    <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Back to Projects</a>
@endsection