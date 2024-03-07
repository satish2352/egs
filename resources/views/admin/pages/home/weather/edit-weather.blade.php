@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    Weather
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-weather') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Update Weather</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action='{{ route('update-weather') }}' method="post" id="regForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_title">Title <span class="text-danger">*</span></label>
                                            <textarea class="form-control english_title" name="english_title" id="english_title" placeholder="Enter the Title"
                                                name="english_title">
@if (old('english_title'))
{{ old('english_title') }}@else{{ $weather->english_title }}
@endif
</textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_title">शीर्षक <span class="text-danger">*</span></label>
                                            <textarea class="form-control marathi_title" name="marathi_title" id="marathi_title" placeholder="Enter the Title"
                                                name="marathi_title">
@if (old('marathi_title'))
{{ old('marathi_title') }}@else{{ $weather->marathi_title }}
@endif
</textarea>
                                            @if ($errors->has('marathi_title'))
                                                <span class="red-text"><?php echo $errors->first('marathi_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="english_description">Description <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control english_description" name="english_description" id="english_description"
                                                placeholder="Enter the Description" name="english_description">
@if (old('english_description'))
{{ old('english_description') }}@else{{ $weather->english_description }}
@endif
</textarea>
                                            @if ($errors->has('english_title'))
                                                <span class="red-text"><?php echo $errors->first('english_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>वर्णन <span class="text-danger">*</span></label>
                                            <textarea class="form-control marathi_description" name="marathi_description" id="marathi_description"
                                                placeholder="Enter the Description">
@if (old('marathi_description'))
{{ old('marathi_description') }}@else{{ $weather->marathi_description }}
@endif
</textarea>
                                            @if ($errors->has('english_description'))
                                                <span class="red-text"><?php echo $errors->first('english_description', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="weather_date">Weather Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                value="@if (old('weather_date')) {{ old('weather_date') }}@else{{ $weather->weather_date }} @endif"
                                                name="weather_date" id="weather_date">
                                            @if ($errors->has('weather_date'))
                                                <span class="red-text"><?php echo $errors->first('weather_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="expired_date">Expired Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                                value="@if (old('expired_date')) {{ old('expired_date') }}@else{{ $weather->expired_date }} @endif"
                                                name="expired_date" id="expired_date">
                                            @if ($errors->has('expired_date'))
                                                <span class="red-text"><?php echo $errors->first('expired_date', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_image"> Image</label>
                                            <input type="file" name="english_image" class="form-control"
                                                id="english_image" accept="image/*" placeholder="image">
                                            @if ($errors->has('english_image'))
                                                <span class="red-text"><?php echo $errors->first('english_image', ':message'); ?></span>
                                            @endif
                                        </div>

                                        <img id="english"
                                            src="{{ asset('storage/images/home/weather/' . $weather->english_image) }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="english_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_image"> छायाचित्र </label>
                                            <input type="file" name="marathi_image" id="marathi_image"
                                                accept="image/*" class="form-control">
                                            @if ($errors->has('marathi_image'))
                                                <span class="red-text"><?php echo $errors->first('marathi_image', ':message'); ?></span>
                                            @endif
                                        </div>
                                        <img id="marathi"
                                            src="{{ asset('storage/images/home/weather/' . $weather->marathi_image) }}"
                                            class="img-fluid img-thumbnail" width="150">
                                        <img id="marathi_imgPreview" src="#" alt="pic"
                                            class="img-fluid img-thumbnail" width="150" style="display:none">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="english_pdf">PDF </label><br>
                                            <input type="file" name="english_pdf" id="english_pdf"
                                                value="{{ $weather->english_pdf }}" accept=".pdf">
                                            @if ($errors->has('english_pdf'))
                                                <span class="red-text"><?php echo $errors->first('english_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="marathi_pdf">पीडीएफ </label><br>
                                            <input type="file" name="marathi_pdf" id="marathi_pdf"
                                                value="{{ $weather->marathi_pdf }}" accept=".pdf">
                                            @if ($errors->has('marathi_pdf'))
                                                <span class="red-text"><?php echo $errors->first('marathi_pdf', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="btn btn-sm btn-success">Save &amp; Update</button>
                                        {{-- <button type="reset" class="btn btn-sm btn-danger"><a href="{{ route('list-weather') }}"
                                            class="text-light">Cancel</a></button> --}}
                                        <span><a href="{{ route('list-weather') }}"
                                                class="btn btn-sm btn-primary ">Back</a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $weather->id }}" placeholder="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
