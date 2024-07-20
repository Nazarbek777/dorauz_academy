@extends('layouts.layout')

@section('content')

<!-- Start Main Content -->
<main class="nxl-container">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Guruhni tahrirlash</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Asosiy sahifa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('groups.index') }}">Guruhlar</a></li>
                    <li class="breadcrumb-item active">Tahrirlash</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Orqaga</span>
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
        <!-- End Page Header -->

        <!-- Main Content -->
        <div class="main-content">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Guruhni tahrirlash</h5>
                                <hr>

                                <form action="{{ route('groups.update', $group->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="branch_id" class="form-label">Filial</label>
                                        <select class="form-control" id="branch_id" name="branch_id" required>
                                            @foreach($branches as $branch)
                                            <option class="text-black" value="{{ $branch->id }}" {{ $group->branch_id == $branch->id ? 'selected' : '' }} class="bg-dark">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 d-none">
                                        <label for="enrollment_id" class="form-label">Ro'yxatdan o'tish</label>
                                        <select class="form-control" id="enrollment_id" name="enrollment_id" required>
                                            @foreach($enrollments as $enrollment)
                                            <option class="text-black" value="{{ $enrollment->id }}" {{ $group->enrollment_id == $enrollment->id ? 'selected' : '' }} class="bg-dark">{{ $enrollment->user->first_name }} {{ $enrollment->user->last_name }} {{ $enrollment->date }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="course_id" class="form-label">Kurs</label>
                                        <select class="form-control" id="course_id" name="course_id" required>
                                            @foreach($courses as $course)
                                            <option class="text-black" value="{{ $course->id }}" {{ $group->course_id == $course->id ? 'selected' : '' }} class="bg-dark">{{ $course->course_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="teacher_id" class="form-label">O'qituvchi</label>
                                        <select class="form-control" id="teacher_id" name="teacher_id" required>
                                            @foreach($teachers as $teacher)
                                            <option class="text-black" value="{{ $teacher->id }}" {{ $group->teacher_id == $teacher->id ? 'selected' : '' }} class="bg-dark">{{ $teacher->first_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="room" class="form-label">Xona</label>
                                        <input type="text" class="form-control" id="room" name="room" value="{{ $group->room }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="group_name" class="form-label">Guruh nomi</label>
                                        <input type="text" class="form-control" id="group_name" name="group_name" value="{{ $group->group_name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="time_table" class="form-label">Dars jadvali</label>
                                        <input type="text" class="form-control" id="time_table" name="time_table" value="{{ $group->time_table }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="day_table" class="form-label">Kun jadvali</label>
                                        <input type="text" class="form-control" id="day_table" name="day_table" value="{{ $group->day_table }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Saqlash</button>
                                </form>
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
<!-- Initialize Select2 and AJAX Search -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.max-select').select2({
            theme: 'bootstrap-5',
            placeholder: 'Yo\'nalishlarni tanlang',
            allowClear: true
        });
    });
</script>

@endsection
