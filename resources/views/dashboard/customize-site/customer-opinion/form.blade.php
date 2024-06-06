@csrf

{{-- image_section --}}
<div class="form-group my-3">
    <label for="image_section">صورة الرئيسية </label>
    <div class="custom-file">

        <input class="custom-file-input" name="image_section" id="customFile2" type="file"
            onchange="previewImage(this, 'imagePreview2')">
        <label class="custom-file-label" for="customFile2" id="customFileLabel2">صورة الرئيسية </label>
    </div>
    <div class="mt-1" id="imagePreview2">

        @if ($data->image_section)
            <img style="object-fit: cover" src="{{ asset("storage/$data->image_section") }}" width="60"
                height="60" alt="image_section">
        @endif
    </div>
    @error('image_section')
        <div>
            <p class="text-danger">
                {{ $errors->first('image_section') }}
            </p>
        </div>
    @enderror
</div>


{{-- name --}}
<div class="form-group">
    <label for="exampleInputEmail1">اسم العميل</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $data->name) }}"
        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">

    @error('name')
        <div>
            <p class="text-danger">
                {{ $errors->first('name') }}
            </p>
        </div>
    @enderror
</div>

{{-- content --}}
<div class="form-group">
    <label for="floatingTextarea2">المحتوي</label>
    <div class="form-floating">
        <textarea class="form-control" name="content" id="floatingTextarea2"style="height: 100px">{{ $data->content }}</textarea>
    </div>

    @error('content')
        <div>
            <p class="text-danger">
                {{ $errors->first('content') }}
            </p>
        </div>
    @enderror
</div>

{{-- status --}}
<div class="form-group">
    <label for="exampleInputEmail1">الحالة</label>
    <input type="text" name="status" class="form-control" value="{{ old('status', $data->status) }}"
        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">

    @error('status')
        <div>
            <p class="text-danger">
                {{ $errors->first('status') }}
            </p>
        </div>
    @enderror
</div>


{{-- image --}}
{{-- <div class="form-group my-3">
    <label for="exampleInputEmail1">صورة العميل</label>
    <div class="custom-file">
        <input class="custom-file-input" name="image" id="customFile" type="file" onchange="previewImage(this)">
        <label class="custom-file-label" for="customFile" id="customFileLabel">صورة العميل</label>
    </div>
    <div class="mt-1" id="imagePreview">

        @if ($data->image)
            <img style="object-fit: cover" src="{{ asset("storage/$data->image") }}" width="60" height="60"
                alt="img">
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
</script> --}}



{{-- Image 1 --}}

{{-- image --}}
<div class="form-group my-3">
    <label for="exampleInputEmail1">صورة العميل</label>
    <div class="custom-file">
        <input class="custom-file-input" name="image" id="customFile" type="file"
            onchange="previewImage(this, 'imagePreview1')">
        <label class="custom-file-label" for="customFile" id="customFileLabel">صورة العميل</label>
    </div>
    <div class="mt-1" id="imagePreview1">

        @if ($data->image)
            <img style="object-fit: cover" src="{{ asset("storage/$data->image") }}" width="60" height="60"
                alt="img">
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
{{-- <div class="form-group my-3">
    <label for="image1">صورة العميل 1</label>
    <div class="custom-file">
        <input class="custom-file-input" name="image1" id="customFile1" type="file"
            onchange="previewImage(this, 'imagePreview1')">
        <label class="custom-file-label" for="customFile1" id="customFileLabel1">صورة العميل 1</label>
    </div>
    <div class="mt-1" id="imagePreview1">
        @if ($data->image1)
            <img style="object-fit: cover" src="{{ asset("storage/$data->image1") }}" width="60" height="60"
                alt="img1">
        @endif
    </div>
    @error('image1')
        <div>
            <p class="text-danger">
                {{ $errors->first('image1') }}
            </p>
        </div>
    @enderror
</div> --}}



<script>
    function previewImage(input, previewId) {
        var file = input.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var imgPreview = document.getElementById(previewId);
            imgPreview.innerHTML = '<img src="' + e.target.result + '" width="60" height="60" alt="preview">';
        }
        reader.readAsDataURL(file);
    }
</script>

<button type="submit" class="btn btn-primary my-3">Submit</button>
