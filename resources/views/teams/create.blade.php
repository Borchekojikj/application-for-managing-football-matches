@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new Team') }}</div>

                <div class="card-body">



                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form action=" {{ route('teams.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        @error('name')
                        <p class="alert alert-danger"> {{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label for="founded_year" class="form-label">Year Founded </label>
                            <input type="text" class="form-control" id="founded_year" name="founded_year" placeholder="Year Founded" value="{{ old('founded_year') }}">
                        </div>
                        @error('founded_year')
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