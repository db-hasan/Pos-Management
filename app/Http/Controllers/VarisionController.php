<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\Varision;

class VarisionController extends Controller
{
    public function indexvarision() {
        $varisions = Varision::paginate(50);
        return view('backend.varision.index',compact('varisions'));
    }
    
    public function createvarision() {
        return view('backend.varision.create');
    }
    public function storevarision(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $data = new Varision();
            $data->name = $request->name;
            $data->save();
            return redirect()->route('varision.index')->with('success', 'varision created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('varision.index')->with('error', 'An error occurred. Please try again.');
        }
    }

    public function editvarision($id=null){
        $varisions['varision'] = Varision::find($id);
        if (!$varisions['varision']) {
            return redirect()->back();
        }     
        return view('backend/varision/edit', $varisions);
    }

    public function updatevarision(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        
        try {
            $data = Varision::findOrFail($id);
            $data->name   = $request->input('name');
            $data->status  = $request->input('status');
            $data->save();

                return redirect()->route('varision.index')->with('success', 'Data update successfully.');
            } catch (\Exception $e) {
                return redirect()->route('varision.index')->with('error', $e->getMessage());
        }
    }
}