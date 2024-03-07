@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Disaster Management News
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-disaster-management-news') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Disaster Management News
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-disaster-management-news') }}"
                                method="post" id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="english_title" id="english_title"
                                                class="form-control mb-2" id="english_title" placeholder="Enter the Title"
                                                value="@if (old('english_title')) {{ old('english_title') }}@else{{ $disaster_news->english_title }} @endif">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>

                                            <input type="text" name="marathi_title" id="marathi_title"
                                                class="form-control mb-2" id="marathi_title" placeholder="Enter the Title"
                                                value="@if (old('marathi_title')) {{ old('marathi_title') }}@else{{ $disaster_news->marathi_title }} @endif">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description </label>&nbsp<span
                                                class="red-text">*</span>
                                            <textarea class="form-control mb-2 english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description">
@if (old('english_description'))
{{ old('english_description') }}@else{{ $disaster_news->english_description }}
@endif
</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> वर्णन </label>&nbsp<span class="red-text">*</span>
                                            <textarea class="form-control mb-2 marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="Enter the Description">
                                                @if (old('marathi_description'))
{{ old('marathi_description') }}@else{{ $disaster_news->marathi_description }}
@endif
                                            </textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image"> Image</label>
                                            <input type="file" name="english_image" class="form-control mb-2"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>

                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $disaster_news->english_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image"> छायाचित्र</label>
                                            <input type="file" name="marathi_image" id="marathi_image" accept="image/*"
                                                class="form-control mb-2">
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi"
                                            src="{{ Config::get('DocumentConstant.DISASTER_NEWS_VIEW') }}{{ $disaster_news->marathi_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label for="english_url">URL</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="english_url" id="english_url"
                                                class="form-control mb-2"
                                                value="@if (old('english_url')) {{ old('english_url') }}@else{{ $disaster_news->english_url }} @endif"
                                                placeholder="">
                                            @if ($errors->has('english_url'))
                                                <span class="red-text"><?php echo $errors->first('english_url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Disaster Date</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="date" class="form-control mb-2" placeholder="YYYY-MM-DD"
                                                name="disaster_date" id="disaster_date"
                                                value="{{ old('disaster_date') ?: $disaster_news->disaster_date }}">
                                            @if ($errors->has('disaster_date'))
                                                <span class="red-text"><?php echo $errors->first('disaster_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Disaster Date</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                name="disaster_date" id="disaster_date"
                                                value="@if (old('disaster_date')) {{ old('disaster_date') }}@else{{ $disaster_news->disaster_date }} @endif"
                                                >
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-disaster-management-news') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $disaster_news->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var currentEnglishImage = $("#currentEnglishImage").val();
                var currentMarathiImage = $("#currentMarathiImage").val();

                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const english_title = $('#english_title').val();
                    const marathi_title = $('#marathi_title').val();
                    const english_description = $('#english_description').val();
                    const marathi_description = $('#marathi_description').val();
                    const english_image = $('#english_image').val();
                    const marathi_image = $('#marathi_image').val();
                    const english_url = $('#english_url').val();
                    const disaster_date = $('#disaster_date').val();

                    // Update the old PDF values if there are any selected files
                    if (english_image !== currentEnglishImage) {
                        $("#currentEnglishImage").val(english_image);
                    }
                    if (marathi_image !== currentMarathiImage) {
                        $("#currentMarathiImage").val(marathi_image);
                    }
                }

                // Call the checkFormValidity function on file input change
                $('input, select, textarea, #english_image, #marathi_image').on('change', function() {
                    checkFormValidity();
                    validator.element(this); // Revalidate the file input
                });

                $.validator.addMethod("validImage", function(value, element) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        var extension = element.files[0].name.split('.').pop().toLowerCase();
                        // Check the file extension
                        return (extension == "jpg" || extension == "jpeg" || extension == "png");
                    }
                    return true; // No file selected, so consider it valid
                }, "Only JPG, JPEG, PNG images are allowed.");

                $.validator.addMethod("fileSize", function(value, element, param) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        // Convert bytes to KB
                        const fileSizeKB = element.files[0].size / 1024;
                        return fileSizeKB >= param[0] && fileSizeKB <= param[1];
                    }
                    return true; // No file selected, so consider it valid
                }, "File size must be between {0} KB and {1} KB.");

                // Initialize the form validation
                var form = $("#regForm");
                var validator = form.validate({
                    rules: {
                        english_title: {
                            required: true,
                        },
                        marathi_title: {
                            required: true,
                        },
                        english_description: {
                            required: true,
                        },
                        marathi_description: {
                            required: true,
                        },
                        english_image: {
                            validImage: true,
                            fileSize: [180, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
                        },
                        marathi_image: {
                            validImage: true,
                            fileSize: [180, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
                        },
                        english_url: {
                            required: true,
                        },
                        disaster_date: {
                            required: true,
                        },
                    },
                    messages: {
                        english_title: {
                            required: "Please Enter the Title",
                        },
                        marathi_title: {
                            required: "कृपया शीर्षक प्रविष्ट करा",
                        },
                        english_description: {
                            required: "Please Enter the Description",
                        },
                        marathi_description: {
                            required: "कृपया वर्णन प्रविष्ट करा",
                        },
                        english_image: {
                            validImage: "Only JPG, JPEG, PNG images are allowed.",
                            fileSize: "The file size must be between 180 KB and 2048 KB.",
                        },
                        marathi_image: {
                            validImage: "फक्त JPG, JPEG, PNG छायाचित्रंना परवानगी आहे.",
                            fileSize: "फाईलचा आकार 180 KB and 2048 KB दरम्यान असणे आवश्यक आहे.",
                        },
                        english_url: {
                            required: "Please Enter the URL",
                        },
                        disaster_date: {
                            required: "Please Select Disater Date",
                        },
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });

                // Submit the form when the "Update" button is clicked
                $("#submitButton").click(function() {
                    // Validate the form
                    if (form.valid()) {
                        form.submit();
                    }
                });

                // You can remove the following two blocks if you don't need to display selected images on the page
                $("#english_image").change(function() {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Display the selected image for English
                        // You can remove this if you don't need to display the image on the page
                        $("#currentEnglishImageDisplay").attr('src', e.target.result);
                        validator.element("#english_image"); // Revalidate the file input
                    };
                    reader.readAsDataURL(this.files[0]);
                });

                $("#marathi_image").change(function() {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Display the selected image for Marathi
                        // You can remove this if you don't need to display the image on the page
                        $("#currentMarathiImageDisplay").attr('src', e.target.result);
                        validator.element("#marathi_image"); // Revalidate the file input
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>
    @endsection
