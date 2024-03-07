@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-home-tender', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Tenders List
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ url('add-home-tender') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                    @endif

                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('list-home-tender') }}">Tender</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Tenders List</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @include('admin.layout.alert')
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Title </th>
                                                    <th>शीर्षक </th>
                                                    <th>Description </th>
                                                    <th>वर्णन </th>
                                                    <th>Tender Date</th>
                                                    <th>URL</th>
                                                    <th> Pdf</th>
                                                    <th> पीडीएफ </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tender as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><?php echo $item->english_title; ?></td>
                                                        <td><?php echo $item->marathi_title; ?></td>
                                                        <td><?php echo $item->english_description; ?></td>
                                                        <td><?php echo $item->marathi_description; ?></td>
                                                        <td>{{ $item->tender_date }}</td>
                                                        <td>{{ $item->url }}</td>
                                                        <td>{{ $item->english_pdf }}</td>
                                                        <td>{{ $item->marathi_pdf }}</td>
                                                        <td class="d-flex">
                                                            @if (in_array('per_update', $data_permission))
                                                                <a data-id="{{ $item->id }}"
                                                                    class="edit-btn btn btn-sm btn-outline-primary m-1"><i
                                                                        class="fas fa-pencil-alt"></i></a>
                                                            @endif

                                                            <a data-id="{{ $item->id }}"
                                                                class="show-btn btn btn-sm btn-outline-primary m-1"><i
                                                                    class="fas fa-eye"></i></a>
                                                            @if (in_array('per_delete', $data_permission))
                                                                <a data-id="{{ $item->id }}"
                                                                    class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                    title="Delete Tender"><i class="fas fa-archive"></i></a>
                                                            @endif


                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('delete-home-tender') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ route('show-home-tender') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
        <form method="POST" action="{{ route('edit-home-tender') }}" id="editform">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id" value="">
        </form>

        <!-- content-wrapper ends -->
    @endsection
