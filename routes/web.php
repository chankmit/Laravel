<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'admin'], function(){
    Route::resource('admin/users', 'UserController');
    Route::resource('admin/products', 'ProductController');
});


Route::get('/admin/categories', 'CategoriesController@home');
Route::get('/admin/categories/show/{id}', 'CategoriesController@show');
Route::get('/admin/categories/new/', 'CategoriesController@new');
Route::post('/admin/categories/store/', 'CategoriesController@store');
Route::get('/admin/categories/edit/{id}', 'CategoriesController@edit');
Route::post('/admin/categories/update/{id}', 'CategoriesController@update');
Route::get('/admin/categories/delete/{id}', 'CategoriesController@delete'); 







use App\Order;
Route::get('/order/{id}', function ($id) {
    $order = Order::find($id); 
    //return $order;
    return $order->products()->orderBy('name','asc')->get();
});

use App\Product;
Route::get('/order/product/{id}', function ($id) {
    $order = Product::find($id);  
    return $order->orders()->orderBy('created_at','desc')->get();
});







Route::get('/home', function () { 
    $lists=['Computer', 'Cultures', 'Tours', 'Laws', 'Story'];
    return view('home', ['systemname'=> 'Book Store Database System', 'lists' => $lists, 'age' => 20]);
});

Route::get('/posts', function () {
    $posts = DB::select('select * from posts');
    return view('posts.home', ['posts' => $posts]);
});

Route::get('/posts/new', function () {
    return view('posts.new');
});

Route::post('/posts/insert', function (Request $request) { 
    $title=$request->input('name');
    $content=$request->input('content');;
    DB::insert('insert into posts (title, content) values(?, ?)',[$title, $content]); 
    return 'Insert into DB complete';
    //return redirect()->url('/posts'); 
});

Route::get('/posts/edit/{id}', function ($id) {
    $post = DB::select('select * from posts where id = ?',[$id]);
    return view('posts.edit', ['post' => $post]);
});

Route::post('/posts/update/{id}', function (Request $request, $id) { 
    $title=$request->input('name');
    $content=$request->input('content');; 
    DB::update('update posts set title = ?, content = ? where id = ?',[$title,$content,$id]);  
    return redirect('/posts');
});


Route::get('/posts/destroy/{id}', function (Request $request, $id) {  
    DB::delete('delete from posts where id = ?',[$id]);
    return redirect('/posts');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
