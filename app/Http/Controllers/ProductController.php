<?php

namespace App\Http\Controllers;
use Session; 
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\NewProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('product.home', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create()
{
    $categories = Category::pluck('name', 'id'); 
    return view('product.new', ['categories'=> $categories]);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(NewProductRequest $request)
{  
    $input['image']='nophoto.jpg';
    if($file = $request->file('image')){
        $name = time().$file->getClientOriginalName();
        $file->move('uploads/images',$name);  
        $input['image']=$name;
    } 
    $input['name']=$request->name;
    $input['show']=$request->show;
    $input['cat_id']=$request->cat_id;
    $input['price']=$request->price;
    $input['detail']=$request->detail;
    $input['status']=$request->status;
    $input['instock']=$request->instock; 
    Product::create($input); 
    Session::flash('add_new_product', 'ได้ทำการเพิ่มข้อมูลสินค้าใหม่ในฐานข้อมูลเรียบร้อยแล้วค่ะ');
    return redirect('/admin/products');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit($id)
{   
    $product = Product::findOrFail($id);
    $categories = Category::pluck('name', 'id'); 
    
    return view('product.edit', ['categories'=> $categories, 'product'=>$product]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(NewProductRequest $request, $id)
{
    $input = $request->all();
    $product = Product::findOrFail($id);
    $input['image']=$product->image;
    if($file = $request->file('image')){
        $name = time().$file->getClientOriginalName();
        $file->move('uploads/images',$name);  
        $input['image']=$name;
    } 
    $product->update($input);
    return redirect('/admin/products'); 
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrfail($id)->delete(); 
        Session::flash('destroy_product', 'ได้ทำการลบข้อมูลสินค้าฐานข้อมูลเรียบร้อยแล้วค่ะ');
        return redirect('/admin/products'); 
    }
}
