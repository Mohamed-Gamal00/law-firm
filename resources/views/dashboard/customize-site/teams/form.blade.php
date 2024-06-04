@csrf
<div class="form-group">
    <label for="exampleInputEmail1">العنوان</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $data->title) }}" id="exampleInputEmail1"
        aria-describedby="emailHelp" placeholder="">

    @error('title')
        <div>
            <p class="text-danger">
                {{ $errors->first('title') }}
            </p>
        </div>
    @enderror
</div>

{{-- content --}}
<div class="form-group">
    <label for="floatingTextarea2">المحتوي</label>
    <div class="form-floating">
        <textarea class="form-control" name="content" id="floatingTextarea2"style="height: 100px">{{ old('content',$data->content) }}</textarea>
    </div>

    @error('content')
        <div>
            <p class="text-danger">
                {{ $errors->first('content') }}
            </p>
        </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary my-3">Submit</button>
