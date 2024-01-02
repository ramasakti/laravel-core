<div class="form-group">
    <label class="mt-2">Latitude / Longitude</label>
    @if ($require == 1)
        <span class="text-danger">*</span>
    @endif
    <div class="form-button">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <button type="button" class="btn btn-success" onclick="getLocation()">Generate</button>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
                <input type="text" 
                    class="form-control step-{{ $step }}" 
                    name="lat_long" id="lat_long"
                    placeholder="Contoh (latitude-longitude) : -7.1900991, 112.6398273" 
                    {{ ($require == 1) ? 'required' : '' }}>
                <input type="hidden" name="lat_long" id="location_data_input">
            </div>
        </div>
        <span class="text-danger">
            * Mohon generate latitude dan longitude berada di titik lokasi outlet
        </span>
    </div>
</div>
<script>
    const latlong = document.getElementById("location_data_input");
    const locationDataInput = document.getElementById("lat_long");
    
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            latlong.value = "Geolocation tidak support dengan browser anda.";
        }
    }

    function showPosition(position) {
        const locationData = position.coords.latitude + ", " + position.coords.longitude;
        locationDataInput.value = locationData;
        latlong.value = locationData;
    }

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
                success: async function(data) {
                    $(`#{{ $component }}`).val(data.payload['{{ $component }}'])
                },
                complete: function() {}
            })
        }
    })()
</script>