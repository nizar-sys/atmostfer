@extends('layouts.app')
@section('title', 'Merk')

@section('title-header', 'Merk')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Merk</li>
@endsection
@section('content')
    {{-- modal content --}}
    <div id="modal-row"></div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Merk</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover" id="table-data">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Merk Name</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('_partials.cjs.ajaxPromise')
    <script>
        var tablePengguna = $('#table-data').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('datatable.merks') }}",
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
                    title: 'Data Merk',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-sm btn-success',
                    exportOptions: {
                        stripHtml: false,
                        columns: [1],
                        sheetName: 'Data Merk',
                        sheetHeader: true,
                        sheetFooter: false,
                        exportData: {
                            decodeEntities: true,
                        },
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data Merk',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-sm btn-danger',
                    exportOptions: {
                        columns: [1]
                    },
                },
                {
                    extend: 'print',
                    title: 'Data Merk',
                    text: '<i class="fas fa-print"></i> Print',
                    className: 'btn btn-sm btn-info',
                    exportOptions: {
                        stripHtml: false,
                        columns: [1]
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
                const response = await hitData("{{ route('merks.create') }}", {}, 'GET');
                $('#modal-row').html(response);
                $('#modalCreate').modal('show');
            } catch (error) {
                console.log(error);
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
                const response = await hitData("{{ route('merks.edit', ':id') }}".replace(':id', id), {}, 'GET');
                $('#modal-row').html(response);
                $('#modalEdit').modal('show');
            } catch (error) {
                console.log(error);
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
                var url = "{{ route('merks.destroy', ':id') }}";
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
@endsection
