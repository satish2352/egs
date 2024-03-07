@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Department Information
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-department-information') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Department Information
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-department-information') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="english_title" id="english_title"
                                                placeholder="Enter the Title"
                                                value="@if (old('english_title')) {{ old('english_title') }}@else{{ $department_info->english_title }} @endif">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="marathi_title" id="marathi_title"
                                                placeholder="Enter the Title"
                                                value="@if (old('marathi_title')) {{ old('marathi_title') }}@else{{ $department_info->marathi_title }} @endif">
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
{{ old('english_description') }}@else{{ $department_info->english_description }}
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
{{ old('marathi_description') }}@else{{ $department_info->marathi_description }}
@endif
</textarea>
                                            @if ($errors->has('marathi_description'))
                                                <span class="red-text"><?php echo $errors->first('marathi_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image"> Icon</label><br>
                                            <input type="file" name="english_image"
                                                id="english_image" accept="image/*" placeholder="image" class="form-control mb-2">
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>

                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_VIEW') }}{{ $department_info->english_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image"> चिन्ह</label><br>
                                            <input type="file" name="marathi_image" id="marathi_image" accept="image/*" class="form-control mb-2">
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi"
                                            src="{{ Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_VIEW') }}{{ $department_info->marathi_image }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label for="english_image_new">Image </label>
                                            <input type="file" name="english_image_new" class="form-control mb-2"
                                                id="english_image_new" accept="image/*" placeholder="image">
                                            @if ($errors->has('english_image_new'))
                                                <span class="red-text"><?php echo $errors->first('english_image_new', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="english1"
                                            src="{{ Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_VIEW') }}{{ $department_info->english_image_new }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview1" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label for="marathi_image_new">छायाचित्र</label>
                                            <input type="file" name="marathi_image_new" id="marathi_image_new"
                                                accept="image/*" class="form-control mb-2">
                                            @if ($errors->has('marathi_image_new'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image_new', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi1"
                                            src="{{ Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_VIEW') }}{{ $department_info->marathi_image_new }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview1" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label for="url"> URL</label>
                                            <input type="text" name="url" id="url" class="form-control mb-2"
                                                value="{{ $department_info->url }}" placeholder="">
                                            @if ($errors->has('url'))
                                                <span class="red-text"><?php echo $errors->first('url', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                      
                                        {{-- <button type="submit" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-department-information') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $department_info->id }}" placeholder="">
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
                var currentEnglishNewImage = $('#currentEnglishNewImage').val();
                var currentMarathiNewImage = $('#currentMarathiNewImage').val();
        
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const english_title = $('#english_title').val();
                    const marathi_title = $('#marathi_title').val();
                    const english_description = $('#english_description').val();
                    const marathi_description = $('#marathi_description').val();
                    const english_image = $('#english_image').val();
                    const marathi_image = $('#marathi_image').val();
                    const english_image_new = $('#english_image_new').val();
                    const marathi_image_new = $('#marathi_image_new').val();
        
                    // Update the old PDF values if there are any selected files
                    if (english_image !== currentEnglishImage) {
                        $("#currentEnglishImage").val(english_image);
                    }
                    if (marathi_image !== currentMarathiImage) {
                        $("#currentMarathiImage").val(marathi_image);
                    }
                     if (english_image_new !== currentEnglishNewImage) {
                        $("#currentEnglishNewImage").val(english_image_new);
                    }
                    if (marathi_image_new !== currentMarathiNewImage) {
                        $("#currentMarathiNewImage").val(marathi_image_new);
                    }
                }
        
                // Call the checkFormValidity function on file input change
                $('input, #english_image, #marathi_image, #english_image_new, #marathi_image_new').on('change', function() {
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
                            fileSize: [10, 22], // Min 10KB and Max 2MB (2 * 1024 KB)
                        },
                        marathi_image: {
                            validImage: true,
                            fileSize: [10, 22], // Min 10KB and Max 2MB (2 * 1024 KB)
                        },
                         english_image_new: {
                            validImage: true,
                            fileSize: [100, 300], // Min 10KB and Max 2MB (2 * 1024 KB)
                        },
                        marathi_image_new: {
                            validImage: true,
                            fileSize: [100, 300], // Min 10KB and Max 2MB (2 * 1024 KB)
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
                 english_image_new: {
                            required: "Please upload an Image (JPG, JPEG, PNG).",
                            fileExtension: "Only JPG, JPEG, and PNG images are allowed.",
                            fileSize: "File size must be between 100 KB and 300KB.",
                        },
                        marathi_image_new: {
                            required: "कृपया छायाचित्र अपलोड करा (JPG, JPEG, PNG).",
                            fileExtension: "फक्त JPG, JPEG, आणि PNG छायाचित्रंना परवानगी आहे.",
                            fileSize: "फाइल साईज 100 KB आणि 300 दरम्यान असणे आवश्यक आहे.",
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
                $("#english_image_new").change(function() {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Display the selected image for English
                        // You can remove this if you don't need to display the image on the page
                        $("#currentEnglishImageNewDisplay").attr('src', e.target.result);
                        validator.element("#english_image_new"); // Revalidate the file input
                    };
                    reader.readAsDataURL(this.files[0]);
                });
        
                $("#marathi_image_new").change(function() {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Display the selected image for Marathi
                        // You can remove this if you don't need to display the image on the page
                        $("#currentMarathiImageNewDisplay").attr('src', e.target.result);
                        validator.element("#marathi_image_new"); // Revalidate the file input
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>             





        {{-- <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const english_title = $('#english_title').val();
                    const marathi_title = $('#marathi_title').val();
                    const english_description = $('#english_title').val();
                    const marathi_description = $('#marathi_description').val();
                    const english_image = $('#english_image').val();
                    const marathi_image = $('#marathi_image').val();
                    const english_image_new = $('#english_image_new').val();
                    const marathi_image_new = $('#marathi_image_new').val();


                    // Enable the submit button if all fields are valid
                    if (english_title && marathi_title && english_image && marathi_image && english_image_new &&
                        marathi_image_new) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input, #english_image, #marathi_image, #english_image_new, #english_image_new').on('input change',
                    checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
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
                            required: true,
                            accept: "image/png, image/jpeg, image/jpg", // Update to accept only png, jpeg, and jpg images
                            // filesize: {
                            //     min: <?= config('all_file_validation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE') ?>,
                            //     max: <?= config('all_file_validation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE') ?>,
                            // },
                        },
                        marathi_image: {
                            required: true,
                            accept: "image/png, image/jpeg, image/jpg", // Update to accept only png, jpeg, and jpg images
                            // filesize: {
                            //     min: <?= config('all_file_validation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE') ?>,
                            //     max: <?= config('all_file_validation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE') ?>,
                            // },
                        },
                        english_image_new: {
                            required: true,
                            accept: "image/png, image/jpeg, image/jpg", // Update to accept only png, jpeg, and jpg images
                            // filesize: {
                            //     min: <?= config('all_file_validation.DEPARTMENT_INFORMATION_NEW_IMAGE_MIN_SIZE') ?>,
                            //     max: <?= config('all_file_validation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE') ?>,
                            // },
                        },
                        marathi_image_new: {
                            required: true,
                            accept: "image/png, image/jpeg, image/jpg", // Update to accept only png, jpeg, and jpg images
                            // filesize: {
                            //     min: <?= config('all_file_validation.DEPARTMENT_INFORMATION_NEW_IMAGE_MIN_SIZE') ?>,
                            //     max: <?= config('all_file_validation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE') ?>,
                            // },
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
                            required: "Upload Media File",
                            accept: "Only png, jpeg, and jpg image files are allowed.", // Update the error message for the accept rule
                        },
                        marathi_image: {
                            required: "मीडिया फाइल अपलोड करा",
                            accept: "फक्त png, jpeg आणि jpg इमेज फाइल्सना परवानगी आहे.", // Update the error message for the accept rule
                        },
                        english_image_new: {
                            required: "Upload Media File",
                            accept: "Only png, jpeg, and jpg image files are allowed.", // Update the error message for the accept rule
                        },
                        marathi_image_new: {
                            required: "मीडिया फाइल अपलोड करा",
                            accept: "फक्त png, jpeg आणि jpg इमेज फाइल्सना परवानगी आहे.", // Update the error message for the accept rule
                        },
                    },
                });
            });
        </script> --}}
    @endsection
