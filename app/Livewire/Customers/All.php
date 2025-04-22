<?php

namespace App\Livewire\Customers;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;

    public $search, $deleteUserId;

    public function render()
    {
        $customers = $this->getCustomers();
        return view('pages.customers.all', compact('customers'));
    }

    public function getCustomers()
    {
        $customers = User::whereHas('roles', function ($query) {
            return $query->where('name', 'customer');
        });

        if ($this->search)
            $customers->where('name', 'like', "%{$this->search}%");

        return $customers->latest()->paginate(10);
    }

    public function destroy()
    {
        $user = User::find($this->deleteUserId);
        if ($user->hasRole('admin'))
            abort(403);

        $user->delete();
        session()->flash('success', 'Usuário deletado com sucesso!');
    }
}
