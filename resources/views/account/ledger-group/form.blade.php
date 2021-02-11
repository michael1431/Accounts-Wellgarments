
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::label('name', 'Ledger Group Name', ['class'=>'label-control']) }}
    {{ Form::text('name',old('name'),['class'=>'form-control','autofocus']) }}
    @if ($errors->has('name'))
        <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

{{--<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">--}}
{{--    {{Form::label('group_id', 'Groups Under', ['class'=>'label-control'])}}--}}
{{--    {{ Form::select('group_id',$groupsPluck,null,['class'=>'form-control','placeholder'=>'Select Groups Under']) }}--}}
{{--    @if ($errors->has('group_id'))--}}
{{--        <span class="help-block text-center" id="success-alert">--}}
{{--            <strong>{{ $errors->first('group_id') }}</strong>--}}
{{--        </span>--}}
{{--    @endif--}}
{{--</div>--}}




<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
    @if ($errors->has('group_id'))
        <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('group_id') }}</strong>
        </span>
    @endif

{{--    @php--}}
{{--        $pr_id=$gr_id = $under_group = null;--}}
{{--        if ($group){--}}
{{--            if ($group->group_id !=null){--}}
{{--                    $gr_id = $group->group_id;--}}
{{--            }else{--}}
{{--                $pr_id = "pr".$group->sub_principle_id;--}}
{{--            }--}}
{{--        }--}}
{{--    @endphp--}}


    {{--start for principle --}}
        @php
            $pr_id=$gr_id = $under_group = null;
            if ($group){
                if ($group->group_id !=null){
                        $gr_id = $group->group_id;
                }else{
                    $pr_id = "pr".$group->principle_id;
                }
            }
        @endphp
      {{--end for principle --}}


{{--        <select name="group_id" id="group_id">--}}
{{--        <optgroup label="Sub principle and other dependency">--}}
{{--        <option value="0">Select Account Group </option>--}}

{{--        @foreach ($subPrinciples as $sub_principle)--}}
{{--            @if ("pr".$sub_principle->id==$pr_id)--}}

{{--                <option value="pr{{$sub_principle->id}}" selected >  {{ $sub_principle->name }} -- Principle</option>--}}
{{--            @else--}}
{{--                <option value="pr{{$sub_principle->id}}">  {{ $sub_principle->name }} -- sub orinciple</option>--}}
{{--            @endif--}}

{{--            @foreach($sub_principle->ledgerGroups as $group)--}}
{{--                <option value="{{ $group->id }}" {{ ($gr_id !=null ? "selected" : "") }}>{{ $group->name }} -- GROUP</option>--}}

{{--                under all group--}}
{{--                @foreach(\App\Account\LedgerGroup::where('group_id',$group->id)->get() as $under_group_names)--}}
{{--                    <option value="ur{{ $under_group_names->id }}" {{  $under_group_names->id == $gr_id ? "selected" : "" }} >--}}
{{--                        {{ $under_group_names->name }} --Under-GROUP--}}
{{--                    </option>--}}
{{--                @endforeach--}}

{{--            @endforeach--}}
{{--        @endforeach--}}
{{--    </select>--}}

{{--    start principle--}}

        <select name="group_id" id="group_id">
            <optgroup label="Principle and other dependency">
                <option>Select Account Group </option>

                @foreach($principles as $principle)
                    @if ("pr".$principle->id==$pr_id)
                        <option value="pr{{$principle->id}}" selected >  {{$principle->name}} -- Principle</option>{{-- principle--}}
                    @else
                        <option value="pr{{$principle->id}}">  {{$principle->name}} -- principle</option> {{-- principle--}}

                    @endif

                    @foreach($principle->ledgerGroups as $group)
                        <option value="{{ $group->id }}" {{ ($gr_id !=null ? "selected" : "") }}>{{$group->name}} -- GROUP</option>{{-- GROUP--}}

                        @foreach(\App\Account\LedgerGroup::query()->where('group_id','!=',null)->get() as $under_group_names)  //changed by ahmed
{{--                    @foreach(\App\Account\LedgerGroup::where('group_id',$group->id)->get() as $under_group_names)--}} //original
                            <option value="ur{{ $under_group_names->id }}" {{  $under_group_names->id == $gr_id ? "selected" : "" }} >
                                {{ $under_group_names->name }} {{ $under_group_names->id }}
                            </option>
                        @endforeach
                    @endforeach
                @endforeach
            </optgroup>
        </select>
{{--    end principle--}}




</div>



<div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
    {{ Form::label('', 'Small notes', ['class'=>'label-control']) }}

    {{ Form::textarea('note',old('note'),['class'=>'form-control','rows'=>5,'cols'=>5]) }}
    @if ($errors->has('note'))
        <span class="help-block">
            <strong>{{ $errors->first('note') }}</strong>
        </span>
    @endif
</div>