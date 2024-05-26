@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Create new Player') }}</div>

                <div class="card-body">



                    <form action="{{ route('players.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        @error('name')
                        <p class="alert alert-danger"> {{ $message }}</p>
                        @enderror
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth </label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                        </div>
                        @error('date_of_birth')
                        <p class="alert alert-danger"> {{ $message }}</p>
                        @enderror


                        <div class="mb-3">
                            <label for="team_id" class="form-label">Team</label>
                            <select class="form-select" aria-label="Default select example" name="team_id">
                                <option selected value="">Open this select menu</option>
                                @foreach($teams as $team)
                                <option value="{{ $team->id }}" {{ $team->id == old('team_id') ? 'selected' : ''  }}>{{ $team->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('team_id')
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