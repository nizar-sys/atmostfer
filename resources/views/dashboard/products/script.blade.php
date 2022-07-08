<script>
    $(document).ready(() => {
        $('.select-custom').select2();
    })
    var tablePengguna = $('#table-data').DataTable({
        processing: true,
        serverSide: true,
        responsive: false,
        ajax: "{{ route('datatable.products') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'name'
            },
            {
                data: 'merk_id'
            },
            {
                data: 'price'
            },
            {
                data: 'description'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Cari Data",
            lengthMenu: "Menampilkan _MENU_ data",
            zeroRecords: "Data tidak ditemukan",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            infoFiltered: "(disaring dari _MAX_ data)",
            paginate: {
                previous: '<i class="fa fa-angle-left"></i>',
                next: "<i class='fa fa-angle-right'></i>",
            }
        },
        dom: 'Blfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Data Products',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-sm btn-success',
                exportOptions: {
                    stripHtml: false,
                    columns: [0, 1, 2, 3, 4],
                    sheetName: 'Data Products',
                    sheetHeader: true,
                    sheetFooter: false,
                    exportData: {
                        decodeEntities: true,
                    },
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Data Products',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-sm btn-danger',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4]
                },
            },
            {
                extend: 'print',
                title: 'Data Products',
                text: '<i class="fas fa-print"></i> Print',
                className: 'btn btn-sm btn-info',
                exportOptions: {
                    stripHtml: false,
                    columns: [0, 1, 2, 3, 4]
                }
            },
            @if (Auth::user()->role == 'admin')
                {
                    title: "Tambah Data",
                    text: '<i class="fas fa-plus"></i> Tambah Data',
                    className: 'btn btn-default btn-sm',
                    action: function(e, dt, node, config) {
                        createData();
                    }
                }
            @endif
        ],
    });

    async function createData() {
        try {
            const response = await hitData("{{ route('products.create') }}", {}, 'GET');
            $('#modal-row').html(response);
            $('#modalCreateOrUpdateProduct').modal('show');
            $('#formCreate').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                storeOrUpdate(form);
            });
        } catch (error) {
            Snackbar.show({
                text: error.responseJSON.message,
                poss: 'top-center',
                showAction: false,
                duration: 5000,
                backgroundColor: '#dc3545'
            });
        }
    }

    async function updateData(id) {
        try {
            const response = await hitData("{{ route('products.edit', ':id') }}".replace(':id', id), {}, 'GET');
            $('#modal-row').html(response);
            $('#modalCreateOrUpdateProduct').modal('show');
            $('#formEdit').on('submit', function(e) {
                e.preventDefault();
                storeOrUpdate($(this));
            });
        } catch (error) {
            Snackbar.show({
                text: error.responseJSON.message,
                poss: 'top-center',
                showAction: false,
                duration: 5000,
                backgroundColor: '#dc3545'
            });
        }
    }

    async function storeOrUpdate(form) {
        try {
            var data = {};
            // serialize data in array
            var serializedData = form.serializeArray();
            serializedData.forEach(function(item) {
                data[item.name] = item.value;
            });
            var url = form.attr('action');
            var method = form.attr('method');
            hitData(url, data, method).then((response) => {
                $('#modalCreateOrUpdateProduct').modal('hide');
                tablePengguna.ajax.reload();
                Snackbar.show({
                    text: response.message,
                    poss: "top-right",
                    actionTextColor: "#fff",
                    backgroundColor: "#27ae60",
                    showAction: false,
                    duration: 3000,
                });
            }).catch((error) => {
                if (error.status == 422) {
                    inputInvalid(error.responseJSON.errors);
                    Snackbar.show({
                        text: 'Whoops! Terjadi kesalahan',
                        post: 'top-center',
                        actionTextColor: '#fff',
                        backgroundColor: '#dc3545',
                        showAction: true,
                        actionText: 'Close',
                        duration: 3000,
                    });
                }
            });
        } catch (error) {
            Snackbar.show({
                text: error.responseJSON.message,
                poss: 'top-center',
                showAction: false,
                duration: 5000,
                backgroundColor: '#dc3545'
            });
        }
    }

    function deleteData(id) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            var url = "{{ route('products.destroy', ':id') }}";
            url = url.replace(':id', id);
            if (result.value) {
                const response = hitData(url, {}, 'DELETE');
                response.then(function(res) {
                    if (res.status) {
                        Snackbar.show({
                            text: res.message,
                            poss: 'top-center',
                            showAction: false,
                            duration: 5000,
                            backgroundColor: '#28a745'
                        });
                        tablePengguna.ajax.reload();
                    } else {
                        Snackbar.show({
                            text: res.message,
                            poss: 'top-center',
                            showAction: false,
                            duration: 5000,
                            backgroundColor: '#dc3545'
                        });
                    }
                });
            }
        });
    }
</script>
