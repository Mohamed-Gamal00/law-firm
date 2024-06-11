@csrf
<div class="form-group">
    <label for="exampleInputEmail1">اسم القسم</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" id="exampleInputEmail1"
        aria-describedby="emailHelp" placeholder="">

    @error('name')
        <div>
            <p class="text-danger">
                {{ $errors->first('name') }}
            </p>
        </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary my-3">حفظ</button>
