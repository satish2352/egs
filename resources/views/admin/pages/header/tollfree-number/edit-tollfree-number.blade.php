@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    TollFree Number
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-tollfree-number') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update TollFree Number

                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-tollfree-number') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_tollfree_no">Toll Free Number</label>&nbsp;<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_tollfree_no" id="english_tollfree_no"
                                                value="{{ $tollfree_no->english_tollfree_no }}" 
                                                class="form-control mb-2">
                                            @if ($errors->has('english_tollfree_no'))
                                                <span class="red-text"><?php echo $errors->first('english_tollfree_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_tollfree_no">टोल फ्री क्रमांक</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_tollfree_no" id="marathi_tollfree_no"
                                                value="{{ $tollfree_no->marathi_tollfree_no }}" 
                                                class="form-control mb-2" placeholder="">
                                            @if ($errors->has('marathi_tollfree_no'))
                                                <span class="red-text"><?php echo $errors->first('marathi_tollfree_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">
                                            Save &amp; Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-tollfree-number') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $tollfree_no->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    <script>
        function addvalidateMobileNumber(number) {
            var mobileNumberPattern = /^[0-9]*$/;
            var validationMessage = document.getElementById("english_tollfree_no");
    
            if (mobileNumberPattern.test(number)) {
                validationMessage.textContent = "";
            } else {
                validationMessage.textContent = "Invalid Toll Free Number. Please enter a valid Toll Free Number.";
            }
        }
    </script>
      <script>
        function addvalidateMobileNumber1(number) {
            var mobileNumberPattern =/^[0-9]*$/;
            var validationMessage = document.getElementById("marathi_tollfree_no");
    
            if (mobileNumberPattern.test(number)) {
                validationMessage.textContent = "";
            } else {
                validationMessage.textContent = "अवैध टोल फ्री क्रमांक. कृपया वैध टोल फ्री क्रमांक प्रविष्ट करा.";
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            // Custom validation method to check if the mobile number is valid based on the regex pattern
            $.validator.addMethod("valid_mobile_number", function(value, element) {
                var mobileNumberPattern = /^[0-9]*$/;
                return this.optional(element) || mobileNumberPattern.test(value);
            }, "Invalid Toll Free Number. Please enter a valid Toll Free Number.");

            $.validator.addMethod("valid_marathi_tollfree_no", function(value, element) {
                var mobileNumberPattern = /^[0-9]*$/;
                return this.optional(element) || mobileNumberPattern.test(value);
            }, "अवैध टोल फ्री क्रमांक. कृपया वैध टोल फ्री क्रमांक प्रविष्ट करा.");
    
            // Initialize the form validation
            var form = $("#regForm");
            var validator = form.validate({
                rules: {
                    english_tollfree_no: {
                        required: true,
                        valid_mobile_number: true, // Use the custom mobile number validation rule
                    },
                    marathi_tollfree_no: {
                        required: true,
                        valid_marathi_tollfree_no:true,
                    },
                },
                messages: {
                    english_tollfree_no: {
                        required: "Please Enter the Toll Free Number.",
                    },
                    marathi_tollfree_no: {
                        required: "कृपया टोल फ्री क्रमांक प्रविष्ट करा",
                    },
                },
            });
    
            // Submit the form when the "Update" button is clicked
            $("#submitButton").click(function() {
                // Validate the form
                if (form.valid()) {
                    form.submit();
                }
            });
        });
    </script>
    
{{-- 
        <script>
            $(document).ready(function() {
     // Function to check if all input fields are filled with valid data
     function checkFormValidity() {
         const marathi_tollfree_no = $('#marathi_tollfree_no').val();
 
         // Enable the submit button if all fields are valid
         if (marathi_tollfree_no) {
             $('#submitButton').prop('disabled', false);
         } else {
             $('#submitButton').prop('disabled', true);
         }
     }
 
     // Call the checkFormValidity function on input change
     $('input').on('input change',
         checkFormValidity);
 
     // Initialize the form validation
     $("#regForm").validate({
         rules: {
             marathi_tollfree_no: {
                 required: true,
             },
         },
         messages: {
             english_image: {
                 required: "Please Enter Toll Free Number Number",
             },
           
         },
         
     });
 });
         </script> --}}
    @endsection
