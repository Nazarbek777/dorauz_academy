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
                                <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    <i class="feather-bar-chart"></i>
                                </a>
                                <div class="dropdown d-none">
                                    <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                        <i class="feather-filter"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- Dropdown items here -->
                                    </div>
                                </div>
                                <div class="dropdown d-none">
                                    <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                        <i class="feather-paperclip"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- Dropdown items here -->
                                    </div>
                                </div>
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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead >
                                    <tr class="bg-dark text-white">
                                        <th class="text-black">Guruh Nomi</th>
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
                                        <td>
                                            <a href="{{ route('groups.show', $group->id) }}" class="text-decoration-none">
                                                {{ $group->group_name }}
                                            </a>
                                        </td>
                                        <td>{{ $group->courses->course_name }}</td>
                                        <td>{{ $group->teachers->first_name }} {{ $group->teachers->last_name }}</td>
                                        <td>{{ $group->room }}</td>
                                        <td>
                                            @if (!empty($group->days_of_week))
                                                @foreach ($group->days_of_week as $day)
                                                    {{ ucfirst($day) }}@if (!$loop->last), @endif
                                                @endforeach
                                            @else
                                                No days selected
                                            @endif
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($group->start_time)->format('H:i') }}
                                            {{ \Carbon\Carbon::parse($group->end_time)->format('H:i') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('groups.show', $group->id) }}" class="btn btn-primary btn-sm">O'quvchilar ro'yxati</a>
                                            <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-secondary btn-sm mt-2">Tahrirlash</a>
                                            <form  action="{{ route('groups.destroy', $group->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Haqiqatdan ham ushbu guruhi o\'chirib tashlashni istaysizmi?')">O'chirish</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

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

            .table thead th {
                background-color: #f8f9fa;
                font-weight: bold;
            }

            .table-striped tbody tr:nth-of-type(odd) {
                background-color: #f9f9f9;
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
        </style>
    @endsection
