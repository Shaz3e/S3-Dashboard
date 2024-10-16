<?php

namespace App\Livewire\Admin\Role;

use App\Livewire\BaseComponent;
use App\Models\Role;

class RoleList extends BaseComponent
{
    public $filterStatus;
    public $filterCategory;

    protected function getModelClass()
    {
        return Role::class;
    }

    protected function getViewName()
    {
        return 'livewire.admin.role.role-list';
    }

    public function mount()
    {
        $this->filters = [
            'status' => $this->filterStatus,
            'category' => $this->filterCategory,
        ];
    }

    public function updatingFilterStatus($value)
    {
        $this->filters['status'] = $value;
        $this->resetPage();
    }

    public function updatingFilterCategory($value)
    {
        $this->filters['category'] = $value;
        $this->resetPage();
    }
}
