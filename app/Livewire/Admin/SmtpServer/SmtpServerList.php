<?php

namespace App\Livewire\Admin\SmtpServer;

use App\Livewire\BaseComponent;
use App\Models\SmtpServer;

class SmtpServerList extends  BaseComponent
{
    public $filterStatus;
    public $filterCategory;

    protected function getModelClass()
    {
        return SmtpServer::class;
    }

    protected function getViewName()
    {
        return 'livewire.admin.smtp-server.smtp-server-list';
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
