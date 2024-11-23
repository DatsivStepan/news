<?php

namespace App\Filters;

class GalleryFilter extends QueryFilter
{
    public function search($search = '')
    {
        return $this->builder->where('name', 'LIKE', '%' . $search . '%');
    }
}
