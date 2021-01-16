$(document).ready(function() {
            
    $(document).on('click',"#task-submit-button", function(e) {
        var url = "/task";
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
            success: function (r) {
                console.log(r);
                if (r.success) {
                    $("#main").load(location.href + " #main > *");
                    $("#task-edit-modal").load(location.href + " #task-create-modal > *");
                    $("#task-create-modal").modal("toggle");
                }
                
            },
            error: function() {

            }
        });
    });
});