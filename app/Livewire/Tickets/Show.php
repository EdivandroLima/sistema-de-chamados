<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use App\Models\TicketReply;
use Livewire\Component;

class Show extends Component
{
    public $ticket, $replyMessage;

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function render()
    {
        $this->validAcess();
        return view('pages.tickets.show');
    }

    public function setReplyMessage()
    {

        $this->validate([
            'replyMessage' => ['required', 'max:2000']
        ], [], [
            'replyMessage' => 'resposta'
        ]);

        TicketReply::create([
            'ticket_id' => $this->ticket->id,
            'user_id' => auth()->user()->id,
            'message' => $this->replyMessage,
        ]);

        $this->replyMessage = '';

        session()->flash('success', 'Resposta adicionada com sucesso.');
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

    public function destroy()
    {
        $this->validAcess();
        $this->ticket->delete();
        return redirect()->route('dashboard')->with(['success' => 'Ticket removido com sucesso.']);
    }
}
