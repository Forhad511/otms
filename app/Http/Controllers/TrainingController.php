<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;
use Session;

class TrainingController extends Controller
{
    private $categories, $training, $trainings;

    public function index()
    {
        $this->categories = Category::all();
        return view('teacher.training.index', ['categories' => $this->categories]);
    }

    public function create(Request $request)
    {
        Training::newTraining($request);
        return back()->with('message', 'Training info create successfully.');
    }

    public function manage()
    {
        $this->trainings = Training::where('teacher_id', Session::get('teacher_id'))->get();
        return view('teacher.training.manage', ['trainings' => $this->trainings]);
    }

    public function detail($id)
    {
        $this->training = Training::find($id);
        return view('teacher.training.detail', ['training' => $this->training]);
    }

    public function edit($id)
    {
        return view('teacher.training.edit');
    }

    public function update(Request $request, $id)
    {
        return $request->all();
    }

    public function delete($id)
    {
        return $id;
    }
}
