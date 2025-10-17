new DataTable('#tasksTable', {
    processing: true,
    serverSide: true,
    ajax: window.route,
    columns: [
        {data: 'id', name: 'id', searchable: true},
        {data: 'name', name: 'name', searchable: true},
        {data: 'description', name: 'description', className: 'truncate-text', searchable: true},
        {data: 'actions', name: 'actions', orderable: false, searchable: false}
    ]
});

new bootstrap.Modal(document.getElementById('taskModal'));

$.callModal = function (id, disabled) {
    var modalId = $('#task-modal-id');
    var modalName = $('#task-modal-name');
    var modalDescription = $('#task-modal-description');

    modalName.prop('disabled', disabled);
    modalDescription.prop('disabled', disabled);

    modalId.val('');
    modalName.val('');
    modalDescription.val('');

    $.ajax({
        url: '/task/' + id,
        type: "GET",
        dataType: 'json',
        success: function (data) {
            // console.log('Data received:', data);
            modalId.val(data.id);
            modalName.val(data.name);
            modalDescription.val(data.description);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('AJAX error:', textStatus, errorThrown);
        }
    });
};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
});

$.editRecord = function () {
    $.ajax({
        url: '/task/' + $('#task-modal-id').val(),
        type: "PUT",
        dataType: 'json',
        data: {
            name: $('#task-modal-name').val(),
            description: $('#task-modal-description').val()
        },
        success: function (data) {
            // console.log('Data received:', data);
            $('#taskModal').modal('hide');
            $('#tasksTable').DataTable().draw();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('AJAX error:', textStatus, errorThrown);
        }
    });
};

$.deleteRecord = function (id, table, tr) {
    $.ajax({
        url: '/task/' + id,
        type: "DELETE",
        dataType: 'json',
        success: function (data) {
            // console.log('Data received:', data);
            table.DataTable().row(tr).remove().draw();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('AJAX error:', textStatus, errorThrown);
        }
    });
};

$(document).on('click', '.view-record', function () {
    $('#save-button').hide();
    $.callModal($(this).data('id'), true);
});

$(document).on('click', '.edit-record', function () {
    $('#save-button').show();
    $.callModal($(this).data('id'), false);
});

$(document).on('click', '#save-button', function () {
    $.editRecord();
});

$(document).on('click', '.delete-record', function () {
    $.deleteRecord($(this).data('id'), $('#tasksTable'), $(this).closest('tr'));
});