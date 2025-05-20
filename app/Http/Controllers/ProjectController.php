<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Display all projects
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    // Show create form
    public function create()
    {
        return view('projects.create', [
            'statuses' => ['draft' => 'Draft', 'published' => 'Published']
        ]);
    }

    // Store new project
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        try {
            // Store image
            $imagePath = $request->file('image')->store('project-images', 'public');
            
            // Create project
            Project::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'project_url' => $validated['project_url'],
                'image' => $imagePath,
                'status' => $validated['status'],
            ]);

            return redirect()->route('projects.index')
                ->with('success', 'Project created successfully!');

        } catch (\Exception $e) {
            // Delete uploaded file if error occurs
            if (isset($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            return back()->withInput()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Show single project
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // Show edit form
    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'statuses' => ['draft' => 'Draft', 'published' => 'Published']
        ]);
    }

    // Update project
public function update(Request $request, Project $project)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'project_url' => 'nullable|url',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:draft,published',
    ]);

    try {
        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'project_url' => $validated['project_url'],
            'status' => $validated['status'],
        ];

        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')->store('project-images', 'public');
            $data['image'] = $newImagePath;

            // Delete old image
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
        }

        // This is the key line - updates existing project
        $project->update($data);

        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully!');

    } catch (\Exception $e) {
        return back()->withInput()
            ->with('error', 'Error: ' . $e->getMessage());
    }
}

    // Delete project
    public function destroy(Project $project)
    {
        try {
            // Delete associated image
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            $project->delete();

            return redirect()->route('projects.index')
                ->with('success', 'Project deleted successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}