<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#SL</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    @php $sl=0; @endphp
    @foreach($companies as $company)
        <tr>
            <td>{{ ++$sl }}</td>
{{--        <td>{{ Str::slug($company->name !=null ? $company->name : '', '-') }}</td>--}}

            <td>{{ $company->name !=null ? $company->name : ''}}</td>

            <td>{{ $company->name !=null ? str_limit($company->description,50) : ''}}</td>

{{--    <td>{{ $company->description !=null ? $company->description : "--" }}</td>--}}

            <td>
                <a class="far fa-edit btn btn-sm btn-primary" href="{{ route("company.edit",$company->id) }}"></a>
                <button type="button" class="erase btn btn-sm btn-danger far fa-trash-alt" data-url="{{ route('company.destroy') }}" data-id="{{ $company->id }}">
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>