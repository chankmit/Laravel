<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\NewUserRequest;
use Session; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    $users = User::paginate(10);
    return view('user.home',['users'=>$users]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create()
{
    return view('user.new');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(NewUserRequest $request)
{
    $input = $request->all();
    $input['image']='nophoto.jpg';
    if($file = $request->file('image')){
        $name = time().$file->getClientOriginalName();
        $file->move('uploads/images',$name);  
        $input['image']=$name;
    }  
    $input['password']=bcrypt($request->password); 
    User::create($input); 
    Session::flash('success_msg', 'ได้ทำการเพิ่มข้อมูลสินค้าใหม่ในฐานข้อมูลเรียบร้อยแล้วค่ะ');
    return redirect('/admin/users');
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
    $user = User::findOrFail($id);  
    return view('user.edit', ['user'=> $user]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function update(Request $request, $id)
{  
    $user = User::findOrFail($id);
    $input['image']=$user->image;
    $input['password']=$user->password;
    $input['email']=$user->email;
    $input['name']=$request->name;
    $input['role']=$request->role;
    $input['status']=$request->status;
    if($file = $request->file('image')){
        $name = time().$file->getClientOriginalName();
        $file->move('uploads/images',$name);  
        $input['image']=$name;
    }  
    $user->update($input);
    Session::flash('success_msg', 'ได้ทำการแก้ไขข้อมูลสินค้าใหม่ในฐานข้อมูลเรียบร้อยแล้วค่ะ');
    return redirect('/admin/users'); 
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id)
{
    User::findOrfail($id)->delete(); 
    Session::flash('success_msg', 'ได้ทำการลบข้อมูลเรียบร้อยแล้วค่ะ');
    return redirect('/admin/users');         
}
}
