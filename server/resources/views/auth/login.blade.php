@extends('layouts.default')

@section('title', 'Login')

@section('content')

<div class="container">
    <div class="col-sm-12 col-md-4" style="margin: 25vh auto 0 auto">

            <form method="post" action="{{ route('authenticate') }}" >
                @csrf
                <div class="form-group" id="formBasicEmail">
                    <label>Email address</label>
                    <input type="text"
                           placeholder="Enter email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                    />
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div id="formBasicPassword" class="mt-2" >
                    <label class="form-label">Password</label>
                    <input type="password"
                           placeholder="Password"
                           name="password"
                           class="form-control" />

                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection
