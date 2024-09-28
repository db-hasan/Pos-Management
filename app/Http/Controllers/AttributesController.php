<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;

class AttributesController extends Controller
{
    
    public function indexbrand() {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.brand.index',compact('brands'));
    }
    
    public function createbrand() {
        return view('backend.brand.create');
    }
    public function storebrand(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $data = new Brand();
            $data->name = $request->name;
            $data->save();
            return redirect()->route('brand.index')->with('success', 'brand created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('brand.index')->with('error', 'An error occurred. Please try again.');
        }
    }

    public function editbrand($id=null){
        $brands['brand'] = Brand::find($id);
        if (!$brands['brand']) {
            return redirect()->back();
        }     
        return view('backend/brand/edit', $brands);
    }

    public function updatebrand(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        
        try {
            $data = Brand::findOrFail($id);
            $data->name   = $request->input('name');
            $data->status  = $request->input('status');
            $data->save();

                return redirect()->route('brand.index')->with('success', 'Data update successfully.');
            } catch (\Exception $e) {
                return redirect()->route('brand.index')->with('error', $e->getMessage());
        }
    }
}
