<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Attributes;
use App\Models\Varision;

class AttributesController extends Controller
{
    public function indexattributes() {
        $attributes = Attributes::with('varisions')->paginate(50);
        return view('backend.attributes.index',compact('attributes'));
    }
    
    public function createattributes() {
        return view('backend.attributes.create');
    }
    public function storeattributes(Request $request): RedirectResponse
{
    // Validate the request
    $request->validate([
        'name' => 'required',
        'priority' => 'nullable',
        
        'varision' => 'required|array|min:1', // Ensure varisions are present and at least 1 is provided
        'varision.*' => 'required|string',    // Ensure each varision is a valid string
    ]);

    // Begin the database transaction
    DB::beginTransaction();

    try {
        $attributes = new Attributes();
        $attributes->name = $request->name;
        $attributes->priority = $request->priority;
        $attributes->save();

        foreach ($request->varision as $varisionName) {
            $varision = new Varision();
            $varision->attributes_id = $attributes->id;         // Foreign key reference to Attributes model
            $varision->name = $varisionName;                    // Assign the varision name from the input array
            $varision->save();                             
        }

        // Commit the transaction if everything is successful
        DB::commit();
        return redirect()->route('attributes.index')->with('success', 'Attribute and variations saved successfully!');

    } catch (\Exception $e) {
        // Rollback the transaction if there is an error
        DB::rollBack();

        // Log the exception or handle the error as needed
        return redirect()->back()->with('error', 'An error occurred. Please try again.');
    }
}
    
   

    public function editattributes($id)
    {
        $data['attributes'] = Attributes::with('varisions')->find($id); // Eager load varisions
        if (!$data['attributes']) {
            return redirect()->back()->with('error', 'Attribute not found.');
        }     
        return view('backend.attributes.edit', $data);
    }


    public function updateattributes(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'priority' => 'required',
            'status' => 'required|in:1,2', // Validate attribute status
            'varision' => 'required|array|min:1', // Ensure at least one variation is present
            'varision.*' => 'required|string', // Each variation must be a valid string
            'status_variation' => 'required|array|min:1', // Ensure at least one variation status is present
            'status_variation.*' => 'required|in:1,2', // Each variation status must be a valid option
        ]);
        
        // Find and update the attribute
        $attribute = Attributes::findOrFail($id);
        $attribute->name = $request->input('name');
        $attribute->priority = $request->input('priority');
        $attribute->status = $request->input('status');
        $attribute->save();

        // Update existing variations or create new ones
        foreach ($request->varision as $index => $varisionName) {
            Varision::updateOrCreate(
                ['attributes_id' => $attribute->id, 'name' => $varisionName],
                ['status' => $request->status_variation[$index]] // Update the corresponding status
            );
        }
        

        return redirect()->route('attributes.index')->with('success', 'Data updated successfully.');
    }


    
}
