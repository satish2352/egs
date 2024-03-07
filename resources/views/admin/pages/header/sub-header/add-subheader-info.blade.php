@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Sub Header info
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-sub-header-info') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Sub Header info</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-sub-header-info') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_tollfree_title">English Toll Free Title</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" name="english_tollfree_title" id="english_tollfree_title"
                                            class="form-control" placeholder="">
                                        @if ($errors->has('english_tollfree_title'))
                                        <span
                                            class="red-text"><?php //echo $errors->first('english_tollfree_title', ':message');
                                            ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="marathi_tollfree_title">Marathi Toll Free Title</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" name="marathi_tollfree_title" id="marathi_tollfree_title"
                                            class="form-control" placeholder="">
                                        @if ($errors->has('marathi_tollfree_title'))
                                        <span
                                            class="red-text"><?php //echo $errors->first('marathi_tollfree_title', ':message');
                                            ?></span>
                                        @endif
                                    </div>
                                </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_tollfree_no">Toll Free Number</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="english_tollfree_no" id="english_tollfree_no"
                                                class="form-control" placeholder="Enter toll free number"
                                                value="{{ old('english_tollfree_no') }}">
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
                                                class="form-control" placeholder="टोल फ्री क्रमांक प्रविष्ट करा "
                                                value="{{ old('marathi_tollfree_no') }}">
                                            @if ($errors->has('marathi_tollfree_no'))
                                                <span class="red-text"><?php echo $errors->first('marathi_tollfree_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="english_city_title">English City Title</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" name="english_city_title" id="english_city_title"
                                            class="form-control" placeholder="">
                                        @if ($errors->has('english_city_title'))
                                        <span
                                            class="red-text"><?php //echo $errors->first('english_city_title', ':message');
                                            ?></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="marathi_city_title">Marathi City Title</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" name="marathi_city_title" id="marathi_city_title"
                                            class="form-control" placeholder="">
                                        @if ($errors->has('marathi_city_title'))
                                        <span
                                            class="red-text"><?php //echo $errors->first('marathi_city_title', ':message');
                                            ?></span>
                                        @endif
                                    </div>
                                </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_city"> City Name</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="english_city" id="english_city" class="form-control"
                                                placeholder="Enter city name" value="{{ old('english_city') }}">
                                            @if ($errors->has('english_city'))
                                                <span class="red-text"><?php echo $errors->first('english_city', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_city">शहराचे नाव</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" name="marathi_city" id="marathi_city" class="form-control"
                                                placeholder="शहराचे नाव प्रविष्ट करा" value="{{ old('marathi_city') }}">
                                            @if ($errors->has('marathi_city'))
                                                <span class="red-text"><?php echo $errors->first('marathi_city', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="logo" id="logo" accept="image/*"><br>
                                            @if ($errors->has('logo'))
                                                <span class="red-text"><?php echo $errors->first('logo', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marathi_logo">Image Marathi</label>&nbsp<span class="red-text">*</span><br>
                                        <input type="file" name="marathi_logo" id="marathi_logo" accept="image/*"><br>
                                        @if ($errors->has('marathi_logo'))
                                        <span
                                            class="red-text"><?php //echo $errors->first('marathi_logo', ':message');
                                            ?></span>
                                        @endif
                                    </div>
                                </div> --}}
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success">Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-sub-header-info') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
