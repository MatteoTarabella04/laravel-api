@extends('layouts.admin')

@section('content')
    <div class="container p-4">
        <div class="card m-auto w-75">
            <div class="card-header">
                <h2>
                    {{ $project->name }}
                </h2>
            </div>
            <div class="card-body">
                <p>
                    <b>Description: </b>{{ $project->description }}
                </p>
                <p>
                    <b>Started: </b>{{ $project->start_date }}
                </p>
                <p>
                    <b>Finished: </b>{{ $project->finish_date }}
                </p>
                <p>
                    <b>GitHub: </b>
                    <a href="{{ $project->git_hub_link }}">{{ $project->git_hub_link }}</a>
                </p>
                <p>
                    <b>Page Link: </b>
                    <a href="{{ $project->page_link }}">{{ $project->page_link }}</a>
                </p>
            </div>
        </div>
    </div>
@endsection
