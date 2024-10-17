<?php

namespace App\Livewire\Admin\Permission;

use App\Livewire\BaseComponent;
use App\Models\Permission;

class PermissionList extends BaseComponent
{
    public $filterStatus;
    public $filterCategory;

    protected function getModelClass()
    {
        return Permission::class;
    }

    protected function getViewName()
    {
        return 'livewire.admin.permission.permission-list';
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
