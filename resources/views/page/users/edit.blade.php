@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Edit User</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <form action="/users/update/{{ $user->id }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h4>User Akun</h4>
                    </div>
                    <div class="card-body ">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" value="{{ $user->username }}" readonly>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Status</label>
                                    <select name="status_user" id="status" class="form-control">
                                        <option {{ $user->status === 'active' ? 'selected' : '' }} value="active">Active
                                        </option>
                                        <option {{ $user->status === 'nonactive' ? 'selected' : '' }} value="nonactive">
                                            Nonactive</option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label for="">Role</label>
                                    <select name="group_id" id="group_id" class="form-control">
                                        @foreach ($group as $item)
                                            <option {{ $item->id == $user->user_group[0]->group_id ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->name }}</option>
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
                            @if (empty($user->user_area[0]))
                                <select name="tingkat" id="tingkat" class="form-select" onchange="changeTingkat(this.value)" required>
                                    <option value="0">
                                        Nasional
                                    </option>
                                    <option value="1">
                                        Provinsi
                                    </option>
                                    <option value="2">
                                        Kab / Kota
                                    </option>
                                </select>
                            @else
                                <select name="tingkat" id="tingkat" class="form-select" onchange="changeTingkat(this.value)" required>
                                    <option {{ $user->user_area[0]->nasional == 1 ? 'selected' : '' }} value="0">
                                        Nasional
                                    </option>
                                    <option
                                        {{ !$user->user_area[0]->nasional && !$user->user_area[0]->kota ? 'selected' : '' }}
                                        value="1">Provinsi
                                    </option>
                                    <option {{ $user->user_area[0]->kota ? 'selected' : '' }} value="2">Kab / Kota
                                    </option>
                                </select>
                            @endif
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
        $('#prov').select2();
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

        async function changeTingkat(tingkat) {
            if (tingkat == '0') {
                $('#provSection').css('display', 'none')
                $('#kabSection').css('display', 'none')
            } else if (tingkat == '1') {
                await fetchProvinsi();
                $('#prov').select2({
                    multiple: true,
                    closeOnSelect: false
                })
                $('#prov').attr('required', true)
                $('#kab').attr('required', false)
                $('#provSection').css('display', 'block')
                $('#kabSection').css('display', 'none')
            } else {
                await fetchProvinsi();
                $('#prov').select2({
                    multiple: false
                })
                $('#prov').attr('required', true)
                $('#kab').attr('required', true)
                $('#provSection').css('display', 'block')
                $('#kabSection').css('display', 'block')
            }
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

        if ($('#tingkat').val()) {
            changeTingkat($('#tingkat').val());

            const id = '{{ $user->id }}'
            $.ajax({
                type: 'get',
                url: `/users-area/api/${id}`,
                success: async function(data) {
                    $('#name').val(data.data[0].name)
                    if (data.data[0].nasional === 1) {
                        $('#tingkat').val('0')
                    } else if (data.data[0].nasional === 0) {
                        if (data.data[0].kota == '') {
                            $('#prov').select2({
                                dropdownParent: $('#modal_update'),
                                closeOnSelect: false,
                                multiple: true,
                            })
                            const provArray = data.data.map(item => item.prov)
                            $('#prov').val(provArray)
                            console.log(provArray);
                            $('#prov').select2()
                        } else {
                            $('#tingkat').val('2')
                            $('#prov').val(data.data[0].prov)
                            $('#prov').select2({
                                multiple: false,
                            })
                            await fetchKab(data.data[0].prov)
                            const kotaArray = data.data.map(item => item.kota)
                            $('#kab').val(kotaArray)
                            $('#kab').select2()
                        }
                    } else {
                        $('#tingkat').val('10')
                    }
                },
                complete: function() {}
            })
        }
    </script>
@endpush
