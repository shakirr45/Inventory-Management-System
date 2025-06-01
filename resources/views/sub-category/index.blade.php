@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <!-- Page Title & Breadcrumb -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="page-title mb-0">{{ $pageTitle }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Subcategories</li>
                    </ol>
                </nav>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Subcategory List</strong>
                    <a class="btn btn-primary" data-bs-target="#modalInput" data-bs-toggle="modal">+ Add Subcategory</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Subcategory Name</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category->name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $item->status ? 'success' : 'danger' }}">
                                            {{ $item->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                    <a href="javascript:void(0);"
                                        class="btn btn-primary btn-sm text-white editSubcategoryBtn"
                                        data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}"
                                        data-category_id="{{ $item->category_id }}"
                                        data-bs-toggle="modal" data-bs-target="#modalEdit">
                                        <i class="fe fe-edit"></i> Edit
                                    </a>

                                    <a href="{{ route('subcategory.delete', $item->id) }}" class="btn btn-danger btn-sm">
                                        <i class="fe fe-trash me-2"></i>Delete
                                    </a>
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

<!-- Add Subcategory Modal -->
<div class="modal fade" id="modalInput">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="modal-title w-100 text-center">Add New Subcategory</h6>
            </div>
            <form action="{{ route('subcategory.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select class="form-select form-select-sm" name="category_id" id="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label>Subcategory Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter Subcategory Name" required>
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

<!-- Edit Subcategory Modal -->
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h6 class="modal-title w-100 text-center">Edit Subcategory</h6>
            </div>
            <form id="editSubcategoryForm" method="POST">
                @csrf
                <input type="hidden" name="status" value="1">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editCategorySelect">Category Name</label>
                        <select class="form-select form-select-sm" name="category_id" id="editCategorySelect" required>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label>Subcategory Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="editSubcategoryName" required>
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

<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.editSubcategoryBtn').on('click', function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var categoryId = $(this).data('category_id');

            $('#editSubcategoryName').val(name);
            $('#editCategorySelect').val(categoryId);
            $('#editSubcategoryForm').attr('action', '/subcategory/store/' + id); 
        });
    });
</script>

@endsection
