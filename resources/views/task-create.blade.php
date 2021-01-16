<div  class="modal fade" id="task-create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="task-form" action="{{ route('task.store') }}" method="POST">
                <div class="modal-body">
                        <input type="hidden" id="task-to-edit-id" value="{{ $taskToEdit->id ?? '' }}">
                        <label for="task-name">Task Name:</label>
                        <input id="task-name" type="text" class="form-control" value="{{ $taskToEdit->task_name ?? '' }}" placeholder="Enter Task name">
                        <br>
                        <label for="task-description">Task Description:</label>
                        <input id="task-description" type="text" class="form-control" value="{{ $taskToEdit->description ?? '' }}" placeholder="Enter Task Description">
                        <br>
                        <label for="task-status">Task Status:</label>
                        <select id="task-status" class="form-control">
                        @foreach($statuses as $status)
                                <option value="{{ $status->id }}" 
                                    @if(isset($taskToEdit))
                                    {{ $status->id == $taskToEdit->status_id ? 'selected' : '' }}
                                    @endif>
                                    {{ $status->status_name }}
                                </option>
                        @endforeach
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="task-submit-button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>