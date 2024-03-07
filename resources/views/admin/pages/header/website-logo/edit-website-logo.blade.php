@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Website Logo
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-website-logo') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Website Logo
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-website-logo') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="logo"> Logo</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="logo" class="" id="english_image"
                                                accept="image/*" placeholder="image">
                                            @if ($errors->has('logo'))
                                                <div class="red-text"><?php echo $errors->first('logo', ':message'); ?>
                                                </div>
                                            @endif
                                        </div>
                                        <img id="english"
                                            src="{{ Config::get('DocumentConstant.WEBSITE_LOGO_VIEW') }}{{ $website_logo->logo }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-website-logo') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $website_logo->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var currentEnglishImage = $("#currentEnglishImage").val();
        
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                   
                    const english_image = $('#english_image').val();
                 
        
                    // Update the old PDF values if there are any selected files
                    if (english_image !== currentEnglishImage) {
                        $("#currentEnglishImage").val(english_image);
                    }
                   
                }
        
                // Call the checkFormValidity function on file input change
                $('input, #english_image').on('change', function() {
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
                        english_image: {
                            validImage: true,
                            fileSize: [180, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
                        },
                    },
                    messages: {
                        english_image: {
                    validImage: "Only JPG, JPEG, PNG images are allowed.",
                    fileSize: "The file size must be between 180 KB and 2048 KB.",
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
            });
        </script>    
        {{-- <script>
            $(document).ready(function() {
                var currentEnglishImage = $("#currentEnglishImage").val();
        
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const english_image = $('#english_image').val();
        
                    // Update the old PDF values if there are any selected files
                    if (english_image !== currentEnglishImage) {
                        $("#currentEnglishImage").val(english_image);
                    }
                }
        
                // Call the checkFormValidity function on file input change
                $('input, #english_image').on('change', function() {
                    checkFormValidity();
                    validator.element(this); // Revalidate the file input
                });
        
                $.validator.addMethod("validImage", function(value, element) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        var extension = element.files[0].name.split('.').pop().toLowerCase();
                        // Check the file extension
                        return (extension === "jpg" || extension === "jpeg" || extension === "png");
                    }
                    return true; // No file selected, so consider it valid
                }, "Only JPG, JPEG, PNG images are allowed.");
        
                $.validator.addMethod("filesize", function(value, element, param) {
                    if (element.files && element.files.length > 0) {
                        var fileSize = element.files[0].size; // Size in bytes
                        return fileSize <= param * 1024 * 1024; // param is in MB, so converting it to bytes
                    }
                    return true; // No file selected, so consider it valid
                }, "The file size is too large. The maximum file size allowed is {0} MB.");
        
                // Initialize the form validation
                var form = $("#regForm");
                var validator = form.validate({
                    rules: {
                        english_image: {
                            validImage: true,
                            filesize: 7, // 7 MB (you can adjust this value as needed)
                        },
                    },
                    messages: {
                        english_image: {
                            validImage: "Only png, jpeg, and jpg image files are allowed.",
                            filesize: "The file size is too large. The maximum file size allowed is 7 MB.",
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
            });
        </script> --}}
        
    @endsection
