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

        // $tickets = Ticket::where('user_id', auth()->user()->id);
        $tickets = Ticket::where('user_id', '>', 0);

        if ($this->status && $this->status != 'all')
            $tickets->where('status', $this->status);
        if ($this->search)
            $tickets->where('subject', 'like', "%{$this->search}%")->orWhere('id', $this->search);

        $tickets = $tickets->orderByDesc('updated_at')->paginate(10);
        return view('pages.dashboard', compact('tickets'));
    }
}
