@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Recent Jobs</h1>
            <table class="table">
                <thead>
                    <th>logo</th>
                    <th>position</th>
                    <th>location</th>
                    <th>date</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td><img src="{{ asset('avatar/man.jpg') }}" width="80"></td>
                            <td>
                                {{ $job->position }}
                                <br>
                                <i class="fas fa-clock" aria-hidden="true"></i>&nbsp;{{ $job->type }}
                            </td>
                            <td><i class="fas fa-map-marker-alt" aria-hidden="true"></i>&nbsp;{{ $job->address }}</td>
                            <td><i class="fas fa-globe" aria-hidden="true"></i>&nbsp;{{ $job->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('jobs.show', [$job->slug]) }}">
                                    <button class="btn btn-success btn-sm">Apply</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<style>
.fas {
    color: #4183D7;
}

</style>