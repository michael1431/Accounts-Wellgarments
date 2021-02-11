<table class="table table-hover capitalize table-bordered" id="myTable">
    <thead>
    <tr>
        <th>#SL</th>
        <th>Ledger|Group Name</th>
        <th>Group Name</th>
        {{-- <th>Description</th> --}}
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php $sl=0; @endphp
    @foreach($ledgers as $info)
        <tr>
            <td>{{ ++$sl }}</td>
            <td>
                @if($info->ledger)
                <strong> {{ $info->name ? $info->name  : '' }} </strong>
                @else
                {{ $info->name ? $info->name  : '' }}
                @endif
            </td>
            <td><strong>{{ $info->parent ? $info->parent->name ?? '' : ''}}</strong></td>
            {{-- <td>{{ $info->note !=null ? $info->note : "N/A" }}</td> --}}
            <td>
                <a class="far fa-edit btn-sm btn btn-primary" href="{{ route("ledger.edit",$info->id) }}"></a>
                <button type="button" class="erase btn btn-sm btn-danger far fa-trash-alt" data-url="{{ route('ledger.destroy') }}" data-id="{{ $info->id }}"></button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>