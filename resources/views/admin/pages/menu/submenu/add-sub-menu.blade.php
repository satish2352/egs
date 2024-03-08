@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Sub Main Menu
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-sub-menu') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Sub Menu</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action='{{ route('add-sub-menu') }}' method="post" id="regForm">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="menu_name_english">Main Menu</label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="main_menu_id" name="main_menu_id">
                                                <option selected>Select</option>
                                                @foreach ($main_menu_data as $data)
                                                    @if (old('main_menu_id') == $data['id'])
                                                        <option value="{{ $data['id'] }}" selected>
                                                            {{ $data['menu_name_english'] }}</option>
                                                    @else
                                                        <option value="{{ $data['id'] }}">{{ $data['menu_name_marathi'] }}
                                                            ({{ $data['menu_name_english'] }})
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="menu_name_english">Sub Menu Name</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="menu_name_english" id="menu_name_english"
                                                class="form-control mb-2" id="exampleInputUsername1"
                                                placeholder="Enter sub menu name" value="{{ old('menu_name_english') }}">
                                            @if ($errors->has('menu_name_english'))
                                                <span class="red-text"><?php echo $errors->first('menu_name_english', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="menu_name_marathi">उप मेनू नाव</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="menu_name_marathi" id="menu_name_marathi"
                                                class="form-control mb-2" id="exampleInputUsername1"
                                                placeholder="उप मेनू नाव प्रविष्ट करा"
                                                value="{{ old('menu_name_marathi') }}">
                                            @if ($errors->has('menu_name_marathi'))
                                                <span class="red-text"><?php echo $errors->first('menu_name_marathi', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                       <button type="submit" class="btn btn-sm btn-success" id="submitButton" disabled>
                                            Save &amp; Submit
                                        </button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-sub-menu') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function submitRegister() {
                document.getElementById("frm_register").submit();
            }
        </script>
        <script>
            $(document).ready(function() {
                // Function to check if all input fields are filled with valid data
                function checkFormValidity() {
                    
                    const main_menu_id = $('#main_menu_id').val();
                    const menu_name_english = $('#menu_name_english').val();
                    const menu_name_marathi = $('#menu_name_marathi').val();

                    // Enable the submit button if all fields are valid
                    if (main_menu_id && menu_name_english && menu_name_marathi) {
                        $('#submitButton').prop('disabled', false);
                    } else {
                        $('#submitButton').prop('disabled', true);
                    }
                }

                // Call the checkFormValidity function on input change
                $('input, select').on('input change', checkFormValidity);

                // Initialize the form validation
                $("#regForm").validate({
                    rules: {
                        main_menu_id: {
                            required: true,
                        },
                        menu_name_english: {
                            required: true,
                        },
                        menu_name_marathi: {
                            required: true,
                        },
                    },
                    messages: {
                        main_menu_id :{
                            required: "Please Select Menu",
                        },
                        menu_name_english: {
                            required: "Please Enter the Sub Menu Name",
                        },
                        menu_name_marathi: {
                            required: "कृपया उप मेनू नाव प्रविष्ट करा",
                        },
                    },
                });
            });
        </script>
    @endsection
