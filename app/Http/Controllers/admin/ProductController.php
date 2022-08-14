<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5','max:255'],
            'brand' => ['required', 'string', 'min:3','max:255'],
            'photo' => ['required'],
            'photo.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => ['required', 'string','min:10','max:65000'],
            'size' => ['required'],
            'price' => ['required', 'numeric','min:1'],
        ]);

        $data = $request->all();

        $newProduct = new Product();
        $newProduct->name = $data["name"];
        $newProduct->brand = $data["brand"];
        $newProduct->photo = Storage::put('uploads',$data["photo"]);
        $newProduct->user_id = Auth::user()->id;
        $newProduct->description = $data["description"];
        $newProduct->size = $data["size"];
        $newProduct->price = $data["price"];
        $newProduct->save();
        $images=array();
        // if($files=$request->file('images')){
        //     foreach($files as $file){
        //         $newPicture = new Picture();
        //         $newPicture->apartment_id = $newProduct->id;
        //         $newPicture->image=Storage::put('uploads',$file);
        //         $newPicture->save();
        //     }
        // }

        return redirect()->route('admin.products.index')->with('product-added','New product is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5','max:255'],
            'brand' => ['required', 'string', 'min:3','max:255'],
            'photo.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => ['required', 'string','min:10','max:65000'],
            'size' => ['required'],
            'price' => ['required', 'numeric','min:1'],
        ]);

        $data = $request->all();

        $product->name = $data["name"];
        $product->brand = $data["brand"];
        if(isset($data["image"])){
            $product->photo = Storage::put('uploads',$data["photo"]);
        }
        $product->user_id = Auth::user()->id;
        $product->description = $data["description"];
        $product->size = $data["size"];
        $product->price = $data["price"];
        $product->update();
        // $images=array();
        // if($files=$request->file('images')){
        //     foreach($files as $file){
        //         $newPicture = new Picture();
        //         $newPicture->apartment_id = $newProduct->id;
        //         $newPicture->image=Storage::put('uploads',$file);
        //         $newPicture->save();
        //     }
        // }

        return redirect()->route('admin.products.index')->with('product-edited','product is edited sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
