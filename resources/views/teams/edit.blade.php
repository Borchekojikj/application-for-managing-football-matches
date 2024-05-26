@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Team') }}</div>

                <div class="card-body">



                    <form action=" {{ route('teams.update', ['id' => $team->id]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ old('name', $team->name) }}">
                        </div>
                        @error('name')
                        <p class="alert alert-danger"> {{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="founded_year" class="form-label">Year Founded </label>
                            <input type="text" class="form-control" id="founded_year" name="founded_year" placeholder="Year Founded" value="{{ old('founded_year', $team->founded_year) }}">
                        </div>
                        @error('founded_year')
                        <p class="alert alert-danger"> {{ $message }}</p>
                        @enderror
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('teams.index') }}" class="btn btn-dark">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection