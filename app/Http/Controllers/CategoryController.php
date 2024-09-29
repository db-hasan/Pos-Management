<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\Category;



class CategoryController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware(['permission:ride-index'], ['only' => ['indexride']]);
    //     $this->middleware(['permission:ride-create'], ['only' => ['createride', 'storeride']]);
    //     $this->middleware(['permission:ride-edit'], ['only' => ['editride', 'updateride']]);

    // }


    // ***********Product category Funcation************

    public function indexcategory() {
        $categorys = Category::paginate(50);
        return view('backend.category.index',compact('categorys'));
    }
    
    public function createcategory() {
        return view('backend.category.create');
    }
    public function storecategory(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $data = new Category();
            $data->name = $request->name;
            $data->save();
            return redirect()->route('category.index')->with('success', 'category created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', 'An error occurred. Please try again.');
        }
    }

    public function editcategory($id=null){
        $data['category'] = Category::find($id);
        if (!$data['category']) {
            return redirect()->back();
        }     
        return view('backend/category/edit', $data);
    }

    public function updatecategory(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        
        try {
            $data = Category::findOrFail($id);
            $data->name   = $request->input('name');
            $data->status  = $request->input('status');
            $data->save();

                return redirect()->route('category.index')->with('success', 'Data update successfully.');
            } catch (\Exception $e) {
                return redirect()->route('category.index')->with('error', $e->getMessage());
        }
    }
}
