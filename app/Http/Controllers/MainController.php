<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Branch;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Enrollment_group;
use App\Models\StudentRegister;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
public function index() {
    $groups = Group::with('branch')->orderBy('created_at', 'desc')->paginate(8);
    $last_groups = Group::with('branch')->orderBy('created_at', 'desc')->paginate(4);
    $students = StudentRegister::orderBy('created_at', 'desc')->paginate(4);
    $branches = Branch::orderBy('created_at', 'desc')->paginate(6);

    $amoun_of_group = Group::count();
    $amoun_of_branch = Branch::count();
    $amoun_of_course = Course::count();

    $amount = [
        'amoun_of_group' => $amoun_of_group,
        'amoun_of_branch' => $amoun_of_branch,
        'amount_of_course' => Course::count(),
        'amount_of_teacher' => User::where('role', 2)->count(),
        'amount_of_student' => StudentRegister::count(),
        'amount_of_admin' => User::where('role', 0)->count(),

    ];
    return view('pages.home', compact('groups','last_groups', 'students', 'branches', 'amount'));
}



}
