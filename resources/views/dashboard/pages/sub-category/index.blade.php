@extends('dashboard.layouts.master')
@section('title')
    Sub Categories
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sub Categories') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('sub-categories.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
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
                                    <th >Category</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($subCategories as $subCategory)
                                    <tr>
                                        <td>{{ ++$loop->iteration }}</td>

                                        <td >{{ $subCategory->title }}</td>
                                        <td >{{ $subCategory->description }}</td>
                                        <td >{{ $subCategory->category->title }}</td>

                                        <td>
                                            <form action="{{ route('sub-categories.destroy', $subCategory->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('sub-categories.show', $subCategory->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('sub-categories.edit', $subCategory->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $subCategories->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
