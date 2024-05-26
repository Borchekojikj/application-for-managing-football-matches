@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="text-center mt-2 mb-4 h3">Infos</h1>
                <div class="card-header bg-secondary text-white">{{ __('Matches that ') }} {{ $team->name}} played</div>
                @if( count($teamMatches) !== 0 )
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Team 1</th>
                                <th scope="col">Team 2</th>
                                <th scope="col">Result</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($teamMatches as $match)
                            <tr>
                                <td> {{ $match->team1->name }}</td>
                                <td> {{ $match->team2->name }}</td>
                                <td> {{$match->result ?? '/' }} </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                @else
                <p class="my-3">No Matches yet..</p>
                @endif
                <div class="card-header bg-secondary text-white">{{ __('Players') }} in {{ $team->name}}</div>

                @if( count($teamPlayers) !== 0 )
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

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($teamPlayers as $player)
                            <tr>
                                <td> {{$player->name}}</td>
                                <td> {{$player->date_of_birth}}</td>
                                <td> {{$player->team->name}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                @else

                <p class="my-3">No Players yet..</p>
                @endif

            </div>
            <div class="mt-2 ms-2"><a href="{{ route('teams.index') }}" class="btn btn-dark">Back</a></div>
        </div>
    </div>
</div>
</div>

@endsection