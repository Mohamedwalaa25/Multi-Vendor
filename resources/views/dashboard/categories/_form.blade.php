@if($errors->any())
    <div class="alert alert-danger">
        <h3>Error Occured !</h3>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
@endif
<div class="form-group">

    <x-form.input label="Category Name" class="form-control" type="text" name="name" :value="$category->name"/>
</div>

<div class="form-group">
    <label for="">Parent Category </label>
    <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror form-select">
        <option value=""> Primary Category</option>
        @foreach($parents as $parent )
            <option
                value="{{$parent->id}}" @selected(old('parent_id' ,$category->parent_id)== $parent->id)>{{$parent->name}}</option>
        @endforeach
    </select>
</div>
@error('parent_id')
<div class="text-danger">
    {{$error}}
</div>
@enderror
<div class="form-group">

    <x-form.textarea label="Description" class="form-control" name="description" :value="$category->description" />
@error('description')
<div class="text-danger">
    {{$error}}
</div>
@enderror
<div class="form-group">
    <x-form.input label="Image" type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
    @if ($category->image)
        <br>
        <img src="{{asset('storage/'.$category->image)}}" height="60" alt=""/>
    @endif
</div>
@error('image')
<div class="text-danger">
    {{$error}}
</div>
@enderror
<div class="form-group">
    <label for="">Status</label>

    <x-form.radio class="form-check-input" name="status" :checked="$category->status" :options="['active'=>'Active','archived'=>'Archived']"  />

</div>

<div class="form-group">
    <label for=""></label>
    <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
</div>
</div>
