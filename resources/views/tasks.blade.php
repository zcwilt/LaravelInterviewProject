@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('tasks')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>
                        <!-- Task Priority -->
                        <div class="form-check col-sm-offset-3">
                            <input class="form-check-input" type="radio" name="priority" id="priority-low" value="0" checked>
                            <label class="form-check-label" for="priority-low">
                                Low Priority
                            </label>
                        </div>
                        <div class="form-check col-sm-offset-3">
                            <input class="form-check-input" type="radio" name="priority" id="priority-med" value="1">
                            <label class="form-check-label" for="priority-med">
                                Medium Priority
                            </label>
                        </div>
                        <div class="form-check col-sm-offset-3">
                            <input class="form-check-input" type="radio" name="priority" id="priority-high" value="2">
                            <label class="form-check-label" for="priority-high">
                                High Priority
                            </label>
                        </div>
                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('common.tasks-list')
        </div>
    </div>
@endsection
