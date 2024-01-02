<div id="produk">
    <label class="mt-2"><b>Produk yang Dijual</b></label>
    @foreach ($data as $item)
        <div class="row py-2">
            <div class="col-sm-2 pt-2">
                <div class="form-check">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="form-check-input form-check-secondary cbJenisProduk"
                            name="{{ $item->produk }}" onchange="getMerk({{ $item->id }}, '{{ $item->produk }}')"
                            id="cb-{{ $item->id }}" data-id="{{ $item->id }}">
                        <div id="loading-{{ $item->id }}"></div>
                        {{ $item->produk }}
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-button select-custom">
                    <select name="{{ $item->produk }}[]" id="produk-{{ $item->id }}" class="listProduk form-select"
                        aria-label="Default select example" multiple="multiple">
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col" id="merk-{{ $item->id }}"></div>
        </div>
    @endforeach
</div>
<input type="hidden" id="arrayOfMerk" name="arrayOfMerk">
<div id="produk-data" data-produk='@json($data)'></div>
<script>
    (function() {
        function arrayColumn(arr, columnKey) {
            return arr.map(function(obj) {
                return obj[columnKey];
            });
        }

        function arrayUnique(array) {
            return array.filter((value, index, self) => {
                return self.indexOf(value) === index;
            });
        }

        const path = window.location.pathname;
        const regex = /\//g;
        const arrayPath = path.split(regex).filter(Boolean)
        const statusEdit = arrayPath[1] === 'edit'
        if (statusEdit) {
            fetch(`/question-value/{{ $table }}/{{ $component }}/${arrayPath[2]}`)
                .then(res => res.json())
                .then(data => {
                    const groupedData = data.payload.reduce((result, currentItem) => {
                        const key = currentItem.jenis_produk_id;
                        if (!result[key]) {
                            result[key] = [];
                        }
                        result[key].push(currentItem);
                        return result;
                    }, {});

                    const jenis_produk_id = arrayUnique(arrayColumn(data.payload, 'jenis_produk_id'))
                    jenis_produk_id.map(async item => {
                        $(`#cb-${item}`).prop('checked', true)
                        await getMerk(item)

                        const merk = arrayColumn(groupedData[item], 'merk_id')
                        $(`#produk-${item}`).val(merk)
                        $(`#produk-${item}`).select2()
                    })
                })
        }
    })()
    // const produk = JSON.parse($('#produk-data').attr('data-produk'))
    // console.log(produk);
</script>
