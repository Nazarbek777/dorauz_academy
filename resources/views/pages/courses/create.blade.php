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
                        <h5 class="m-b-10">Filiallar</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Yangi filial qo'shish</li>
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
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-top-0">
                            <div class="card-header p-0">
                                <!-- Nav tabs -->
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
                                    <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                        <div class="card-body personal-info">
                                            <form action="{{ route('courses.store') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="course_name" class="form-label">Kurs nomi</label>
                                                    <input type="text" class="form-control" id="course_name" name="course_name" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="duration" class="form-label">Davomayligi (Oy da )</label>
                                                    <input type="number" class="form-control" id="duration" name="duration" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cost" class="form-label">Narxi (so'm da )</label>
                                                    <input type="number" class="form-control" id="cost" name="cost" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Kiritish</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="passwordTab" role="tabpanel">
                                        <div class="card-body pass-info">
                                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                                <h5 class="fw-bold mb-0 me-4">
                                                    <span class="d-block mb-2">Password Information:</span>
                                                    <span class="fs-12 fw-normal text-muted text-truncate-1-line">You can only change your password twice within 24 hours! </span>
                                                </h5>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Reset</a>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="Input" class="fw-semibold">Password: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-key"></i></div>
                                                        <input type="password" class="form-control" id="Input" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="Input" class="fw-semibold">Password Confirm: </label>
                                                </div>
                                                <div class="col-lg-8 generate-pass">
                                                    <div class="input-group field">
                                                        <div class="input-group-text"><i class="feather-key"></i></div>
                                                        <input type="password" class="form-control password" id="newPassword" placeholder="Password Confirm">
                                                        <div class="input-group-text c-pointer gen-pass"><i class="feather-hash"></i></div>
                                                        <div class="input-group-text border-start bg-gray-2 c-pointer show-pass"><i></i></div>
                                                    </div>
                                                    <div class="progress-bar mt-2">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pass-hint">
                                                <p class="fw-bold">Password Requirements:</p>
                                                <ul class="fs-12 ps-1 ms-2 text-muted">
                                                    <li class="mb-1">At least one lowercase character</li>
                                                    <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                                    <li>At least one number, symbol, or whitespace character</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr class="my-0">
                                        <div class="card-body pass-security">
                                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                                <h5 class="fw-bold mb-0 me-4">
                                                    <span class="d-block mb-2">Security preferences:</span>
                                                    <span class="fs-12 fw-normal text-muted text-truncate-1-line">Keep your account more secure with following preferences. </span>
                                                </h5>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Check Auth</a>
                                            </div>
                                            <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                                <div class="hstack me-4">
                                                    <div class="avatar-text">
                                                        <i class="feather-shield"></i>
                                                    </div>
                                                    <div class="ms-4">
                                                        <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Ask to change password on every 6 months</a>
                                                        <div class="fs-12 text-muted text-truncate-1-line">A simple but an effective way to be protected against data leaks and password theft.</div>
                                                    </div>
                                                </div>
                                                <div class="form-check form-switch form-switch-sm">
                                                    <label class="form-check-label fw-500 text-dark c-pointer" for="formSwitchPassChange"></label>
                                                    <input class="form-check-input c-pointer" type="checkbox" id="formSwitchPassChange">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="billingTab" role="tabpanel">
                                        <div class="card-body pass-info">
                                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                                <h5 class="fw-bold mb-0 me-4">
                                                    <span class="d-block mb-2">Billing Address:</span>
                                                    <span class="fs-12 fw-normal text-muted text-truncate-1-line">A billing address is the address associated with a payment method.</span>
                                                </h5>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Same as Customer Info</a>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="addressInput_1" class="fw-semibold">Address: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                        <textarea class="form-control" id="addressInput_1" cols="30" rows="3" placeholder="Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="zipCodeInput" class="fw-semibold">Zip Code: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-tag"></i></div>
                                                        <input type="number" class="form-control" id="zipCodeInput" placeholder="Zip Code">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-0">
                                    </div>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.max-select').select2({
                theme: 'bootstrap-5',  // Select2-ni Bootstrap bilan birga ishlatish
                placeholder: 'Yo\'nalishlarni tanlang',
                allowClear: true
            });
        });
    </script>

    @endsection
