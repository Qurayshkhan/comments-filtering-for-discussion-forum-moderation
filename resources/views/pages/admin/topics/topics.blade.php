@extends('layouts.admin.dashboard')
@section('content')
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
                        <h3 class="card-title">Topics</h3>
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
                                <th class="min-w-200px">Username</th>
                                <th class="min-w-200px">Title</th>
                                <th class="min-w-200px">Content</th>
                                <th class="min-w-300px">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topics as $topic)
                                <tr>
                                    <td>{{ $topic->user->name ?? '' }}</td>
                                    <td>{{ $topic->title ?? '' }}</td>
                                    <td>{{ $topic->content ?? '' }}</td>
                                    <td>
                                        <div>
                                            <form action="{{ route('admin.delete.topics', ['topicId' => $topic->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button class="btn btn-danger">Delete</button>
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
