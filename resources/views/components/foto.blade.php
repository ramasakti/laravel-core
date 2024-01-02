<div class="form-group">
    <label class="mt-2">Foto Outlet</label>
    @if ($require == 1)
        <span class="text-danger">*</span>
    @endif
    <div id="img-selected" class="row"></div>
    <div class="form-button">
        <input type="file" class="form-control step-{{ $step }}" name="foto_outlet[]" id="foto_outlet" multiple
            {{ $require == 1 ? 'required' : '' }} accept="image/*">
        <input type="hidden" name="selected_foto[]" id="selected_foto">
    </div>
</div>
<style>
   
</style>
<script>
    (function() {
        const path = window.location.pathname;
        const regex = /\//g;
        const arrayPath = path.split(regex).filter(Boolean)
        const statusEdit = arrayPath[1] === 'edit'
        if (statusEdit) {
            $.ajax({
                type: 'get',
                data: {},
                url: `/question-value/{{ $table }}/{{ $component }}/${arrayPath[2]}`,
                success: function(data) {
                    const foto = JSON.parse(data.payload['{{ $component }}'])
                    $(`#selected_foto`).val(data.payload['{{ $component }}'])
                    foto.map(item => {
                        $(`#img-selected`).append(`<div class="col-sm-6">
                                                    <button class="btn btn-danger btn-sm rounded-pill" onclick="delImage(this)"><i class="bi bi-trash"></i></button>
                                                    <img width="100px" class="foto-default" src="/foto_outlet/${item}" alt="Placeholder Image">
                                                </div>`)
                    })
                    $(`#{{ $component }}`).val(data.payload['{{ $component }}'])
                },
                complete: function() {}
            })
        }
    })()
</script>
