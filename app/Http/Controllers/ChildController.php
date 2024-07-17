<?php

namespace App\Http\Controllers;
use App\Models\RescueCase;
use App\Models\SocialWorker;
use App\Models\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * Display a listing of the children.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $children = Child::with(['assignedSocialWorker', 'rescueCase'])->paginate(10);
        return view('children.index', compact('children'));
    }

    /**
     * Show the form for creating a new child.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socialWorkers = SocialWorker::all();
        $rescueCases = RescueCase::all();
        return view('children.create', compact('socialWorkers', 'rescueCases'));
    }

    /**
     * Store a newly created child in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => ['required', 'date', function ($attribute, $value, $fail) {
                if (now()->diffInYears($value) > 18) {
                    $fail('The child must be 18 years old or younger.');
                }
            }],
            'gender' => 'required|in:male,female,other',
            'address' => 'nullable|string',
            'contact_number' => 'nullable|string|max:15',
            'medical_history' => 'nullable|string',
            'assigned_social_worker_id' => 'nullable|exists:social_workers,id',
            'rescue_case_id' => 'nullable|exists:rescue_cases,id',
        ]);

        Child::create($request->all());
        toast('Child Profile Created Successfully!','success');

        return redirect()->route('admin.children.index');
    }

    /**
     * Display the specified child.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child)
    {
        return view('children.show', compact('child'));
    }

    /**
     * Show the form for editing the specified child.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function edit(Child $child)
    {
        $socialWorkers = SocialWorker::all();
        $rescueCases = RescueCase::all();
        return view('children.edit', compact('child', 'socialWorkers', 'rescueCases'));
    }

    /**
     * Update the specified child in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Child $child)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => ['required', 'date', function ($attribute, $value, $fail) {
                if (now()->diffInYears($value) > 18) {
                    $fail('The child must be 18 years old or younger.');
                }
            }],
            'gender' => 'required|in:male,female,other',
            'address' => 'nullable|string',
            'contact_number' => 'nullable|string|max:15',
            'medical_history' => 'nullable|string',
            'assigned_social_worker_id' => 'nullable|exists:social_workers,id',
            'rescue_case_id' => 'nullable|exists:rescue_cases,id',
        ]);

        $child->update($request->all());
        toast('Child Profile Updated Successfully!','success');

        return redirect()->route('admin.children.index');
    }

    /**
     * Remove the specified child from storage.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        $child->delete();
        toast('Child Profile Deleted Successfully!','success');

        return redirect()->route('admin.children.index');
    } 
}
