<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use Livewire\Component;

class Show extends Component
{
    public $ticket;

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function render()
    {
        $this->validAcess();
        return view('pages.tickets.show');
    }

    public function setResolved()
    {
        $this->validAcess();
        $this->ticket->status = 'resolved';
        $this->ticket->save();
        session()->flash('success', 'Ticket resolvido com sucesso.');
    }

    public function setOpen()
    {
        $this->validAcess();
        $this->ticket->status = 'open';
        $this->ticket->save();
        session()->flash('success', 'Ticket reaberto com sucesso.');
    }

    public function validAcess()
    {
        if (auth()->user()->id != $this->ticket->user_id || 'se for admin' == false)
            abort(403);
    }
}
