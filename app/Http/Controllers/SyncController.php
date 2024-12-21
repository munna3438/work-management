<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\Sync;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class SyncController extends Controller
{
    public function index()
    {
        $institutes = Institute::orderBy('id', 'desc')->get('instituteName');

        return view('admin.sync.add', compact('institutes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "instituteName" => "required",
            "instituteNumber" => ["string", "required", "min:11"],
            "details" => "required",
            "workStatus" => "required",
            "providerName" => "required",
            "bill" => "required"
        ]);
        Sync::create([
            "instituteName" => $request->instituteName,
            "instituteNumber" => $request->instituteNumber,
            "details" => $request->details,
            "workStatus" => $request->workStatus,
            "occasion" => $request->occasion,
            "providerName" => $request->providerName,
            "bill" => $request->bill,
        ]);
        return redirect()->route('sync.list')->with("msg", "sync update successfully");
    }
    public function list(Request $request, $status = "")
    {

        $search = $request['search'] ?? '';
        $query = Sync::query();

        if ($status != "") {
            $query = $query->where('workStatus', $status);
        }


        if ($search != '') {
            $query->where(function ($q) use ($search) {
                $q->where('instituteName', 'LIKE', "%$search%")
                    ->orWhere('instituteNumber', 'LIKE', "%$search%")
                    ->orWhere('details', '=', $search)
                    ->orWhere('workStatus', 'LIKE', "%$search%")
                    ->orWhere('providerName', 'LIKE', "%$search%");
            });
        }
        $syncs = $query->orderBy('id', 'desc')->paginate(10);
        return view('admin.sync.list', compact('syncs', 'search'));
    }
    public function edit($id)
    {
        $institutes = Institute::all();
        $sync = Sync::find($id);
        return view('admin.sync.edit', compact('sync', 'institutes'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "instituteName" => "required",
            "instituteNumber" => ["string", "required", "min:11"],
            "details" => "required",
            "workStatus" => "required",
            "providerName" => "required",
            "bill" => "required",
            "date" => "required"
        ]);
        Sync::find($id)->update([
            "instituteName" => $request->instituteName,
            "instituteNumber" => $request->instituteNumber,
            "details" => $request->details,
            "workStatus" => $request->workStatus,
            "occasion" => $request->occasion,
            "providerName" => $request->providerName,
            "bill" => $request->bill,
            "created_at" => $request->date
        ]);
        return redirect()->route('sync.list')->with('msg', 'sync update successfully');
    }
    public function delete($id)
    {
        Sync::find($id)->delete();
        return redirect()->back()->with('msg', 'sunc deleted ssuccessfully');
    }
}
