<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use Livewire\Component;

class Create extends Component
{

    public $subject, $description;

    public function render()
    {
        return view('pages.tickets.create');
    }

    public function store()
    {
        $this->validate([
            'subject' => ['required', 'max:255'],
            'description' => ['required', 'max:2000'],
        ]);

        Ticket::create([
            'subject' => $this->subject,
            'description' => $this->description,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('dashboard')->with(['success' => 'Solicitação enviada com sucesso.']);
    }
}
