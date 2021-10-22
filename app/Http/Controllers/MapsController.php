<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Maps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapsController extends Controller
{

    public function admin()
    {
        $maps = Maps::paginate(5);
        return response()->view('maps.admin',['maps'=>$maps]);
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
        $categories = Categories::all();
        return response()->view('maps.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [ 
                'image' => 'required', 
            ], 
            [ 
                'required' => ':attribute Do not leave blank',
            ] 
        );
        if($validate->fails()){
            return redirect()->route('maps.create')->withErrors($validate);
        }
        else{
            $path = "images\maps/";
            $image = $request->file('image');
            $image->move(base_path('public\images\maps/'),$image->getClientOriginalName());
            $path = $path . $image->getClientOriginalName();
            $Maps = new Maps;
            $Maps->image = $path;

            $Maps->name = $request->input('name');
            $Maps->address = $request->input('address');
            $Maps->area = $request->input('area');
            $Maps->phone = $request->input('phone');
            $Maps->open = $request->input('open');
            $Maps->close = $request->input('close');
            $Maps->maps = $request->input('maps');

            $Maps->id_categori = $request->input('categori');
            $Maps->id_user = $request->input('role');
            $Maps->save();
            session()->flash('msg', 'The new category was created successfully!!');
            return redirect()->route('maps.admin',['id'=>$request->input('id_product')]);
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
    public function edit($id,$id_categori)
    {
        $map = Maps::find($id);
        $categories = Categories::all();
        $categories_id = Categories::where('id','=',$id_categori)->select('*')->first();
        return response()->view('maps.update',['map'=>$map,'categories'=>$categories,'categories_id'=>$categories_id]);
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
        Maps::where('id',(int)$id)->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'area' => $request->input('area'),
            'phone' => $request->input('phone'),

            'open' => $request->input('open'),
            'close' => $request->input('close'),
            'maps' => $request->input('maps'),
            'id_categori' => $request->input('categori'),
             
        ]);
        if(request()->hasFile('image')){
            $path = "images\maps/";
            $image = $request->file('image');
            $image->move(base_path('public\images\maps/'),$image->getClientOriginalName());
            $path = $path . $image->getClientOriginalName();
            Maps::where('id',(int)$id)->update([
                'image' => $path,
            ]);
        }
        session()->flash('msg', 'Update Successfully!!!!');
        return redirect()->route('maps.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Maps::where('id',$id)->delete();
        return redirect()->action([MapsController::class,'admin']);
    }
}