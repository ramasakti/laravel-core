@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Buat User Baru</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <form action="/users" method="post">
                    @csrf
                    <div class="card-header">
                        <h4>User Akun</h4>
                    </div>
                    <div class="card-body ">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Konfirm Password</label>
                                    <input type="text" name="confirm_password" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Active</option>
                                        <option value="">Nonactive</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Role</label>
                                    <select name="group_id" id="group_id" class="form-control">
                                        @foreach ($group as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4>User Area</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="basicInput">Tingkat</label>
                            <select name="tingkat" id="tingkat" class="form-select" onchange="changeTingkat(this.value)" required>
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
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </form>
            </div>
        </section>
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

        function changeTingkat(tingkat) {
            if (tingkat == '0') {
                $('#provSection').css('display', 'none')
                $('#kabSection').css('display', 'none')
            } else if (tingkat == '1') {
                $('#prov').select2({
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
