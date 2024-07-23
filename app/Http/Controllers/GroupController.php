<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Attendance;
use App\Models\Branch;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Enrollment_group;
use App\Models\StudentRegister;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    // Get monthly attendance for a specific group
    public function getMonthAttendance(Request $request)
    {
        \Log::info('getMonthAttendance called with request:', $request->all());

        try {
            $month = $request->input('month');
            $startOfMonth = Carbon::parse($month . '-01');
            $daysInMonth = $startOfMonth->daysInMonth;
            $monthName = $startOfMonth->format('M');

            $group = Group::findOrFail($request->group_id);
            $students = $group->enrollments;
            $attendanceData = [];

            foreach ($students as $student) {
                $attendance = [];
                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $currentDate = $startOfMonth->copy()->addDays($day - 1)->toDateString();
                    $studentAttendance = Attendance::where('student_id', $student->id)
                        ->whereDate('date', $currentDate)
                        ->first();
                    $status = $studentAttendance ? $studentAttendance->status : '-';
                    $attendance[] = $status;
                }
                $attendanceData[] = [
                    'id' => $student->id,
                    'name' => $student->first_name . ' ' . $student->last_name,
                    'attendance' => $attendance,
                ];
            }

            return response()->json([
                'daysInMonth' => $daysInMonth,
                'monthName' => $monthName,
                'attendanceData' => $attendanceData,
            ]);
        } catch (\Exception $e) {
            dd($request->all());

            return response()->json(['error' => 'Internal Server Error Quvonchbek'], 500);
        }
    }

    // Display a listing of groups
    public function index()
    {
        $groups = Group::orderBy('created_at', 'desc')->paginate(9);
        return view('pages.groups.index', compact('groups'));
    }

    // Show the form for creating a new group
    public function create()
    {
        $teachers = User::where('role', 2)->get();
        $branches = Branch::all();
        $enrollments = Enrollment::all();
        $courses = Course::all();
        return view('pages.groups.create', compact('branches', 'enrollments', 'courses', 'teachers'));
    }

    // Store a newly created group in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'enrollment_id' => 'nullable|exists:enrollments,id',
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:users,id',
            'room' => 'nullable',
            'day_table' => 'nullable',
            'time_table' => 'nullable',
            'group_name' => 'nullable',
        ]);

        Group::create($validated);

        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    // Display the specified group
    public function show($id)
    {
        $group = Group::with(['courses', 'teachers', 'enrollments' => function ($query) {
            $query->withPivot('date');
        }])->findOrFail($id);

        return view('pages.groups.show', compact('group'));
    }

    // Show the form for adding students to a group
    public function studentStoreGet($id)
    {
        $group = Group::find($id);
        $students = StudentRegister::all();
        return view('pages.groups.studentStore', compact('group', 'students'));
    }

    // Store students in a group
    public function studentStore(Request $request)
    {
        $validated = $request->validate([
            'students' => 'required|array',
            'students.*' => 'exists:users,id',
            'group_id' => 'required|exists:groups,id',
            'date' => 'nullable|date'
        ]);

        $group = Group::findOrFail($request->group_id);

        // Ensure all students exist in student_registers table
        $studentsExist = DB::table('student_registers')
            ->whereIn('id', $validated['students'])
            ->pluck('id')
            ->toArray();

        if (count($studentsExist) !== count($validated['students'])) {
            return redirect()->back()->withErrors(['students' => 'One or more student IDs are invalid.']);
        }

        $currentEnrollments = $group->enrollments()->pluck('student_register_id')->toArray();
        $studentsToAttach = array_diff($validated['students'], $currentEnrollments);

        if (!empty($studentsToAttach)) {
            $attachData = [];
            foreach ($studentsToAttach as $studentId) {
                $attachData[$studentId] = ['date' => $validated['date']];
            }
            $group->enrollments()->attach($attachData);
        }

        return redirect()->route('groups.show', $group->id)->with('success', 'Students added successfully.');
    }




    // Remove a students from a group
    public function removeStudent(Request $request, $groupId, $studentId)
    {
        $group = Group::findOrFail($groupId);
        $group->enrollments()->detach($studentId);
        return redirect()->route('groups.show', $groupId)->with('success', 'Student removed successfully.');
    }

    // Show the form for editing a group
    public function edit(Group $group)
    {
        $branches = Branch::all();
        $enrollments = Enrollment::all();
        $courses = Course::all();
        $teachers = User::where('role', 2)->get();
        return view('pages.groups.edit', compact('group', 'branches', 'enrollments', 'teachers', 'courses'));
    }

    // Update the specified group in storage
    public function update(Request $request, Group $group)
    {
        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'enrollment_id' => 'nullable|exists:enrollments,id',
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:users,id',
            'room' => 'nullable',
            'day_table' => 'nullable',
            'time_table' => 'nullable',
            'group_name' => 'nullable',
        ]);

        $group->update($validated);

        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    // Remove the specified group from storage
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }

    // Search for students
    public function searchStudents(Request $request)
    {
        $query = $request->get('query', '');

        if ($query) {
            $students = User::where('first_name', 'LIKE', "%{$query}%")
                ->orWhere('last_name', 'LIKE', "%{$query}%")
                ->get(['id', 'first_name', 'last_name']);
        } else {
            $students = User::all(['id', 'first_name', 'last_name']);
        }

        return response()->json($students);
    }

    // Show attendance for a group
    public function studentAttendance($id)
    {
        $currentDate = Carbon::now()->toDateString();
        $group = Group::find($id);
        $students = $group->enrollments;
        return view('pages.groups.attendance', compact('group', 'students', 'currentDate'));
    }

    // Store attendance for a group
    public function storeAttendance(Request $request)
    {
        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*' => 'in:1,2,3',
        ]);

        $group = Group::findOrFail($validated['group_id']);

        foreach ($validated['attendance'] as $studentId => $status) {
            Attendance::updateOrCreate(
                ['group_id' => $group->id, 'student_id' => $studentId, 'date' => $validated['date']],
                ['status' => $status]
            );
        }

        return redirect()->route('showAttendance', $group->id)->with('success', 'Attendance recorded successfully.');
    }

    // Show attendance view for a group
    public function showAttendance($id)
    {
        $group = Group::findOrFail($id);
        $students = $group->enrollments;
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $attendance = Attendance::whereBetween('date', [$startOfMonth, $endOfMonth])->get();

        return view('pages.groups.showAttendance', compact('group', 'students', 'attendance', 'startOfMonth', 'endOfMonth'));
    }
}
