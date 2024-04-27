@extends('Pages.Dashboard.master')

@php
    use App\Models\tb_role;
@endphp


@section('contentDashboard')
    @push('title')
        Hasil Panen
    @endpush
    @push('links')
        <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
        <link rel="stylesheet" crossorigin href="{{ asset('assets/compiled/css/table-datatable.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <script></script>
    @endpush
    <div class="page-heading">
        <h3>Hasil Panen</h3>
    </div>
    <section class="section">
        <div class="card">

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>pohon</th>
                            <th>overripe</th>
                            <th>ripe</th>
                            <th>underripe</th>
                            <th>Gambar</th>
                            <th>Fruit Drop</th>
                            <th>Keputusan</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasilpanen as $d)
                            <tr>
                                <td>{{ $d->users }}</td>
                                <td>{{ $d->pohon }}</td>
                                <td>{{ $d->overripe }}</td>
                                <td>{{ $d->ripe }}</td>
                                <td>{{ $d->underripe }}</td>
                                <td>
                                    <img src="/images/{{ $d->gambar }}" alt="image" srcset=""
                                        style="width: auto; height: 200px; object-fit: cover;">
                                </td>
                                <td>{{ $d->brondolan }}</td>
                                <td>{{ $d->keputusan }}</td>
                                <td>{{ $d->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
