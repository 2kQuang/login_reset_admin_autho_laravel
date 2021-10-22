<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    public function admin()
    {
        $employees = User::all();
        return response()->view('employee.admin',['employees'=>$employees]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return response()->view('employee.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [ 
                'name' => 'required | string | max:255',
                'phone' => 'required | string | min:10 | max:13',
                'address' => 'required | string | max:255',
                'email' => 'required | unique:users',
            ], 
            [ 
                'required' => ':attribute Do not leave blank',
                'unique' => ':attribute already exists',
                'min' => ':attribute must bigger than :min',
                'max' => ':attribute must bigger than :max',
            ] 
        );
        
        if($validator->fails()){
            return redirect()->route('employee.create')->withErrors($validator);
        }
        else{
        $path = 'images\avatar/';
            if(request()->hasFile(key:'avatar')){
                $avatar = request()->file(key: 'avatar');
                $avatar->move(base_path('public\images\avatar/'),$avatar->getClientOriginalName());
                $path = $path . $avatar->getClientOriginalName();
            }
            $user = User::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'role_id' => $request->input('role_id'),
                'avatar' => $path,
                'password' => Hash::make($request->input('password')),
            ]);
            session()->flash('msg', 'The new employee was created successfully!!');
            return redirect()->route('employee.admin');
        }
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
    public function edit($id,$role_id)
    {
        $role_id = Role::where('id','=',$role_id)->select('*')->first();
        $roles = Role::all();
        $employee = User::find($id);
        return response()->view('employee.update',['employee'=>$employee,'roles'=>$roles,'role_id'=>$role_id]);
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
        User::where('id',(int)$id)->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'role_id' => $request->input('role'),
        ]);
        if(request()->hasFile(key:'avatar')){
            $path ="images\avatar/";
            $avatar = request()->file(key: 'avatar');
            $avatar->move(base_path('public\images\avatar/'),$avatar->getClientOriginalName());
            $path = $path . $avatar->getClientOriginalName();
            User::where('id',(int)$id)->update([
                'avatar' => $path,
            ]);
        }
        session()->flash('msg', 'Update Successfully!!!!');
        return redirect()->route('employee.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->action([EmployeeController::class,'admin']);
    }
}
