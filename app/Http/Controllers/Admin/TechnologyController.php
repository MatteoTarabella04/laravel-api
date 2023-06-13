<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderByDesc('id')->get();

        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        //
    }

    public function store(StoreTechnologyRequest $request)
    {
        $val_data = $request->validated();

        $slug = Str::slug($request->name);

        $val_data['slug'] = $slug;

        Technology::create($val_data);
        return to_route('admin.technologies.index')->with('message', 'Technology created successfully');
    }

    public function show(Technology $technology)
    {
        //
    }

    public function edit(Technology $technology)
    {
        return view('admin.technologies.index', compact('technology'));
    }

    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $val_data = $request->validated();

        $slug = Str::slug($request->name);

        $val_data['slug'] = $slug;

        $technology->update($val_data);

        return to_route('admin.technologies.index')->with('message', 'Technology Updated successfully');
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();
        return to_route('admin.technologies.index')->with('message', 'Technology deleted successfully');
    }
}