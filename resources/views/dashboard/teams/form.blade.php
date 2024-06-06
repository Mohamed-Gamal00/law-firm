@csrf
{{-- name --}}
<div class="form-group">
    <label for="exampleInputEmail1">الاسم</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}"
        id="exampleInputEmail1" aria-describedby="emailHelp">

    @error('name')
        <div>
            <p class="text-danger">
                {{ $errors->first('name') }}
            </p>
        </div>
    @enderror
</div>
<div class="row">

    <div class="col-md-6">

        {{-- job title --}}
        <div class="form-group">
            <label for="exampleInputEmail1">المهنة</label>
            <input type="text" name="job_title" class="form-control"
                value="{{ old('job_title', $member->job_title) }}" id="exampleInputEmail1" aria-describedby="emailHelp">

            @error('job_title')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('job_title') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        {{-- job experience --}}
        <div class="form-group">
            <label for="exampleInputEmail1">الخبرة</label>
            <input type="text" name="experience" class="form-control"
                value="{{ old('experience', $member->experience) }}" id="exampleInputEmail1"
                aria-describedby="emailHelp">

            @error('experience')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('experience') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        {{-- email --}}
        <div class="form-group">
            <label for="exampleInputEmail1">الايميل</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}"
                id="exampleInputEmail1" aria-describedby="emailHelp">

            @error('email')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('email') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">

        {{-- phone --}}
        <div class="form-group">
            <label for="exampleInputphone1">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $member->phone) }}"
                id="exampleInputphone1" aria-describedby="phoneHelp">

            @error('phone')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('phone') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        {{-- twitter --}}
        <div class="form-group">
            <label for="exampleInputphone1">تويتر</label>
            <input type="text" name="twitter" class="form-control" value="{{ old('twitter', $member->twitter) }}"
                id="exampleInputtwitter1" aria-describedby="twitterHelp">

            @error('twitter')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('twitter') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        {{-- facebook --}}
        <div class="form-group">
            <label for="exampleInputphone1">فيس بوك</label>
            <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $member->facebook) }}"
                id="exampleInputfacebook1" aria-describedby="facebookHelp">

            @error('facebook')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('facebook') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">

        {{-- instagram --}}
        <div class="form-group">
            <label for="exampleInputphone1">انستجرام</label>
            <input type="text" name="instagram" class="form-control"
                value="{{ old('instagram', $member->instagram) }}" id="exampleInputinstagram1"
                aria-describedby="instagramHelp">

            @error('instagram')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('instagram') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        {{-- linked_in --}}
        <div class="form-group">
            <label for="exampleInputphone1">لينكد ان</label>
            <input type="text" name="linked_in" class="form-control"
                value="{{ old('linked_in', $member->linked_in) }}" id="exampleInputlinked_in1"
                aria-describedby="linked_inHelp">

            @error('linked_in')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('linked_in') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>
</div>


{{-- image --}}
<div class="form-group my-4">
    <label for="exampleInputEmail1">الصورة</label>
    <div class="custom-file">
        <input class="custom-file-input" name="image" id="customFile" type="file" onchange="previewImage(this)">
        <label class="custom-file-label" for="customFile" id="customFileLabel">اختارالصورة</label>
    </div>
    <div class="mt-1" id="imagePreview">

        @if ($member->image)
            <img style="object-fit: cover" src="{{ asset("storage/$member->image") }}" width="60"
                height="60" alt="img">
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


{{-- personal_info --}}
<div class="form-group">
    <label for="personal_info">البيانات الشخصية والمهنية</label>

    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <textarea id="elm1" name="personal_info">{{ $member->personal_info }}</textarea>

            </div>
            @error('personal_info')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('personal_info') }}
                    </p>
                </div>
            @enderror
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

    {{-- <div class="form-floating">
        <textarea class="form-control" name="personal_info" id="personal_info"style="height: 100px">{{ old('personal_info', $member->personal_info) }}</textarea>
    </div>

    @error('personal_info')
        <div>
            <p class="text-danger">
                {{ $errors->first('personal_info') }}
            </p>
        </div>
    @enderror --}}
</div>


{{-- certifications --}}

{{-- <div class="form-group">
    <label for="certifications">الشهادات والخبرات</label>
    <div id="certifications-container">
        @if ($member->certifications)
            @foreach (json_decode($member->certifications, true) as $certification)
                <div class="input-group mb-2 certification-input">
                    <input type="text" name="certifications[]" class="form-control" value="{{ $certification }}"
                        placeholder="Enter a certification">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-certification">Remove</button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="input-group mb-2 certification-input">
                <input type="text" name="certifications[]" class="form-control" value=""
                    placeholder="Enter a certification">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-certification">Remove</button>
                </div>
            </div>
        @endif
    </div>
    <button type="button" id="add-certification" class="btn btn-primary">Add Certification</button>

    @error('certifications')
        <div>
            <p class="text-danger">{{ $errors->first('certifications') }}</p>
        </div>
    @enderror
</div>

<script>
    document.getElementById('add-certification').addEventListener('click', function() {
        var container = document.getElementById('certifications-container');
        var inputGroup = document.createElement('div');
        inputGroup.className = 'input-group mb-2 certification-input';

        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'certifications[]';
        input.className = 'form-control';
        input.placeholder = 'Enter a certification';

        var inputGroupAppend = document.createElement('div');
        inputGroupAppend.className = 'input-group-append';

        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-danger remove-certification';
        removeButton.textContent = 'Remove';
        removeButton.addEventListener('click', function() {
            container.removeChild(inputGroup);
        });

        inputGroupAppend.appendChild(removeButton);
        inputGroup.appendChild(input);
        inputGroup.appendChild(inputGroupAppend);
        container.appendChild(inputGroup);
    });

    document.querySelectorAll('.remove-certification').forEach(function(button) {
        button.addEventListener('click', function() {
            var container = document.getElementById('certifications-container');
            var inputGroup = button.closest('.certification-input');
            container.removeChild(inputGroup);
        });
    });
</script> --}}




<button type="submit" class="btn btn-primary mt-3">Submit</button>
