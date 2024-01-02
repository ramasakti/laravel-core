<div class="form-group mt-2">
    <label for="basicInput">Alamat Lengkap</label>
    @if ($require == 1)
        <span class="text-danger">*</span>
    @endif
    <textarea class="form-control step-{{ $step }}" name="{{ $component }}" id="{{ $component }}" cols="30" rows="3"
        onchange="changeStatus(this.id)" {{ ($require == 1) ? 'required' : '' }}></textarea>
</div>
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
                    $(`#{{ $component }}`).val(data.payload['{{ $component }}'])
                },
                complete: function() {}
            })
        }
    })()
</script>