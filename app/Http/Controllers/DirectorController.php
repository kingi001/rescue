<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::paginate(10);
        return view('directors.index', compact('directors'));
    }

    public function create()
    {
        return view('directors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:directors,email',
            'phone_number' => 'nullable|string|max:15',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        Director::create($request->all());
        toast('Director Added Successfully!','success');

        return redirect()->route('admin.directors.index');
    }

    public function edit(Director $director)
    {
        return view('directors.edit', compact('director'));
    }

    public function update(Request $request, Director $director)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:directors,email,' . $director->id,
            'phone_number' => 'nullable|string|max:15',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $director->update($request->all());
        toast('Director Updated Successfully!','success');

        return redirect()->route('admin.directors.index');
    }

    public function destroy(Director $director)
    {
        $director->delete();
        toast('Director Deleted Successfully!','success');
        return redirect()->route('admin.directors.index');
    }
}
