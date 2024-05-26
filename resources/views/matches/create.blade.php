@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new Match') }}</div>

                <div class="card-body">

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('matches.store') }}" method="post">
                        @csrf


                        <div class="mb-3">
                            <label for="team_1_id" class="form-label">Home Team</label>
                            <select class="form-select" aria-label="Default select example" name="team_1_id">
                                <option selected value="">Open this select menu</option>

                                @foreach($teams as $team)
                                <option value="{{ $team->id }}" {{ $team->id == old('team_1_id') ? 'selected' : '' }}>{{ $team->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('team_1_id')
                        <p class="alert alert-danger"> {{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="team_2_id" class="form-label">Guest Team</label>
                            <select class="form-select" aria-label="Default select example" name="team_2_id">
                                <option selected value="">Open this select menu</option>
                                @foreach($teams as $team)
                                <option value="{{ $team->id }}" {{ $team->id == old('team_2_id') ? 'selected' : '' }}>{{ $team->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('team_2_id')
                        <p class="alert alert-danger"> {{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="date_match" class="form-label">Date of the match </label>
                            <input type="date" class="form-control" id="date_match" name="date_match" value="{{ old('date_match') }}">
                        </div>
                        @error('date_match')
                        <p class="alert alert-danger"> {{ $message }}</p>
                        @enderror


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection