@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
  <div class="content container py-4">
      <div class="container d-flex justify-content-center">
        <div class="card px-3 py-3 mt-3 col-md-8">
        <h2 class="card-header card-header">Update Members</h2>
            <form method="POST" action="" class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter first name" value="Achaou" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter last name" value="Hamid" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="hamid@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Member</button>
            </form>
        </div>
      </div>
  </div>
@endsection
