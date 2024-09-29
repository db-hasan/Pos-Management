<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\Attributes;

class AttributesController extends Controller
{
    public function indexattributes() {
        $attributes = Attributes::paginate(50);
        return view('backend.attributes.index',compact('attributes'));
    }
    
    public function createattributes() {
        return view('backend.attributes.create');
    }
    public function storeattributes(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $data = new Attributes();
            $data->name = $request->name;
            $data->save();
            return redirect()->route('attributes.index')->with('success', 'attributes created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('attributes.index')->with('error', 'An error occurred. Please try again.');
        }
    }

    public function editattributes($id=null){
        $data['attributes'] = Attributes::find($id);
        if (!$data['attributes']) {
            return redirect()->back();
        }     
        return view('backend/attributes/edit', $data);
    }

    public function updateattributes(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        
        try {
            $data = Attributes::findOrFail($id);
            $data->name   = $request->input('name');
            $data->status  = $request->input('status');
            $data->save();

                return redirect()->route('attributes.index')->with('success', 'Data update successfully.');
            } catch (\Exception $e) {
                return redirect()->route('attributes.index')->with('error', $e->getMessage());
        }
    }
}
