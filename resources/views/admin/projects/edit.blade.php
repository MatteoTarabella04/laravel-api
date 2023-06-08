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

        <div class="mb-4">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option selected value=""> |-Select Type-| </option>

                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == old('type_id', '') ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="form-group mb-3 d-flex gap-3 align-items-center">
            <label for="technologies" class="m-0">Used Technologies:</label>
            @foreach ($technologies as $tech)
                <div class="form-check @error('technologies') is-invalid @enderror">
                    <label class="form-check-label">
                        @if ($errors->any())
                            <input name="technologies[]" type="checkbox" value="{{ $tech->id }}"
                                class="form-check-input"
                                {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>
                        @else
                            <input name="technologies[]" type="checkbox" value="{{ $tech->id }}"
                                class="form-check-input" {{ $project->technologies->contains($tech) ? 'checked' : '' }}>
                            {{ $tech->name }}
                        @endif
                    </label>
                </div>
            @endforeach

            @error('technologies')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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

        <div class="mb-3">
            <label for="git_hub_link" class="form-label">GitHub Link</label>
            <input type="text" class="form-control @error('git_hub_link') is-invalid @enderror" name="git_hub_link"
                id="git_hub_link" aria-describedby="git_hub_linkHelper" placeholder="Project GitHub link"
                value="{{ old('git_hiub_link', $project->git_hub_link) }}">
            <small id="git_hub_linkHelper" class="form-text text-muted">Type GitHub link</small>
        </div>

        <div class="mb-3">
            <label for="page_link" class="form-label">Page Link</label>
            <input type="text" class="form-control @error('page_link') is-invalid @enderror" name="page_link"
                id="page_link" aria-describedby="page_linkHelper" placeholder="Project Page link"
                value="{{ old('page_link', $project->page_link) }}">
            <small id="page_linkHelper" class="form-text text-muted">Type Page link</small>
        </div>


        <button type="submit" class="btn btn-warning">Edit</button>

    </form>
@endsection
