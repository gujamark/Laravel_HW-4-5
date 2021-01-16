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