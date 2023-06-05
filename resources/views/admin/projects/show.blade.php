@extends('layouts.admin')

@section('content')
    <div class="card m-auto w-75">
        <div class="card-title">
            <h2>
                {{ $proj->name }}
            </h2>
        </div>
        <div class="card-body">
            <p>
                <b>Description: </b>{{ $proj->description }}
            </p>
            <p>
                <b>Started: </b>{{ $proj->start_date }}
            </p>
            <p>
                <b>Finished: </b>{{ $proj->finish_date }}
            </p>
        </div>
    </div>
@endsection
