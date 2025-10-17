new DataTable('#tasksTable', {
    processing: true,
    serverSide: true,
    ajax: window.route,
    columns: [
        {data: 'id', name: 'id', searchable: true},
        {data: 'name', name: 'string', searchable: true},
        {data: 'description', name: 'text', className: 'truncate-text', searchable: true},
        {data: 'actions', name: 'actions', orderable: false, searchable: false}
    ]
});