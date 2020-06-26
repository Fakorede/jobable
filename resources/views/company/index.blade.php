@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            @if (!empty($company->cover_photo))
                <img src="{{ asset('uploads/coverimage') }}/{{ $company->cover_photo }}" style="width:100%;">
            @else
                <img src="{{ asset('cover/cover.jpg') }}" style="width:100%;">
            @endif

            <div class="company-desc">
                @if (empty($company->logo))
                    <img src="{{ asset('avatar/man.jpg') }}" width="100">
                @else
                    <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" width="100">
                @endif
                <p>{{ $company->description }}</p>
                <h1>{{ $company->cname }}</h1>
                <p>
                    <strong>Slogan:</strong>{{ $company->slogan }}&nbsp; 
                    <strong>Address:</strong>{{ $company->address }}&nbsp; 
                    <strong>Phone:</strong>{{ $company->phone }}&nbsp; 
                    <strong>Website:</strong>{{ $company->website }}
                </p>
            </div>
        </div>


        <table class="table">
            <thead>
                <th>logo</th>
                <th>position</th>
                <th>location</th>
                <th>date</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($company->jobs as $job)
                    <tr>
                        <td>
                            @if (empty($company->logo))
                                <img src="{{ asset('avatar/man.jpg') }}" width="100">
                            @else
                                <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" width="100">
                            @endif
                        </td>
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
