<?php

namespace Modules\Testowy\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Testowy\Entities\Kategory;
use Modules\Testowy\Http\Requests\CreateKategoryRequest;
use Modules\Testowy\Http\Requests\UpdateKategoryRequest;
use Modules\Testowy\Repositories\KategoryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class KategoryController extends AdminBaseController
{
    /**
     * @var KategoryRepository
     */
    private $kategory;

    public function __construct(KategoryRepository $kategory)
    {
        parent::__construct();

        $this->kategory = $kategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$kategories = $this->kategory->all();

        return view('testowy::admin.kategories.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('testowy::admin.kategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateKategoryRequest $request
     * @return Response
     */
    public function store(CreateKategoryRequest $request)
    {
        $this->kategory->create($request->all());

        return redirect()->route('admin.testowy.kategory.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('testowy::kategories.title.kategories')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Kategory $kategory
     * @return Response
     */
    public function edit(Kategory $kategory)
    {
        return view('testowy::admin.kategories.edit', compact('kategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Kategory $kategory
     * @param  UpdateKategoryRequest $request
     * @return Response
     */
    public function update(Kategory $kategory, UpdateKategoryRequest $request)
    {
        $this->kategory->update($kategory, $request->all());

        return redirect()->route('admin.testowy.kategory.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('testowy::kategories.title.kategories')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Kategory $kategory
     * @return Response
     */
    public function destroy(Kategory $kategory)
    {
        $this->kategory->destroy($kategory);

        return redirect()->route('admin.testowy.kategory.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('testowy::kategories.title.kategories')]));
    }
}
