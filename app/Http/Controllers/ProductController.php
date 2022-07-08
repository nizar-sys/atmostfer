<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Merk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merks = Merk::latest()->get(['id', 'name']);
        return view('dashboard.products.create', compact('merks'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $newProduct = Product::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $merks = Merk::latest()->get(['id', 'name']);
        return view('dashboard.products.edit', compact('product', 'merks'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil disimpan',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPhotos(Product $product)
    {
        return view('dashboard.products.add-photos', compact('product'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePhotos(Request $request, Product $product)
    {
        if($request->hasFile('photos')) {
            $photos = $request->file('photos');
            foreach($photos as $photo) {
                $imageName = time() .'-'. $photo->getClientOriginalName();
                $photo->move(public_path('uploads/images/'), $imageName);
                $product->imageProducts()->create([
                    'filename' => $imageName
                ]);
            }

            return back()->with('success', 'Photos has been uploaded');
        }

        return back()->with('error', 'No photos selected');
    }
}
