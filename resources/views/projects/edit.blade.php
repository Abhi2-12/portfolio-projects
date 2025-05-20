@extends('projects.create')

@section('title', 'Edit Project')
@section('form-action', route('projects.update', $project))
@section('method')
    @method('PUT')
@endsection
@section('image-required', '') {{-- Remove required for edit --}}
@section('image-attributes', '') {{-- Remove required attribute --}}
@section('current-image')
    @if($project->image)
        <div class="mt-2">
            <p>Current Image:</p>
            <img src="{{ $project->image_url }}" alt="Current Image" width="150" class="img-thumbnail">
        </div>
    @endif
@endsection
@section('button-text', 'Update Project')