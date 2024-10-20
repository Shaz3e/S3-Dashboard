<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\BaseComponent;
use App\Models\User;
use Livewire\Attributes\Url;

class ClientList extends BaseComponent
{
    #[Url()]
    public $filterStatus;

    protected function getModelClass()
    {
        return User::class;
    }

    protected function getViewName()
    {
        return 'livewire.admin.client.client-list';
    }

    public function mount()
    {
        $this->filters = [
            'active' => $this->filterStatus,
        ];
    }

    protected function applyAdditionalConstraints($query)
    {
        // Apply user_type = 1 filter
        $query->where('user_type', false);

        if (isset($this->filters['active']) && $this->filters['active'] !== '') {
            // Apply the filter only if it's not an empty value
            $query->where('active', $this->filters['active']);
        }
    }

    public function updatingFilterStatus($value)
    {
        $this->filters['active'] = $value;
        $this->resetPage();
    }
}
