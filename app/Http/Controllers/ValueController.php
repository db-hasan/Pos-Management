<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\Category;
use App\Models\Varision;
use App\Models\Attributes;
use App\Models\Value;

class ValueController extends Controller
{
    public function indexvalue() {
        $values = Value::with(['category', 'varision', 'attributes']) // Load related category and varision
                                ->orderBy('id', 'desc')
                                ->paginate(50);
        return view('backend.value.index', compact('values'));
    }
    
    public function createvalue() {
        $categories = Category::where('status', 1)->get();
        $varisions = Varision::where('status', 1)->get();
        $attributes = Attributes::where('status', 1)->get();
        return view('backend.value.create', compact('categories', 'varisions', 'attributes'));
    }
    public function storevalue(Request $request):RedirectResponse
    {
        $request->validate([
            'category_id' => 'required',
            'varision_id' => 'required',
            'attributes_id' => 'required',
            'priority' => 'nullable',
        ]);

        // try {
            $data = new Value();
            $data->category_id = $request->category_id;
            $data->varision_id = $request->varision_id;
            $data->attributes_id = $request->attributes_id;
            $data->priority = $request->priority;
            $data->save();
            return redirect()->route('value.index')->with('success', 'value created successfully.');
        // } catch (Exception $e) {
        //     return redirect()->route('value.index')->with('error', 'An error occurred. Please try again.');
        // }
    }

    public function editvalue($id = null) {
        $values['values'] = Value::find($id);
        $values['categories'] = Category::where('status', 1)->get();
        $values['varisions'] = Varision::where('status', 1)->get();
        $values['attributes'] = Attributes::where('status', 1)->get();
        
        if (!$values['values']) {
            return redirect()->back();
        }
        
        return view('backend.value.edit', $values);
    }
    
    public function updatevalue(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'category_id' => 'required',
            'varision_id' => 'required',
            'attributes_id' => 'required',
            'priority' => 'nullable',
            'status' => 'required',
        ]);
    
        try {
            $data = Value::findOrFail($id);
            $data->category_id = $request->input('category_id');
            $data->varision_id = $request->input('varision_id');
            $data->attributes_id = $request->input('attributes_id');
            $data->priority = $request->input('priority');
            $data->status = $request->input('status');
            $data->save();
    
            return redirect()->route('value.index')->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('value.index')->with('error', $e->getMessage());
        }
    }
}
