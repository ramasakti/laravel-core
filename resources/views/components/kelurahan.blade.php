<div class="form-group">
    <label for="basicInput">Kelurahan</label>
    @if ($require == 1)
        <span class="text-danger">*</span>
    @endif
    <select name="{{ $component }}" id="{{ $component }}" class="step-{{ $step }}"
        onchange="fetchKodePos($('#kota').val(), $('#kecamatan').val(), $('#kelurahan').val())" {{ ($require == 1) ? 'required' : '' }}>
        <option value="">Pilih Kelurahan</option>
    </select>
    <input type="hidden" name="val-kelurahan">
</div>