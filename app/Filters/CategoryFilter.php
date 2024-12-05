<?php

namespace App\Filters;

class CategoryFilter extends QueryFilter
{
    public function search($search_string = '')
    {
        return $this->builder->where('name', 'LIKE', '%' . $search_string . '%');
    }

    public function parent($parentid = null)
    {
        if ($parentid) {
            return $this->builder->whereHas('relation', function ($query) use ($parentid) {
                $query->where('parent_id', $parentid);
            });
        }
    }
}
