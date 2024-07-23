@extends('layouts.layout')
@section('content')
    <!--! ================================================================ !-->
    <!--! [Bosh] Asosiy Kontent !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ sahifa-sarlavhasi ] boshlanishi -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Guruhlar</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Bosh sahifa</a></li>
                        <li class="breadcrumb-item">Yangi guruh qo'shish</li>
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

                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ sahifa-sarlavhasi ] tugashi -->
            <!-- [ Asosiy Kontent ] boshlanishi -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-top-0">
                            <div class="card-header p-0">
                                <!-- Nav tablari -->
                                <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profileTab" role="tab">Profil</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#passwordTab" role="tab">Parol</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#billingTab" role="tab">To'lov va yetkazish</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#subscriptionTab" role="tab">Abonentlik</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#notificationsTab" role="tab">Bildirishnomalar</a>
                                    </li>
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#connectionTab" role="tab">Ulanish</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                        <form action="{{ route('groups.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="branch_id" class="form-label">Filial nomi</label>
                                                <select class="form-control" id="branch_id" name="branch_id" required>
                                                    @foreach($branches as $branch)
                                                        <option class="text-black" value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 d-none">
                                                <label for="enrollment_id" class="form-label">Ro'yxatdan o'tish</label>
                                                <select class="form-control" id="enrollment_id" name="enrollment_id" required>
                                                    @foreach($enrollments as $enrollment)
                                                        <option class="text-black" value="{{ $enrollment->id }}">{{ $enrollment->user->first_name }} {{ $enrollment->user->last_name }} {{ $enrollment->date }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="course_id" class="form-label">Kurs nomi</label>
                                                <select class="form-control" id="course_id" name="course_id" required>
                                                    @foreach($courses as $course)
                                                        <option class="text-black" value="{{ $course->id }}">{{ $course->course_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="teacher_id" class="form-label">O'qituvchi ismi familyasi</label>
                                                <select class="form-control text-black" id="teacher_id" name="teacher_id" required>
                                                    @foreach($teachers as $tm)
                                                        <option class="text-black" value="{{ $tm->id }}" class="text-black">{{ $tm->first_name }} {{ $tm->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="room" class="form-label">Xona</label>
                                                <input type="text" class="form-control" id="room" name="room" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="room" class="form-label">Guruh nomi</label>
                                                <input type="text" class="form-control" id="room" name="group_name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="days_of_week" class="form-label">Hafta kunlari</label>
                                                <select id="days_of_week" name="days_of_week[]" class="form-control" multiple required>
                                                    <option value="monday">Dushanba</option>
                                                    <option value="tuesday">Seshanba</option>
                                                    <option value="wednesday">Chorshanba</option>
                                                    <option value="thursday">Payshanba</option>
                                                    <option value="friday">Juma</option>
                                                    <option value="saturday">Shanba</option>
                                                    <option value="sunday">Yakshanba</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="start_time" class="form-label">Dars boshlanish vaqti</label>
                                                <input type="time" class="form-control" id="start_time" name="start_time" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="end_time" class="form-label">Dars tugash vaqti</label>
                                                <input type="time" class="form-control" id="end_time" name="end_time" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Guruh qo'shish</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="passwordTab" role="tabpanel">
                                    <div class="card-body pass-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Parol ma'lumotlari:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">24 soat ichida faqat ikki marta parolni o'zgartirishingiz mumkin! </span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Tiklash</a>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="Input" class="fw-semibold">Parol: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-key"></i></div>
                                                    <input type="password" class="form-control" id="Input" placeholder="Parol">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="Input" class="fw-semibold">Parolni tasdiqlash: </label>
                                            </div>
                                            <div class="col-lg-8 generate-pass">
                                                <div class="input-group field">
                                                    <div class="input-group-text"><i class="feather-key"></i></div>
                                                    <input type="password" class="form-control password" id="newPassword" placeholder="Parolni tasdiqlash">
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
                                            <p class="fw-bold">Parol talablari:</p>
                                            <ul class="fs-12 ps-1 ms-2 text-muted">
                                                <li class="mb-1">Kamida bir kichik harf</li>
                                                <li class="mb-1">Kamida 8 belgidan iborat - ko'proq, yaxshi</li>
                                                <li>Eng kamida bir raqam, belgi yoki bo'sh joyli belgi</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body pass-security">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Xavfsizlik sozlamalari:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Sizning hisobingizni ko'proq himoyalash uchun quyidagi sozlamalarni amalga oshiring. </span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Autentifikatsiyani tekshirish</a>
                                        </div>
                                        <div class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                            <div class="hstack me-4">
                                                <div class="avatar-text">
                                                    <i class="feather-shield"></i>
                                                </div>
                                                <div class="ms-4">
                                                    <a href="javascript:void(0);" class="fw-bold mb-1 text-truncate-1-line">Har 6 oyda parolni o'zgartirishni so'rang</a>
                                                    <div class="fs-12 text-muted text-truncate-1-line">Ma'lumot oqim va parol o'ziga yo'l qo'yma yoki parol o'zgartirish</div>
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
                                                <span class="d-block mb-2">To'lov manzili:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">To'lov usuliga bog'liq manzil.</span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Mijoz ma'lumoti bilan bir xil</a>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="addressInput_1" class="fw-semibold">Manzil: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                    <textarea class="form-control" id="addressInput_1" cols="30" rows="3" placeholder="Manzil"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="zipCodeInput" class="fw-semibold">Pochta indeksi: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-tag"></i></div>
                                                    <input type="number" class="form-control" id="zipCodeInput" placeholder="Pochta indeksi">
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
            <!-- [ Asosiy Kontent ] tugashi -->
        </div>
        <!-- [ Pastki qism ] boshlanishi -->

        <!-- [ Pastki qism ] tugashi -->
    </main>
    <!--! ================================================================ !-->
    <!--! [Bosh] Asosiy Kontent !-->
    <!--! ================================================================ !-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.max-select').select2({
                theme: 'bootstrap-5', // Select2-ni Bootstrap bilan birga ishlatish
                placeholder: 'Yo\'nalishlarni tanlang',
                allowClear: true
            });
        });
    </script>

@endsection
