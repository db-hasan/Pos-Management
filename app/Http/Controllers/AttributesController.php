<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\Category;
use App\Models\Varision;
use App\Models\Attributes;


class AttributesController extends Controller
{
    public function indexattributes() {
        $attributes = Attributes::with(['category', 'varision']) // Load related category and varision
                                ->orderBy('id', 'desc')
                                ->paginate(50);
        return view('backend.attributes.index', compact('attributes'));
    }
    
    public function createattributes() {
        $categories = Category::where('status', 1)->get();
        $varisions = Varision::where('status', 1)->get();
        return view('backend.attributes.create', compact('categories', 'varisions'));
    }
    public function storeattributes(Request $request):RedirectResponse
    {
        $request->validate([
            'category_id' => 'required',
            'varision_id' => 'required',
            'priority' => 'nullable',
        ]);

        try {
            $data = new Attributes();
            $data->category_id = $request->category_id;
            $data->varision_id = $request->varision_id;
            $data->priority = $request->priority;
            $data->save();
            return redirect()->route('attributes.index')->with('success', 'attributes created successfully.');
        } catch (Exception $e) {
            return redirect()->route('attributes.index')->with('error', 'An error occurred. Please try again.');
        }
    }

    public function editattributes($id = null) {
        $attributess['attributes'] = Attributes::find($id);
        $attributess['categories'] = Category::where('status', 1)->get();
        $attributess['varisions'] = Varision::where('status', 1)->get();
        
        if (!$attributess['attributes']) {
            return redirect()->back();
        }
        
        return view('backend.attributes.edit', $attributess);
    }
    
    public function updateattributes(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'category_id' => 'required',
            'varision_id' => 'required',
            'priority' => 'nullable',
            'status' => 'required',
        ]);
    
        try {
            $data = Attributes::findOrFail($id);
            $data->category_id = $request->input('category_id');
            $data->varision_id = $request->input('varision_id');
            $data->priority = $request->input('priority');
            $data->status = $request->input('status');
            $data->save();
    
            return redirect()->route('attributes.index')->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('attributes.index')->with('error', $e->getMessage());
        }
    }

}
