@props([
    'name','label','options','value'=>"",'text'=>"" , "selected"=>false
])
@if($label)
    <label for="">{{$label}}</label>
@endif
<select
    name="{{$name}}"
    {{$attributes}}
>
    @foreach($options as $value=> $text)
        <option value="{{$value}}" @selected($value==$selected)>{{$text}}</option>
    @endforeach
</select>

@error($name)
<div class="text-danger">
    {{$message}}
</div>
@enderror

