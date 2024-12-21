<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\StudentLimit;
use Illuminate\Http\Request;

class StudentLimitController extends Controller
{
    public function index($instituteId)
    {
        $query = StudentLimit::where('instituteID', $instituteId);
        $limits = $query->orderBy('id', 'desc')->paginate(10);
        $instituteName = Institute::find($instituteId)->instituteName;
        return view('admin.limit.list', compact('instituteId', 'instituteName', 'limits'));
    }
    public function add($instituteId)
    {
        return view('admin.limit.add', compact('instituteId'));
    }
    public function store(Request $request, $limtID = null)
    {
        $request->validate([
            "referName" => 'required',
            "oldLimit" => 'required|numeric',
            "newLimit" => 'required|numeric',
            "document" => 'file|max:10000',
            "bill" => 'required',

        ]);
        if ($limtID) {
            $limit = StudentLimit::find($limtID);
            if ($request->document != null) {
                $documentName = date('dmy') . '-' . uniqid() . '.' . $request->document->extension();
                $request->document->move(public_path('uploads/limit/'), $documentName);
                if ($limit->document != null) {
                    unlink(public_path('uploads/limit/' . $limit->document));
                }
            } else {
                $documentName = $limit->document;
            }
            $limit->update([
                "referName" => $request->referName,
                "oldLimit" => $request->oldLimit,
                "newLimit" => $request->newLimit,
                "document" => $documentName,
                "bill" => $request->bill,
            ]);
            return redirect()->route('limit.list', $limit->instituteID)->with('msg', 'limit updated successfully!!');
        } else {

            if ($request->document != null) {
                $documentName = date('dmy') . '-' . uniqid() . '.' . $request->document->extension();
                $request->document->move(public_path('uploads/limit/'), $documentName);
            } else {
                $documentName = null;
            }
            StudentLimit::create([
                "instituteID" => $request->instituteId,
                "referName" => $request->referName,
                "oldLimit" => $request->oldLimit,
                "newLimit" => $request->newLimit,
                "document" => $documentName,
                "bill" => $request->bill,
            ]);
            return redirect()->route('limit.list', $request->instituteId)->with('msg', 'limit add successfully!!');
        }
    }
    public function edit($id)
    {
        $limit = StudentLimit::find($id);
        return view('admin.limit.edit', compact('limit'));
    }
    public function delete($id)
    {
        StudentLimit::find($id)->delete();
        return redirect()->back()->with('msg', 'limit deleted succefully');
    }
    public function status(Request $request, $status = null)
    {
        $search = $request['search'] ?? '';
        if ($status != null) {
            $query =  StudentLimit::leftJoin('institutes', 'student_limits.instituteID', '=', 'institutes.id')
                ->select('student_limits.*', 'institutes.instituteName')->where('student_limits.bill', '=', $status);
        } else {
            $query =  StudentLimit::leftJoin('institutes', 'student_limits.instituteID', '=', 'institutes.id')
                ->select('student_limits.*', 'institutes.instituteName');
        }
        if ($search != '') {
            $query->where(function ($q) use ($search) {
                //search all columns
                $q->where('instituteName', 'LIKE', "%$search%")
                    ->orWhere('referName', 'LIKE', "%$search%");
            });
        }
        $limits = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.limit.limit_status', compact('search', 'limits', 'status'));
    }
}
