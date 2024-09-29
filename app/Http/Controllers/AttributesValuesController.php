<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\Attributes;
use App\Models\AttributesValues;

class AttributesValuesController extends Controller
{
    public function indexattributes_values() {
        $attributesvalues = AttributesValues::with('attributes')->orderBy('id', 'desc')->paginate(50);
        return view('backend.attributes_values.index',compact('attributesvalues'));
    }
    
    public function createattributes_values() {
        $data['attributes'] = Attributes::where('status', 1)->get();
        return view('backend.attributes_values.create', $data);
    }
    public function storeattributes_values(Request $request):RedirectResponse
    {
        $request->validate([
            'attributes_id' => 'required',
            'name' => 'required',
        ]);

        try {
            $data = new AttributesValues();
            $data->attributes_id = $request->attributes_id;
            $data->name = $request->name;
            $data->save();
            return redirect()->route('attributes_values.index')->with('success', 'attributesvalues created successfully.');
        } catch (Exception $e) {
            return redirect()->route('attributes_values.index')->with('error', 'An error occurred. Please try again.');
        }
    }

    public function editattributes_values($id = null) {
        $data['attributesvalues'] = AttributesValues::find($id);
        $data['attributes'] = Attributes::where('status', 1)->get();
        
        if (!$data['attributesvalues']) {
            return redirect()->back();
        }
        
        return view('backend.attributes_values.edit', $data);
    }
    
    public function updateattributes_values(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'attributes_id' => 'required', // Use 'costtype_id' instead of 'name'
            'name' => 'required',
            'status' => 'required',
        ]);
    
        try {
            $data = AttributesValues::findOrFail($id);
            $data->attributes_id = $request->input('attributes_id');
            $data->name = $request->input('name');
            $data->status = $request->input('status');
            $data->save();
    
            return redirect()->route('attributes_values.index')->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('attributes_values.index')->with('error', $e->getMessage());
        }
    }
}
