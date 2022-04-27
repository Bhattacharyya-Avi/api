<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryAdd(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required'
            ]);
            Category::create([
                'name' => $request->name,
                'details' => $request->details
            ]);

            return response()->json([
                'message'=> 'category added successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error'=> $th,
            ]);
        }
    }

    public function categoryList()
    {
        $categories = Category::all();
        return response()->json([
            'message' => 'Category list',
            'categories' => $categories
        ]);
    }

    public function categoryUpdate(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::find($id);
        try {
            $category->update([
                'name' => $request->name,
                'details' => $request->details
            ]);
            return response()->json([
                'message' => 'category updated...'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th,
            ]);
        }
            
    

    }

    public function categoryDelete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json([
                'message'=>'category deleted successfully.',
            ]);
        }   
    }
}
