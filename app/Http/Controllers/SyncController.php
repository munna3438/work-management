<?php

namespace App\Http\Controllers;

use App\Models\Sync;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class SyncController extends Controller
{
    public function index()
    {
        return view('admin.sync.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            "instituteName" => "required",
            // "instituteNumber" => ["numeric", "required", "min:11"],
            "details" => "required",
            "workStatus" => "required",
            // "providerName" => "required",
            "bill" => "required"
        ]);
        Sync::create([
            "instituteName" => $request->instituteName,
            "instituteNumber" => $request->instituteNumber,
            "details" => $request->details,
            "workStatus" => $request->workStatus,
            "providerName" => $request->providerName,
            "bill" => $request->bill,
        ]);
        return redirect()->route('sync.list')->with("msg", "sync update successfully");
    }
    public function list()
    {
        $syncs =  Sync::orderBy('id', 'desc')->paginate(10);
        return view('admin.sync.list', compact('syncs'));
    }
    public function edit($id)
    {
        $sync = Sync::find($id);
        return view('admin.sync.edit', compact('sync'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "instituteName" => "required",
            "instituteNumber" => ["numeric", "required", "min:11"],
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
