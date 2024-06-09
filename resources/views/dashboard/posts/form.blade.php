@csrf
{{-- title --}}
<div class="form-group">
    <label for="exampleInputEmail1">العنوان</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" id="exampleInputEmail1"
        aria-describedby="emailHelp">

    @error('title')
        <div>
            <p class="text-danger">
                {{ $errors->first('title') }}
            </p>
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="categories">Category</label>
    <select name="category_id" id="category" class="form-control from-select">
        <option value=""></option>

        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>

    @error('category_id')
        <div>
            <p class="text-danger">
                {{ $errors->first('category_id') }}
            </p>
        </div>
    @enderror

</div>

{{-- image --}}
<div class="form-group my-3">
    <label for="exampleInputEmail1">الصورة</label>
    <div class="custom-file">
        <input class="custom-file-input" name="image" id="customFile" type="file" onchange="previewImage(this)">
        <label class="custom-file-label" for="customFile" id="customFileLabel">اختارالصورة</label>
    </div>
    <div class="mt-1" id="imagePreview">

        @if ($post->image)
            <img style="object-fit: cover" src="{{ asset("storage/$post->image") }}" width="60" height="60" alt="img">
        @endif
    </div>

    @error('image')
        <div>
            <p class="text-danger">
                {{ $errors->first('image') }}
            </p>
        </div>
    @enderror
</div>
<script>
    function previewImage(input) {
        var file = input.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var imgPreview = document.getElementById('imagePreview');
            imgPreview.innerHTML = '<img src="' + e.target.result + '" width="60" height="60" alt="preview">';
        }
        reader.readAsDataURL(file);
    }
</script>


{{-- desc --}}
<div class="form-group">
    <label for="floatingTextarea2">الوصف</label>
    <div class="form-floating">
        <textarea class="form-control" name="desc" id="floatingTextarea2"
            style="height: 100px">
        {{ $post->desc }}
        </textarea>
    </div>

    @error('desc')
        <div>
            <p class="text-danger">
                {{ $errors->first('desc') }}
            </p>
        </div>
    @enderror
</div>
{{-- content --}}
{{-- <div class="form-group">
    <label for="floatingTextarea2">المحتوي</label>
    <div class="form-floating">
        <textarea class="form-control" name="content" id="floatingTextarea2"
            style="height: 100px">
        {{ $post->content }}
        </textarea>
    </div>

    @error('content')
        <div>
            <p class="text-danger">
                {{ $errors->first('content') }}
            </p>
        </div>
    @enderror
</div> --}}

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <textarea id="elm1" name="content">{{ $post->content }}</textarea>
            </div>
            @error('content')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('content') }}
                    </p>
                </div>
            @enderror
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->




<button type="submit" class="btn btn-primary mt-3">Submit</button>
