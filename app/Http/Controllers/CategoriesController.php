<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Caticon;

class CategoriesController extends Controller
{
public function __construct() {
    $this->middleware('auth'); 
}
    public function home(){
        $categories = Category::paginate(5);
        return view('category.home',
        ['categories'=>$categories]);
    }
    public function show($id){
        $category = Category::findOrFail($id);   
        return view('category.show',['category'=>$category]);
    }
    public function new(){ 
        return view('category.new');
    }
public function store(Request $request){  
    $input['caticon_id']=0;
    if($file = $request->file('photo_id')){
        $name = time().$file->getClientOriginalName();
        $file->move('uploads/images',$name); 
        $icon = Caticon::create(['name' => $name]); 
        $input['caticon_id']=$icon->id;
    } 
    $input['name']=$request->name;
    $input['detail']=$request->detail;
    $input['status']=$request->status;
    Category::create($input); 
    return redirect('/admin/categories');
} 
    public function edit($id){
        $category = Category::findOrFail($id);  
        return view('category.edit',['category'=>$category]);
    }
    public function update(Request $request, $id){ 
        $category = Category::findOrFail($id);
        $category->update($request->all()); 
        return redirect('/admin/categories');
    }
    /*
    public function delete($id){
        $category = Category::findOrFail($id);   
        $category->delete();
        return redirect('/admin/categories');
    }
    */
    public function delete($id){ 
        $category = Category::whereId($id)->delete();
        return redirect('/admin/categories');
    }
}

