@extends('Pages.Dashboard.master')

@php
    use App\Models\tb_device;
    use App\Models\user;
    // use App\Models\linktodevice;
@endphp
@section('contentDashboard')
    @push('title')
        Manage Device
    @endpush
    @push('links')
        <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
        <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/table-datatable.css') }}">
    @endpush
    @push('scripts')
        @include('Pages.Dashboard.linkdevice.add')
        <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <script>
            $('#add').on("click", function(e) {
                e.preventDefault()
                var nama_device = $('#device').val();
                var user = $('#user').val();
                $.ajax({
                    url: "{{ url()->current() }}/add",
                    type: "POST",
                    dataType: "json",
                    data: {
                        device: nama_device,
                        user: user
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
            $('.addlink').on("click", function(e) {
                e.preventDefault()
                $.ajax({
                    url: "{{ url()->current() }}/getuseranddevice",
                    type: "GET",
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $('#user').html('');
                        $('#device').html('');
                        data.user.forEach(element => {
                            $('#user').append('<option value="' + element.id + '">' + element.name +
                                '</option>');
                        });
                        data.device.forEach(element => {
                            $('#device').append('<option value="' + element.id + '">' + element
                                .nama_device + '</option>');
                        });
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
                <button type="button" class="btn btn-outline-success addlink" data-bs-toggle="modal"
                    data-bs-target="#inlineFormAdd">
                    Add Link Device
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>device</th>
                            <th>user</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($linktodevice as $d)
                            <tr>
                                <td>{{ tb_device::find($d->tb_devices)->nama_device }}</td>
                                <td>{{ user::find($d->users)->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
