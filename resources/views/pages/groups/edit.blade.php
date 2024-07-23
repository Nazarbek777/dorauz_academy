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
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <hr>

                                    <form action="{{ route('groups.update', $group->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="branch_id" class="form-label">Filial</label>
                                            <select class="form-control" id="branch_id" name="branch_id" required>
                                                @foreach($branches as $branch)
                                                    <option value="{{ $branch->id }}" {{ $group->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 d-none">
                                            <label for="enrollment_id" class="form-label">Ro'yxatdan o'tish</label>
                                            <select class="form-control" id="enrollment_id" name="enrollment_id">
                                                @foreach($enrollments as $enrollment)
                                                    <option value="{{ $enrollment->id }}" {{ $group->enrollment_id == $enrollment->id ? 'selected' : '' }}>{{ $enrollment->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="course_id" class="form-label">Kurs</label>
                                            <select class="form-control" id="course_id" name="course_id" required>
                                                @foreach($courses as $course)
                                                    <option class="text-black" value="{{ $course->id }}">{{ $course->course_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="teacher_id" class="form-label">O'qituvchi</label>
                                            <select class="form-control" id="teacher_id" name="teacher_id" required>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}" {{ $group->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="room" class="form-label">Xona</label>
                                            <input type="text" class="form-control" id="room" name="room" value="{{ $group->room }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="days_of_week" class="form-label">Hafta kunlari</label>
                                                @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="day_{{ $day }}" name="days_of_week[]" value="{{ $day }}" {{ in_array($day, old('days_of_week', $group->days_of_week)) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="day_{{ $day }}">
                                                            {{ ucfirst($day) }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                        </div>
                                        <div class="mb-3">
                                            <label for="start_time" class="form-label">Start Time</label>
                                            <input type="text" class="form-control" id="start_time" name="start_time" placeholder="14:30" value="{{ old('start_time', $group->start_time) }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="end_time" class="form-label">End Time</label>
                                            <input type="text" class="form-control" id="end_time" name="end_time" placeholder="16:30" value="{{ old('end_time', $group->end_time) }}">
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">Saqlash</button>
                                        <a href="{{ route('groups.index') }}" class="btn btn-secondary mt-2">Orqaga</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    </main>

    <style>
        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
@endsection
