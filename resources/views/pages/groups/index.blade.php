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
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-eye me-3"></i>
                                    <span>All</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-users me-3"></i>
                                    <span>Group</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-flag me-3"></i>
                                    <span>Country</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-dollar-sign me-3"></i>
                                    <span>Invoice</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-briefcase me-3"></i>
                                    <span>Project</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-user-check me-3"></i>
                                    <span>Active</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-user-minus me-3"></i>
                                    <span>Inactive</span>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown d-none">
                            <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                <i class="feather-paperclip"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-filetype-pdf me-3"></i>
                                    <span>PDF</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-filetype-csv me-3"></i>
                                    <span>CSV</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-filetype-xml me-3"></i>
                                    <span>XML</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-filetype-txt me-3"></i>
                                    <span>Text</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-filetype-exe me-3"></i>
                                    <span>Excel</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="bi bi-printer me-3"></i>
                                    <span>Print</span>
                                </a>
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
                <div class="row">
                    @foreach ($groups as $group)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $group->group_name }}</h5>
                                <hr>
                                <p class="card-text mb-3">
                                    <strong>Kurs:</strong> {{ $group->courses->course_name }}<br>
                                    <strong>O'qituvchi:</strong> {{ $group->teachers->first_name }} {{ $group->teachers->last_name }}<br>
                                    <strong>Xona:</strong> {{ $group->room }}<br>
                                    <strong>Dars jadvali:</strong> {{ $group->day_table }}<br>
                                    <strong>Vaqt:</strong> {{ $group->time_table }}
                                </p>
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('groups.show', $group->id) }}" class="btn btn-primary btn-sm mr-2">O'quvchilar ro'yxati</a>
                                    <div class="btn-group">
                                        <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-secondary btn-sm mx-2">Tahrirlash</a>
                                        <form action="{{ route('groups.destroy', $group->id) }}" method="POST" class="ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Haqiqatdan ham ushbu guruhi o\'chirib tashlashni istaysizmi?')">O'chirish</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
    .card {
        transition: transform 0.2s, box-shadow 0.2s;
        border: none;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.3rem;
        color: #007bff;
        /* Bootstrap primary color */
    }

    .card-text strong {
        color: #6c757d;
        /* Bootstrap secondary color */
    }

    .btn-primary {
        background-color: #007bff;
        /* Bootstrap primary color */
        border-color: #007bff;
        /* Bootstrap primary color */
    }

    .btn-primary:hover {
        background-color: #0056b3;
        /* Slightly darker shade of primary color on hover */
        border-color: #0056b3;
        /* Slightly darker shade of primary color on hover */
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
<!-- End Main Content -->
<script>
    document.write(new Date().getFullYear());
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-branch');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const branchId = this.getAttribute('data-id');

                if (confirm('Haqiqatdan ham ushbu filialni o\'chirmoqchimisiz?')) {
                    fetch(`/branch/${branchId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => {
                        if (response.ok) {
                            alert('Filial muvaffaqiyatli o\'chirildi.');
                            location.reload();
                        } else {
                            alert('Filialni o\'chirishda xatolik yuz berdi.');
                        }
                    });
                }
            });
        });
    });
</script>

@endsection