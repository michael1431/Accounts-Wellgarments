
<table class="table table-hover table-bordered capitalize display" id="myTable" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">#SL</th>
            <th>Group Name</th>
            <th>Group's Under</th>
            <th>Principle's Under</th>
            <th>Description</th>
            <th width="10%">Action</th>
        </tr>
    </thead>

    <tbody>
        @php $sl=0; @endphp
        @foreach($groups as $index => $group)
            <tr>
{{--        <td>{{$groups->firstItem()+ $index }}</td>--}}
            <td class="text-center">{{ ++$sl }}</td>
                <td>{{ $group->name }}</td>
                <td>
                    @php
                      $parentName = \App\Account\LedgerGroup::select('name','id')->where('id',$group->group_id)->first();
                    @endphp
                    {{$parentName ? $parentName->name : ''}}
                </td>

{{--                <td>{{ $group->sub_principle_id !=null ? $group->sub_principle->name : "" }}</td>--}}
                <td>{{ $group->principle_id !=null ? $group->principle->name : "" }}</td>
                <td>{{ $group->note !=null ? $group->note : "" }}</td>
                <td>
                    {{--    stop modify and delete groups for the users--}}
{{--                    <a class="far fa-edit btn btn-sm btn-primary" href="#"></a>--}}
                     <a class="far fa-edit btn btn-sm btn-primary" href="{{route("ledgerGroup.edit",$group->id) }}"></a>

                    <button type="button" class="erase btn btn-sm btn-danger far fa-trash-alt" data-url="{{ route('ledgerGroup.destroy') }}" data-id="{{ $group->id }}">
                    </button>

{{--                    <button type="button" class="erase btn btn-sm btn-danger far fa-trash-alt" disabled data-url="{{ route('ledgerGroup.destroy') }}" data-id="{{ $group->id }}">--}}
{{--                    </button>--}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{--{{$groups->links() }}--}}