@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <h1>View All Jobs</h1>

            <form action="{{ route('alljobs') }}" method="get">
            <div class="form-inline">
                <div class="form-group">
                    <label>Keyword:</label>&nbsp;
                    <input type="text" name="position" class="form-control">&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label>Employment Type:</label>&nbsp;
                    <select name="type" class="form-control">
                        <option value="">-select type-</option>
                        <option value="fulltime">fulltime</option>
                        <option value="part-time">part-time</option>
                        <option value="contract">contract</option>
                    </select>&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label>Category:</label>&nbsp;
                    <select name="category" class="form-control">
                        <option value="">-select category-</option>
                        @foreach (App\Category::all() as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    &nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label>Address:</label>&nbsp;
                    <input type="text" name="address" class="form-control">&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </div>
            </form>
        </div>

        <br>

        <div class="row">
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
                                    <button class="btn btn-success btn-sm">Apply</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $jobs->appends(\Illuminate\Support\Facades\Request::except('page'))->links() }}
        </div>
    </div>
@endsection

<style>
.fas {
    color: #4183D7;
}

</style>