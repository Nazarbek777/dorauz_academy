<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = Branch::all();
        $courses = Course::all();
        $teachers = User::where('role', 2)->get();
        $enrollments = Enrollment::all();

        $groupCount = 0;

        // Ensure we have enough records to create 10 groups
        if ($branches->isEmpty() || $courses->isEmpty() || $teachers->isEmpty() || $enrollments->isEmpty()) {
            return;
        }

        // Shuffle collections to get random elements
        $branches = $branches->shuffle();
        $courses = $courses->shuffle();
        $teachers = $teachers->shuffle();
        $enrollments = $enrollments->shuffle();

        foreach ($branches as $branch) {
            foreach ($courses as $course) {
                foreach ($teachers as $teacher) {
                    if ($groupCount >= 10) {
                        return; // Stop once we have 10 groups
                    }

                    $group = new Group([
                        'branch_id' => $branch->id,
                        'course_id' => $course->id,
                        'teacher_id' => $teacher->id,
                        'room' => "Room " . ($groupCount + 1),
                        'day_table' => "Mon, Wed, Fri",
                        'time_table' => "10:00-12:00",
                        'group_name' => "Group " . ($groupCount + 1)
                    ]);

                    // Add enrollment_id as an array
                    $group->enrollment_id = [$enrollments->random()->id];

                    $group->save();

                    $groupCount++;
                }
            }
        }
    }
}
