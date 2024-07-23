<?php
$branches = \App\Models\Branch::all();
?>

@extends('layouts.layout')
@section('content')

<main class="auth-minimal-wrapper">
    <div class="auth-minimal-inner">
        <div class="minimal-card-wrapper">
            <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                    <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                </div>
                <div class="card-body p-sm-5">
                    <h2 class="fs-20 fw-bolder mb-4">Ro'yxatdan o'tish</h2>
                    <form action="{{ route('register.store') }}" method="post" class="w-100 mt-4 pt-2" >
                        @csrf
                        <div class="mb-4 d-none">
                            <select class="form-control" name="branch_id" id="branch_id">
                                <option value="" disabled selected>Filialni tanlang</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class=" col-md-6">
                                <div class="mb-4">
                                    <input type="text" class="form-control" placeholder="Ism" name="first_name" required>
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control" placeholder="Familiya" name="last_name" >
                                </div>
                                <div class="mb-4">
                                    <input type="email" class="form-control" placeholder="Email" name="email" >
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control" placeholder="Parol" name="password" >
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <input type="text" class="form-control" placeholder="Telefon raqami" name="phone_number" >
                                </div>
                                <div class="mb-4">
                                    <input type="text" class="form-control" placeholder="Manzil" name="address">
                                </div>
                                <div class="mb-4 d-none">
                                    <input type="text" class="form-control" placeholder="Mahorat sohasi" name="specialization">
                                </div>
                                <div class="mb-4">
                                    <select name="role" class="form-control" required>
                                        <option class="text-black" value="{{ \App\Helpers\MainHelper::ROLE_ADMIN }}">Admin</option>
                                        <option class="text-black" value="{{ \App\Helpers\MainHelper::ROLE_TEACHER }}">O'qituvchi</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control" placeholder="Parolni tasdiqlang" name="password_confirmation" >
                                </div>

                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-lg btn-primary w-100">Ro'yxatdan o'tish</button>
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
