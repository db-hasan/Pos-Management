<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\OthersProfit;

class OthersProfitController extends Controller
{
    public function indexothersprofit() {
        $othersprofits = OthersProfit::orderBy('id', 'desc')->get();
        return view('backend.othersprofit.index',compact('othersprofits'));
    }
    
    public function createothersprofit() {
        return view('backend.othersprofit.create');
    }
    public function storeothersprofit(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'note' => 'nullable',
        ]);

        try {
            $data = new OthersProfit();
            $data->name = $request->name;
            $data->amount = $request->amount;
            $data->note = $request->note;
            $data->save();
            return redirect()->route('othersprofit.index')->with('success', 'othersprofit created successfully.');
        } catch (Exception $e) {
            return redirect()->route('othersprofit.index')->with('error', 'An error occurred. Please try again.');
        }
    }

    public function editothersprofit($id=null){
        $othersprofits['othersprofit'] = OthersProfit::find($id);
        if (!$othersprofits['othersprofit']) {
            return redirect()->back();
        }     
        return view('backend/othersprofit/edit', $othersprofits);
    }

    public function updateothersprofit(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'note' => 'nullable',
            'status' => 'required',
        ]);
        
        try {
            $data = OthersProfit::findOrFail($id);
            $data->name   = $request->input('name');
            $data->amount   = $request->input('amount');
            $data->note   = $request->input('note');
            $data->status  = $request->input('status');
            $data->save();

                return redirect()->route('othersprofit.index')->with('success', 'Data update successfully.');
            } catch (\Exception $e) {
                return redirect()->route('othersprofit.index')->with('error', $e->getMessage());
        }
    }
    
    
}