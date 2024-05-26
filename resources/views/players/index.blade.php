@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Players') }}</div>

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
                                <th scope="col">Date of birth</th>
                                <th scope="col">Team</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($players as $player)
                            <tr>
                                <td> {{$player->name}}</td>
                                <td> {{$player->date_of_birth}}</td>
                                <td> {{$player->team->name}}</td>
                                <td>
                                    <a href="{{ Route('players.edit', ['id' => $player->id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ Route('players.delete', ['id' => $player->id]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div><a href="{{ route('players.create') }}" class="btn btn-primary">Create new Player</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection