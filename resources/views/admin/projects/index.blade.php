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
                                <button class="btn btn-outline-success">
                                    <a class="text-white" href="{{ route('admin.projects.show', $proj->slug) }}"
                                        title="Show">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </button>

                                <button class="btn text-white btn-outline-warning">
                                    <a class="text-white" href="{{ route('admin.projects.edit', $proj->slug) }}"
                                        title="Edit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </button>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn text-white btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $proj->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade text-black" id="modalId-{{ $proj->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $proj->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $proj->id }}">
                                                    Delete
                                                    {{ $proj->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Remove {{ $proj->name }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded-pill"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.projects.destroy', $proj->slug) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger rounded-pill">Confirm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
