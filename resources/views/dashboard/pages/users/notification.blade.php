@extends('dashboard.layouts.master')
@section('title')
    Send Notification
@endsection

@section('main-content')
    <div class="content-wrapper">
        @if ($message = Session::get('success'))
            <div class="alert alert-success m-4">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger m-4">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Send Notification</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.sendNotification') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="Enter title">
                                    <div class="text-danger">{{ $errors->first('title') }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                                    <div class="text-danger">{{ $errors->first('message') }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="user_id">User</label>
                                    <select class="form-control" name="user_id" id="user_id">
                                        <option value="">Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">{{ $errors->first('user_id') }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Action URL</label>
                                    <input type="text" class="form-control" id="action_url" name="action_url"
                                           placeholder="Enter action URL">
                                    <div class="text-danger">{{ $errors->first('action_url') }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="">Select Type</option>
                                        <option value="info">Info</option>
                                        <option value="warning">Warning</option>
                                        <option value="danger">Danger</option>
                                        <option value="success">Success</option>
                                    </select>
                                    <div class="text-danger">{{ $errors->first('type') }}</div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-default">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
