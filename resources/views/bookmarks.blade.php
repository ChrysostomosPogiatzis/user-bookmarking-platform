@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
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
                 
            </td>
            <td>
                <!-- Add your delete link/button here -->
             
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
