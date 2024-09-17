@extends('dashboard.layouts.master')
@section('template_title')
    Categories
@endsection
@section('main-content')
<div class="pagetitle">
    <div class="d-flex justify-content-between">
        <h1>Data Tables</h1>
        <button class="border border-2 rounded-start  border-warning"><a href="{{ route('categories.create') }}">Create Category</a></button>
    </div>
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
                                    <th>No</th>

                                    <th >Title</th>
                                    <th >Description</th>
                                    <th >Create User Id</th>
                                    <th >Update User Id</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td >{{ $category->title }}</td>
                                        <td >{{ $category->description }}</td>
                                        <td >{{ $category->create_user_id }}</td>
                                        <td >{{ $category->update_user_id }}</td>

                                        <td>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('categories.show', $category->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('categories.edit', $category->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categories->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
