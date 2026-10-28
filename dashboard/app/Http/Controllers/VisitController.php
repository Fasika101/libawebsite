<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {
        return view('visits.index', [
            'visits' => Visit::latest()->paginate(25),
        ]);
    }

    public function destroy(Request $request)
    {
        $data = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['integer'],
        ]);

        $deleted = Visit::whereIn('id', $data['ids'])->delete();

        return redirect()
            ->route('visits.index')
            ->with('status', $deleted === 1 ? '1 visit deleted.' : $deleted.' visits deleted.');
    }
}
