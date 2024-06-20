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
    <label for="">Category Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')??$category->name }}">
    @error('name')
    <div class="text-danger">
        {{$error}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="">Parent Category </label>
    <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror form-select">
        <option value=""> Primary Category</option>
        @foreach($parents as $parent )
            <option value="{{$parent->id}}" @selected(old('parent_id' ,$category->parent_id)== $parent->id)>{{$parent->name}}</option>
        @endforeach
    </select>
</div>
@error('parent_id')
<div class="text-danger">
    {{$error}}
</div>
@enderror
<div class="form-group">
    <label for="">Description</label>
    <textarea name="description" class="form-control  @error('description') is-invalid @enderror"> {{old('description')??$category->description}}</textarea>
</div>
@error('description')
<div class="text-danger">
    {{$error}}
</div>
@enderror
<div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" >
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
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" value="active"
            @checked(old('status',$category->status)=="active")>
        <label class="form-check-label">
            Active
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" value="archived"  @checked(old('status',$category->status)=="archived")>
        <label class="form-check-label">
            Archived
        </label>
    </div>
</div>
@error('status')
<div class="text-danger">
    {{$error}}
</div>
@enderror
<div class="form-group">
    <label for=""></label>
    <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
</div>
