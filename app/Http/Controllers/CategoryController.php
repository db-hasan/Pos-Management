<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Category;
use App\Models\Attributes;
use App\Models\CategoryAttributes;



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
        $categorys = Category::with('category_arttributes.attributes')->paginate(50);
        return view('backend.category.index',compact('categorys'));
    }
    
    public function createcategory() {
        $attributes = Attributes::where('status', 1)->get();
        return view('backend.category.create', compact('attributes'));
    }
    
    public function storecategory(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'attributes_id' => 'required|array|min:1',
            'attributes_id.*' => 'required|int',
            'priority' => 'required|array|min:1',
            'priority.*' => 'required|int',
        ]);
    
        DB::beginTransaction();
    
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->save();
    
            // Get unique attributes_id values
            $uniqueAttributes = array_unique($request->attributes_id);
            
            // Loop through unique attributes
            foreach ($uniqueAttributes as $index => $attributesId) {
                // Ensure priority exists for the unique attribute
                if (isset($request->priority[$index])) {
                    $categoryAttribute = new CategoryAttributes();
                    $categoryAttribute->categories_id = $category->id;
                    $categoryAttribute->attributes_id = $attributesId;
                    $categoryAttribute->priority = $request->priority[$index];
                    $categoryAttribute->status = 1;
                    $categoryAttribute->save();
                }
            }
            DB::commit();
    
            return redirect()->route('category.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('category.index')->with('error', 'An error occurred. Please try again.');
        }
    }
    

    public function editcategory($id){
        $data['category'] = Category::with('category_arttributes.attributes')->find($id);
        if (!$data['category']) {
            return redirect()->back();
        }     
        return view('backend/category/edit', $data);
    }

    public function updatecategory(Request $request, $id): RedirectResponse
    {
        
    }
}
