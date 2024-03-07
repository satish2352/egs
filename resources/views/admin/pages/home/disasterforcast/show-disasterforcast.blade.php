@extends('admin.layout.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper mt-7">

            <div class="row justify-content-center">
                <div class="col-7 grid-margin ">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-start align-items-center">
                            <h3 class="page-title">
                                Disaster Forecast
                            </h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                            <div>
                                <a href="{{ route('list-disasterforcast') }}" class="btn btn-sm btn-primary ml-3">Back</a>
                            </div>
                        </div>

                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    {{-- <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Title English :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>{{ strip_tags($disasterforcast->english_title) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Title Marathi :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>{{ strip_tags($disasterforcast->marathi_title) }}</label>
                                        </div>
                                    </div> --}}
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Description :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>{{ strip_tags($disasterforcast->english_description) }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>वर्णन :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>{{ strip_tags($disasterforcast->marathi_description) }}</label>
                                        </div>
                                    </div>
                                    {{-- <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Disaster Forecast Date :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label> {{ $disasterforcast->forcast_date }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Expired Date :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label> {{ $disasterforcast->expired_date }}</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Image English :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <img src="{{ asset('storage/images/home/disaster-forcast/' . $disasterforcast->english_image) }}"
                                                style="width:300px; height:150px;" />
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Image Marathi :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 pt-2">
                                            <img src="{{ asset('storage/images/home/disaster-forcast/' . $disasterforcast->marathi_image) }}"
                                                style="width:300px; height:150px;" />
                                        </div>
                                    </div>
                                
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>English Pdf :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <a href="{{ asset('/storage/pdf/disaster-forcast/' . $disasterforcast->english_pdf) }}"
                                                target="_blank"><img src="public/storage/pdf/pdf.png" width="50px"
                                                    height="50px"></a>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="row pt-2">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label>Marathi Pdf :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <a href="{{ asset('/storage/pdf/disaster-forcast/' . $disasterforcast->marathi_pdf) }}"
                                                target="_blank"><img src="public/storage/pdf/pdf.png" width="50px"
                                                    height="50px"></a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    @endsection
