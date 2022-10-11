@extends('layout')
@section('title')
    Home
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <h2 class="mb-4 mt-4">New topic for {{ $forum->name }}</h2>
            <form action="{{ route('topics.store', $forum->id) }}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Topic name"
                        required>
                    <input type="hidden" name="forumId" value="{{ $forum->id }}">
                </div>
                <input type="submit" class="btn btn-primary mt-4" value="Add">
            </form>
        </div>
    </div>
@endsection
