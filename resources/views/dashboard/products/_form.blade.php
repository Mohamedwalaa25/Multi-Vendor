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

    <x-form.input label="Product Name" class="form-control" type="text" name="name" :value="$product->name"/>
</div>

<div class="form-group">
    <label for=""> Category </label>
    <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror form-select">
        <option value=""> Primary Category</option>
        @foreach($categories as $category )
            <option
                value="{{$category->id}}" @selected(old('category_id' ,$product->category_id)== $category->id)>{{$category->name}}</option>
        @endforeach
    </select>
</div>
@error('parent_id')
<div class="text-danger">
    {{$error}}
</div>
@enderror
<div class="form-group">

    <x-form.textarea label="Description" class="form-control" name="description" :value="$product->description"/>
    @error('description')
    <div class="text-danger">
        {{$error}}
    </div>
    @enderror
    <div class="form-group">
        <x-form.input label="Image" type="file" name="image" class="form-control @error('image') is-invalid @enderror"/>
        @if ($product->image)
            <br>
            <img src="{{asset('storage/'.$product->image)}}" height="60" alt=""/>
        @endif
    </div>
    @error('image')
    <div class="text-danger">
        {{$error}}
    </div>
    @enderror

    <div class="form-group">

        <x-form.input label="Price" class="form-control" type="text" name="price" :value="$product->price"/>
    </div>

    <div class="form-group">

        <x-form.input label="Compare Price" class="form-control" type="text" name="compare_price"
                      :value="$product->compare_price"/>
    </div>

    <div class="form-group">

        <x-form.input label="Tags" class="form-control" type="text" name="tags" :value="$tags"/>
    </div>

    <div class="form-group">


        <x-form.radio label="Status" class="form-check-input" name="status" :checked="$product->status"
                      :options="['active'=>'Active','draft' =>'Draft','archived'=>'Archived']"/>

    </div>


    <div class="form-group">
        <label for=""></label>
        <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
    </div>
</div>
@push('styles')

    <link href="{{asset('css/tagify.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('scripts')
    <script src="{{asset('js/tagify.js')}}"></script>
    <script src="{{asset('js/tagify.polyfills.min.js')}}"></script>

    <script>
        var inputElm = document.querySelector('[name=tags]'),
            tagify = new Tagify(inputElm);
    </script>
@endpush
