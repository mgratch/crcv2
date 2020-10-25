<?php

namespace App\Http\Livewire\DataTable;

trait WithSorting
{
    public $sorts = [];

    public function sortBy($field)
    {
        if (! isset($this->sorts[$field])) return $this->sorts[$field] = 'desc';

        if ($this->sorts[$field] === 'desc') return $this->sorts[$field] = 'asc';

        unset($this->sorts[$field]);
    }

    public function applySorting($query)
    {
        foreach ($this->sorts as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        return $query;
    }
}
