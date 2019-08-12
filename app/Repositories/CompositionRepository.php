<?php

namespace App\Repositories;

use App\Models\Composition;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompositionRepository
 * @package App\Repositories
 * @version May 31, 2019, 12:36 pm UTC
 *
 * @method Composition findWithoutFail($id, $columns = ['*'])
 * @method Composition find($id, $columns = ['*'])
 * @method Composition first($columns = ['*'])
*/
class CompositionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Composition::class;
    }
}
