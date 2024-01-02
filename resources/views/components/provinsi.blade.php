<div class="form-group">
    <label for="basicInput">Provinsi</label>
    @if ($require == 1)
        <span class="text-danger">*</span>
    @endif
    <select name="{{ $component }}" id="{{ $component }}" class="step-{{ $step }}"
        onchange="fetchKab(this.value)" {{ $require == 1 ? 'required' : '' }}>
        <option value="">Pilih Provinsi</option>
    </select>
    <input type="hidden" id="val-provinsi">
</div>
<script>
    (function() {
        const path = window.location.pathname;
        const regex = /\//g;
        const arrayPath = path.split(regex).filter(Boolean)
        const statusEdit = arrayPath[1] === 'edit'
        if (statusEdit) {
            $.ajax({
                url: `/question-value/{{ $table }}/provinsi/${arrayPath[2]}`,
                method: 'GET',
                dataType: 'json',
                success: async function(data) {
                    $('#provinsi').val(data.payload.provinsi);
                    $('#provinsi').select2();
                    await fetchKab(data.payload.provinsi);

                    $.ajax({
                        url: `/question-value/{{ $table }}/kota/${arrayPath[2]}`,
                        method: 'GET',
                        dataType: 'json',
                        success: async function(data) {
                            $('#kota').val(data.payload.kota);
                            $('#kota').select2();
                            let kota = data.payload.kota;
                            await fetchKec(data.payload.kota);

                            $.ajax({
                                url: `/question-value/{{ $table }}/kecamatan/${arrayPath[2]}`,
                                method: 'GET',
                                dataType: 'json',
                                success: async function(data) {
                                    $('#kecamatan').val(data.payload.kecamatan);
                                    $('#kecamatan').select2();
                                    await fetchKel(kota, data.payload.kecamatan);

                                    $.ajax({
                                        url: `/question-value/{{ $table }}/kelurahan/${arrayPath[2]}`,
                                        method: 'GET',
                                        dataType: 'json',
                                        success: function(data) {
                                            $('#kelurahan').val(data
                                                .payload
                                                .kelurahan);
                                            $('#kelurahan')
                                            .select2();
                                        },
                                        error: function(error) {
                                            console.error(error);
                                        }
                                    });
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                },
                error: function(error) {
                    console.error(error);
                }
            });

        }
    })()
</script>
