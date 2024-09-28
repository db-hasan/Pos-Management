<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\CostType;

class CostTypeController extends Controller
{
    public function indexcosttype() {
        $costtypes = CostType::orderBy('id', 'desc')->get();
        return view('backend.costtype.index',compact('costtypes'));
    }
    
    public function createcosttype() {
        return view('backend.costtype.create');
    }
    public function storecosttype(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $data = new CostType();
            $data->name = $request->name;
            $data->save();
            return redirect()->route('costtype.index')->with('success', 'costtype created successfully.');
        } catch (Exception $e) {
            return redirect()->route('costtype.index')->with('error', 'An error occurred. Please try again.');
        }
    }

    public function editcosttype($id=null){
        $costtypes['costtype'] = CostType::find($id);
        if (!$costtypes['costtype']) {
            return redirect()->back();
        }     
        return view('backend/costtype/edit', $costtypes);
    }

    public function updatecosttype(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        
        try {
            $data = CostType::findOrFail($id);
            $data->name   = $request->input('name');
            $data->status  = $request->input('status');
            $data->save();

                return redirect()->route('costtype.index')->with('success', 'Data update successfully.');
            } catch (\Exception $e) {
                return redirect()->route('costtype.index')->with('error', $e->getMessage());
        }
    }
}
