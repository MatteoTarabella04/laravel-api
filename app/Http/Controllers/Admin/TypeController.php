<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderByDesc('id')->get();

        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        //
    }

    public function store(StoreTypeRequest $request)
    {
        $val_data = $request->validated();

        $slug = Str::slug($request->name);

        $val_data['slug'] = $slug;

        Type::create($val_data);
        return to_route('admin.types.index')->with('message', 'Type created successfully');
    }

    public function show(Type $type)
    {
        //
    }

    public function edit(Type $type)
    {
        //
    }

    public function update(UpdateTypeRequest $request, Type $type)
    {
        //
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('admin.types.index')->with('message', 'Type deleted successfully');
    }
}