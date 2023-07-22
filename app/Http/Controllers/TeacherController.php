<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $teacher, $teachers;

    public function index()
    {
        return view('admin.teacher.index');
    }

    public function create(Request $request)
    {
        Teacher::newTeacher($request);
        return back()->with('message', 'Teacher info create successfully.');
    }

    public function manage()
    {
        $this->teachers = Teacher::all();
        return view('admin.teacher.manage', ['teachers' => $this->teachers]);
    }

    public function edit($id)
    {
        $this->teacher = Teacher::find($id);
        return view('admin.teacher.edit', ['teacher' => $this->teacher]);
    }

    public function update(Request $request, $id)
    {
        Teacher::updateTeacher($request, $id);
        return redirect('/teacher/manage')->with('message', 'Teacher info update successfully.');
    }

    public function delete($id)
    {
        Teacher::deleteTeacher($id);
        return redirect('/teacher/manage')->with('message', 'Teacher info delete successfully.');
    }
}
