<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(5);

        return view('admin.projects.index', compact('projects'));
    }


    public function create()
    {
        $types = Type::orderByDesc('id')->get();
        $technologies = Technology::orderByDesc('id')->get();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($val_data['name']);

        $val_data['slug'] = $slug;

        $newProject = Project::create($val_data);

        if ($request->has('technologies')) {

            $newProject->technologies()->attach($request->technologies);
        }

        return to_route('admin.projects.index')->with('message', 'Project Created');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::orderByDesc('id')->get();
        $technologies = Technology::orderByDesc('id')->get();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($val_data['name']);

        $val_data['slug'] = $slug;

        $project->update($val_data);

        if ($request->has('technologies')) {

            $project->technologies()->sync($request->technologies);
        }


        return to_route('admin.projects.index')->with('message', 'Project Updated Succesfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Project Deleted!');
    }
}