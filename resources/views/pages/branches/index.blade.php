@extends('layouts.layout')

@section('content')

<!-- Start Main Content -->
<main class="nxl-container">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Filiallar</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Filiallar ro'yhati</li>
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
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
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
                        <div class="dropdown">
                            <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                <i class="feather-paperclip"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end d-none">
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
                        <a href="{{ route('branch.create') }}" class="btn btn-primary">
                            <i class="feather-plus me-2"></i>
                            <span>Filial yaratish</span>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover" id="branchList">
                                    <thead>
                                        <tr>
                                            <th class="wd-30">
                                                <div class="btn-group mb-1">
                                                    <div class="custom-control custom-checkbox ms-1">
                                                        <input type="checkbox" class="custom-control-input" id="checkAllBranch">
                                                        <label class="custom-control-label" for="checkAllBranch"></label>
                                                    </div>
                                                </div>
                                            </th>
                                            <th>Nomi</th>
                                            <th>Viloyat</th>
                                            <th>Tuman</th>
                                            <th>Telefon</th>
                                            <th>Status</th>
                                            <th class="text-center">Sozlamalar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($branches as $branch)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkBox_{{ $branch->id }}">
                                                    <label class="custom-control-label" for="checkBox_{{ $branch->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('branch.show', $branch->id) }}" class="hstack gap-3">
                                                    <div>
                                                        <span class="text-truncate-1-line">{{ $branch->name }}</span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><a href="#">{{ $branch->region->name ?? null }}</a></td>
                                            <td><a href="#">{{ $branch->district->name ?? null }}</a></td>

                                            <td><a href="tel:">{{ $branch->phone }}</a></td>
                                            <td>

                                                <select class="form-control" data-select2-selector="status" disabled>
                                                    @if($branch->status=='Active')
                                                    <option value="success" data-bg="bg-success" selected>{{$branch->status}}</option>
                                                    @endif
                                                    @if($branch->status=='Inactive')
                                                    <option value="warning" data-bg="bg-warning">Inactive
                                                    </option>
                                                    @endif
                                                    @if($branch->status=='Declined')
                                                    <option value="danger" data-bg="bg-danger">Declined</option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td>
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="{{ route('branch.show', $branch->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="{{ route('branch.edit', $branch->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather-edit-3"></i>
                                                    </a>
                                                    <form action="{{ route('branch.destroy', $branch->id) }}" method="POST" onsubmit="return confirm('Ochirishga ruxsat berasizmi')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="avatar-text avatar-md delete-branch text-dark"><i class="feather-trash-2"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="">
                    {{ $branches->links() }}
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
  
</main>
<!-- End Main Content -->
<script>
    document.write(new Date().getFullYear());
</script>

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
        background-color: #0f172a;
        /* Black background */
        color: #fff;
        /* White text */
        border-color: #000;
        /* Black border */
    }

    .pagination .page-link:hover {
        background-color: #555;
        /* Darker shade on hover */
        color: #fff;
        /* White text on hover */
        border-color: #000;
        /* Black border on hover */
    }

    .pagination .page-item.active .page-link {
        background-color: #000;
        /* Darker shade for active page */
        border-color: #000;
        /* Black border for active page */
    }
</style>
@endsection