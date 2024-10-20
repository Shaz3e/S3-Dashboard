<?php

namespace App\Livewire\Admin\User;

use App\Livewire\BaseComponent;
use App\Models\User;

class UserList extends BaseComponent
{
    public $filterStatus;

    protected function getModelClass()
    {
        return User::class;
    }

    protected function getViewName()
    {
        return 'livewire.admin.user.user-list';
    }

    public function mount()
    {
        $this->filters = [
            'status' => $this->filterStatus,
        ];
    }

    protected function applyAdditionalConstraints($query)
    {
        // Apply user_type = 1 filter
        $query->where('user_type', true);
    }

    public function updatingFilterStatus($value)
    {
        $this->filters['status'] = $value;
        $this->resetPage();
    }
}
