<?php
$branches = \App\Models\Branch::all();
?>

@extends('layouts.layout')
@section('content')

    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner  aaa">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Edit User</h2>
                        <form action="{{ route('student_registers.update', $studentRegister->id) }}" method="post" class="w-100 mt-4 pt-2">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="mb-4">
                                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $studentRegister->first_name }}" required>
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $studentRegister->last_name }}">
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" placeholder=" Email" name="email" value="{{ $studentRegister->email }}">
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" value="{{ $studentRegister->phone }}">
                                    </div>
                                    <div class="mb-4">
                                        <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $studentRegister->address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="theme-customizer">
        <!-- Theme Customizer content -->
    </div>
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
@endsection
