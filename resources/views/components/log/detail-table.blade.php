<div class="card-body table-responsive">
    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No. </th>
                <th>Tanggal</th>
                <th>Action</th>
                <th>User</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @php
                $prev = null;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->action }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @if ($prev)
                            Beruba awokwok
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>