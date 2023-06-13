@extends('layouts.admin')

@section('content')
    <h1 class="py-3">Edit {{ $type->name }} Type</h1>


    @include('partials.validation_errors')

    <form action="{{ route('admin.types.update', $type) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                aria-describedby="nameHelper" placeholder="Type name" value="{{ old('name', $type->name) }}">
            <small id="nameHelper" class="form-text text-muted">Type name max 100 characters - must be
                unique</small>
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-warning">Edit</button>

    </form>
@endsection
