@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <div class="col-md-12 align-self-center">
            @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                    <table class="table">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">URL</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookmarks as $bookmark)
        <tr>
            <td>{{ $bookmark->title }}</td>
            <td>{{ $bookmark->url }}</td>
            <td>
                <!-- Add your edit link/button here -->
                <a class='btn btn-info text-white' href="/bookmarks/{{ $bookmark->id }}/edit" >Edit</a>
            </td>
            <td>  
            <a class='btn btn-danger text-white' href="/bookmarks/{{ $bookmark->id }}/delete" >Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="
                col-md-7
                justify-content-end
                align-self-center
                d-none d-md-flex
              ">
              <div class="d-flex">


                <a class="btn btn-success" href="{{ URL::route('bookmarksCreate') }}">Create New BookMark</a>

              </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
