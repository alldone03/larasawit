@extends('Pages.Dashboard.master')


@section('contentDashboard')
    @push('title')
        Manage Device
    @endpush
    @push('links')
        <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
        <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/table-datatable.css') }}">
    @endpush
    @push('scripts')
        @include('Pages.Dashboard.managedevice.edit')
        @include('Pages.Dashboard.managedevice.add')
        <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <script>
            $('#add').on("click", function(e) {
                e.preventDefault()
                var nama_device = $('#nama_deviceadd').val();
                $.ajax({
                    url: "{{ url()->current() }}/add",
                    type: "POST",
                    data: {
                        nama_device: nama_device,
                    },
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
            $('.showEdit').on("click", function(e) {
                e.preventDefault()
                var id = $(this).attr('data-bs-id');
                var nama_device = $(this).attr('data-bs-nama_device');


                $('#iddevice').val(id);
                $('#nama_device').val(nama_device);
            });
            $('#edit').on("click", function(e) {
                e.preventDefault()
                var id = $('#iddevice').val();
                var nama_device = $('#nama_device').val();
                $.ajax({
                    url: "{{ url()->current() }}/edit",
                    type: "POST",
                    data: {
                        id: id,
                        nama_device: nama_device,
                    },
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
        </script>
    @endpush
    <div class="page-heading">
        <h3>Manage Device</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#inlineFormAdd">
                    Add Device
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama device</th>
                            <th>Token</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listdevice as $d)
                            <tr>
                                <td>{{ $d->nama_device }}</td>
                                <td>{{ $d->token }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning showEdit"
                                        data-bs-id="{{ $d->id }}" data-bs-toggle="modal"
                                        data-bs-nama_device="{{ $d->nama_device }}" data-bs-target="#inlineFormEdit">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
