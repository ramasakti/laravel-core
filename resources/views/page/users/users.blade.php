@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>{{ NavHelper::name_menu(Session::get('menu_active'))->name_menu }}</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    {!! NavHelper::action('header') !!}
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Role </th>
                                <th>Tgl. Dibuat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <span class="">{{ Str::ucfirst($item->status) }}</span>
                                    </td>
                                    <td>
                                        {!! NavHelper::action('table', $item->id) !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        function addData(id) {
            window.location.href = "{{ route('users.create') }}"
        }

        $(document).on('click', '#edit', function() {
            let id = $(this).val();
            $('#modal_password').modal('show');

            $.ajax({
                url: 'password/' + id,
                type: 'GET',
                success: function(data) {
                    console.log(data)
                    if (data.success) {
                        $('#name_user').val(data.data.name);
                        $('#username_user').val(data.data.username);
                        $('#status_user').val(data.data.status);
                        $('#id_user').val(data.data.id);
                    }
                }
            });
        });

        function detail(id) {
            window.location.href = `/users/edit/${id}`
        }

        //status
        $(document).ready(function() {
            var currentStatus = $('select[name=status]').val();

            $('select[name=status] option').each(function() {
                if ($(this).val() == currentStatus) {
                    $(this).prop('disabled', true);
                }
            });

            $('select[name=status]').on('change', function() {
                var currentStatus = $(this).val();

                $('select[name=status] option').each(function() {
                    if ($(this).val() == currentStatus) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });
            });

            $('select[name=status]').on('click', function() {
                var currentStatus = $(this).val();

                $('select[name=status] option').each(function() {
                    if ($(this).val() == currentStatus) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endpush
