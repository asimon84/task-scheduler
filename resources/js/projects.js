$(document).ready(function() {
    $(".list-group").sortable({
        connectWith: '.list-group',
        opacity: 0.6,
        cursor: 'move',
        update: function(event, ui) {
            var newOrder = $(this).sortable("toArray");

            $.ajax({
                url: window.route,
                type: "POST",
                data: {
                    order: newOrder
                },
                success: function(response) {
                    console.log("Order updated successfully:", response);


                },
                error: function(xhr, status, error) {
                    console.error("Error updating order:", error);
                }
            });
        }
    });
});