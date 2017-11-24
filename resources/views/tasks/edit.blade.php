@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="col-md-12 clearfix">
            <h3><a href="/dashboard" class="btn btn-primary"><i class="material-icons">arrow_back</i> <span>Back to Dashboard</span></a></h3>
            <div class="text-center"><h3>Edit Task</div>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <form method="POST" action="/tasks/{{$task->id}}">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" required class="form-control" value="{{$task->title}}" id="title">
          </div>

          <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" required class="form-control">{{$task->body}}</textarea>
          </div>

          <div class="form-group">
            <button type="submit" @click="pageLoader()" class="btn btn-primary">Update</button>
          </div>
          @include('layouts.errors')
        </form>

      </div>
    </div>
</div>

@endsection
