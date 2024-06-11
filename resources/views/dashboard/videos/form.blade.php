@csrf
{{-- <div class="form-group">
    <label for="exampleInputEmail1">العنوان</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $video->title) }}" id="exampleInputEmail1"
        aria-describedby="emailHelp" placeholder="">

    @error('title')
        <div>
            <p class="text-danger">
                {{ $errors->first('title') }}
            </p>
        </div>
    @enderror
</div> --}}


{{-- video --}}
{{-- <div class="form-group my-3">
    <label for="exampleInputEmail1">الفيديو</label>
    <div class="custom-file">
        <input class="custom-file-input" name="video_path" id="customFile" type="file" onchange="previewVideo(this)">
        <label class="custom-file-label" for="customFile" id="customFileLabel">اضف الفيديو</label>
    </div>
    <div class="mt-1" id="videoPreview">
        @if ($video->video_path)
            <video width="300" height="200" controls>
                <source src="{{ asset("storage/$video->video_path") }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endif
    </div>

    @error('video_path')
        <div>
            <p class="text-danger">
                {{ $errors->first('video_path') }}
            </p>
        </div>
    @enderror
</div>

<script>
    function previewVideo(input) {
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var videoPreview = document.getElementById('videoPreview');
            videoPreview.innerHTML = '<video width="300" height="200" controls>' +
                                     '<source src="' + e.target.result + '" type="' + file.type + '">' +
                                     'Your browser does not support the video tag.' +
                                     '</video>';
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script> --}}

{{-- video --}}
<div class="form-group">
    <label for="exampleInputEmail1">لينك الفيديو</label>
    <input type="text" name="video_path" class="form-control" value="{{ old('video_path', $video->video_path) }}"
        id="exampleInputEmail1" aria-describedby="emailHelp">

    @error('video_path')
        <div>
            <p class="text-danger">
                {{ $errors->first('video_path') }}
            </p>
        </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary my-3">Submit</button>
