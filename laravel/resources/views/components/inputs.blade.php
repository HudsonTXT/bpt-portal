@if($input['type'] == 'text')
    <div class="input-group col-md-12">
        <label for="{{$input['name']}}">{{$input['label']}}</label>
        <input type="text" class="form-control input-lg" id="{{$input['name']}}" name="{{$input['name']}}"
               @isset($input['value'])
               value="{{$input['value']}}"
               @endisset
               @isset($input['placeholder'])
               placeholder="{{$input['placeholder']}}"
               @endisset
               required>
    </div>
@endif

@if($input['type'] == 'submit')
    <br>
    <div class="input-group">
        <input type="submit" class="btn btn-primary" value="Сохранить изменения">
    </div>
@endif

@if($input['type'] == 'radio')
    <br>
    <div class="input-group">
        <label>{{$input['label']}}</label>
        <br>
        @foreach($input['fields'] as $field)
            <div class="radio-inline">
                <label><input type="radio"
                       name="{{$input['name']}}" value="{{$field['value']}}"
                       @if($field['value'] == $input['value'] ) checked @endif>
                {{$field['label']}} </label>
            </div>
        @endforeach
    </div>
@endif

@isset($input['help'])
    <div class="help-block">
        {{$input['help']}}
    </div>
@endif