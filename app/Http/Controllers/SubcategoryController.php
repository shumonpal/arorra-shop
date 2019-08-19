<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Repositories\SubcategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

class SubcategoryController extends AppBaseController
{
    /** @var  SubcategoryRepository */
    private $subcategoryRepository;

    public function __construct(SubcategoryRepository $subcategoryRepo)
    {
        $this->subcategoryRepository = $subcategoryRepo;
    }

    /**
     * Display a listing of the Subcategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subcategoryRepository->pushCriteria(new RequestCriteria($request));
        $subcategories = $this->subcategoryRepository->all();

        return view('subcategories.index')
            ->with('subcategories', $subcategories);
    }

    /**
     * Show the form for creating a new Subcategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('subcategories.modal_body');
    }

    /**
     * Store a newly created Subcategory in storage.
     *
     * @param CreateSubcategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateSubcategoryRequest $request)
    {
        $input = $request->all();

        $subcategory = $this->subcategoryRepository->create($input);

        DB::table('category_subcategory')->insert([
            'category_id' => $input['category_id'],
            'subcategory_id' => $subcategory->id,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            ]);

        return view('subcategories.table_row')->with('subcategory', $subcategory);
    }

    /**
     * Display the specified Subcategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('subcategories.index'));
        }

        return view('subcategories.show_fields')->with('subcategory', $subcategory);
    }

    /**
     * Show the form for editing the specified Subcategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('subcategories.index'));
        }

        return view('subcategories.modal_body')->with('subcategory', $subcategory);
    }

    /**
     * Update the specified Subcategory in storage.
     *
     * @param  int              $id
     * @param UpdateSubcategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubcategoryRequest $request)
    {
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('subcategories.index'));
        }

        $subcategory = $this->subcategoryRepository->update($request->all(), $id);

        return view('subcategories.table_row')
                ->with('subcategory', $subcategory);
    }

    /**
     * Remove the specified Subcategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('subcategories.index'));
        }

        $this->subcategoryRepository->delete($id);

        Flash::success('Subcategory deleted successfully.');

        return redirect(route('subcategories.index'));
    }
}
