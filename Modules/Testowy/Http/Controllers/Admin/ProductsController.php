<?php

namespace Modules\Testowy\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Testowy\Entities\Products;
use Modules\Testowy\Http\Requests\CreateProductsRequest;
use Modules\Testowy\Http\Requests\UpdateProductsRequest;
use Modules\Testowy\Repositories\ProductsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ProductsController extends AdminBaseController
{
    /**
     * @var ProductsRepository
     */
    private $products;

    public function __construct(ProductsRepository $products)
    {
        parent::__construct();

        $this->products = $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$products = $this->products->all();

        return view('testowy::admin.products.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('testowy::admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductsRequest $request
     * @return Response
     */
    public function store(CreateProductsRequest $request)
    {
        $this->products->create($request->all());

        return redirect()->route('admin.testowy.products.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('testowy::products.title.products')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Products $products
     * @return Response
     */
    public function edit(Products $products)
    {
        return view('testowy::admin.products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Products $products
     * @param  UpdateProductsRequest $request
     * @return Response
     */
    public function update(Products $products, UpdateProductsRequest $request)
    {
        $this->products->update($products, $request->all());

        return redirect()->route('admin.testowy.products.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('testowy::products.title.products')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Products $products
     * @return Response
     */
    public function destroy(Products $products)
    {
        $this->products->destroy($products);

        return redirect()->route('admin.testowy.products.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('testowy::products.title.products')]));
    }
}
