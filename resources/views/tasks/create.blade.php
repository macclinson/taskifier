@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 clearfix">
          <h3><a href="/dashboard" class="btn btn-primary"><i class="material-icons">arrow_back</i> <span>Back to Dashboard</span></a></h3>
          <div class="text-center"><h3>Create a Task</h3></div>
        </div>
      </div>
  </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <form method="POST" action="/tasks">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" required class="form-control" id="title">
          </div>

          <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" required class="form-control"></textarea>
          </div>

          <div class="form-group">
            <button type="submit" @click="pageLoader()" class="btn btn-primary">Taskify</button>
          </div>
          @include('layouts.errors')
        </form>

      </div>
    </div>
</div>

@endsection
