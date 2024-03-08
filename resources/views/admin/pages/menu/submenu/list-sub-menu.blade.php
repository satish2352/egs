@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-sub-menu', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Sub Menu List
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ route('add-sub-menu') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                    @endif
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-sub-menu') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Sub Menu List</li>
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
                                                    <th>Main Menu</th>
                                                    <th> Sub Menu Name </th>
                                                    <th> उप मेनू नाव </th>
                                                    {{-- <th>URL</th> --}}
                                                    <!-- <th>Status</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sub_menu as $key => $item)
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td><?php echo $item->menu_name_english_main; ?> /
                                                            <?php echo $item->menu_name_marathi_main; ?></td>
                                                        <td><?php echo $item->menu_name_english; ?></td>
                                                        <td><?php echo $item->menu_name_marathi; ?></td>
                                                        {{-- <td><?php //echo $item->url;
                                                        ?></td> --}}
                                                        <!--  <td><?php echo $item->order_no; ?></td> -->
                                                        <!-- <td>
                                                                                    <span class="badge badge-success">Active</span>
                                                                                </td> -->
                                                        <td>
                                                            <div class="d-flex">
                                                                @if (in_array('per_update', $data_permission))
                                                                    <a href="{{ route('edit-sub-menu', base64_encode($item->id)) }}"
                                                                        class="btn btn-sm btn-outline-primary m-1"
                                                                        title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                                @endif

                                                                <a data-id="{{ $item->id }}"
                                                                    class="show-btn btn btn-sm btn-outline-primary m-1"
                                                                    title="Show"><i class="fas fa-eye"></i></a>
                                                                @if (in_array('per_delete', $data_permission))
                                                                    <a data-id="{{ $item->id }}"
                                                                        class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                        title="Delete"><i class="fas fa-archive"></i></a>
                                                                @endif
                                                            </div>
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
        <form method="POST" action="{{ url('/delete-sub-menu') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-sub-menu') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
      

        <!-- content-wrapper ends -->
    @endsection
