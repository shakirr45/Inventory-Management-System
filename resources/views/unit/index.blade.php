@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="page-title mb-0">{{ $pageTitle }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                    </ol>
                </nav>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Unit List</strong>
                    <a class="btn btn-primary" data-bs-target="#modalInput" data-bs-toggle="modal">+ Add Unit</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <span class=" badge bg-{{ $item->status ? 'success' : 'danger' }}">
                                            {{ $item->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);"
                                            class="btn btn-primary btn-sm text-white editUnitBtn"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-status="{{ $item->status }}"
                                            data-bs-toggle="modal" data-bs-target="#modalEdit">
                                            <i class="fe fe-edit"></i> Edit
                                        </a>

                                        <a href="{{ route('unit.delete',$item->id) }}" type="button" class="btn btn-danger"><i class="fe fe-trash me-2"></i>Delete</a>
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

<!-- Add Unit Modal -->
<div class="modal fade" id="modalInput">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="modal-title w-100 text-center">Add New Unit</h6>
            </div>
            <form action="{{ route('unit.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Unit Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Unit" required>
                        <input type="hidden" name="status" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm">Create</button>
                    <button class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Unit Modal -->
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="modal-title w-100 text-center">Edit Unit</h6>
            </div>
            <form id="editUnitForm" method="POST">
                @csrf
                <input type="hidden" name="editcatstatus" value="1">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Unit Name</label>
                        <input type="text" class="form-control" name="name" id="editUnitName" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm">Update</button>
                    <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery script -->
<script>
    $(document).ready(function() {
        $('.editUnitBtn').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');

            $('#editUnitName').val(name);
            $('#editUnitForm').attr('action', '/unit/store/' + id);
        });
    });
</script>


@endsection