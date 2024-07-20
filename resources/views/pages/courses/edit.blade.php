@extends('layouts.layout')
@section('content')
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Kurslar</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Kursni tahrirlash</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>

                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <h2>Bo'limni tahrirlash</h2>
                                <form action="{{ route('courses.update', $course->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="course_name" class="form-label">Kurs Nomi</label>
                                        <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="duration" class="form-label">Davomiyligi (oy)</label>
                                        <input type="number" class="form-control" id="duration" name="duration" value="{{ $course->duration }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cost" class="form-label">Narxi (so'm da)</label>
                                        <input type="number" class="form-control" id="cost" name="cost" value="{{ $course->cost }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">O'zgartirish</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
  
        <!-- [ Footer ] end -->
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->

@endsection
