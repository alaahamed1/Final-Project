@extends('dashboard.layouts.master')
@section('title', 'Deleted Categories')
@section('main-content')
    <div class="pagetitle">
        <h1>Deleted Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>


    </div><!-- End Page Title -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th class="font-weight-bold">No</th>
                                        <th class="font-weight-bold">Title</th>
                                        <th class="font-weight-bold">Description</th>
                                        <th class="font-weight-bold">Created By</th>
                                        <th class="font-weight-bold">Updated By</th>
                                        <th class="font-weight-bold">Created at</th>
                                        <th class="font-weight-bold">Updated at</th>
                                        <th class="font-weight-bold">Deleted at</th>
                                        @if (auth()->user()->user_type == 'admin')
                                            <th class="font-weight-bold">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ Str::words($category->description, '5', '....') ?? 'N/A' }}</td>
                                            <td>{{ $category->create_user->name }}</td>
                                            <td>{{ $category->update_user_name ?? 'N/A' }}</td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>{{ $category->updated_at ?? 'N/A' }}</td>
                                            <td>{{ $category->deleted_at ?? 'N/A' }}</td>
                                            @if (auth()->user()->user_type == 'admin')
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <form action="{{ route('categories.restore', $category->id) }}"
                                                                method="GET">
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm font-weight-bold fs-6 mx-1">Restore</button>
                                                            </form>
                                                        </div>
                                                        <div>
                                                            <form
                                                                action="{{ route('categories.forceDelete', $category->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm font-weight-bold fs-6 mx-1">Delete
                                                                    From Trash</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger text-center my-5 w-75 mx-auto">
                                            <span class="h6"> There Are No Deleted Categories Yet!</span>
                                        </div>
                                    @endforelse
                            </table>
                        </div>
                    </div>
                </div>
                <div class="my-4 my-4 d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            @endsection
