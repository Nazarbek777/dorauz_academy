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
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Analitikalar</li>
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
                        <div class="d-none d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <div class="dropdown filter-dropdown">
                                <a class="btn btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-filter me-2"></i>
                                    <span>Filter</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Role" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Role">Role</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Team" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Team">Team</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Email" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Email">Email</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Member" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Member">Member</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Recommendation" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Recommendation">Recommendation</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-plus me-3"></i>
                                        <span>Create New</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-filter me-3"></i>
                                        <span>Manage Filter</span>
                                    </a>
                                </div>
                            </div>
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
                
                <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">O'qituvchilar</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$amount['amount_of_teacher']}} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 text-success">
                                        <i class="feather-arrow-up-circle fs-12"></i>
                                        <span>+20.36%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">Kurslar</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$amount['amount_of_course']}} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 text-success">
                                        <i class="feather-arrow-up-circle fs-12"></i>
                                        <span>+20.36%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">Guruhlar</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$amount['amoun_of_group']}} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 text-success">
                                        <i class="feather-arrow-up-circle fs-12"></i>
                                        <span>+20.36%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">Filiallar</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$amount['amoun_of_branch']}} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 text-success">
                                        <i class="feather-arrow-up-circle fs-12"></i>
                                        <span>+20.36%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">Xodimlar</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$amount['amount_of_student']}} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 text-success">
                                        <i class="feather-arrow-up-circle fs-12"></i>
                                        <span>+20.36%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">O‘quvchilar</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">{{$amount['amount_of_student']}} </span>ta</h3>
                                    <div class="hstack gap-2 fs-11 text-success">
                                        <i class="feather-arrow-up-circle fs-12"></i>
                                        <span>+20.36%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Mini Cards] start -->
                <!--     @foreach($branches as $branch)
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="fs-12 fw-medium text-muted mb-3">{{$branch->name}}</div>
                                <div class="hstack justify-content-between lh-base">
                                    <h3><span class="counter">32</span>ta</h3>
                                    <div class="hstack gap-2 fs-11 text-success">
                                        <i class="feather-arrow-up-circle fs-12"></i>
                                        <span>+20.36%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach -->
                    <!-- [Mini Cards] end -->
                    <!-- [Inquiry Tracking] start -->
                    <div class="col-xxl-6 d-none">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">O'quvchilarning umumiy o'sish statistikasi</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action">
                                <div id="leads-inquiry-tracking"></div>
                            </div>
                        </div>
                    </div>
                    <!-- [Inquiry Tracking] end -->
                    <!-- [Inquiry Channel] start -->
                    <div class="col-xxl-6 d-none">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Inquiry Channel</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action">
                                <div id="leads-inquiry-channel"></div>
                            </div>
                        </div>
                    </div>
                    <!-- [Inquiry Channel] end -->
                    <!-- [Leads Status] start -->
                    <div class="col-xxl-6">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">O‘quvchilar</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Ism Familiya</th>
                                                <th scope="col" >Filial</th>
                                            
                                                <th scope="col">Kelgan sanasi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td class="position-relative">
                                                    <div class="ht-50 position-absolute start-0 top-50 translate-middle border-start border-5 border-success rounded"></div>
                                                    <a href="javascript:void(0);">{{$user->last_name}} {{$user->first_name}}</a>
                                                </td>
                                                <td>
                                                   {{$user->branch->name ??  'Filial kiritilmagan'}}
                                                </td>
                                               
                                                <td>
                                                    <a href="javascript:void(0)" class="badge bg-soft-success text-success">{{$user->created_at}}</a>
                                                    
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Leads Status] end -->
                    <!-- [Upcoming Events] start -->
                    <div class="col-xxl-6">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Guruhlar</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <ul class="list-group list-group-flush upcoming-event-report-lead">
                                @foreach($last_groups as $group)
                                    <li class="list-group-item">
                                        <div class="d-sm-flex justify-content-between">
                                            <div class="hstack gap-3">
                                                <div class="ht-60 wd-60 border bg-gray-200 rounded-3 d-flex flex-column justify-content-center text-center">
                                                   <span class="fs-18 fw-bolder text-dark">{{ $group->created_at->format('d') }}</span>
                                                  <span class="fs-10 text-uppercase">{{ $group->created_at->format('M') }}</span>

                                                </div>
                                                <div class="me-4">
                                                    <p class="fs-12 fw-medium text-muted mb-2">{{$group->courses->course_name}} / {{$group->time_table}}</p>
                                                    <a href="javascript:void(0);" class="fw-bold text-truncate-1-line">{{$group->branch->name}}</a>
                                                </div>
                                            </div>
                                            <div class="img-group lh-0 ms-2 justify-content-start d-none d-sm-flex">
                                               
                                                <a href="javascript:void(0)" class="avatar-text" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Explorer More">{{ $group->enrollments->count() }} </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- [Upcoming Events] end -->
                    <!-- [Project Leads] start -->
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Guruh statistikalari</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action">
                                
                                @foreach ($groups as $group)
                                <div class="row g-0 align-items-center border border-dashed rounded-3 mb-4">
                                    <div class="col-lg-4">
                                        <div class="d-lg-flex align-items-center">
                                            <div class="m-3 wd-150 d-flex flex-column justify-content-center align-items-center text-center">
                                                <div class="p-3 wd-150 bg-soft-primary text-primary rounded-top">
                                                   
                                                         <a href="{{ route('studentStoreGet', $group->id) }}">
                                                             <i class="feather-user-plus"></i>
                                                        </a>
                                                </div>
                                                <div class="p-4 text-white wd-150 bg-primary rounded-bottom">
                                                    <div class="fs-16 fw-bold">{{ $group->enrollments->count() }} ta</div>
                                                    <div class="fs-12 fw-medium">O'quvchilar soni</div>
                                                </div>
                                            </div>
                                            <div class="px-3">
                                                <a href="javascript:void(0);" class="fs-14 fw-bold text-truncate-1-line">{{ $group->group_name }} <span class="badge bg-gray-200 text-dark ms-2">MX-{{ $group->created_at }}</span></a>
                                                <div class="fs-12 mt-3">
                                                    <div class="hstack gap-2 text-muted mb-2">
                                                        <div class="avatar-text avatar-sm">
                                                            <i class="feather-phone-call"></i>
                                                        </div>
                                                        <span class="text-truncate-1-line">{{ $group->branch->phone }}</span>
                                                    </div>
                                                    <div class="hstack gap-2 text-muted mb-2">
                                                        <div class="avatar-text avatar-sm">
                                                            <i class="feather-book"></i>
                                                        </div>
                                                        <span class="text-truncate-1-line">{{ $group->courses->course_name }}</span>
                                                    </div>
                                                    <div class="hstack gap-2 text-muted mb-3">
                                                        <div class="avatar-text avatar-sm">
                                                            <i class="feather-map-pin"></i>
                                                        </div>
                                                        <span class="text-truncate-1-line"> {{ $group->branch->name }}</span>
                                                      
                                                    </div>
                                                    
                                                    <a href="{{ route('groups.show', $group->id) }}" class="hstack gap-2 lh-sm">
                                                        <span>
                                                            <i class="feather-more-horizontal"></i>
                                                        </span>
                                                        <span>Batafsil </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 offset-lg-2 p-3">
                                        <div class="row gy-4 gx-5 align-items-center">
                                            <div class="col-lg-6 col-xl-4">
                                                <div class="mb-4">
                                                    <label class="fs-12 text-muted">Kurs narxi (UZS)</label>
                                                    <div class="fs-14 fw-bold text-dark">{{$group->courses->cost}} ming</div>
                                                </div>
                                            
                                            </div>
                                            <div class="col-lg-6 col-xl-4">
                                                <div class="form-group mb-4">
                                                    <label class="fs-12 text-muted mb-2">Guruh statusini boshqarish</label>
                                                    <select class="form-control" data-select2-selector="status" disabled>
                                                        <option value="primary" data-bg="bg-danger" disabled>Yopish</option>
                                                        <option value="secondary" data-bg="bg-primary" disabled>Vaqtincha to'xtatish</option>
                                                        <option value="success" data-bg="bg-success" selected>Ochiq</option>
                                                    </select>
                                                </div>
                                                <div class="hstack gap-2">
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md">
                                                        <i class="feather-camera"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md">
                                                        <i class="feather-clipboard"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md">
                                                        <i class="feather-grid"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="avatar-text avatar-md">
                                                        <i class="feather-more-vertical"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 d-lg-none d-xl-block">
                                                <div class=" text-start text-lg-end" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="55"><svg version="1.1" width="120" height="120" viewBox="0 0 100 100" class="circle-progress"><circle class="circle-progress-circle" cx="50" cy="50" r="47" fill="none" stroke="#ddd" stroke-width="8"></circle><path d="M 50 3 A 47 47 0 1 1 35.47620126437745 94.69965626587222" class="circle-progress-value" fill="none" stroke="#00E699" stroke-width="8"></path><text class="circle-progress-text" x="50" y="50" font="16px Arial, sans-serif" text-anchor="middle" fill="#999" dy="0.4em"> {{ number_format($group->courses->cost * $group->enrollments->count(), 0, ',', ',') }} ming</text></svg></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach 
                                {{$groups->links()}}
                            </div>
                        </div>
                    </div>
                    <!-- [Project Leads ] end -->
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        <x-footer></x-footer>
        <!-- [ Footer ] end -->
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    
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
    @endsection