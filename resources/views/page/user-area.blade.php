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
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->groups[0]->name }}</td>
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

        <div class="modal fade text-left" id="modal_update" role="dialog" style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33"> Edit User Area </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/users-area/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="user_id" id="user_id">
                            <label>Nama</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Tingkat</label>
                                <select name="tingkat" id="tingkat" class="form-select" onchange="changeTingkat(this)"
                                    required>
                                    <option value="0">Nasional</option>
                                    <option value="1">Provinsi</option>
                                    <option value="2">Kab / Kota</option>
                                </select>
                            </div>
                            <div id="wilayah">
                                <div class="form-group" id="provSection" style="display: none">
                                    <label for="basicInput">Provinsi</label>
                                    <span class="text-danger">*</span>
                                    <select name="prov[]" id="prov" class="step-1">
                                        @foreach ($wilayah as $item)
                                            <option value="{{ $item->province }}">{{ $item->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="kabSection" style="display: none">
                                    <label for="basicInput">Kabupaten</label>
                                    <span class="text-danger">*</span>
                                    <select name="kab[]" id="kab" class="step-1" multiple="multiple">
                                        <option value="">Pilih Kabupaten</option>
                                    </select>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Provinsi</th>
                                        <th>Kota</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="area"></tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ml-1 btn-simpan">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('#prov').select2({
            dropdownParent: $('#modal_update')
        });
        $('#kab').select2();
        $('#kec').select2();

        async function fetchProvinsi() {
            const response = await $.ajax({
                url: `/provinsi`,
                method: 'GET',
            });

            $.each(response.payload, function(key, value) {
                $('#prov').append($('<option></option>').attr('value', value.province).text(value.province));
            });

            $('#prov').trigger('change');

            const provId = $('#prov').val();
            return provId;
        }

        async function fetchKab(idProv) {
            const response = await $.ajax({
                url: `/kabupaten/${idProv}`,
                method: 'GET',
            });

            const kabupatenSelect = $('#kab').select2({
                placeholder: 'Pilih Kab / Kota yang Dibawahi',
                closeOnSelect: false
            });
            kabupatenSelect.empty();
            kabupatenSelect.append($('<option value="">Pilih Kabupaten</option>'));

            $.each(response.payload, function(key, value) {
                kabupatenSelect.append($('<option></option>').attr('value', value.city).text(value.city));
            });

            kabupatenSelect.trigger('change');

            const kabId = $('#kab').val();
            return kabId;
        }

        async function fetchKec(idKab) {
            const response = await $.ajax({
                url: `/kecamatan/${idKab}`,
                method: 'GET',
            });

            const kecamatanSelect = $('#kec').select2();
            kecamatanSelect.empty();
            kecamatanSelect.append($('<option value="">Pilih Kecamatan</option>'));

            $.each(response.payload, function(key, value) {
                kecamatanSelect.append($('<option></option>').attr('value', value.district).text(value
                    .district));
            });

            kecamatanSelect.trigger('change');

            const kecId = $('#kec').val();
            return kecId;
        }

        fetchProvinsi();

        // Event handler untuk perubahan pada elemen select provinsi
        $('#prov').on('change', async function() {
            const selectedProvinsi = $(this).val();
            if (selectedProvinsi) {
                const kabId = await fetchKab(selectedProvinsi);
                // Panggil fungsi untuk mengambil data kecamatan berdasarkan ID kabupaten yang dipilih
                // await fetchKec(kabId);
            }
        });

        // Event handler untuk perubahan pada elemen select kabupaten
        $('#kab').on('change', async function() {
            const selectedKab = $(this).val();
            if (selectedKab) {
                // Panggil fungsi untuk mengambil data kecamatan berdasarkan ID kabupaten yang dipilih
                // await fetchKec(selectedKab);
            }
        });

        function changeTingkat(value) {
            console.log('p', value.value)
            if (value.value == '0') {
                $('#provSection').css('display', 'none')
                $('#kabSection').css('display', 'none')
            } else if (value.value == '1') {
                $('#prov').select2({
                    dropdownParent: $('#modal_update'),
                    multiple: true,
                    closeOnSelect: false
                })
                $('#provSection').css('display', 'block')
                $('#kabSection').css('display', 'none')
            } else {
                $('#prov').select2({
                    multiple: false
                })
                $('#provSection').css('display', 'block')
                $('#kabSection').css('display', 'block')
            }
        }

        function detail(id) {
            $('#area').html('')
            $('#modal_update').modal('show')
            $('#user_id').val(id)
            //console.log(id)

            $.ajax({
                type: 'get',
                url: `/users-area/api/${id}`,
                success: function(data) {
                    console.log(data.data[0])
                    $('#name').val(data.data[0].name)
                    if (data.data[0].nasional === 1) {
                        $('#tingkat').val('0')
                    } else if (data.data[0].nasional === 0) {
                        if (data.data[0].kota == '') {
                            $('#tingkat').val('1')
                            $('#prov').val(data.data[0].prov)
                            $('#prov').select2({
                                dropdownParent: $('#modal_update'),
                                closeOnSelect: false,
                                multiple: true,
                            })
                            changeTingkat({
                                value: '1'
                            })
                            data.data.map(item => {
                                $('#area').append(`<tr>
                                                <td>${item.prov}</td>
                                                <td>Semua Kota</td>
                                                <td><a id="trash-${item.id}-${item.prov}" href="#" onclick="deleteArea(${item.id}, '${item.prov}', 'prov')"><i class="bi bi-trash-fill"></i></a></td>
                                            </tr>`)
                            })
                        } else {
                            $('#tingkat').val('2')
                            $('#prov').val(data.data[0].prov)
                            $('#prov').select2({
                                dropdownParent: $('#modal_update'),
                                multiple: false,
                            })
                            fetchKab(data.data[0].prov)
                            $('#name').val(data.data[0].name)
                            changeTingkat({
                                value: '2'
                            })
                            data.data.map(item => {
                                $('#area').append(`<tr>
                                                <td>${item.prov}</td>
                                                <td>${item.kota}</td>
                                                <td><a id="trash-${item.id}-${item.kota}" href="#" onclick="deleteArea(${item.id}, '${item.kota}', 'kota')"><i class="bi bi-trash-fill"></i></a></td>
                                            </tr>`)
                            })
                        }
                    } else {
                        $('#tingkat').val('10')
                    }
                },
                complete: function() {}
            })
        }

        function deleteArea(user_id, area, tingkat) {
            const token = $('input[name="_token"]')
            const loaderArea = $(`#trash-${user_id}-${area}`)
            loaderArea.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>')

            const formData = new FormData()
            formData.append('_token', token.val())
            formData.append('user_id', user_id)
            formData.append('area', area)
            formData.append('tingkat', tingkat)

            $.ajax({
                type: 'POST',
                url: `/users-area/delete`,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: async function(data) {
                    if (data.success) {
                        setTimeout(() => {
                            window.location = window.location;
                        }, 1200);
                        message(data.message, data.success);
                    } else {
                        if (data.message.validator) {
                            message('Semua kolom wajib diisi', data.success);
                        } else {
                            message(data.message, data.success);
                        }
                    }
                },
                complete: function() {
                    loaderArea[0].parentNode.parentNode.remove()
                },
                error: function(params) {
                    let txt = params.responseJSON;
                    $.each(txt.errors, function(k, v) {
                        message(v, false);
                    });
                }
            });
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

        function createSection() {
            const wilayah = document.getElementById('wilayah');
            const wilayahBaru = wilayah.cloneNode(true); // Salin elemen div wilayah

            // Dapatkan semua elemen select di dalam wilayahBaru
            const selectElements = wilayahBaru.querySelectorAll('select');

            // Loop melalui elemen-elemen select untuk membersihkan opsi yang dipilih
            // selectElements.forEach(function(selectElement) {
            //     selectElement.selectedIndex = -1; // Membersihkan opsi yang dipilih
            // });

            wilayah.appendChild(wilayahBaru); // Tambahkan wilayahBaru ke dokumen

            // Inisialisasi ulang Select2 pada elemen-elemen select yang baru
            $(selectElements).select2();
        }
    </script>
@endpush
