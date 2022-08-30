@extends('layouts.admin.app')
@section('title', 'Profile Information')

@section('css')
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>Account Information</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="@route('admin.dashboard')">Home</a></li>
                <li class="breadcrumb-item">Account</li>
                <li class="breadcrumb-item active">Account Inofrmation</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <x-notification></x-notification>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
               <div class="card">
                
                        
                   <div class="card-header text-center">
                    <h3>Profile Update</h3>
                   </div>
                   <div class="card-body">
                        <form action="@route('admin.profile.account.update', $user->id)" method="POST">
                            @csrf
                            <div class="form-group my-2">
                                <label for="">Name:</label>
                                <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="">
                            </div>
        
                            <div class="form-group my-2">
                                <label for="">Email:</label>
                                <input type="text" value="{{ $user->email }}" name="email" class="form-control" id="">
                            </div>
        
                            <div class="form-group my-2 text-center">
                                <input type="submit" value="Update Profile" class="btn btn-primary" name="" id="">
                            </div>
        
                        </form>
                   </div>
               </div>
            </div><!--end of profile update form -->
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    

                    <div class="card-header text-center">
                        <h3>Change Password</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="@route('admin.profile.change.password')">
                            @csrf
                            <div class="form-group row my-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="old_password" required autocomplete="new-password">
        
                                </div>
                            </div>
        
                            <div class="form-group row my-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
        
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                </div>
                            </div>
        
                            <div class="form-group row my-3">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-right">{{ __('confirm Password') }}</label>
        
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
        
                                </div>
                            </div>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-12  offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    @section('js')
    @endsection

@endsection
