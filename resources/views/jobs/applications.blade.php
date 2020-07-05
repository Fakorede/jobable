@extends('layouts.main')

@section('page-header')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Browse applications</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div id="content">
    <div class="container">
        @foreach($applications as $application)
            @if ($applications->isEmpty())
                <h3>No applications submitted yet!</h3>
            @else
                <div>
                    <a href="{{route('jobs.show',$application->slug)}}"> {{ $application->position }} {{$application->title}}
                    </a>
                </div>
                <div class="row">
                    @foreach ($application->users as $applicant)
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="manager-resumes-item">
                                <div class="manager-content">
                                    @if (empty($applicant->profile->avatar))
                                        <img class="resume-thumb" src="{{asset('avatar/man.jpg')}}">
                                    @else
                                        <img class="resume-thumb" src="{{asset('uploads/avatar')}}/{{$applicant->profile->avatar}}">
                                    @endif
                                    <div class="manager-info">
                                        <div class="manager-name">
                                            <h4><a href="#">{{ $applicant->name }}</a></h4>
                                            <h5>gender: {{ $applicant->profile->gender }}</h5>
                                        </div>
                                        <div class="manager-meta">
                                            <span class="location"><i class="ti-location-pin"></i>
                                                location: {{ $applicant->profile->address }}</span>
                                            <span class="rate"><i class="ti-time"></i>
                                                email: {{ $applicant->email }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-body">
                                    <div class="content">
                                        <p>{{ $applicant->profile->bio }}</p>
                                    </div>
                                    <div class="resume-skills">
                                        <div class="tag-list float-left">
                                            Applied: <span>{{ date('F d, Y', strtotime($applicant->created_at)) }}</span>
                                            CV: <span><a href="{{Storage::url($applicant->profile->resume)}}">link</a></span>
                                            Cover Letter: <span><a href="{{Storage::url($applicant->profile->cover_letter)}}">link</a></span>
                                        </div>
                                        <div class="resume-exp float-right">
                                            <a href="#" class="btn btn-common btn-xs">Exp. {{ $applicant->profile->experience }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection

{{-- @section('content')
<div class="container">
    <h1>Applicants</h1>
    <div class="row justify-content-center">
        @if ($applicants->isEmpty())
            <h3>No applications submitted yet!</h3>
        @endif
        <div class="col-md-12">       
          @foreach($applicants as $applicant)

            <div class="card">
                <div class="card-header"><a href="{{route('jobs.show',$applicant->slug)}}"> {{$applicant->title}}</a></div>

                <div class="card-body">
                    @foreach($applicant->users as $user)
                       
            <table class="table" style="width: 100%;">
            <thead class="thead-dark">
            </thead>
            <tbody>
            <tr>
                <td>
                    @if(!empty($user->profile->avatar))
                        <img src="{{asset('uploads/avatar')}}/{{$user->profile->avatar}}" width="80">
                    @else
                    <img src="{{asset('avatar/man.jpg')}}" width="80">
                    @endif

                    <br>Applied On: {{ date('F d, Y', strtotime($applicant->created_at)) }}
                </td>
                <td>Name: {{$user->name}}</td>
                <td>Email: {{$user->email}}</td>
                <td>Address: {{$user->profile->address}}</td>
                <td>Gender: {{$user->profile->gender}}</td>
                <td>Experience: {{$user->profile->experience}}</td>
                <td>Bio: {{$user->profile->bio}}</td>
                <td>Phone: {{$user->profile->phone_number}}</td>

                <td><a href="{{Storage::url($user->profile->resume)}}">Resume</a></td>

                <td><a href="{{Storage::url($user->profile->cover_letter)}}">Cover letter</a></td>
                <td></td>

            </tr>
    
            </tbody>
            </table>

        </div>
        <br><br>
        @endforeach
    </div> 
    <br>
@endforeach


            </div>

        </div>
    </div>
</div>
@endsection --}}