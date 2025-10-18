$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
});

new DataTable('#projectsTable', {
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

new bootstrap.Modal(document.getElementById('projectModal'));

$.callCreateModal = function () {
    var modalId = $('#project-modal-id');
    var modalName = $('#project-modal-name');
    var modalDescription = $('#project-modal-description');

    modalName.prop('disabled', false);
    modalDescription.prop('disabled', false);

    modalId.val('');
    modalName.val('');
    modalDescription.val('');

    $('#projectModal').modal('show');
};

$.callModal = function (id, disabled) {
    var modalId = $('#project-modal-id');
    var modalName = $('#project-modal-name');
    var modalDescription = $('#project-modal-description');

    modalName.prop('disabled', disabled);
    modalDescription.prop('disabled', disabled);

    modalId.val('');
    modalName.val('');
    modalDescription.val('');

    $.ajax({
        url: '/project/' + id,
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

$.createRecord = function () {
    $.ajax({
        url: '/project/' + $('#project-modal-id').val(),
        type: "POST",
        dataType: 'json',
        data: {
            name: $('#project-modal-name').val(),
            description: $('#project-modal-description').val()
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

$.editRecord = function () {
    $.ajax({
        url: '/project/' + $('#project-modal-id').val(),
        type: "PUT",
        dataType: 'json',
        data: {
            name: $('#project-modal-name').val(),
            description: $('#project-modal-description').val()
        },
        success: function (data) {
            // console.log('Data received:', data);
            $('#projectModal').modal('hide');
            $('#projectsTable').DataTable().draw();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('AJAX error:', textStatus, errorThrown);
        }
    });
};

$.deleteRecord = function (id, table, tr) {
    $.ajax({
        url: '/project/' + id,
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

$(document).on('click', '#create-button', function () {
    $('#save-button').show();
    $.callCreateModal();
});

$(document).on('click', '.view-record', function () {
    $('#save-button').hide();
    $.callModal($(this).data('id'), true);
});

$(document).on('click', '.edit-record', function () {
    $('#save-button').show();
    $.callModal($(this).data('id'), false);
});

$(document).on('click', '#save-button', function () {
    var modalId = $('#task-modal-id');

    if(modalId.val().length === 0) {
        var modalName = $('#task-modal-name');
        var modalDescription = $('#task-modal-description');

        if(modalName.val().length === 0 || modalDescription.val().length === 0) {
            alert('Please enter a name and description for this task.')
        } else {
            $.createRecord();
        }
    } else {
        $.editRecord();
    }
});

$(document).on('click', '.delete-record', function () {
    $.deleteRecord($(this).data('id'), $('#tasksTable'), $(this).closest('tr'));
});