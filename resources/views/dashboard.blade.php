@extends('layouts.app')

@section('content')
<div class="title-wrap">
  <h2>Dashboard</h2>
</div>
<section>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
          <a href="/create" class="new-todo task-wrapper">
            <i class="material-icons">add_circle_outline</i>
            <span>Create new Task</span>
          </a>
          @foreach($tasks as $task)
            @if(!$task->status)
            <div class="task-wrapper pending-task">
              <a href="/tasks/{{$task->id}}">
                <!-- <p>This task is pending</p> -->
                <div class="task-title">{{str_limit($task->title, 22, ' ...')}}</div>
                <div class="task-body">{{str_limit($task->body, 100, ' ...')}} </div>
              </a>
              <div class="action-btns">
                <a href="/tasks/{{$task->id}}/edit" class="edit-task" data-toggle="tooltip" data-placement="bottom" title="Edit Task">
                  <i class="material-icons">mode_edit</i>
                </a>
                <form class="complete-task" method="POST" action="/complete/{{$task->id}}">
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="status" value="1" />
                  <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Mark as Complete">
                    <i class="material-icons">check</i>
                  </button>
                </form>
                <span class="delete-task" data-toggle="tooltip" data-placement="bottom" title="Delete Task">
                  <i class="material-icons" data-toggle="modal" data-target="#confirm-delete">delete</i>
                </span>
              </div>
            </div>
            @else
            <div class="task-wrapper completed-task">
              <a href="/tasks/{{$task->id}}">
                <!-- <p>This task has been completed</p> -->
                <div class="task-title">{{str_limit($task->title, 22, ' ...')}}</div>
                <div class="task-body">{{str_limit($task->body, 100, ' ...')}} </div>
              </a>
              <div class="action-btns">
                <form class="incomplete-task" method="POST" action="/incomplete/{{$task->id}}">
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="status" value="0" />
                  <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Mark as Incomplete">
                    <i class="material-icons">cancel</i>
                  </button>
                </form>
                <a href="/delete/{{$task->id}}" class="delete-task" data-toggle="tooltip" data-placement="bottom" title="Delete Task">
                  <i class="material-icons" data-toggle="modal" data-target="#confirm-delete">delete</i>
                </a>

              </div>
            </div>
            @endif
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <span class="warning-icon-wrap">
                      <i class="material-icons md-50">priority_high</i>
                    </span>
                    <h1 class="heading">Are you sure you want to delete a pending task?</h1>
                    <p class="message">This action cannot be undone!</p>
                    <span type="button" class="btn btn-default" data-dismiss="modal">Cancel</span>
                    <a href="/delete/{{$task->id}}" class="btn btn-danger">Yes, delete</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
      </div>
      <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
      </div>
    </div>
  </div>
</section>


@endsection
