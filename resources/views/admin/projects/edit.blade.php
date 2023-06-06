@extends('layouts.admin')

@section('content')
    <h1 class="py-3">Edit {{ $project->name }} Project</h1>


    @include('partials.validation_errors')

    <form action="{{ route('admin.projects.update', $project) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                aria-describedby="nameHelper" placeholder="Project name" value="{{ old('name', $project->name) }}">
            <small id="nameHelper" class="form-text text-muted">Type name max 150 characters - must be
                unique</small>
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                rows="3">{{ old('description', $project->description) }}</textarea>
            <small id="descriptionHelper" class="form-text text-muted">Type description</small>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start date</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                id="start_date" value="{{ old('start_date', $project->start_date) }}">
            <small id="start_dateHelper" class="form-text text-muted">Insert start date</small>
        </div>

        <div class="mb-3">
            <label for="finish_date" class="form-label">Finish date</label>
            <input type="date" class="form-control @error('finish_date') is-invalid @enderror" name="finish_date"
                id="finish_date" value="{{ old('finish_date', $project->finish_date) }}">
            <small id="finish_dateHelper" class="form-text text-muted">Insert finish date</small>
        </div>


        <button type="submit" class="btn btn-warning">Edit</button>

    </form>
@endsection
