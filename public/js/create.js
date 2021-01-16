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