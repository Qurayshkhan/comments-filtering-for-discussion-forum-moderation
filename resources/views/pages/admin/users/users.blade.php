@extends('layouts.admin.dashboard')
@section('content')
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add ban</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.ban') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" id="userId">
                        <div class="form-group">
                            <label for="">Start Ban</label>
                            <input type="date" name="start_ban" class="form-control">
                            @error('start_ban')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="from-group">
                            <label for="">End Ban</label>
                            <input type="date" name="end_ban" class="form-control">
                            @error('end_ban')
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
    <div class="modal fade" tabindex="-1" id="kt_modal_modurator">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Modurator</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.add.moderators') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="user_id" id="edit_user_id">
                                    <label for="">Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter name">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Enter email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter passowrd">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Confirm passowrd</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Enter confirm passowrd">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="role" id="" class="form-control">
                                        <option value="moderators">Modurator</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Submit</button>
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
                        <h3 class="card-title">Users</h3>
                    </div>
                    @if (auth()->user()->role == 'admin')
                        <div>
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_modurator">Add moderators</button>
                        </div>
                    @endif
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
                                <th class="min-w-200px">First name</th>
                                <th class="min-w-300px">Email</th>
                                <th class="min-w-200px">Role</th>
                                <th class="min-w-100px">Status</th>
                                <th class="min-w-100px">Ban</th>
                                <th class="min-w-100px">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                        {{ $user->userBand->ban_start ?? '' }} - {{ $user->userBand->ban_end ?? '' }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            @if (auth()->user()->role == 'admin')
                                                <form action="{{ route('user.changes.status', ['userId' => $user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-primary">Chages status</button>
                                                </form>
                                            @endif
                                            <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_1" onclick="addUserId({{ $user->id }})">Add
                                                Ban</button>
                                            <a href="{{ route('user.remove.ban', ['userId' => $user->id]) }}">
                                                <button class="btn btn-sm btn-danger">Remove Ban</button>
                                            </a>
                                            @if (auth()->user()->role == 'admin')
                                                <form action="{{ route('admin.delete.user', ['userId' => $user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger">Delete user</button>
                                                </form>
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
@endsection
@section('script')
    <script>
        $("#kt_datatable_horizontal_scroll").DataTable();
        let addUserId = (user_id) => {
            $('#userId').val(user_id);
        }
        let editUserDetails = (user_id, name, email) => {
            $('#edit_user_id').val(user_id);
            $('#name').val(name);
            $('#email').val(email);
            $('.modal-title').html('Edit User');
        }
    </script>
@endsection
