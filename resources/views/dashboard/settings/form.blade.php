@csrf

<div class="row">
    {{-- وصف حجز موعد --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">وصف حجز الموعد</label>
            <input type="text" name="booking_title" class="form-control"
                value="{{ old('booking_title', $settings->booking_title ?? '') }}" id="exampleInputEmail1"
                aria-describedby="emailHelp">

            @error('booking_title')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('booking_title') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>

    {{-- email --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">الايميل</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $settings->email ?? '') }}"
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

    {{-- phone --}}
    <div class="col-md-6">

        <div class="form-group">
            <label for="exampleInputphone1">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $settings->phone ?? '') }}"
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
    {{-- fax --}}
    <div class="col-md-6">

        <div class="form-group">
            <label for="exampleInputfax1">فاكس</label>
            <input type="text" name="fax" class="form-control" value="{{ old('fax', $settings->fax ?? '') }}"
                id="exampleInputfax1" aria-describedby="faxHelp">

            @error('fax')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('fax') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>
    {{-- fax --}}
    <div class="col-md-6">

        <div class="form-group">
            <label for="exampleInputfax1">العنوان</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $settings->address ?? '') }}"
                id="exampleInputaddress1" aria-describedby="addressHelp">

            @error('address')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('address') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>
    {{-- tw_link --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputphone1">تويتر</label>
            <input type="text" name="tw_link" class="form-control"
                value="{{ old('tw_link', $settings->tw_link ?? '') }}" id="exampleInputtw_link1"
                aria-describedby="tw_linkHelp">

            @error('tw_link')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('tw_link') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>

    {{-- fb_link --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputphone1">فيس بوك</label>
            <input type="text" name="fb_link" class="form-control"
                value="{{ old('fb_link', $settings->fb_link ?? '') }}" id="exampleInputfb_link1"
                aria-describedby="fb_linkHelp">

            @error('fb_link')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('fb_link') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>
    {{-- whatsapp --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputphone1">لينك واتساب</label>
            <input type="text" name="whatsapp" class="form-control"
                value="{{ old('whatsapp', $settings->whatsapp ?? '') }}" id="exampleInputwhatsapp1"
                aria-describedby="whatsappHelp">

            @error('whatsapp')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('whatsapp') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>

    {{-- insta_link --}}
    <div class="col-md-6">

        <div class="form-group">
            <label for="exampleInputphone1">انستجرام</label>
            <input type="text" name="insta_link" class="form-control"
                value="{{ old('insta_link', $settings->insta_link ?? '') }}" id="exampleInputinsta_link1"
                aria-describedby="insta_linkHelp">

            @error('insta_link')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('insta_link') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>
    {{-- linked_in --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputphone1">لينكد ان</label>
            <input type="text" name="linkdin_link" class="form-control"
                value="{{ old('linkdin_link', $settings->linkdin_link ?? '') }}" id="exampleInputlinkdin_link1"
                aria-describedby="linkdin_linkHelp">

            @error('linkdin_link')
                <div>
                    <p class="text-danger">
                        {{ $errors->first('linkdin_link') }}
                    </p>
                </div>
            @enderror
        </div>
    </div>
</div>


{{-- logo --}}
<div class="form-group my-4">
    <label for="exampleInputEmail1">اللوجو</label>
    <div class="custom-file">
        <input class="custom-file-input" name="logo" id="customFile" type="file" onchange="previewImage(this)">
        <label class="custom-file-label" for="customFile" id="customFileLabel">اختارالصورة</label>
    </div>
    <div class="mt-1" id="imagePreview">

        @if ($settings->logo)
            <img style="object-fit: cover" src="{{ asset("storage/$settings->logo") }}" width="60"
                height="60" alt="img">
        @endif
    </div>

    @error('logo')
        <div>
            <p class="text-danger">
                {{ $errors->first('logo') }}
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

{{-- content محتوي اسفل الصحة يمين --}}
<div class="form-group mt-3">
    <label for="floatingTextarea2">محتوي اسفل الصفحة يمين</label>
    <div class="form-floating">
        <textarea class="form-control" name="footer_content_right" id="floatingTextarea2"style="height: 100px">{{ $settings->footer_content_right }}</textarea>
    </div>

    @error('footer_content_right')
        <div>
            <p class="text-danger">
                {{ $errors->first('footer_content_right') }}
            </p>
        </div>
    @enderror
</div>

{{-- content محتوي اسفل الصفحة  يسار --}}
<div class="form-group">
    <label for="floatingTextarea2">محتوي اسفل الصفحة يسار</label>
    <div class="form-floating">
        <textarea class="form-control" name="footer_content_left" id="floatingTextarea2"style="height: 100px">{{ $settings->footer_content_left }}</textarea>
    </div>

    @error('footer_content_left ')
        <div>
            <p class="text-danger">
                {{ $errors->first('footer_content_left	') }}
            </p>
        </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary mt-3">Submit</button>
