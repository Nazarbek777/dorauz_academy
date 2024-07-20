@extends('layouts.layout')

@section('content')
    <!-- Main Content -->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- Page Header -->
            <div class="page-header">
                <!-- Breadcrumb -->
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Filiallar</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Yangi filial qo'shish</li>
                    </ul>
                </div>
                <!-- Page Header Right -->
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="btn btn-light-brand successAlertMessage">
                                <i class="feather-save me-2"></i>
                                <span>Shartnomani yuklab olish</span>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-plus me-2"></i>
                                <span>Yangi filial qo'shish</span>
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
                        <div class="card border-top-0">
                            <div class="card-header p-0">
                                <!-- Nav Tabs -->
                                <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profileTab" role="tab">Profile</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#passwordTab" role="tab">Password</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#billingTab" role="tab">Billing & Shipping</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#subscriptionTab" role="tab">Subscription</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#notificationsTab" role="tab">Notifications</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#connectionTab" role="tab">Connection</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <!-- Profile Tab -->
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                        <form action="{{ route('branch.store') }}" method="POST">
                                            @csrf
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="fullnameInput" class="fw-semibold">Filial nomini kiriting:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-user"></i></div>
                                                        <input type="text" class="form-control" id="fullnameInput" placeholder="Filial nomini kiriting" name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="phoneInput" class="fw-semibold">Telefon raqamini kiriting:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-phone"></i></div>
                                                        <input type="text" class="form-control" id="phoneInput" placeholder="Telefon raqamini kiriting" name="phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="phoneInput" class="fw-semibold">Ochilgan sanani kiriting:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-phone"></i></div>
                                                        <input type="date" class="form-control" id="phoneInput" placeholder="Ochilgan sanani kiriting" name="date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="regionSelect" class="fw-semibold">Viloyat tanlang:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control max-select" id="regionSelect" name="region_id">
                                                        <option value="" disabled selected>Viloyat tanlang</option>
                                                        @foreach ($regions as $region)
                                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="districtSelect" class="fw-semibold">Tuman tanlang:</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control max-select" id="districtSelect" name="district_id">
                                                        <option value="" disabled selected>Tuman tanlang</option>
                                                    </select>
                                                </div>
                                            </div>
                                                   <div class="row mb-4 align-items-center">
                                                        <div class="col-lg-4">
                                                            <label class="fw-semibold">Status:</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <select name="status" class="form-control" data-select2-selector="status">
                                                                <option value="Active" >Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                                <option value="Declined" >Declined</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            <button type="submit" class="btn btn-primary">Saqlash</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Password Tab -->
                                <div class="tab-pane fade" id="passwordTab" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <!-- Password Form -->
                                        <form>
                                            <!-- Form Fields -->
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="InputPassword" class="fw-semibold">Password: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-key"></i></div>
                                                        <input type="password" class="form-control" id="InputPassword" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Form Buttons -->
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <button type="submit" class="btn btn-primary">Save Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Billing & Shipping Tab -->
                                <div class="tab-pane fade" id="billingTab" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <!-- Billing & Shipping Form -->
                                        <form>
                                            <!-- Form Fields -->
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="InputAddress" class="fw-semibold">Address: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                        <textarea class="form-control" id="InputAddress" cols="30" rows="3" placeholder="Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="InputZipCode" class="fw-semibold">Zip Code: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-tag"></i></div>
                                                        <input type="number" class="form-control" id="InputZipCode" placeholder="Zip Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Form Buttons -->
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <button type="submit" class="btn btn-primary">Save Address</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Custom Script -->
    <script>
        $(document).ready(function() {
            // Initialize Select2 for region and district selects
            $('.max-select').select2({
                theme: 'bootstrap-5',
                placeholder: 'Tanlang...',
                allowClear: true
            });

            // Handle region change event
            $('#regionSelect').change(function() {
                var regionId = $(this).val();
                if(regionId) {
                    $.ajax({
                        url: '{{ url("/get-districts/") }}' + '/' + regionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#districtSelect').empty().append('<option value="" disabled selected>Select a district</option>');
                            $.each(data, function(key, district) {
                                $('#districtSelect').append('<option value="'+ district.id +'">'+ district.name +'</option>');
                            });
                        }
                    });
                } else {
                    $('#districtSelect').empty().append('<option value="" disabled selected>Select a district</option>');
                }
            });
        });
    </script>
@endsection
