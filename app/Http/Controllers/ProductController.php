<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Maps;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function admin()
    {
        $products = Product::paginate(5);
        return response()->view('products.admin',['products'=>$products]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $maps = Maps::all();
        $categories = Categories::all();
        return response()->view('products.create',['categories'=>$categories,'maps'=>$maps]);
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
            return redirect()->route('products.create')->withErrors($validate);
        }
        else{
            $path = "images\product/";
            $image = $request->file('image');
            $image->move(base_path('public\images\product/'),$image->getClientOriginalName());
            $path = $path . $image->getClientOriginalName();
            $Maps = new Product;
            $Maps->image = $path;

            $Maps->name_product = $request->input('name_product');
            $Maps->price =$request->input('price');
            $Maps->content = $request->input('content');



            $Maps->id_categori = $request->input('categori');
            $Maps->id_address = $request->input('address');
            $Maps->id_user = $request->input('role');
            $Maps->save();
            session()->flash('msg', 'The new category was created successfully!!');
            return redirect()->route('products.admin',['id'=>$request->input('id_product')]);
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
    public function edit($id,$id_categori,$id_address)
    {
        $categories_id = Categories::where('id','=',$id_categori)->select('*')->first();
        $categories = Categories::all();
        $map_id = Maps::where('id','=',$id_address)->select('*')->first();
        $maps = Maps::all();
        $product = Product::find($id);
        return response()->view('products.update',['product'=>$product,
        'categories'=>$categories,'categories_id'=>$categories_id,
        'map_id'=>$map_id,'maps'=>$maps
    
    ]);
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
        Product::where('id',(int)$id)->update([
            'name_product' => $request->input('name'),
            'price' => $request->input('price'),
            'content' => $request->input('content'),
            'id_categori' => $request->input('categori'),	
            'id_address' => $request->input('address'),
        ]);
        if(request()->hasFile('image')){
            $path = "images\product/";
            $image = $request->file('image');
            $image->move(base_path('public\images\product/'),$image->getClientOriginalName());
            $path = $path . $image->getClientOriginalName();
            Product::where('id',(int)$id)->update([
                'image' => $path,
            ]);
        }
        session()->flash('msg', 'Update Successfully!!!!');
        return redirect()->route('products.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->action([ProductController::class,'admin']);
    }
}