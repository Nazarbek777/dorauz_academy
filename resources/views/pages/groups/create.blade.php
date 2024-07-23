@extends('layouts.layout')
@section('content')

    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            padding-top: 60px;
        }

        /* Modal Content */
        .modal-content {
            background-color: #ffffff;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 35%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            animation: fadeIn 0.5s;
        }

        /* The Close Button */
        .close {
            color: #333;
            float: right;
            font-size: 28px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top h2 {
            margin: 0;
        }

        .day {
            margin-bottom: 15px;
        }

        .inputs {
            display: flex;
            align-items: center;
        }

        .inputs .time {
            display: none;
            margin-left: 10px;
        }

        .time-input {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
        }

        .day input[type="checkbox"]:checked ~ .time {
            display: flex;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
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
                                            <div>
                                                <button id="openModal" type="button">Dars Jadvalini Belgilang</button>
                                                <div id="scheduleResult">
                                                    <table>
                                                        <thead>
                                                        <tr>
                                                            <th>Du</th>
                                                            <th>Se</th>
                                                            <th>Chor</th>
                                                            <th>Pay</th>
                                                            <th>Ju</th>
                                                            <th>Shan</th>
                                                            <th>Yak</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td id="mondaySchedule"></td>
                                                            <td id="tuesdaySchedule"></td>
                                                            <td id="wednesdaySchedule"></td>
                                                            <td id="thursdaySchedule"></td>
                                                            <td id="fridaySchedule"></td>
                                                            <td id="saturdaySchedule"></td>
                                                            <td id="sundaySchedule"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="myModal" class="modal">
                                                    <div class="modal-content">
                                                        <div class="top">
                                                            <h2>Dars Jadvalini Belgilang</h2>
                                                            <span class="close">&times;</span>
                                                        </div>
                                                        <form id="scheduleForm " class="">
                                                            <div class="  day d-flex justify-content-between">
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
                                            </div>
                                            <div class="mb-3">
                                                <label for="name">Ism:</label>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="description">Tavsif:</label>
                                                <textarea name="description" id="description" class="form-control"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price">Narx:</label>
                                                <input type="number" name="price" id="price" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="category">Kategoriya:</label>
                                                <select name="category" id="category" class="form-control">
                                                    <option value="1">Kategoriya 1</option>
                                                    <option value="2">Kategoriya 2</option>
                                                    <option value="3">Kategoriya 3</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Saqlash</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ! Karta tugashi ! -->
                    </div>
                    <!-- ! Asosiy Kontent ! -->
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Open modal
            const openModalButton = document.getElementById('openModal');
            const modal = document.getElementById('myModal');
            const closeModalButton = document.getElementsByClassName('close')[0];

            openModalButton.onclick = function() {
                modal.style.display = 'block';
            }

            closeModalButton.onclick = function() {
                modal.style.display = 'none';
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }

            // Handle form submission
            const scheduleForm = document.getElementById('scheduleForm');
            scheduleForm.onsubmit = function(event) {
                event.preventDefault();

                // Gather form data
                const formData = new FormData(scheduleForm);

                // Clear previous schedules
                document.getElementById('mondaySchedule').innerText = '';
                document.getElementById('tuesdaySchedule').innerText = '';
                document.getElementById('wednesdaySchedule').innerText = '';
                document.getElementById('thursdaySchedule').innerText = '';
                document.getElementById('fridaySchedule').innerText = '';
                document.getElementById('saturdaySchedule').innerText = '';
                document.getElementById('sundaySchedule').innerText = '';

                // Update schedule table
                if (formData.get('monday')) {
                    const start = formData.get('mondayStart');
                    const end = formData.get('mondayEnd');
                    document.getElementById('mondaySchedule').innerText = start + ' - ' + end;
                }
                if (formData.get('tuesday')) {
                    const start = formData.get('tuesdayStart');
                    const end = formData.get('tuesdayEnd');
                    document.getElementById('tuesdaySchedule').innerText = start + ' - ' + end;
                }
                if (formData.get('wednesday')) {
                    const start = formData.get('wednesdayStart');
                    const end = formData.get('wednesdayEnd');
                    document.getElementById('wednesdaySchedule').innerText = start + ' - ' + end;
                }
                if (formData.get('thursday')) {
                    const start = formData.get('thursdayStart');
                    const end = formData.get('thursdayEnd');
                    document.getElementById('thursdaySchedule').innerText = start + ' - ' + end;
                }
                if (formData.get('friday')) {
                    const start = formData.get('fridayStart');
                    const end = formData.get('fridayEnd');
                    document.getElementById('fridaySchedule').innerText = start + ' - ' + end;
                }
                if (formData.get('saturday')) {
                    const start = formData.get('saturdayStart');
                    const end = formData.get('saturdayEnd');
                    document.getElementById('saturdaySchedule').innerText = start + ' - ' + end;
                }
                if (formData.get('sunday')) {
                    const start = formData.get('sundayStart');
                    const end = formData.get('sundayEnd');
                    document.getElementById('sundaySchedule').innerText = start + ' - ' + end;
                }

                // Close modal
                modal.style.display = 'none';
            }
        });
    </script>
@endsection
