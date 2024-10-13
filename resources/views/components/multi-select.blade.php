<label for="{{$inputId}}" class="form-label {{$inputLabelClass}}" style="{{$inputLabelStyle}}">{{ $inputLabel }}</label>
<select name="{{$inputName}}" id="{{$inputId}}" class="form-control selectize-searchable-multi-select {{$inputClass}}" style="{{$inputStyle}}" multiple="multiple">
    <option value="" selected>{{$firstLabelItem}}</option>
        @foreach ($options as $option)
            <option value="{{ $option->$valueField }}" {{in_array($option->$valueField,$selectedItems) ? 'selected' : ''}}>
                {{ $option->$textField }}
            </option>
        @endforeach
</select>
{{-- {!!print_r()!!} --}}
