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