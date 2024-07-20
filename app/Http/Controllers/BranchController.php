<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Branch;
use App\Models\District;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    
    public function index()
    {
        $branches = Branch::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.branches.index', compact('branches'));
    }

   
    public function create()
    {
        $regions = Region::all();
        $districts = District::all();
        // You can fetch additional data needed for the create form here
        return view('pages.branches.create', compact('regions', 'districts'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'district_id' => 'required|exists:districts,id',
            'phone' => 'nullable|string|max:15',
            'date' => 'nullable|date',
            'status' => 'nullable|string|max:15',
            'directions' => 'nullable|array',
        ]);

        $branch = Branch::create($request->all());

        return redirect()->route('branch.index')->with('success', 'Branch created successfully.');
    }

  
    public function show(Branch $branch)
    {
        return view('pages.branches.show', compact('branch'));
    }

    public function edit(Branch $branch)
    {
        $regions = Region::all();
        $districts = District::all();
        // You can fetch additional data needed for the edit form here
        return view('pages.branches.edit', compact('branch', 'regions', 'districts'));
    }

    
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'district_id' => 'required|exists:districts,id',
            'phone' => 'nullable|string|max:15',
            'date' => 'nullable|date',
            'status' => 'nullable|string|max:15',
            'directions' => 'nullable|array',
        ]);

        $branch->update($request->all());

        return redirect()->route('branch.index')->with('success', 'Branch updated successfully.');
    }

    

    
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);

        User::where('branch_id', $branch->id)->update(['branch_id' => null]);
    
        // Now delete the branch
        $branch->delete();
    
        return redirect()->route('branch.index')->with('success', 'Branch deleted successfully.');
    }
 public function getDistricts($region_id)
{
    try {
        $districts = District::where('region_id', $region_id)->get();
        return response()->json($districts);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


}

