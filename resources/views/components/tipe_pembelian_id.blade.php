<div class="form-group">
    <label class="mt-2">Tipe Pembelian</label>
    @if ($require == 1)
        <span class="text-danger">*</span>
    @endif
    <div class="form-button">
        <select id="{{ $component }}" name="{{ $component }}" class="form-select step-{{ $step }}" 
        aria-label="Default select example" {{ ($require == 1) ? 'required' : '' }}>
            <option value="">Pilih Tipe Pembelian</option>
            @foreach ($data as $item)
                <option value="{{ $item->id }}">{{ $item->tipe_pembelian }} </option>
            @endforeach
        </select>
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