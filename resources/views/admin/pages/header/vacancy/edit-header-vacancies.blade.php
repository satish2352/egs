@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Vacancies
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-header-vacancies') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Vacancies</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('update-header-vacancies') }}" method="post"
                                id="regForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="english_title" id="english_title"
                                                placeholder="Enter the Title"
                                                value="@if (old('english_title')) {{ old('english_title') }}@else{{ $vacancy->english_title }} @endif">
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक</label>&nbsp<span class="red-text">*</span>
                                            <input class="form-control mb-2" name="marathi_title" id="marathi_title"
                                                placeholder="शीर्षक प्रविष्ट करा"
                                                value="@if (old('marathi_title')) {{ old('marathi_title') }}@else{{ $vacancy->marathi_title }} @endif">
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_pdf">PDF</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="english_pdf" id="english_pdf" accept=".pdf"
                                                class="form-control mb-2">
                                            @if ($errors->has('english_pdf'))
                                                <span class="red-text"><?php echo $errors->first('english_pdf', ':message'); ?></span>
                                            @endif
                                            <a
                                                href="{{ Config::get('DocumentConstant.VACANCIES_PDF_VIEW') }}{{ $vacancy->english_pdf }}"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_pdf">पीडीएफ</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="marathi_pdf" id="marathi_pdf" accept=".pdf"
                                                class="form-control mb-2">
                                            @if ($errors->has('marathi_pdf'))
                                                <span class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <a
                                            href="{{ Config::get('DocumentConstant.VACANCIES_PDF_VIEW') }}{{ $vacancy->marathi_pdf }}"></a>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success" id="submitButton">Save &amp;
                                            Update</button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-header-vacancies') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $vacancy->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var currentEnglishPdf = $("#currentEnglishPdf").val();
                var currentMarathiPdf = $("#currentMarathiPdf").val();

                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    const english_title = $('#english_title').val();
                    const marathi_title = $('#marathi_title').val();
                    const english_pdf = $('#english_pdf').val();
                    const marathi_pdf = $('#marathi_pdf').val();

                    // Update the old PDF values if there are any selected files
                    if (english_pdf !== currentEnglishPdf) {
                        $("#currentEnglishPdf").val(english_pdf);
                    }
                    if (marathi_pdf !== currentMarathiPdf) {
                        $("#currentMarathiPdf").val(marathi_pdf);
                    }
                }

                // Call the checkFormValidity function on file input change
                $('#english_pdf, #marathi_pdf').on('change', function() {
                    checkFormValidity();
                    validator.element(this); // Revalidate the file input
                });

                $.validator.addMethod("validPdf", function(value, element) {
                    // Check if a file is selected
                    if (element.files && element.files.length > 0) {
                        var extension = element.files[0].name.split('.').pop().toLowerCase();
                        // Check the file extension
                        return (extension === "pdf");
                    }
                    return true; // No file selected, so consider it valid
                }, "Only PDF files are allowed.");

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
                        english_pdf: {
                            // required: function() {
                            //     let currentEnglishImage = $("#currentEnglishImage").val();
                            //     if (currentEnglishImage != "") {

                            //         return true;
                            //     }
                            // },
                            validPdf: true,
                            fileSize: [10, 7168], // Min 10KB and Max 7MB (7 * 1024 KB)
                        },
                        marathi_pdf: {
                            // required: function() {
                            //     let currentMarathiImage = $("#currentMarathiImage").val();
                            //     if (currentMarathiImage != "") {

                            //         return true;
                            //     }
                            // },
                            validPdf: true,
                            fileSize: [10, 7168], // Min 10KB and Max 7MB (7 * 1024 KB)
                        },
                    },
                    messages: {
                        english_title: {
                            required: "Please Enter the Title",
                        },
                        marathi_title: {
                            required: "कृपया शीर्षक प्रविष्ट करा",
                        },
                        english_pdf: {
                            validPdf: "Only PDF files are allowed.",
                            fileSize: "The file size is too large. The maximum file size allowed is 7 MB.",
                        },
                        marathi_pdf: {
                            validPdf: "Only PDF files are allowed.",
                            fileSize: "The file size is too large. The maximum file size allowed is 7 MB.",
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

                // You can remove the following two blocks if you don't need to display selected PDFs on the page
                $("#english_pdf").change(function() {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Display the selected PDF for English
                        // You can remove this if you don't need to display the PDF on the page
                        $("#currentEnglishPdfDisplay").attr('src', e.target.result);
                        validator.element("#english_pdf"); // Revalidate the file input
                    };
                    reader.readAsDataURL(this.files[0]);
                });

                $("#marathi_pdf").change(function() {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Display the selected PDF for Marathi
                        // You can remove this if you don't need to display the PDF on the page
                        $("#currentMarathiPdfDisplay").attr('src', e.target.result);
                        validator.element("#marathi_pdf"); // Revalidate the file input
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>
    @endsection
