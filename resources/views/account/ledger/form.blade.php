
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::label('', 'Ledger Name : ', ['class'=>'label-control']) }}
    {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>' ','autofocus','required']) }}

    @if ($errors->has('name'))
        <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
    {{ Form::label('', 'Ledger Code : ', ['class'=>'label-control']) }}
    {{ Form::text('code',old('code'),['class'=>'form-control','placeholder'=>' ','autofocus','required']) }}

    @if ($errors->has('code'))
        <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('code') }}</strong>
        </span>
    @endif
</div>

{{--@dd($groups)--}} 
<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
    {{Form::label('group_id', 'Select Groups', ['class'=>'label-control'])}}
    {{-- {{ Form::select('group_id',$groups, null,['class'=>'form-control','placeholder'=>'select ledger group','required',]) }} --}}
    <select name="group_id" id="group_id" class="form-control" required>
        @foreach ($groups as $group)
            <option value="{{ $group->id }}"><strong> {{ $group->name }}</strong> </option>
            {{-- @forelse($group->childs as $group_child)
            @if($group_child->ledger==0)
                <option value="{{ $group_child->id }}">{{ $group_child->name }} (2)</option>
                @forelse($group_child->childs as $group_grand_child)
                @if($group_grand_child->ledger==0)
                    <option value="{{ $group_grand_child->id }}">{{ $group_grand_child->name }} (3)</option>
                    @forelse($group_grand_child->childs as $group_grand_child1)
                    @if($group_grand_child1->ledger==0)
                        <option value="{{ $group_grand_child1->id }}">{{ $group_grand_child1->name }} (4)</option>
                        @forelse($group_grand_child1->childs as $group_grand_child2)
                        @if($group_grand_child2->ledger==0)
                            <option value="{{ $group_grand_child2->id }}">{{ $group_grand_child2->name }} (5)</option>
                        @endif
                        @empty
                        @endforelse
                    @endif
                    @empty
                    @endforelse
                @endif
                @empty
                @endforelse
            @endif
            @empty
            @endforelse --}}
        @endforeach
    </select>
    @if ($errors->has('group_id'))
        <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('group_id') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('ledger') ? ' has-error' : '' }}">
    {{Form::label('ledger', 'Ledger', ['class'=>''])}}
   <br>
    <label class="radio-inline"><input value="1" type="radio" name="ledger" checked>&nbsp;&nbsp; Ledger  </label>&nbsp;&nbsp;
    <label class="radio-inline"><input value="0" type="radio" name="ledger">  Group</label>
</div>

<div class="form-group{{ $errors->has('is_bank') ? ' has-error' : '' }}">
    {{Form::label('is_bank', 'Bank Ledger', ['class'=>''])}}
   <br>
    <label class="radio-inline"><input value="1" type="radio" name="is_bank">&nbsp;&nbsp; Yes  </label>&nbsp;&nbsp;
    <label class="radio-inline"><input value="0" type="radio" name="is_bank" checked>  No</label>
</div>
