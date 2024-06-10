@csrf
<div class="form-group">
    <label for="exampleInputEmail1">العنوان</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $featuer->title) }}"
        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">

    @error('title')
        <div>
            <p class="text-danger">
                {{ $errors->first('title') }}
            </p>
        </div>
    @enderror
</div>

{{-- desc --}}
<div class="form-group">
    <label for="floatingTextarea2">المحتوي</label>
    <div class="form-floating">
        <textarea class="form-control" name="desc" id="floatingTextarea2"style="height: 100px">{{ $featuer->desc }}</textarea>
    </div>

    @error('desc')
        <div>
            <p class="text-danger">
                {{ $errors->first('desc') }}
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

        @if ($featuer->image)
            <img style="object-fit: cover" src="{{ asset("storage/$featuer->image") }}" width="60" height="60" alt="img">
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

<button type="submit" class="btn btn-primary my-3">Submit</button>
