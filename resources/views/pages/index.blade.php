@extends('layout')
@section('title')
    Home
@endsection
@section('content')
    <h1>HOMEPAGE</h1>
    {{ session('user') }}
    <div class="row">
        <div class="col-lg-8">
            FORUMS AND TOPICS
            @foreach ($forums as $forum)
                <fieldset class="border p-2">
                    <legend class="w-auto">{{ $forum->name }}</legend>
                    <div class="control-group">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque, consequuntur cum! Quos dicta vitae
                        cupiditate qui voluptas quae incidunt voluptatum eum pariatur vel. Sunt, dolorum. Velit nobis
                        quibusdam deleniti sint distinctio? Aspernatur saepe, delectus reprehenderit molestiae aperiam
                        blanditiis! Quis at nisi tempore hic eveniet repellat accusamus nostrum dolorum est necessitatibus.
                    </div>
                </fieldset>
            @endforeach
        </div>
        <div class="col-lg-4">
            INFO OF INFORUM
        </div>
    </div>
@endsection
