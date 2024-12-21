<?php

namespace App\Http\Controllers;

use App\Models\StudentLimit;
use App\Models\Sync;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $sync = Sync::all();
        $totalSync = $sync->count();
        $syncDone = $sync->where('workStatus', 'done')->count();
        $syncInProress = $sync->where('workStatus', 'in-progress')->count();
        $syncPanding = $sync->where('workStatus', 'panding')->count();

        $limitPaid = StudentLimit::where('bill', 'paid')->count();
        $limitDeu = StudentLimit::where('bill', 'deu')->count();
        $limitUnpaid = StudentLimit::where('bill', 'unpaid')->count();
        return view('admin.index', compact('totalSync', 'syncDone', 'syncInProress', 'syncPanding', 'limitPaid', 'limitUnpaid', 'limitDeu'));
    }
    public function home()
    {
        return redirect()->route('dashboard',);
    }
}
