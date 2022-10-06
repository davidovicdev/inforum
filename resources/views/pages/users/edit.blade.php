@extends('layout')
@section('title')
    Update profile
@endsection
@section('content')
    <h1>Update profile</h1>
    <h2>User id : {{ $user->id }}</h2>
    <form action="{{ route('users.update', session('user')->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <div class="row">
            <div class="col-lg-6 col-md-5">
                <div class="form-group mt-3">
                    <label for="username">Username <span class="text-danger">*</span></label>
                    <input type="username" name="username" id="username" class="form-control" value="{{ $user->username }}"
                        required>
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                        required>
                </div>
                <div class="form-group mt-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                </div>
                <div class="form-group mt-3">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $user->facebook }}">
                </div>
                <div class="form-group mt-3">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" id="twitter" class="form-control" value="{{ $user->twitter }}">
                </div>
                <div class="form-group mt-3">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{ $user->linkedin }}">
                </div>
                <div class="form-group mt-3">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control"
                        value="{{ $user->instagram }}">
                </div>
                <div class="form-group mt-3">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>


            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group mt-3">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-select">
                        @foreach ($gender as $g)
                            <option value="{{ $g->id }}">{{ $g->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="interestedIn">Interested In</label>
                    <select name="interestedIn" id="interestedIn" class="form-select">
                        @foreach ($interestedIn as $iI)
                            <option value="{{ $iI->id }}">{{ $iI->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="eyeColor">Eye color</label>
                    <select name="eyeColor" id="eyeColor" class="form-select">
                        @foreach ($eyeColors as $eyeColor)
                            <option value="{{ $eyeColor->id }}">{{ $eyeColor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="hairColor">Hair color</label>
                    <select name="hairColor" id="hairColor" class="form-select">
                        @foreach ($hairColors as $hairColor)
                            <option value="{{ $hairColor->id }}">{{ $hairColor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="profession">Profession</label>
                    <select name="profession" id="profession" class="form-select">
                        @foreach ($professions as $profession)
                            <option value="{{ $profession->id }}">{{ $profession->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="statusOfRelationship">Status of Relationship</label>
                    <select name="statusOfRelationship" id="statusOfRelationship" class="form-select">
                        @foreach ($statusOfRelationships as $sor)
                            <option value="{{ $sor->id }}">{{ $sor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="about_me_description">About me</label>
                    <textarea name="about_me_description" id="about_me_description" class="form-control">{{ $user->about_me_description }}</textarea>
                </div>
            </div>
        </div>
        @csrf
        <input type="submit" value="Update" class="btn btn-primary mt-3">
    </form>
@endsection
