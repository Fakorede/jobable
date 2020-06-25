@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <div class="card-header">my jobs</div>
               <div class="card-body">
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
                                    <td>
                                        @if (empty(Auth::user()->company->logo))
                                            <img src="{{ asset('avatar/man.jpg') }}" width="80">
                                        @else
                                            <img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" width="80">
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
                                        <a href="{{ route('jobs.edit', [$job->slug]) }}">
                                            <button class="btn btn-sm btn-success">Edit</button>
                                        </a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
