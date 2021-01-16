$(document).on('click','.delete-button',function(e) {
    e.preventDefault();
    var taskToDelete = $(e.currentTarget).data("id");
        $.ajax({
            url : "task/" + taskToDelete,
            type: "DELETE",
            success: function (r) {
                if(r.success) {
                    $("#main").load(location.href + " #main > *");
                }
                
            },
            error: function() {

            }
        });
    });