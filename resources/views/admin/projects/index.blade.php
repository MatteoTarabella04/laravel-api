@extends('layouts.admin')

@section('content')
    <h1 class="text-center py-3">
        My Projects
    </h1>
    <a class="btn btn-primary my-2" href="{{ route('admin.projects.create') }}" role="button">Add new Project</a>

    @include('partials.session_message')

    <div class="table-responsive">
        <table class="table table-striped
      table-hover
      table-borderless
      table-secondary
      align-middle">
            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Started</th>
                    <th>Finished</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">


                @forelse ($projects as $proj)
                    <tr class="table-dark">
                        <td scope="row">{{ $proj->id }}</td>
                        <td>{{ $proj->name }}</td>
                        <td>{{ $proj->description }}</td>
                        <td>{{ $proj->start_date }}</td>
                        <td>{{ $proj->finish_date }}</td>
                        <td>

                            <div class="d-flex gap-2">
                                <button class="btn text-white btn-outline-success">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>

                                <button class="btn text-white btn-outline-warning">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>

                                <button class="btn text-white btn-outline-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>

                        </td>

                    </tr>
                @empty
                    <tr class="table-primary">
                        <td scope="row">No projects yet.</td>

                    </tr>
                @endforelse
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
@endsection
