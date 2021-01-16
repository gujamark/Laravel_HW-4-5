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
        
    </span>



    <script src="{{ asset("js/save.js") }}"></script>
    <script src="{{ asset("js/edit.js") }}"></script>
    <script src="{{ asset("js/delete.js") }}"></script>
    <script src="{{ asset("js/create.js") }}"></script>
    
@endsection
