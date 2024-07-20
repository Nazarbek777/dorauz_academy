@extends('layouts.layout')

@section('content')
<!-- [Start] Main Content -->
<main class="nxl-container">
    <div class="nxl-content">
        <!-- page-header start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Edit Branch</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Filialni tahrirlash</li>
                </ul>
            </div>
        </div>
        <!-- page-header end -->
        <!-- Main Content start -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-top-0">
                        <div class="card-body personal-info">
                            <form action="{{ route('branch.update', $branch->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="fullnameInput" class="fw-semibold">Filial nomini tahrirlash:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <input type="text" class="form-control" id="fullnameInput" placeholder="Filial nomini kiriting" name="name" value="{{ $branch->name }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="phoneInput" class="fw-semibold">Telefon raqamini tahrirlash:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-phone"></i></div>
                                            <input type="text" class="form-control" id="phoneInput" placeholder="Telefon raqamini kiriting" name="phone" value="{{ $branch->phone }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="dateInput" class="fw-semibold">Ochilgan sanani tahrirlash:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-calendar"></i></div>
                                            <input type="date" class="form-control" id="dateInput" placeholder="Ochilgan sanani kiriting" name="date" value="{{ $branch->date }}" required>
                                        </div>
                                    </div>
                                </div>

                                                    <div class="row mb-4 align-items-center">
                                <div class="col-lg-4">
                                <label for="regionSelect" class="fw-semibold">Viloyatni tahrirlash:</label>
                                </div>
                                <div class="col-lg-8">
                                <div class="select-wrapper">
                                    <select class="form-control max-select" id="regionSelect" name="region_id" required>
                                        <option value="" disabled>Viloyat tanlang</option>
                                        <i class="fas fa-map-marker-alt"></i>
                                        @foreach ($regions as $region)
                                            <option class="text-black" value="{{ $region->id }}" {{ $branch->region_id == $region->id ? 'selected' : '' }}>
                                            
                                                {{ $region->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label for="districtSelect" class="fw-semibold">Tuman tanlang:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select class="form-control max-select" id="districtSelect" name="district_id" required>
                                            <option value="" disabled selected>Tuman tanlang</option>
                                            @foreach ($districts as $district)
                                                <option class="text-black" value="{{ $district->id }}" {{ $branch->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4">
                                        <label class="fw-semibold">Statusni tahrirlash:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select name="status" class="form-control" data-select2-selector="status" required>
                                            <option value="Active" {{ $branch->status == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ $branch->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            <option value="Declined" {{ $branch->status == 'Declined' ? 'selected' : '' }}>Declined</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Saqlash</button>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content end -->
    </div>
    <!-- Footer start -->

    <!-- Footer end -->
</main>
<!-- End Main Content -->

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2 for regions
        $('#regionSelect').select2({
            theme: 'bootstrap-5',
            placeholder: 'Viloyatni tanlang',
            allowClear: true
        });

        // On change event for regions select
        $('#regionSelect').on('change', function() {
            var regionId = $(this).val();
            if (regionId) {
                // AJAX request to fetch districts based on selected region ID
                $.ajax({
                    url: '/api/districts/' + regionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#districtSelect').empty();
                        $('#districtSelect').append('<option value="" disabled selected>Tuman tanlang</option>');
                        $.each(data, function(key, value) {
                            $('#districtSelect').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching districts:', error);
                    }
                });
            } else {
                $('#districtSelect').empty();
                $('#districtSelect').append('<option value="" disabled selected>Tuman tanlang</option>');
            }
        });

        // Initialize Select2 for districts
        $('#districtSelect').select2({
            theme: 'bootstrap-5',
            placeholder: 'Tuman tanlang',
            allowClear: true
        });
    });
</script>

@endsection
