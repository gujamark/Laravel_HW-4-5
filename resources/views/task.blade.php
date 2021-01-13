@extends('layout')

<link rel="stylesheet" href="{{ asset('css/task.css') }}">

@section('main')

    <button type="button" class="btn btn-primary" id="task-create-modal-button">
        Create Task
    </button>

    <main id="main">
        <div id="tasks">
            @foreach($statuses as $status)
                <div class="status-column">
                    <span style="margin-bottom: 20px">{{ $status->status_name }}</span>
                    @foreach($status->tasks()->get() as $task)
                        <div class="task-wrapper">
                            <h3>{{ $task->task_name }}</h3>
                            <p>{{ $task->description }}</p>
                            <div class="actions">
                                <div class="edit-icon-wrapper">
                                    <button type="button" class="edit-button" id="edit-button" data-id="{{ $task->id }}">
                                        <img src="https://img.icons8.com/cotton/2x/edit.png" width="20" height="20">
                                    </button>
                                </div>
                                <div class="delete-icon-wrapper">                                    
                                        <button data-id="{{ $task->id }}" class="delete-button" type="submit"><img src="https://i.pinimg.com/originals/55/7c/80/557c804cc776e5438bfc565f1caf7dc3.png" width="20" height="20"></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </main>


    <span id="modal-wrapper">
        {{-- @include('task-create') --}}
    </span>

    <script>
        // SAVE

        $(document).ready(function() {
            
            $(document).on('click',"#task-submit-button", function(e) {
                var url = "{{ route('task.store')  }}";
                var type = "POST";
                
                if($("#task-to-edit-id").val()){
                    url = "task/" + $("#task-to-edit-id").val();
                    type = 'PUT';
                }

            e.preventDefault();
                $.ajax({
                    url : url,
                    type: type,
                    data : {
                        id : $("#task-to-edit-id").val(),
                        name : $("#task-name").val(),
                        description : $("#task-description").val(),
                        status : $("#task-status").val()
                    },
                    success: function () {
                        $("#main").load(location.href + " #main > *");
                        $("#task-edit-modal").load(location.href + " #task-create-modal > *");
                    },
                    error: function() {

                    }
                });
            });
        });
    </script>

    <script>
        // EDIT

        $(document).on('click','#edit-button',function(e) {
            e.preventDefault();
            var taskToEdit = $(e.currentTarget).data("id");
                $.ajax({
                    url : "task/" + taskToEdit + "/edit",
                    type: "GET",
                    success: function (e) {
                        $("#modal-wrapper").html(e);
                        $("#task-create-modal").modal("toggle");
                    },
                    error: function() {

                    }
                });
            });
    </script>
    
    <script>
        //DELETE
        
            $(document).on('click','.delete-button',function(e) {
            e.preventDefault();
            var taskToDelete = $(e.currentTarget).data("id");
                $.ajax({
                    url : "task/" + taskToDelete,
                    type: "DELETE",
                    success: function () {
                        $("#main").load(location.href + " #main > *");
                    },
                    error: function() {

                    }
                });
            });
        
    </script>

    <script>
        // CREATE
        
            $(document).on('click','#task-create-modal-button',function(e) {
            e.preventDefault();
            var taskToDelete = $(e.currentTarget).data("id");
                $.ajax({
                    url : "task/create",
                    type: "GET",
                    success: function (e) {
                        $("#modal-wrapper").html(e);
                        $("#task-create-modal").modal("toggle");
                    },
                    error: function() {

                    }
                });
            });
        
    </script>
@endsection
