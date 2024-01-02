<div class="form-group">
    <label for="basicInput">Kecamatan</label>
    @if ($require == 1)
        <span class="text-danger">*</span>
    @endif
    <select name="{{ $component }}" id="{{ $component }}" class="step-{{ $step }}"
        onchange="fetchKel($('#kota').val(), this.value)" {{ ($require == 1) ? 'required' : '' }}>
        <option value="">Pilih Kecamatan</option>
    </select>
    <input type="hidden" name="val-kecamatan">
</div>