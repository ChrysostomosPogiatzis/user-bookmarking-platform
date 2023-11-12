@extends('layouts.app')

@section('content')
<div class="container h-100 mt-5"> @if ($errors->any()) <div class="alert alert-danger"> <ul> @foreach ($errors->all()
    as $error)
    <li>{{ $error }}</li> @endforeach </ul>
        </div> @endif <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6"> <h3>Edit Bookmark</h3> <form
            action="{{ route('bookmarksUpdate', $bookmark->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label> <input type="text" name='title' class="form-control" value="{{
                    $bookmark->title }}" > </div> <div class="mb-3"> <label class="form-label">Url</label> <input
                        type="url" name='url' class="form-control" value="{{ $bookmark->url }}"> </div>

                    <button type="submit" class="btn btn-primary">Submit</button> </form> </div>
            </div>
        </div>
        @endsection