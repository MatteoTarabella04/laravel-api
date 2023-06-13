@extends('layouts.admin')


@section('content')
    <h1 class="text-muted display-5 py-3">Types Page</h1>

    @include('partials.validation_errors')
    @include('partials.session_message')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.types.store') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Type" aria-label="Button" name="name"
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
                            <th scope="col">Types Count</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @forelse ($types as $type)
                            <tr class="table-dark">
                                <td scope="row">{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->slug }}</td>
                                <td>
                                    <span class="badge bg-danger">{{ $type->projects->count() }}</span>

                                </td>
                                <td>
                                    <div class="d-flex  gap-3">
                                        <button class="btn text-white btn-outline-warning">
                                            <a class="text-white" href="{{ route('admin.types.edit', $type->slug) }}"
                                                title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        </button>

                                        <form action="{{ route('admin.types.destroy', $type) }}" method="post">
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
                                <td scope="row"> No types yet! </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>


        </div>

    </div>
@endsection
