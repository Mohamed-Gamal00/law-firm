<div>
    <div class="row">


        {{-- image --}}
        <div class="form-group my-3">
            <label for="exampleInputEmail1">الصورة</label>
            <div class="custom-file">
                <input class="custom-file-input" name="image" id="customFile" type="file" onchange="previewImage(this)">
                <label class="custom-file-label" for="customFile" id="customFileLabel">اختارالصورة</label>
            </div>
            <div class="mt-1" id="imagePreview">

                @if ($about->image)
                    <img style="object-fit: cover" src="{{ asset("storage/$about->image") }}" width="60"
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


        <div class="form-group">
            <label for="title">العنوان</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $about->title ?? '') }}">
        </div>
        @error('title')
            <div>
                <p class="text-danger">
                    {{ $errors->first('title') }}
                </p>
            </div>
        @enderror

        <div class="form-group">
            <label for="content">المحتوي</label>
            <textarea class="form-control" style="height: 100px" id="content" name="content">{{ old('content', $about->content ?? '') }}</textarea>
        </div>
        @error('content')
            <div>
                <p class="text-danger">
                    {{ $errors->first('content') }}
                </p>
            </div>
        @enderror

        {{-- <div class="form-group my-3">
            <label for="featuretitle">Feature</label>
            <input type="text" class="form-control" id="title" name="featuretitle"
                value="{{ old('title', $about->featuretitle ?? '') }}">
            @error('featuretitle')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('featuretitle') }}
                    </p>
                </div>
            @enderror
            <label for="featurecontent">Features content</label>
            <textarea class="form-control" id="featurecontent" name="featurecontent">{{ old('features', json_encode($about->features ?? '')) }}</textarea>
            @error('featurecontent')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('featurecontent') }}
                    </p>
                </div>
            @enderror
        </div> --}}



        {{-- <div class="form-group">
            <div class="form-group">
                <label for="features">Features</label>
                <div id="features-container">
                    @if ($about->features)
                        @foreach (json_decode($about->features, true) as $index => $feature)
                            <div class="input-group mb-2">
                                <input type="text" name="features[]" class="form-control" value="{{ $feature }}"
                                    placeholder="Enter a feature">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-danger delete-feature">Delete</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <input type="text" name="features[]" class="form-control mb-2" value=""
                            placeholder="Enter a feature">
                    @endif
                </div>
                <button type="button" id="add-feature" class="btn btn-primary">Add Feature</button>

                @error('features')
                    <div>
                        <p class="text-danger">{{ $errors->first('features') }}</p>
                    </div>
                @enderror
            </div>
        </div> --}}

        {{-- featuers --}}

        {{-- <div id="features-container">
            <label class="mb-0 mt-4" for="">المميزات</label>
            @if ($about && $about->features)
                @foreach (json_decode($about->features, true) as $index => $feature)
                    <div class="feature-input">
                        <div class="input-group my-2">
                            <input type="text" name="features[]" class="form-control feature"
                                value="{{ $feature }}" placeholder="Enter a feature">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger delete-feature">Delete</button>
                            </div>
                        </div>
                        <textarea name="feature_content[]" class="form-control feature-content" placeholder="Enter content for this feature">{{ json_decode($about->feature_content, true)[$index] ?? '' }}</textarea>

                    </div>
                @endforeach
            @else
                <div class="feature-input">
                    <div class="input-group mb-2">
                        <input type="text" name="features[]" class="form-control feature" value=""
                            placeholder="Enter a feature">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger delete-feature">Delete</button>
                        </div>
                    </div>
                    <textarea name="feature_content[]" class="form-control feature-content" placeholder="Enter content for this feature"></textarea>
                </div>
            @endif
        </div>
        <div>
            <button type="button" id="add-feature" class="btn btn-primary">Add feature</button>
        </div>

        <script>
            document.getElementById('add-feature').addEventListener('click', function() {
                var container = document.getElementById('features-container');
                var featureInput = document.createElement('div');
                featureInput.className = 'feature-input';

                var inputGroup = document.createElement('div');
                inputGroup.className = 'input-group mb-2';

                var input = document.createElement('input');
                input.type = 'text';
                input.name = 'features[]';
                input.className = 'form-control feature';
                input.placeholder = 'Enter a feature';

                var inputGroupAppend = document.createElement('div');
                inputGroupAppend.className = 'input-group-append';

                var deleteButton = document.createElement('button');
                deleteButton.type = 'button';
                deleteButton.className = 'btn btn-danger delete-feature';
                deleteButton.textContent = 'Delete';

                inputGroupAppend.appendChild(deleteButton);
                inputGroup.appendChild(input);
                inputGroup.appendChild(inputGroupAppend);

                var textarea = document.createElement('textarea');
                textarea.name = 'feature_content[]';
                textarea.className = 'form-control feature-content';
                textarea.placeholder = 'Enter content for this feature';

                featureInput.appendChild(inputGroup);
                featureInput.appendChild(textarea);
                container.appendChild(featureInput);
            });

            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('delete-feature')) {
                    var featureInput = event.target.closest('.feature-input');
                    featureInput.remove();
                }
            });
        </script> --}}



        <div class="form-group mt-4">
            <label for="video_link">لينك الفديو</label>
            <input type="url" class="form-control" id="video_link" name="video_link"
                value="{{ old('video_link', $about->video_link ?? '') }}">
        </div>
        @error('video_link')
            <div>
                <p class="text-danger">
                    {{ $errors->first('video_link') }}
                </p>
            </div>
        @enderror

        <div class="form-group">
            <label for="video_title">عنوان الفيديو</label>
            <input type="text" class="form-control" id="video_title" name="video_title"
                value="{{ old('video_title', $about->video_title ?? '') }}">
        </div>
        @error('video_title')
            <div>
                <p class="text-danger">
                    {{ $errors->first('video_title') }}
                </p>
            </div>
        @enderror

        <div class="form-group">
            <label for="video_content">وصف الفيديو</label>
            <textarea class="form-control" id="video_content" name="video_content">{{ old('video_content', $about->video_content ?? '') }}</textarea>
        </div>
        @error('video_content')
            <div>
                <p class="text-danger">
                    {{ $errors->first('video_content') }}
                </p>
            </div>
        @enderror

        {{-- points --}}
<div class="form-group">
    <label for="points" class="mt-3 mb-0">المميزات</label>
    <div id="points-container">
        @if ($about && $about->points)
            @foreach (json_decode($about->points, true) as $index => $point)
                <div class="point-input">
                    <div class="input-group my-2">
                        <input type="text" name="points[]" class="form-control point" value="{{ $point }}" placeholder="Enter a point" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger delete-point">حذف</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="point-input">
                <div class="input-group mb-2">
                    <input type="text" name="points[]" class="form-control point" value="" placeholder="Enter a point" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger delete-point">حذف</button>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <button type="button" id="add-point" class="btn btn-primary mt-3">اضف ميزة</button>
</div>

<script>
    document.getElementById('add-point').addEventListener('click', function() {
        var container = document.getElementById('points-container');
        var newPointInput = document.createElement('div');
        newPointInput.className = 'point-input';
        newPointInput.innerHTML = `
            <div class="input-group my-2">
                <input type="text" name="points[]" class="form-control point" value="" placeholder="Enter a point" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger delete-point">حذف</button>
                </div>
            </div>`;
        container.appendChild(newPointInput);

        // Add event listener to the new delete button
        newPointInput.querySelector('.delete-point').addEventListener('click', function() {
            newPointInput.remove();
        });
    });

    // Add event listener to existing delete buttons
    document.querySelectorAll('.delete-point').forEach(function(button) {
        button.addEventListener('click', function() {
            button.closest('.point-input').remove();
        });
    });
</script>

@error('points')
    <div>
        <p class="text-danger">
            {{ $errors->first('points') }}
        </p>
    </div>
@enderror

    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="team_work">فريق العمل</label>
                <input type="text" class="form-control" id="team_work" name="team_work"
                    value="{{ old('team_work', $about->team_work ?? '') }}">
            </div>
            @error('team_work')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('team_work') }}
                    </p>
                </div>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="happy_clients">عمــلاء سـعــــداء</label>
                <input type="text" class="form-control" id="happy_clients" name="happy_clients"
                    value="{{ old('happy_clients', $about->happy_clients ?? '') }}">
            </div>
            @error('happy_clients')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('happy_clients') }}
                    </p>
                </div>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="successful_lawsuits">قضــايا و دعــاوي ناجـحـة</label>
                <input type="text" class="form-control" id="successful_lawsuits" name="successful_lawsuits"
                    value="{{ old('successful_lawsuits', $about->successful_lawsuits ?? '') }}">
            </div>
            @error('successful_lawsuits')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('successful_lawsuits') }}
                    </p>
                </div>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="successful_consultations">استـشـارات قـانـونــية نـاجحة</label>
                <input type="text" class="form-control" id="successful_consultations"
                    name="successful_consultations"
                    value="{{ old('successful_consultations', $about->successful_consultations ?? '') }}">
            </div>
            @error('successful_consultations')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('successful_consultations') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>
</div>


<button type="submit" class="btn btn-primary mt-3">حفظ</button>
