@extends('layouts.layout')

@section('content')

    <!-- Start Main Content -->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Users</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item">User List</li>
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
                            <!-- Dropdown for Filters -->
                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-filter"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-eye me-3"></i>
                                        <span>All</span>
                                    </a>
                                    <!-- Add more filter options as needed -->
                                </div>
                            </div>
                            <!-- Link to Create New User -->
                            <a href="route('register')" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>O`quvchi qo`shish</span>
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
                                    <table class="table table-hover" id="userList">
                                        <thead>
                                        <tr>
                                            <th class="wd-30">
                                                <div class="btn-group mb-1">
                                                    <div class="custom-control custom-checkbox ms-1">
                                                        <input type="checkbox" class="custom-control-input" id="checkAllUser">
                                                        <label class="custom-control-label" for="checkAllUser"></label>
                                                    </div>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Ism familyasi</th>
                                              <th>Filial nomi</th>
                                            <th>Telefon raqami</th>
                                        
                                            <th>Role</th>
                                            <th class="text-start">Sozlamalar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $user)
                                        
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="checkBox_{{ $user->id }}">
                                                        <label class="custom-control-label" for="checkBox_{{ $user->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                                <td> 
                                                 @if ($user->branch)
                                                        <p>{{ $user->branch->name }}</p> <!-- Filial nomi -->
                                                    @else
                                                        <p>Filial topilmadi</p>
                                                    @endif 
                                                </td>
                                                <td>{{ $user->phone_number }}</td>
                                           
                                                <td>  
                                                   @if($user->role== 0)
                                                      admin
                                                      @elseif($user->role== 1)
                                                      o'quchi
                                                      @elseif($user->role== 2)
                                                      o'qituvchi
                                                      @endif
                                                </td>
                                                <td class="d-flex mt-2 ">
                                           
                                                        <a href="{{ route('user.edit', $user->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather-edit-3"></i>
                                                        </a>
                                                        <form id="deleteForm" action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="deleteButton" class="avatar-text avatar-md delete-user text-dark" type="submit"><i class="feather-trash-2"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        <div class="mt-3 mx-2"> 
                        
                         {{$users->links()}}
                        </div>
                        </div>
                           
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
       
    </main>
    <!-- End Main Content -->

@endsection
