<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\CostType;
use App\Models\Costing;

class CostingController extends Controller
{
    public function indexcosting() {
        $costings = Costing::with('costtype')->orderBy('id', 'desc')->paginate(50);
        return view('backend.costing.index',compact('costings'));
    }
    
    public function createcosting() {
        $costtypes = CostType::all();
        return view('backend.costing.create', compact('costtypes'));
    }
    public function storecosting(Request $request):RedirectResponse
    {
        $request->validate([
            'costtype_id' => 'required',
            'amount' => 'required',
            'note' => 'nullable',
        ]);

        try {
            $data = new Costing();
            $data->costtype_id = $request->costtype_id;
            $data->amount = $request->amount;
            $data->note = $request->note;
            $data->save();
            return redirect()->route('costing.index')->with('success', 'Costing created successfully.');
        } catch (Exception $e) {
            return redirect()->route('costing.index')->with('error', 'An error occurred. Please try again.');
        }
    }

    public function editcosting($id = null) {
        $costings['costing'] = Costing::find($id);
        $costings['costtypes'] = CostType::all();
        
        if (!$costings['costing']) {
            return redirect()->back();
        }
        
        return view('backend.costing.edit', $costings);
    }
    
    public function updatecosting(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'costtype_id' => 'required', // Use 'costtype_id' instead of 'name'
            'amount' => 'required',
            'note' => 'nullable',
            'status' => 'required',
        ]);
    
        try {
            $data = Costing::findOrFail($id);
            $data->costtype_id = $request->input('costtype_id');
            $data->amount = $request->input('amount');
            $data->note = $request->input('note');
            $data->status = $request->input('status');
            $data->save();
    
            return redirect()->route('costing.index')->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('costing.index')->with('error', $e->getMessage());
        }
    }
    
    
}


