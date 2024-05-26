@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Matches') }}</div>

                <div class="card-body">



                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Team 1</th>
                                <th scope="col">Team 2</th>
                                <th scope="col">Result</th>
                                @if(Auth::user()->is_admin == 1)

                                <th scope="col">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($matches as $match)
                            <tr>
                                <td> {{ $match->team1->name }}</td>
                                <td> {{ $match->team2->name }}</td>
                                <td> {{$match->result ?? '/' }} </td>

                                @if(Auth::user()->is_admin == 1)
                                <td>
                                    <a href="{{ Route('matches.edit', ['id' => $match->id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ Route('matches.delete', ['id' => $match->id]) }}" class="btn btn-danger">Delete</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(Auth::user()->is_admin == 1)
                    <div><a href="{{ route('matches.create') }}" class="btn btn-primary">Create new Match</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection