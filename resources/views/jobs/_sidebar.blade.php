<div class="right-sideabr">
    <h4>Manage Account</h4>
    @if (Auth::user()->user_type === 'seeker')
        <ul class="list-item">
            <li><a href="/user/profile">Profile Page</a></li>
            <li><a href="/jobs">View Jobs</a></li>
            <li><a href="/home">Saved Jobs</a></li>
            <li><a href="/logout">Sign Out</a></li>
        </ul>
    @else
        <ul class="list-item">
            <li><a href="/company/{{ Auth::user()->company->slug }}">View Company Page</a></li>
            <li><a href="/company/show">Edit Company Page</a></li>
            <li><a href="/jobs/create">Create Job Listing</a></li>
            <li><a href="/my-jobs">Manage Jobs</a></li>
            <li><a href="/my-jobs/applications">Manage Applications</a></li>
            <li><a href="/logout">Sign Out</a></li>
        </ul>
    @endif
</div>