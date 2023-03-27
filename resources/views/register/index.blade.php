@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name" class="rounded-top form-control name" required id="name"
                            value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                               {{ $message  }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" value="{{ old('username') }}"
                            class="form-control @error('username')
                        is-invalid
                        @enderror"
                            required id="username">
                        <label for="username">userName</label>
                        @error('username')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message  }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email"
                            class="form-control @error('email')
                        is-invalid
                        @enderror"
                            required value="{{ old('email') }}" id="email" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message  }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password"
                            class="rounded-bottom form-control @error('password')
                        is-invalid
                        @enderror"
                            required id="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{ $message  }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-danger mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-4">Already registered? <a href="/login">Login!</a></small>
            </main>
        </div>
    </div>
@endsection
