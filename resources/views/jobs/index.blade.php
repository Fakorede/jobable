@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <search-component></search-component>
            </div>

            <br><br><br>

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
                            <td><img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" width="80"></td>
                            <td>
                                {{ $job->position }}
                                <br>
                                <i class="fas fa-clock" aria-hidden="true"></i>&nbsp;{{ $job->type }}
                            </td>
                            <td><i class="fas fa-map-marker-alt" aria-hidden="true"></i>&nbsp;{{ $job->address }}</td>
                            <td><i class="fas fa-globe" aria-hidden="true"></i>&nbsp;{{ $job->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('jobs.show', [$job->slug]) }}">
                                    <button class="btn btn-success btn-sm">View</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <a href="{{ route('alljobs') }}">
                <button class="btn btn-success btn-lg" style="width:100%;">Browse All Jobs</button>
            </a>
        </div>
        <br><br>
        <h1>Featured Companies</h1>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($companies as $company)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        @if (!empty($company->logo))
                            <img class="mx-auto" src="{{ asset('uploads/logo') }}/{{ $company->logo }}" width="100">
                        @else
                            <img class="mx-auto" src="{{ asset('uploads/logo/man.jpg') }}" width="100">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $company->cname }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($company->description, 50) }}</p>
                            <a href="{{ route('company.index', $company->slug) }}" class="btn btn-outline-primary">Visit Page</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<style>
.fas {
    color: #4183D7;
}

</style>