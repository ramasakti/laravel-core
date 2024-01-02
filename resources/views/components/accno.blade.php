<div class="form-group">
    <label class="mt-2">Accno.</label>
    @if ($require == 1)
        <span class="text-danger">*</span>
    @endif
    <div class="form-button">
        <input type="text" class="form-control step-{{ $step }}" name="{{ $component }}"
            id="{{ $component }}" {{ $require == 1 ? 'required' : '' }} onchange="changeStatus(this.id)">
    </div>
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
