<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insert(Request $request){
        // dd($request->all());
        $category = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/uploads/category/', $filename);
                $category->image = $filename;
            }

            // $filename = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('images'), $filename);
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == TRUE ? '1':'0';
        $category->popular = $request->popular == TRUE ? '1':'0';
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_descrip = $request->meta_descrip;
        $category->save();
        return redirect('/dashboard')->with('status', 'Category added successfully');
    }  
    public function edit($id){

        $product = Category::find($id);
        return view('admin.category.edit', compact('product'));
    }

    public function update(Request $request,$id){

        $category = Category::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;        
        }
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == TRUE ? '1':'0';
        $category->popular = $request->popular == TRUE ? '1':'0';
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_descrip = $request->meta_descrip;
        $category->update();
        return redirect('dashboard')->with('status', "Category Updated Successfully");
    }

    public function destroy($id){
        $category = Category::find($id);
        if($category->image){
            $path = 'assets/uploads/category/'. $category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Success');
    }
}
