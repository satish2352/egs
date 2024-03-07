@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Disaster Forecast
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-disasterforcast') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Disaster Forecast</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-disasterforcast') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                   <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title <span
                                                    class="text-danger">*</span></label>
                                                    <input class="form-control mb-2" name="english_title" id="english_title" placeholder="Enter the Title">  
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">Title <span
                                                    class="text-danger">*</span></label>
                                                    <input class=" form-control mb-2" name="marathi_title" id="marathi_title" placeholder="शीर्षक प्रविष्ट करा">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control mb-2" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="english_description">{{ old('english_description') }}</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> वर्णन <span class="text-danger">*</span></label>
                                            <textarea class="form-control mb-2" name="marathi_description" id="marathi_description"
                                                placeholder="वर्णन प्रविष्ट करा">{{ old('marathi_description') }}</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success">Save &amp; Submit</button>
                                         {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button>  --}}
                                        <span><a href="{{ route('list-disasterforcast') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const english_title = $('#english_title').val();
                    const marathi_title = $('#marathi_title').val();
                    const english_description = $('#english_title').val();
                    const marathi_description = $('#marathi_description').val();

                    // Enable the submit button if all fields are valid
                    if (english_title && marathi_title && english_image && marathi_image && english_url &&
                        disaster_date) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input, #english_image, #marathi_image').on('input change',
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
                            accept: "image/png, image/jpeg, image/jpg",
                            filesize: {
                                min: {{ config('AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE') }},
                                max: {{ config('AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE') }},
                            },
                        },
                        marathi_image: {
                            required: true,
                            accept: "image/png, image/jpeg, image/jpg",
                            filesize: {
                                min: {{ config('AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE') }},
                                max: {{ config('AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE') }},
                            },
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
                            required: "Upload Media File",
                            accept: "Only png, jpeg, and jpg image files are allowed.", // Update the error message for the accept rule
                        },
                        marathi_image: {
                            required: "मीडिया फाइल अपलोड करा",
                            accept: "फक्त png, jpeg आणि jpg इमेज फाइल्सना परवानगी आहे.", // Update the error message for the accept rule
                        },
                        english_url: {
                            required: "Please Enter the URL",
                        },
                        disaster_date: {
                            required: "Please Select Disater Date",
                        },
                    },
                });
            });
        </script>
    @endsection
