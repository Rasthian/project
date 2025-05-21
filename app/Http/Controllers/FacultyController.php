<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    public function index(Request $request)
    {
        $faculty = DB::table('faculty')->get();
        return view('faculty.index', [
            'faculty' => $faculty
        ]);
    }

    public function store(Request $request)
    {
        try {
            $inputTervalidasi = $request->validate([
                'name' => 'required|min:3',
                'date' => 'required'
            ]);

            DB::table('faculty')->insert($inputTervalidasi);

            return back()->with('success', 'Berhasil Tambah Fakultas');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function updateView($id)
    {
        $faculty = Faculty::find($id);
        return view('faculty.update', [
            'faculty' => $faculty
        ]);
    }
    public function update(Request $request,$id) {
        try{
            $request->validate([
                'name' => 'required|min:3',
                'date' => 'required'
            ]);
            
            $faculty = Faculty::find($id);
            $faculty->name = $request->name;
            $faculty->date = $request->date;
            $faculty->save();

            return redirect()->route('index');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
