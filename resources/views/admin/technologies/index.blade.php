@extends('layouts.admin')


@section('content')
    <h1 class="text-muted display-5 py-3">Technologies Page</h1>

    @include('partials.validation_errors')
    @include('partials.session_message')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.technologies.store') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Technology" aria-label="Button" name="name"
                        id="name">
                    <button class="btn btn-outline-primary" type="submit">Add</button>
                </div>

            </form>
        </div>
        <div class="col-6">

            <div class="table-responsive-md">
                <table
                    class="table table-striped
                table-hover
                table-borderless
                table-secondary
                align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th class="text-center" scope="col">Technologies Count</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @forelse ($technologies as $technology)
                            <tr class="table-dark">
                                <td scope="row">{{ $technology->id }}</td>
                                <td>{{ $technology->name }}</td>
                                <td>{{ $technology->slug }}</td>
                                <td class="text-center">
                                    <span class="badge bg-danger">{{ $technology->projects->count() }}</span>

                                </td>
                                <td>
                                    <div class="d-flex  gap-3">
                                        <button class="btn text-white btn-outline-warning">
                                            <a class="text-white"
                                                href="{{ route('admin.technologies.edit', $technology->slug) }}"
                                                title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        </button>

                                        <form action="{{ route('admin.technologies.destroy', $technology) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-white btn-outline-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty

                            <tr class="">
                                <td scope="row"> No technologies yet! </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>


        </div>

    </div>
@endsection
