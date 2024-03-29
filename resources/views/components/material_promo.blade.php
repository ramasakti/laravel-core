<div class="form-group">
    <label class="mt-2">Material Promo</label>
    @if ($require == 1)
        <span class="text-danger">*</span>
    @endif
    <div class="form-button">
        <select id="{{ $component }}" name="{{ $component }}[]" class="form-select step-{{ $step }}" aria-label="Default select example" 
            multiple="multiple" {{ ($require == 1) ? 'required' : '' }}>
            @foreach ($data as $item)
                <option value="{{ $item->id }}">{{ $item->material }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<script>
    (function() {
        function arrayColumn(arr, columnKey) {
            return arr.map(function(obj) {
                return obj[columnKey];
            });
        }

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
                    const material_promo = arrayColumn(data.payload, 'material_id')
                    $(`#{{ $component }}`).val(material_promo)
                    $(`#{{ $component }}`).select2()
                },
                complete: function() {}
            })
        }
    })()
</script>