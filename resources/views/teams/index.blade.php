@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teams') }}</div>

                <div class="card-body">



                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Year Founded</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($teams as $team)
                            <tr>
                                <td> {{$team->name}}</td>
                                <td> {{$team->founded_year}}</td>
                                <td>
                                    <a href="{{ Route('teams.edit', ['id' => $team->id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ Route('teams.delete', ['id' => $team->id]) }}" class="btn btn-danger">Delete</a>
                                    <a href="{{ Route('teams.info', ['id' => $team->id]) }}" class="btn btn-secondary">Info</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div><a href="{{ route('teams.create') }}" class="btn btn-primary">Create new Team</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection