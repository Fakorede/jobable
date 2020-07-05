@extends('layouts.main')

@section('page-header')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper">
                        <div class="img-wrapper">
                            <img src="{{asset('template\img\about\company-logo.png')}}" alt="">
                        </div>
                        <div class="content">
                            <h3 class="product-title">{{$job->title}} - {{$job->position}}</h3>
                            <p class="brand"><a href="{{ route('company.index', ['company' => $job->company->slug]) }}">{{ $job->company->cname }}</a></p>
                            <div class="tags">
                                <span><i class="lni-map-marker"></i>{{$job->address}}</span>
                                <span><i class="lni-calendar"></i> Posted {{$job->created_at->diffForHumans()}}</span>
                                <span><i class="lni-calendar"></i> Closes {{ date('F d, Y', strtotime($job->last_date)) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="month-price">
                        <span class="year">{{$job->type}}</span>
                        @if(!empty($job->salary))
                            <div class="price">${{$job->salary}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<section class="job-detail section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="content-area">
                    <h4>Job Description</h4>
                    <p>{!! $job->description_html !!}</p>

                    <h4>Job Roles</h4>
                    <p>{!! $job->roles_html !!}</p>

                    <br />
                    

                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-xs-12">
                <div class="sideber">
                    <div class="widghet">

                        <h3>Share This Job</h3>
                        <div class="share-job">

                            <form method="post" class="subscribe-form">
                                <div class="form-group">
                                    <input type="email" name="Email" class="form-control" placeholder="https://joburl.com" required="">
                                    <button type="submit" name="subscribe" class="btn btn-common sub-btn"><i class="lni-files"></i></button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>

                            <ul class="mt-4 footer-social">
                                <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                                <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                            </ul>

                            <div class="meta-tag">
                                <span class="meta-part"><a href="#"><i class="lni-star"></i> Write a Review</a></span>
                                <span class="meta-part"><a href="#"><i class="lni-warning"></i> Reports</a></span>
                                <span class="meta-part"><a href="#"><i class="lni-share"></i> Share</a></span>
                            </div>

                            <br>

                            <h3>Apply to Job</h3>
                            <div>
                                @if (Auth::check() && Auth::user()->user_type == 'seeker')
                                    @if (!$job->checkApplication())
                                        {{-- <form action="{{ route('apply', $job->id) }}" method="post">
                                            @csrf
                                        </form>   --}}
                                        <apply-component :id={{ $job->id }}></apply-component>
                                    {{-- @else
                                        <div class="alert alert-success">You already applied for this Job!</div> --}}
                                    @endif
                                    <br>
                
                                    <favorite-component :id={{ $job->id }} :favorited={{ $job->checkSaved() ? 'true' : 'false' }}></favorite-component>
                                @endif

                                @if (!Auth::check())
                                <div class="alert alert-warning">
                                    Login to apply to jobs!
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section id="featured" class="section bg-gray pb-45">
        <div class="container">
        <h4 class="small-title text-left">Similar Jobs</h4>
        <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="job-featured">
        <div class="icon">
        <img src="assets\img\features\img1.png" alt="">
        </div>
        <div class="content">
        <h3><a href="job-page.html">Software Engineer</a></h3>
        <p class="brand">MizTech</p>
        <div class="tags">
        <span><i class="lni-map-marker"></i> New York</span>
        <span><i class="lni-user"></i>John Smith</span>
        </div>
        <span class="full-time">Full Time</span>
        </div>
        </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="job-featured">
        <div class="icon">
        <img src="assets\img\features\img2.png" alt="">
        </div>
        <div class="content">
        <h3><a href="job-page.html">Graphic Designer</a></h3>
        <p class="brand">Hunter Inc.</p>
        <div class="tags">
        <span><i class="lni-map-marker"></i> New York</span>
        <span><i class="lni-user"></i>John Smith</span>
        </div>
        <span class="part-time">Part Time</span>
        </div>
        </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="job-featured">
        <div class="icon">
        <img src="assets\img\features\img3.png" alt="">
        </div>
        <div class="content">
        <h3><a href="job-page.html">Managing Director</a></h3>
        <p class="brand">MagNews</p>
        <div class="tags">
        <span><i class="lni-map-marker"></i> New York</span>
        <span><i class="lni-user"></i>John Smith</span>
        </div>
        <span class="full-time">Full Time</span>
        </div>
        </div>
        </div>
        </div>
        </div>
</section> --}}

@endsection
