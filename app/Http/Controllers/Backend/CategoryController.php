<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $category
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $param = $request->all();
        $categories = $this->category->getList($param);
        $sumCategory = $this->category->countCategory($param);
        Session()->flashInput($request->input());

        return view('admin.categories.index',
            ['categories' => $categories, 'sumCategory' => $sumCategory]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $input = $request->all();
        if ($input != null) {
            $category = $this->category->add($input);
            if ($category != null) {
                return response()->json(['category' => $category, 'success' => 'Add categories success']);
            }
            return response()->json(['error' => 'Category does not exits']);
        }
        return response()->json(['error' => 'Category does not exits']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->category->findById($id);
        if ($category != null) {
            return response()->json($category);
        } else {
            return response()->json(['errors' => 'Category does not exits']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryStoreRequest $request
     * @param $id
     * @return Response
     */
    public function update(CategoryStoreRequest $request, $id)
    {
        $input = $request->all();
        if ($input) {
            $category = $this->category->updateCat($input, $id);
            $categories = $this->category->findById($id);
            if ($categories) {
                return response()->json(['success' => 'Update successfully', 'category' => $categories]);
            }
            return response()->json(['errors' => 'Update fail']);
        }
        return response()->json(['errors' => 'Update fail']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->category->findById($id);
        if ($this->category->findById($id) != null) {
            if ($this->category->deleteCategory($id)) {
                return response()->json($id);
            }
        }
        return redirect('admin/categories')->with('error', 'Delete product is failed');
    }
}
