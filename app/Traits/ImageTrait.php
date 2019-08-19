<?php

namespace App\Traits;


/**
 * Trait ImageTrait
 */
trait ImageTrait
{
    
     /**
     * @param string $name
     * @param string $path where saved file
     * @return $path
     */
    public function saveFile($name, $path)
    {
        if (!empty($name)) {
            $path = $name->storeAs($path,  $name->getClientOriginalName());
            return $path;
        }
    }
}
