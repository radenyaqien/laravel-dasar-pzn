@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">

            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form>
                    <div class="form-floating">
                        <input type="text" name="name" class="rounded-top form-control" id="name">
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="username">
                        <label for="username">userName</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="rounded-bottom form-control" id="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-danger mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-4">Already registered? <a href="/login">Login!</a></small>
            </main>
        </div>
    </div>
@endsection
