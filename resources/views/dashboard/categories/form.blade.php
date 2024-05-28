@csrf
<div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" id="exampleInputEmail1"
        aria-describedby="emailHelp" placeholder="Enter name">

    @error('name')
        <div>
            <p class="text-danger">
                {{ $errors->first('name') }}
            </p>
        </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Submit</button>
