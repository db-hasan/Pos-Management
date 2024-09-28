<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Warehouse;
use Exception;

class WarehouseController extends Controller
{
        // ***********Product warehouse Funcation************

        public function indexwarehouse() {
            $warehouses = Warehouse::orderBy('id', 'desc')->get();
            return view('backend.warehouse.index',compact('warehouses'));
        }
        
        public function createwarehouse() {
            return view('backend.warehouse.create');
        }
        public function storewarehouse(Request $request):RedirectResponse
        {
            $request->validate([
                'name' => 'required',
            ]);
    
            try {
                $data = new Warehouse();
                $data->name = $request->name;
                $data->save();
                return redirect()->route('warehouse.index')->with('success', 'warehouse created successfully.');
            } catch (\Exception $e) {
                return redirect()->route('warehouse.index')->with('error', 'An error occurred. Please try again.');
            }
        }
    
        public function editwarehouse($id=null){
            $warehouses['warehouse'] = Warehouse::find($id);
            if (!$warehouses['warehouse']) {
                return redirect()->back();
            }     
            return view('backend/warehouse/edit', $warehouses);
        }
    
        public function updatewarehouse(Request $request, $id): RedirectResponse
        {
            $request->validate([
                'name' => 'required',
                'status' => 'required',
            ]);
            
            try {
                $data = Warehouse::findOrFail($id);
                $data->name   = $request->input('name');
                $data->status  = $request->input('status');
                $data->save();
    
                    return redirect()->route('warehouse.index')->with('success', 'Data update successfully.');
                } catch (\Exception $e) {
                    return redirect()->route('warehouse.index')->with('error', $e->getMessage());
            }
        }
}
