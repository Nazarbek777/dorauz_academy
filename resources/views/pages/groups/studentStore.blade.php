@extends('layouts.layout')

@section('content')
<style>
    /* Custom styles for date input */
    input[type="date"] {
        color: white;
        /* Set the text color to white */
        background-color: #495057;
        /* Set the background color */
        border: 1px solid #ced4da;
        /* Set border color */
        border-radius: 4px;
        /* Add border radius */
        padding: 0.375rem 0.75rem;
        /* Adjust padding */
    }

    /* Style the calendar icon inside input group */
    .input-group-text {
        background-color: #495057;
        /* Match background color */
        border: 1px solid #ced4da;
        /* Match border color */
        color: white;
        /* Set icon color to white */
        border-radius: 0 4px 4px 0;
        /* Rounded border on the right */
    }

    /* Override Bootstrap's default input group focus style */
    .input-group-text:focus-within {
        box-shadow: none;
        /* Remove focus box shadow */
    }

    /* Override default date input appearance */
    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
        /* Invert the calendar icon */
    }
</style>

<!-- Start Main Content -->
<main class="nxl-container">
    <div class="nxl-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Guruhga talabalar qo'shish</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('groups.index') }}">Guruhlar ro'yxati</a></li>
                    <li class="breadcrumb-item active">Talabalar qo'shish</li>
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
                                <h5 class="card-title">Talabalarni tanlang</h5>
                                <hr>

                                <form action="{{ route('studentStore') }}" method="POST">
                                    @csrf



                                    <div class="mb-3">
                                        <label for="studentsSelect" class="form-label">Tanlangan talabalar</label>
                                        <select class="form-select" id="studentsSelect" name="students[]" multiple required style="width: 100%;">
                                            @foreach($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Ro'yhatdan o'tish sanasi</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-calendar3"></i>
                                            </span>
                                            <input type="date" id="date" name="date" class="form-control" required>

                                        </div>
                                    </div>

                                    <input type="hidden" name="group_id" value="{{ $group->id }}">

                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary"><i class="feather-plus me-2"></i>Talabalar qo'shish</button>
                                        <a href="{{ route('groups.show', $group->id) }}" class="btn btn-secondary"><i class="feather-arrow-left me-2"></i>Bekor qilish</a>
                                    </div>
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

<!-- Initialize Select2 and AJAX Search -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />


<script>
    $(document).ready(function() {
        // Select2 ni tekshiruvchi elementda boshlang'ich qo'ldan Select2
        $('#studentsSelect').select2({
            placeholder: "Talabalar tanlang",
            allowClear: true,
            width: '100%' // To'liq ekran eni
        });

        // Talaba qidirishini boshlash
        $('#studentInput').on('input', function() {
            var query = $(this).val();
            $.ajax({
                url: '{{ route("students.search") }}',
                method: 'GET',
                data: {
                    query: query
                },
                success: function(data) {
                    // Hozirgi variantlarni tozalash
                    $('#studentsSelect').empty();

                    // Qidirish natijalariga qarab yangi variantlarni qo'shish
                    $.each(data, function(key, student) {
                        $('#studentsSelect').append('<option value="' + student.id + '">' + student.first_name + ' ' + student.last_name + '</option>');
                    });

                    // O'zgarishlarni qo'llab-quvvatlash uchun Select2-ni yangilash
                    $('#studentsSelect').trigger('change');
                }
            });
        });

        // Select2 ichidagi matn rangini ta'minlash
        $('.select2-container--default .select2-results__option').css('color', 'black');
    });
</script>
@endsection