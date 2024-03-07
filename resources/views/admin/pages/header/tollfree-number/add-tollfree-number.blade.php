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
                        <li class="breadcrumb-item active" aria-current="page"> TollFree Number
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ url('add-tollfree-number') }}" method="POST"
                                enctype="multipart/form-data" id="regForm">
                                @csrf
                                <div class="row">


                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_tollfree_no"> Toll Free Number</label>&nbsp<span
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
                                            <label for="marathi_tollfree_no">टोल फ्री क्रमांक </label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" name="marathi_tollfree_no" id="marathi_tollfree_no"
                                                class="form-control" placeholder="टोल फ्री क्रमांक प्रविष्ट करा "
                                                value="{{ old('marathi_tollfree_no') }}">
                                            @if ($errors->has('marathi_tollfree_no'))
                                                <span class="red-text"><?php echo $errors->first('marathi_tollfree_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success">Save &amp; Submit</button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger">Cancel</button> --}}
                                        <span><a href="{{ route('list-tollfree-number') }}"
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
