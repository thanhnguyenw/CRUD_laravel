<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $all_students = Student::get();
        return view('home', compact('all_students'));
    }
    public function store(Request $request){
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $ext =$request->file('photo')->extension();
        $final_name = date('YmdHis').'.'.$ext;
        $request->file('photo')->move(public_path('uploads'),$final_name);
        $student = new Student();        
        $student->photo = $final_name;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
        return redirect()->route('home')->with('success','Student Added Successfully');
    }
    public function edit($id){
        $student = Student::find($id);
        return view('edit', compact('student'));
    }
    public function update(Request $request, $id){
        $student = Student::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if(file_exists(public_path('uploads/'.$student->photo)) && !empty($student->photo)){
                unlink(public_path('uploads/'.$student->photo));
            }
            $ext =$request->file('photo')->extension();
            $final_name = date('YmdHis').'.'.$ext;
            $request->file('photo')->move(public_path('uploads'),$final_name);
            $student->photo = $final_name;
        }
    
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
        return redirect()->route('home')->with('success','Student Updated Successfully');
    }
    public function destroy($id){
        $student = Student::find($id);
        // remove the file
        if(file_exists(public_path('uploads/'.$student->photo)) && !empty($student->photo)){
            unlink(public_path('uploads/'.$student->photo));
        }

        $student->delete();
        return redirect()->route('home')->with('success','Student Deleted Successfully');
    }
    public function restore($id){
        $student = Student::withTrashed()->find($id);
        $student->restore();
    }
}
