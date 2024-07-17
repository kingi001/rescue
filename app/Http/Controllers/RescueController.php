<?php

namespace App\Http\Controllers;
use App\Models\RescueCase;
use App\Models\SocialWorker;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;

class RescueController extends Controller
{
    public function create()
    {
        $socialWorkers = SocialWorker::all();
        return view('rescue.create', compact('socialWorkers'));
        return view('rescue.create'); // Return the form view
    } 
     // Store a new rescue case
     public function store(Request $request)
     {
         // Validate the request
         $request->validate([
             'caseTitle' => 'required|string|max:255',
             'rescueDate' => 'required|date',
             'location' => 'required|string|max:255',
             'description' => 'required|string',
             'assignedSocialWorker' => 'required|integer|exists:social_workers,id', // Assuming social_workers is the table
         ]);
 
         // Create a new rescue case
         RescueCase::create([
             'case_title' => $request->caseTitle,
             'rescue_date' => $request->rescueDate,
             'location' => $request->location,
             'description' => $request->description,
             'assigned_social_worker_id' => $request->assignedSocialWorker,
         ]);
 
         // Redirect back with a success message
         toast('Rescue Case Added Successfully!','success');
         return redirect()->route('admin.rescue_case.index');
     }

     public function edit(RescueCase $rescueCase)
    {
        $socialWorkers = SocialWorker::all();
        return view('rescue.edit', compact('rescueCase', 'socialWorkers'));
    }

     // Update the specified rescue case worker in storage
     public function update(Request $request, RescueCase $rescueCase)
     {
         $request->validate([
             'case_title' => 'required|string|max:255',
             'rescue_date' => 'required|date',
             'location' => 'required|string|max:255',
             'description' => 'required|string',
             'assigned_social_worker_id' => 'required|exists:social_workers,id',
         ]);
 
         $rescueCase->update($request->all());
         toast('Rescue Case Updated Successfully!','success');

         return redirect()->route('admin.rescue_case.index');
     }
 
     // Display a list of rescue cases
     public function index()
     {
         $rescueCases = RescueCase::all(); // Get all rescue cases
         $rescueCases = RescueCase::orderBy('id', 'ASC')->paginate(10);
         

         return view('rescue.index', compact('rescueCases')); // Return the index view with cases
     }
     public function destroy(RescueCase $rescueCase)
    {
        $rescueCase->delete();
        toast('Rescue Case Deleted Successfully!','success');

        return redirect()->route('admin.rescue_case.index');
    }
}

