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
                            <th scope="col">Technologies Count</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @forelse ($technologies as $tech)
                            <tr class="table-dark">
                                <td scope="row">{{ $tech->id }}</td>
                                <td>{{ $tech->name }}</td>
                                <td>{{ $tech->slug }}</td>
                                <td>
                                    <span class="badge bg-danger">{{ $tech->projects->count() }}</span>

                                </td>
                                <td>
                                    <form action="{{ route('admin.technologies.destroy', $tech) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
