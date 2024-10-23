@extends('dashboard.layouts.master')
@section('title')
    Contact Data
@endsection
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Contact Data') }}
                            </span>
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

									<th >First Name</th>
									<th >Last Name</th>
									<th >Email</th>
									<th >Subject</th>
									<th >Message</th>
									<th >Is Replied</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contactData as $Data)
                                        <tr>
                                            <td>{{ ++$i }}</td>

										<td >{{ $Data->first_name }}</td>
										<td >{{ $Data->last_name }}</td>
										<td >{{ $Data->email }}</td>
										<td >{{ $Data->subject }}</td>
										<td >{{ $Data->message }}</td>
										<td >{{ 'Yes' == $Data->is_replied ? 'Yes' : 'No' }}</td>

                                            <td>
                                                <form action="{{ route('contact-data.destroy', $Data->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('contact-data.show', $Data->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
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
                {!! $contactData->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
