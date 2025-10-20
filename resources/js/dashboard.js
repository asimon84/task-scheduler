$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $('#projects-dropdown').on('change', function () {
        getProjectsList($(this).val());
    });

    function getProjectsList(id) {
        $.ajax({
            url: window.projectsListRoute,
            type: "GET",
            data: {
                projectId: id
            },
            success: function(response) {
                $('#projects-card').html(response);

                setSortable();
            },
            error: function(xhr, status, error) {
                // console.error("Error getting projects:", error);
            }
        });
    }

    function setSortable() {
        $(".list-group").sortable({
            connectWith: '.list-group',
            opacity: 0.6,
            cursor: 'move',
            update: function (event, ui) {
                var projectId = $(this).data('projectId');
                var taskIds = [];

                $(this).children('li').each(function (index, value) {
                    taskIds.push($(this).data('taskId'));
                });

                // console.log(taskIds);

                $.ajax({
                    url: window.priorityRoute,
                    type: "POST",
                    data: {
                        projectId: projectId,
                        taskIds: taskIds
                    },
                    success: function (response) {
                        console.log("Order updated successfully:", response);

                        response.forEach(function (data) {
                            if (data.project_id === null) {
                                $('#priority-task-' + data.id).html('N/A');
                            } else {
                                $('#priority-task-' + data.id).html(data.priority);
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        // console.error("Error updating order:", error);
                    }
                });
            }
        });
    }

    getProjectsList($('#projects-dropdown').val());
    setSortable();
});