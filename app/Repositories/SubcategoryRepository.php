<?php

namespace App\Repositories;

use App\Models\Subcategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SubcategoryRepository
 * @package App\Repositories
 * @version May 5, 2019, 2:19 pm UTC
 *
 * @method Subcategory findWithoutFail($id, $columns = ['*'])
 * @method Subcategory find($id, $columns = ['*'])
 * @method Subcategory first($columns = ['*'])
*/
class SubcategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'descp'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Subcategory::class;
    }
}
