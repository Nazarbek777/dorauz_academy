@extends('layouts.layout')

@section('content')


    <!-- Start Main Content -->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Guruhlar</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Guruh ro'yhati</li>
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
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper ">
                            <a href="{{ route('groups.create') }}" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Guruhni yaratish</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center d-none">
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
                    <table class="table table-bordered">
                        <thead>
                        <tr>

                            <th>#</th>
                            <th>Guruh Nomi</th>
                            <th>Kurs</th>
                            <th>O'qituvchi</th>
                            <th>Xona</th>
                            <th>Dars Jadvali</th>
                            <th>Vaqt</th>
                            <th>Harakatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->group_name }}</td>
                                <td>{{ $group->courses->course_name }}</td>
                                <td>{{ $group->teachers->first_name }} {{ $group->teachers->last_name }}</td>
                                <td>{{ $group->room }}</td>
                                <div id="myModal" class="modal">
                                    <div class="modal-content">
                                        <div class="top">
                                            <h2>Dars Jadvalini Belgilang</h2>
                                            <span class="close">&times;</span>
                                        </div>
                                        <form id="scheduleForm">
                                            <div class="day">
                                                <label for="monday">Dushanba:</label>
                                                <div class="inputs">
                                                    <input type="checkbox" id="monday" name="monday">
                                                    <div class="time">
                                                        <input type="time" id="mondayStart" name="mondayStart" class="time-input">
                                                        <input type="time" id="mondayEnd" name="mondayEnd" class="time-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="day">
                                                <label for="tuesday">Seshanba:</label>
                                                <div class="inputs">
                                                    <input type="checkbox" id="tuesday" name="tuesday">
                                                    <div class="time">
                                                        <input type="time" id="tuesdayStart" name="tuesdayStart" class="time-input">
                                                        <input type="time" id="tuesdayEnd" name="tuesdayEnd" class="time-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="day">
                                                <label for="wednesday">Chorshanba:</label>
                                                <div class="inputs">
                                                    <input type="checkbox" id="wednesday" name="wednesday">
                                                    <div class="time">
                                                        <input type="time" id="wednesdayStart" name="wednesdayStart" class="time-input">
                                                        <input type="time" id="wednesdayEnd" name="wednesdayEnd" class="time-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="day">
                                                <label for="thursday">Payshanba:</label>
                                                <div class="inputs">
                                                    <input type="checkbox" id="thursday" name="thursday">
                                                    <div class="time">
                                                        <input type="time" id="thursdayStart" name="thursdayStart" class="time-input">
                                                        <input type="time" id="thursdayEnd" name="thursdayEnd" class="time-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="day">
                                                <label for="friday">Juma:</label>
                                                <div class="inputs">
                                                    <input type="checkbox" id="friday" name="friday">
                                                    <div class="time">
                                                        <input type="time" id="fridayStart" name="fridayStart" class="time-input">
                                                        <input type="time" id="fridayEnd" name="fridayEnd" class="time-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="day">
                                                <label for="saturday">Shanba:</label>
                                                <div class="inputs">
                                                    <input type="checkbox" id="saturday" name="saturday">
                                                    <div class="time">
                                                        <input type="time" id="saturdayStart" name="saturdayStart" class="time-input">
                                                        <input type="time" id="saturdayEnd" name="saturdayEnd" class="time-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="day">
                                                <label for="sunday">Yakshanba:</label>
                                                <div class="inputs">
                                                    <input type="checkbox" id="sunday" name="sunday">
                                                    <div class="time">
                                                        <input type="time" id="sundayStart" name="sundayStart" class="time-input">
                                                        <input type="time" id="sundayEnd" name="sundayEnd" class="time-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit">Saqlash</button>
                                        </form>
                                    </div>
                                </div>
                                <td>{{ $group->day_table }}</td>
                                <td>{{ $group->time_table }}</td>
                                <td>
                                    <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-secondary btn-sm"></a>
                                    <form action="{{ route('groups.destroy', $group->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Haqiqatdan ham ushbu guruhi o\'chirib tashlashni istaysizmi?')">

                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="row justify-content-start mt-4">
                        <div class="">
                            {{ $groups->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    </main>

    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 0.75rem;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: bold;
        }

        .table td {
            background-color: #ffffff;
            color: #212529;
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

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .pagination .page-link {
            background-color: #0f172a; /* Black background */
            color: #fff; /* White text */
            border-color: #000; /* Black border */
        }

        .pagination .page-link:hover {
            background-color: #555; /* Darker shade on hover */
            color: #fff; /* White text on hover */
            border-color: #000; /* Black border on hover */
        }

        .pagination .page-item.active .page-link {
            background-color: #000; /* Darker shade for active page */
            border-color: #000; /* Black border for active page */
        }
    </style>

@endsection



