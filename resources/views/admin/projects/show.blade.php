@extends('layouts.admin')

@section('content')
    <div class="container p-4">
        <div class="card m-auto w-75">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>
                    {{ $project->name }}
                </h2>
                <div class="tag">
                    <span class="badge bg-success">{{ $project->type?->name }}</span>
                </div>
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
            <div class="card-footer d-flex align-items-center gap-3">
                <b>Technologies: </b>
                @foreach ($project->technologies as $tech)
                    <span class="badge bg-primary">{{ $tech['name'] }}</span>
                @endforeach
            </div>
        </div>
    </div>
@endsection
