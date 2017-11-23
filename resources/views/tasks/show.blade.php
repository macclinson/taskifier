@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 clearfix">
          <h3><a href="/dashboard" class="btn btn-primary"><i class="material-icons">arrow_back</i> <span>Back to Dashboard</span></a></h3>
          <div class="text-center"><h3>Task Details</div>
        </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <ul class="profile-data">
          <li class=""><label>Task Title</label> <span>{{$task->title}}</span></li>
          <li class=""><label>Task Body</label><span>{{$task->body}}</span></li>
          <li class="status"><label>Task Status</label>
            @if(!$task->status)
              <span class="pending">Pending</span>
            @else
              <span class="complete">Completed</span>
            @endif
          </li>
          <li class=""><label>Time Created</label> <span>{{$task->created_at->toFormattedDateString()}}</span></li>
        </ul>
      </div>
    </div>
</div>

@endsection
