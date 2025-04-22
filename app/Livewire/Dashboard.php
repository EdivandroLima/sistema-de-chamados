<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $search, $status = '';

    public function render()
    {
        $tickets = $this->getTickets();
        return view('pages.dashboard', compact('tickets'));
    }

    public function getTickets()
    {
        /** @disregard */
        if (auth()->user()->hasRole('admin')) {
            $tickets = Ticket::where('user_id', '>', 0);
        } else {
            $tickets = Ticket::where('user_id', auth()->user()->id);
        }

        if ($this->status && $this->status != 'all')
            $tickets->where('status', $this->status);
        if ($this->search)
            $tickets->where('subject', 'like', "%{$this->search}%")->orWhere('id', $this->search);

        return $tickets->orderByDesc('updated_at')->paginate(10);
    }
}
