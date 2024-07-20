@extends('layouts.layout')

@section('content')
<!-- Start Main Content -->
<main class="nxl-container">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Kurslar</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item">Kursni ko'rish</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Orqaga</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <a href="{{route('courses.edit', $course->id)}}" class="btn btn-primary ">
                            <span> O'zgartirish</span>
                        </a>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div
        <!-- End Page Header -->
        <!-- Main Content -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Kurs Tafsilotlari
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $course->course_name }}</h5>
                            <p class="card-text"><strong>Davomiylik:</strong> {{ $course->duration }} oy</p>
                            <p class="card-text"><strong>Narx:</strong> {{ $course->cost }} so'm</p>
                            <hr>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('courses.index')}}" class="btn btn-primary me-2">Orqaga</a>
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
    <!-- Footer -->

    <!-- End Footer -->
</main>
<!-- End Main Content -->
@endsection
