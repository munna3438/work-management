<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function index( Request $request, $status = ""){
        $search = $request['search'] ?? '';
        $query = Institute::query();

        if ($status != "") {
            $query = $query->where('workStatus', $status);
        }


        if ($search != '') {
            $query->where(function($q) use ($search) {
                $q->where('instituteName', 'LIKE', "%$search%");
            });
        }
        $institutes = $query->orderBy('id', 'desc')->paginate(10);
        return view('admin.institute.list',compact('institutes','search'));

    }
    public function add(){
        return view('admin.institute.add');

    }
    public function store(Request $request){
        $request->validate([
            "instituteName"=>'required',
        ]);
        Institute::create([
            "instituteName"=>$request->instituteName,
        ]);
        return redirect()->route('institute.list')->with('msg','institute add successfully!!');
    }
    public function edit($id){
        $institute = Institute::find($id);
        return view('admin.institute.edit',compact('institute'));

    }
    public function update(Request $request , $id){
        $request->validate([
            "instituteName"=>'required',
        ]);
        Institute::find($id)->update([
            "instituteName"=>$request->instituteName
        ]);
        return redirect()->route('institute.list')->with("msg",'institute update successfully!!');
    }
    public function delete($id){
        Institute::find($id)->delete();
        return back()->with('msg','institute deleted successfully!!');
    }
}
