<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\Products\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $product;
    protected $cat;

    /**
     * ProductController constructor.
     * @param Product $product
     */
    public function __construct(ProductRepositoryInterface $product, CategoryRepositoryInterface $cat)
    {
        $this->product = $product;
        $this->cat = $cat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session()->flashInput($request->all());
        if ($request->all()) {
            $products = $this->product->getList($request->all());
        } else {
            $products = $this->product->getAll();
        }
        $cat = $this->cat->getListWithTrashed();
        $catEdit = $this->cat->getAll();
        $sumProduct = $this->product->count($request->all());
        return view('admin.products.list',
            ['products' => $products, 'sumProduct' => $sumProduct, 'category' => $cat, 'categoryEdit' => $catEdit]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = $this->product->create($request->all());
        if ($product == false) {
            return abort(500, 'Error manipulating with the database');
        }
        $category = $this->cat->findById($product->cat_id);
        return response()->json([
            'message' => 'Create product success !',
            'product' => $product,
            'cat_name' => $category->cat_name
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->findById($id);
        if (isset($product)) {
            return response()->json(['product' => $product]);
        }
        return redirect('admin/products')->with('error', 'Does not exist item');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, $id)
    {
        $data = request()->all();
        $data['price'] = intval(str_replace(',', '', request('price')));
        $request->validated($data);
        if ($this->product->update($id, $data)) {
            $product = $this->product->findById($id);
            $category = $this->cat->findWithTrashed($product->cat_id);
            return response()->json(['product' => $product, 'category' => $category]);
        } else {
            return redirect('admin/products')->with('error', 'Edit product is failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = $this->product->findById($id);
        if ($input != null) {
            if ($input->delete($id)) {
                return response()->json($id);
            }
            return response()->json(['errors' => 'Delete fail']);
        }
        return response()->json(['errors' => 'Delete fail']);
    }
}
