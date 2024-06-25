@props([
    'name','label','options','value'=>"",'text'=>"" , "checked"=>false
])
@if($label)
    <label for="">{{$label}}</label>
@endif
@foreach($options as $value=>$text)
    <div class="form-check">
        <input {{$attributes}} type="radio" name="{{$name}}" value="{{$value}}"
            @checked(old($name,$checked)==$value)>
        <label class="form-check-label">
            {{ $text}}
        </label>
    </div>
    @error($name)
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
@endforeach


{{--<div class="form-check">--}}
{{--    <input class="form-check-input" type="radio" name="status" value="active"--}}
{{--        @checked(old('status',$category->status)=="active")>--}}
{{--    <label class="form-check-label">--}}
{{--        Active--}}
{{--    </label>--}}
{{--</div>--}}

