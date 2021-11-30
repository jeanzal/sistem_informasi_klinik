<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index(){
        Session::put('title','Data Produk');
        $product = Product::select("products.*",'categories.name as kategori')
            ->join('categories','categories.id','=','products.category_id')->orderBy('products.id')->get();

        return view ('superadmin/content/produk/list', compact('product'));
    }
    public function add(){
        Session::put('title','Tambah Data Obat');
        $kategori = Category::all();
        return view ('superadmin/content/produk/add', compact('kategori'));
    }

    public function store(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;

        try {
            $product->save();
            return redirect (route('superadmin.produk.index'))->with('pesan-berhasil','Anda berhasil menambah data obat');
        }catch(\Exception $e){
            return redirect (route('superadmin.produk.index'))->with('pesan-gagal','Anda gagal menambah data obat');
        }
    }

}
