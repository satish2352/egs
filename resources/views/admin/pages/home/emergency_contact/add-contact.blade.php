@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Emergency Contact
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-emergency-contact') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Emergency Contact </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-emergency-contact') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="english_title" id="english_title"
                                                placeholder="Enter the Title" value="{{ old('english_title') }}">
                                            {{-- <textarea class="form-control english_title" name="english_title" id="english_title" placeholder="Enter the Title">{{ old('english_title') }}</textarea> --}}
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="myInput" class="form-control-label">शीर्षक</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input class=" form-control mb-2" name="marathi_title" id="myInput"
                                                placeholder="शीर्षक प्रविष्ट करा" value="{{ old('marathi_title') }}">
                                            {{-- <textarea class="form-control marathi_title" name="marathi_title" id="marathi_title" placeholder="Enter the Title">{{ old('marathi_title') }}</textarea> --}}
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_name">Name</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="text" name="english_name" id="english_name"
                                                class="form-control mb-2" placeholder="Enter the Name"
                                                value="{{ old('english_name') }}">
                                            @if ($errors->has('english_name'))
                                                <span class="red-text"><?php echo $errors->first('english_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_name">नाव</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="text" name="marathi_name" id="marathi_name"
                                                class="form-control mb-2" placeholder="नाव प्रविष्ट करा"
                                                value="{{ old('marathi_name') }}">
                                            @if ($errors->has('marathi_name'))
                                                <span class="red-text"><?php echo $errors->first('marathi_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_address">Address</label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="text" name="english_address" id="english_address"
                                                class="form-control mb-2" placeholder="Enter the Address"
                                                value="{{ old('english_address') }}">
                                            @if ($errors->has('english_address'))
                                                <span class="red-text"><?php echo $errors->first('english_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_address">पत्ता</label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="text" name="marathi_address" id="marathi_address"
                                                class="form-control mb-2" placeholder="पत्ता प्रविष्ट करा"
                                                value="{{ old('marathi_address') }}">
                                            @if ($errors->has('marathi_address'))
                                                <span class="red-text"><?php echo $errors->first('marathi_address', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_number">Mobile Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_number" id="english_number"
                                                class="form-control mb-2" value="{{ old('english_number') }}"
                                                placeholder="">
                                            @if ($errors->has('english_number'))
                                                <span class="red-text"><?php echo $errors->first('english_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_number">मोबाईल नंबर</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_number" id="marathi_number"
                                                class="form-control mb-2" value="{{ old('marathi_number') }}"
                                                placeholder="मोबाईल नंबर टाका">
                                            @if ($errors->has('marathi_number'))
                                                <span class="red-text"><?php echo $errors->first('marathi_number', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_landline_no">Landline Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_landline_no" id="english_landline_no"
                                                class="form-control mb-2" onkeyup="addvalidateMobileNumber(this.value)"
                                                value="{{ old('english_landline_no') }}" placeholder="">
                                            @if ($errors->has('english_landline_no'))
                                                <span class="red-text"><?php echo $errors->first('english_landline_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_landline_no">दूरध्वनी क्रमांक</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_landline_no" id="marathi_landline_no"
                                                onkeyup="addvalidateMobileNumber1(this.value)" class="form-control mb-2"
                                                value="{{ old('marathi_landline_no') }}" placeholder="">
                                            @if ($errors->has('marathi_landline_no'))
                                                <span class="red-text"><?php echo $errors->first('marathi_landline_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_landline_no">Landline Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="number" name="english_landline_no" id="english_landline_no"
                                                class="form-control mb-2" id="english_landline_no"
                                                placeholder="Enter the Landline Number"
                                                value="{{ old('english_landline_no') }}">
                                            @if ($errors->has('english_landline_no'))
                                                <span class="red-text"><?php //echo $errors->first('english_landline_no', ':message');
                                                ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_landline_no">दूरध्वनी क्रमांक</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="number" name="marathi_landline_no" id="marathi_landline_no"
                                                class="form-control mb-2" id="marathi_landline_no"
                                                placeholder="लँडलाइन क्रमांक प्रविष्ट करा"
                                                value="{{ old('marathi_landline_no') }}">
                                            @if ($errors->has('marathi_landline_no'))
                                                <span class="red-text"><?php //echo $errors->first('marathi_landline_no', ':message');
                                                ?></span>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="email" id="email"
                                                class="form-control mb-2" id="email" placeholder="Enter the Email"
                                                value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="red-text"><?php echo $errors->first('email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-emergency-contact') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script>
            function addvalidateMobileNumber(number) {
                var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                var validationMessage = document.getElementById("english_landline_no");

                if (mobileNumberPattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "Invalid landline number. Please enter a valid landline number.";
                }
            }
        </script>
        <script>
            function addvalidateMobileNumber1(number) {
                var mobileNumberPattern = /^[+]?[0-9-()\/\s]{7,25}$/;
                var validationMessage = document.getElementById("marathi_landline_no");

                if (mobileNumberPattern.test(number)) {
                    validationMessage.textContent = "";
                } else {
                    validationMessage.textContent = "अवैध लँडलाइन नंबर. कृपया वैध लँडलाइन नंबर प्रविष्ट करा..";
                }
            }
        </script> --}}

        <script>
            $(document).ready(function() {
                function checkFormValidity() {
                    const english_number = $('#english_number').val();
                    const marathi_number = $('#marathi_number').val();
                    const english_landline_no = $('#english_landline_no').val();
                    const marathi_landline_no = $('#marathi_landline_no').val();

                    // Validate the contact number
                    const isValidContactNumber = english_number.length >= 3 &&
                        english_number.length <= 11;
                    const isMarathiContactNumberValid = marathi_number.length >= 3 &&
                        marathi_number.length <= 11;
                    const isValidContactNumber1 = english_landline_no.length >= 3 &&
                        english_landline_no.length <= 25;
                    const isMarathiContactNumberValid1 = marathi_landline_no.length >= 3 &&
                        marathi_landline_no.length <= 25;

                    // Validate landline numbers using regex
                    const regex = /[^A-Za-z]/g;
                    const isValidEnglishLandlineNumber = regex.test(english_landline_no);
                    const isValidMarathiLandlineNumber = regex.test(marathi_landline_no);

                }

                function validateLandlineNumber(value) {
  return regex.test(value);
}

$("#english_landline_no").on("input change", function () {
  if (!validateLandlineNumber(this.value)) {
    this.setCustomValidity("Landline number can only contain digits and hyphens");
  } else {
    this.setCustomValidity("");
  }
});
function validateLandlineNumber(value) {
  return regex.test(value);
}

$("#marathi_landline_no").on("input change", function () {
  if (!validateLandlineNumber(this.value)) {
    this.setCustomValidity("Landline number can only contain digits and hyphens");
  } else {
    this.setCustomValidity("");
  }
});

                // Call the checkFormValidity function on input change
                $('input').on('input change', checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        english_title: {
                            required: true,
                            spcenotallow: true,
                        },
                        marathi_title: {
                            required: true,
                            spcenotallow: true,
                        },
                        english_name: {
                            required: true,
                            spcenotallow: true,
                        },
                        marathi_name: {
                            required: true,
                            spcenotallow: true,
                        },
                        english_address: {
                            required: true,
                            spcenotallow: true,
                        },
                        marathi_address: {
                            required: true,
                            spcenotallow: true,
                        },
                        english_number: {
                            required: true,
                            number: true,
                            minlength: 3,
                            maxlength: 11,
                            spcenotallow: true,
                        },
                        marathi_number: {
                            required: true,
                            minlength: 3,
                            maxlength: 25,
                            spcenotallow: true,
                        },
                        english_landline_no: {
                            required: true,
                            minlength: 3,
                            maxlength: 25,
                            spcenotallow: true,
                        },
                        marathi_landline_no: {
                            required: true,
                            minlength: 3,
                            maxlength: 25,
                            spcenotallow: true,
                        },
                        email: {
                            required: true,
                            email: true,
                            nospace: true, // Add custom nospace rule
                        },
                    },
                    messages: {
                        english_title: {
                            required: "Please Enter the Title",
                        },
                        marathi_title: {
                            required: "कृपया शीर्षक प्रविष्ट करा",
                        },
                        english_name: {
                            required: "Please Enter the Name",
                        },
                        marathi_name: {
                            required: "कृपया नाव प्रविष्ट करा",
                        },
                        english_address: {
                            required: "Please Enter the Address",
                            spcenotallow: "Enter Some Text",
                        },
                        marathi_address: {
                            required: "कृपया पत्ता प्रविष्ट करा",
                            spcenotallow: "Enter Some Text",
                        },
                        english_number: {
                            required: "Please Enter the Number",
                            number: "Please Enter a valid number",
                            minlength: "The number must be at least 3 digits long",
                            maxlength: "The number must be no more than 11 digits long",
                            spcenotallow: "Enter Some Number",
                        },
                        marathi_number: {
                            required: "Please Enter the Number",
                            number: "Please Enter a valid number",
                            minlength: "The number must be at least 3 digits long",
                            maxlength: "The number must be no more than 11 digits long",
                            spcenotallow: "Enter Some Number",
                        },
                        english_landline_no: {
                            required: "Please Enter the Number",
                            minlength: "The number must be at least 3 digits long",
                            maxlength: "The number must be no more than 25 digits long",
                            spcenotallow: "Enter Some Number",
                        },
                        marathi_landline_no: {
                            required: "Please Enter the Number",
                            minlength: "The number must be at least 3 digits long",
                            maxlength: "The number must be no more than 25 digits long",
                            spcenotallow: "Enter Some Number",
                        },
                        email: {
                            required: "Please Enter the Email",
                            email: "Enter a valid email address",
                            nospace: "Enter Some Email",
                        },
                    },
                });

                $.validator.addMethod("spcenotallow", function(value, element) {
                    if (element.nodeName.toLowerCase() === "select") {
                        var val = $(element).val();
                        return val && val.length > 0;
                    }
                    return this.checkable(element) ? this.getLength(value, element) > 0 : value.trim().length >
                        0;
                }, "Enter Some Text");

                // Add custom validation method for nospace rule
                $.validator.addMethod("nospace", function(value, element) {
                    return value.indexOf(" ") === -1; // Return true if no space found
                }, "Email address cannot contain spaces");


            });
        </script>




        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {

                    const english_title = $('#english_title').val();
                    const marathi_title = $('#marathi_title').val();
                    const english_name = $('#english_name').val();
                    const marathi_name = $('#marathi_name').val();
                    const english_address = $('#english_address').val();
                    const marathi_address = $('#marathi_address').val();
                    const english_number = $('#english_number').val();
                    const marathi_number = $('#marathi_number').val();
                    const english_landline_no = $('#english_landline_no').val();
                    const marathi_landline_no = $('#marathi_landline_no').val();
                    const email = $('#email').val();

                    // Validate the contact number
                    const isValidContactNumber = english_number.length >= 3 &&
                        english_number.length <= 11;
                    const isMarathiContactNumberValid = marathi_number.length >= 3 &&
                        marathi_number.length <= 11;
                    const isValidContactNumber1 = english_landline_no.length >= 3 &&
                        english_landline_no.length <= 25;
                    const isMarathiContactNumberValid1 = marathi_landline_no.length >= 3 &&
                        marathi_landline_no.length <= 25;


                    // Validate landline numbers using regex
                    const regex = /[^A-Za-z]/g;
                    const isValidEnglishLandlineNumber = regex.test(english_landline_no);
                    const isValidMarathiLandlineNumber = regex.test(marathi_landline_no);

                    // Check if the form should be disabled
                    // const shouldDisableSubmit = !(
                    //     isValidContactNumber &&
                    //     isMarathiContactNumberValid &&
                    //     isValidContactNumber1 &&
                    //     isMarathiContactNumberValid1 &&
                    //     isValidEnglishLandlineNumber &&
                    //     isValidMarathiLandlineNumber
                    // );
                    // // Do not disable the submit button
                    // $('#submitButton').prop('disabled', false);


                }

                // Call the checkFormValidity function on input change
                $('input').on('input change', checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        english_title: {
                            required: true,
                        },
                        marathi_title: {
                            required: true,
                        },
                        english_name: {
                            required: true,
                        },
                        marathi_name: {
                            required: true,
                        },
                        english_address: {
                            required: true,
                        },
                        marathi_address: {
                            required: true,
                        },
                        english_number: {
                            required: true,
                            number: true,
                            minlength: 3,
                            maxlength: 11,
                        },
                        marathi_number: {
                            required: true,
                            number: true,
                            minlength: 3,
                            maxlength: 11,
                        },
                        english_landline_no: {
                            required: true,
                            minlength: 3,
                            maxlength: 25,
                        },
                        marathi_landline_no: {
                            required: true,
                            minlength: 3,
                            maxlength: 25,
                        },
                        email: {
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
                        english_name: {
                            required: "Please Enter the Name",
                        },
                        marathi_name: {
                            required: "कृपया नाव प्रविष्ट करा",
                        },
                        english_address: {
                            required: "Please Enter the Address",
                        },
                        marathi_address: {
                            required: "कृपया पत्ता प्रविष्ट करा",
                        },
                        english_number: {
                            required: "Please Enter the Number",
                            number: "Please Enter a valid number",
                            minlength: "The number must be at least 3 digits long",
                            maxlength: "The number must be no more than 11 digits long",
                        },
                        marathi_number: {
                            required: "Please Enter the Number",
                            number: "Please Enter a valid number",
                            minlength: "The number must be at least 3 digits long",
                            maxlength: "The number must be no more than 11 digits long",
                        },

                        english_landline_no: {
                            required: "Please Enter the Number",
                            minlength: "The number must be at least 3 digits long",
                            maxlength: "The number must be no more than 25 digits long",
                        },
                        marathi_landline_no: {
                            required: "Please Enter the Number",
                            minlength: "The number must be at least 3 digits long",
                            maxlength: "The number must be no more than 25 digits long",
                        },
                        email: {
                            required: "Please Enter the Email",
                        },
                    },
                });
            });
        </script>
    @endsection
