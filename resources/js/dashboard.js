$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $(".list-group").sortable({
        connectWith: '.list-group',
        opacity: 0.6,
        cursor: 'move',
        update: function(event, ui) {
            console.log($(this).children('li'));

            // var newOrder = $(this).sortable("toArray");
            // console.log('projectId='+$(this).data('projectId'));
            // console.log('taskId='+ui.item.data('taskId'));
            //
            // $.ajax({
            //     url: window.route,
            //     type: "POST",
            //     data: {
            //         order: newOrder
            //     },
            //     success: function(response) {
            //         console.log("Order updated successfully:", response);
            //
            //
            //     },
            //     error: function(xhr, status, error) {
            //         console.error("Error updating order:", error);
            //     }
            // });
        }
    });
});