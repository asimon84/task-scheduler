$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $('#projects-dropdown').on('change', function () {
        // alert($(this).val());


    });

    $(".list-group").sortable({
        connectWith: '.list-group',
        opacity: 0.6,
        cursor: 'move',
        update: function(event, ui) {
            var projectId = $(this).data('projectId');
            var taskIds = [];

            $(this).children('li').each(function(index, value) {
                taskIds.push($(this).data('taskId'));
            });

            // console.log(taskIds);

            $.ajax({
                url: window.route,
                type: "POST",
                data: {
                    projectId: projectId,
                    taskIds: taskIds
                },
                success: function(response) {
                    console.log("Order updated successfully:", response);

                    response.forEach(function(data) {
                        if (data.project_id === null) {
                            $('#priority-task-' + data.id).html('N/A');
                        } else {
                            $('#priority-task-' + data.id).html(data.priority);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    // console.error("Error updating order:", error);
                }
            });
        }
    });
});