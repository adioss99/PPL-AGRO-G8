<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\ProductRequest;

class DashboardProductController extends Controller
{
    //
    use SoftDeletes;

    // user
    public function index()
    {
        $products = Product::with(['galleries'])
                ->where('users_id',Auth::user()->id)
                ->get();
        return view('pages.dashboard-products',[
            'products' => $products
        ]);
        
    }


    // admin
    public function create()
    {   
        $users = User::all()->where('roles','USER');
        return view('pages.dashboard-products-create',[
            'users' => $users
        ]);
    }

    public function store(ProductRequest $request)
    {        
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product', 'public')
        ];
        ProductGallery::create($gallery);

        return redirect()->route('product.index')->with('toast_success','Data produk berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {   
        $product = Product::with(['galleries','user'])->where('id',$id)->findOrFail($id);
        $users = User::all()->where('roles','USER');
        return view('pages.dashboard-products-edit',[
            'product' => $product,
            'users' => $users
        ]);
    }

    public function update(ProductRequest $request, $id)
    {   
        $item = Product::findOrFail($id);
        
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('product.index')->with('toast_success','Data berhasil diperbarui');
    }

    public function uploadGallery(Request $request)
    {   
        $data = $request->all();
        $data['photos'] = $request->file('photos')->store('assets/product','public');
        ProductGallery::create($data);
        return redirect()->route('dashboard-products-edit',$request->products_id);
    }

    public function deleteGallery(Request $request, $id){
        $item = ProductGallery::findorFail($id);
        $item->delete();

        return redirect()->route('dashboard-products-edit',$item->products_id);
    }

}
