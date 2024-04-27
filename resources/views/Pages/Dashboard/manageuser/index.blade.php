@extends('Pages.Dashboard.master')

@php
    use App\Models\tb_role;
@endphp


@section('contentDashboard')
    @push('title')
        Manage User
    @endpush
    @push('links')
        <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
        <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/table-datatable.css') }}">
    @endpush
    @push('scripts')
        @include('Pages.Dashboard.manageuser.edit')
        <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <script>
            userid = 0;
            $('.edit').on("click", function(e) {
                e.preventDefault()
                var id = $(this).attr('data-bs-id');
                var role = $(this).attr('data-bs-role');
                userid = id;
                $.ajax({
                    url: "{{ url()->current() }}/edit",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        data.forEach(element => {
                            var option = $('<option>', {
                                value: element.id,
                                text: element.nama_role
                            });
                            if (element.nama_role === role)
                                option.attr('selected', 'selected');
                            $('#selectrole').append(
                                option); // Append the option to the select element
                        });
                    }
                });
            });
            $('#update').on("click", function(e) {
                e.preventDefault()
                var id = userid;
                var role = $('#selectrole').val();
                $.ajax({
                    url: "{{ url()->current() }}/update",
                    type: "POST",
                    data: {
                        id: id,
                        role: role
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
        <h3>Manage User</h3>
    </div>
    <section class="section">
        <div class="card">

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $d)
                            @if ($d->id != Auth::user()->id)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ tb_role::find($d->role)['nama_role'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning edit"
                                            data-bs-id="{{ $d->id }}"
                                            data-bs-role="{{ tb_role::find($d->role)['nama_role'] }}"
                                            data-bs-toggle="modal" data-bs-target="#inlineFormEdit">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
