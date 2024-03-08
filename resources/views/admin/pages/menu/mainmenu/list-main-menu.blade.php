@extends('admin.layout.master')

@section('content')
    <?php $data_permission = getPermissionForCRUDPresentOrNot('list-main-menu', session('permissions'));
    ?>
    <div class="main-panel">
        <div class="content-wrapper mt-7">
            <div class="page-header">
                <h3 class="page-title">
                    Main Menu List
                    @if (in_array('per_add', $data_permission))
                        <a href="{{ route('add-main-menu') }}" class="btn btn-sm btn-primary ml-3">+ Add</a>
                    @endif
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('list-main-menu') }}">Header</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Main Menu List</li>
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
                                                    <th>Menu Name </th>
                                                    <th>मेनूचे नाव</th>
                                                    {{-- <th>URL</th> --}}
                                                    <!-- <th>Status</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($main_menu as $key => $item)
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td><?php echo $item->menu_name_english; ?></td>
                                                        <td><?php echo $item->menu_name_marathi; ?></td>
                                                        {{-- <td><?php //echo $item->url;
                                                        ?></td> --}}
                                                        <!--  <td><?php echo $item->order_no; ?></td> -->
                                                        <!-- <td>
                                                                            <span class="badge badge-success">Active</span>
                                                                        </td> -->
                                                        <td class="d-flex">
                                                            @if (in_array('per_update', $data_permission))
                                                                <a href="{{ route('edit-main-menu', base64_encode($item->id)) }}"
                                                                    class="btn btn-sm btn-outline-primary m-1"
                                                                    title="Show"><i class="fas fa-pencil-alt"></i></a>
                                                            @endif
                                                            @if (in_array('per_delete', $data_permission))
                                                                <a data-id="{{ $item->id }}"
                                                                    class="delete-btn btn btn-sm btn-outline-danger m-1"
                                                                    title="Delete"><i class="fas fa-archive"></i></a>
                                                            @endif
                                                            <a data-id="{{ $item->id }}"
                                                                class="show-btn btn btn-sm btn-outline-primary m-1"
                                                                title="Edit"><i class="fas fa-eye"></i></a>
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
        <form method="POST" action="{{ url('/delete-main-menu') }}" id="deleteform">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
        <form method="POST" action="{{ url('/show-main-menu') }}" id="showform">
            @csrf
            <input type="hidden" name="show_id" id="show_id" value="">
        </form>
      

        <!-- content-wrapper ends -->
    @endsection
