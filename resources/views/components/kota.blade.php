<div class="form-group">
    <label for="basicInput">Kabupaten</label>
    @if ($require == 1)
        <span class="text-danger">*</span>
    @endif
    <select name="{{ $component }}" id="{{ $component }}" class="step-{{ $step }}" onchange="fetchKec(this.value)"
        {{ $require == 1 ? 'required' : '' }}>
        <option value="">Pilih Kabupaten</option>
    </select>
    <input type="hidden" id="val-kota">
</div>