@extends('layouts.admin.dashboard')
@section('content')
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Keyword</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.add.keyword') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Keyword name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Update keyword</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update.keyword') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Keyword name</label>
                            <input type="hidden" name="keyword_id" id="keyword_id">
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <div class="container">
        @if (Session::has('status'))
            <div class="bg-success alert alert-success">
                <div class="text-light">
                    {{ Session::get('status') }}
                </div>
            </div>
        @endif
        <div class="card shadow-sm">
            <div class="card-header">
                <div class="d-flex justify-content-between w-100 align-items-center py-3">
                    <div>
                        <h3 class="card-title">Keywords</h3>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_1">Add keywords</button>
                    </div>
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-sm btn-active-color-primary" data-kt-card-action="remove"
                        data-kt-card-confirm="true" data-kt-card-confirm-message="Are you sure to remove this card ?"
                        data-bs-toggle="tooltip" title="Remove card" data-bs-dismiss="click">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="kt_datatable_horizontal_scroll" class="table table-striped table-row-bordered gy-5 gs-7">
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800">
                                <th class="min-w-200px">Name</th>
                                <th class="min-w-200px">Craeted at</th>
                                <th class="min-w-300px">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keywords as $keyword)
                                <tr>
                                    <td>{{ $keyword->name ?? '' }}</td>
                                    <td>{{ $keyword->created_at ?? '' }}</td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <button type="submit" class="btn btn-primary"
                                                onclick="editKeyword({{ $keyword->id }}, `{{ $keyword->name }}`)"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_update">edit</button>
                                            <form action="{{ route('admin.delete.keyword', ['keywordId' => $keyword]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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
@endsection
@section('script')
    <script>
        $("#kt_datatable_horizontal_scroll").DataTable();
        let addUserId = (user_id) => {
            $('#userId').val(user_id);
        }
    </script>
    <script>
        let editKeyword = (keyword_id, name) => {
            $('#keyword_id').val(keyword_id);
            $('#name').val(name);
        }
    </script>
@endsection
