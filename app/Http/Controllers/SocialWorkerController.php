<?php

namespace App\Http\Controllers;
use App\Models\SocialWorker;
use App\Models\RescueCase;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class SocialWorkerController extends Controller
{
    // Display a listing of social workers
    public function index()
    {
        $socialWorkers = SocialWorker::all();
        $socialWorkers = SocialWorker::orderBy('id', 'ASC')->paginate(10);
        return view('social_worker.index', compact('socialWorkers'));
    }

    // Show the form for creating a new social worker
    public function create()
    {
        return view('social_worker.create');
    }

    // Store a newly created social worker in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:social_workers,email',
            'phone' => 'nullable|string|digits:10',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:male,female,other',
            'years_of_service' => 'required|integer|min:0',
        ]);

        SocialWorker::create($request->all());
       
        // Alert::success('Social Added Successfully', 'Social Worker details Added successfully.');
        toast('Social Worker Added Successfully!','success');
        // alert()->success('SuccessAlert','Social Worker Added Successfully.');
        return redirect()->route('social_worker.index');
    }

    // Show the form for editing the specified social worker
    public function edit($id)
    {
        $socialWorker = SocialWorker::findOrFail($id);
        return view('social_worker.edit', compact('socialWorker'));
    }

    // Update the specified social worker in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:social_workers,email,' . $id,
            'phone' => 'nullable|string|digits:10',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:male,female,other',
            'years_of_service' => 'required|integer|min:0',
        ]);

        $socialWorker = SocialWorker::findOrFail($id);
        $socialWorker->update($request->all());
        toast('Social Worker Updated Successfully!','success');
        return redirect()->route('social_worker.index');
    }

    // Remove the specified social worker from storage
    public function destroy($id)
    {
        $socialWorker = SocialWorker::findOrFail($id);
        $socialWorker->delete();
        toast('Deleted Social Worker','success');
       return redirect()->route('social_worker.index');
    }
}
