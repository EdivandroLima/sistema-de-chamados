<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-gray-600">

        <x-alert-success />

        <div class="flex items-center justify-between gap-3">
            <div class="">
                <h2 class="text-2xl">Clientes</h2>
            </div>
        </div>
        <!-- Filtro -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded mt-4">
            <form class="">
                <div class="flex">
                    <!-- Pesquisa -->
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input wire:model.defer="search" type="search" id="search-dropdown"
                            class="block ps-12 py-5 px-5 w-full z-20 text-sm text-gray-900  border-0  focus:ring-0 focus:border-indigo-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Pesquisar por nome" required />
                        <div class="absolute top-0 end-0 flex h-full py-2.5 pe-3">
                            <button type="submit" wire:click.prevent="$refresh"
                                class=" px-5 text-sm uppercase  text-white bg-indigo-500 rounded border border-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Pesquisar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Tickets -->
        <div class="overflow-hidden  mt-10">
            <div class="">
                <div class="">
                    @if ($customers->total() == 0)
                        <div id="alert-additional-content-4"
                            class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                            role="alert">
                            <div class="flex items-center">
                                <svg class="shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <h3 class="text-lg font-medium">
                                    Nenhum cliente cadastrado.
                                </h3>
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm text-left">
                                <thead class="text-gray-500 border-b">
                                    <tr>
                                        <th class="py-2 px-4">NOME</th>
                                        <th class="py-2 px-4">EMAIL</th>
                                        <th class="py-2 px-4">CADASTRO</th>
                                        <th class="py-2 px-4"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach ($customers as $customer)
                                        <tr class=" border-b-8 border-gray-100 shadow bg-white hover:bg-gray-50">
                                            <td class="py-3 px-4">{{ $customer->name }}</td>
                                            <td class="py-3 px-4">
                                                {{ $customer->email }}
                                            </td>
                                            <td class="py-3 px-4">{{ $customer->created_at->format('d-m-Y') }}</td>
                                            <td class="py-3 px-4 text-right">
                                                <button wire:click="deleteUserId = {{ $customer->id }}"
                                                    onclick="document.getElementById('btn-delete').click()"
                                                    class="bg-rose-500 hover:bg-rose-600 text-white text-sm font-medium px-4 py-2 rounded transition">
                                                    Deletar
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <style>
                                span.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5.dark\:bg-gray-800.dark\:border-gray-600 {
                                    background: #6366f1;
                                    color: white;
                                    border-color: #6366f1;
                                }
                            </style>
                            {{ $customers->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Model Deletar -->
    <div x-data="{ showModal: false }">
        <button id="btn-delete" @click="showModal = true" class="hidden">
            Deletar Ticket
        </button>
        <!-- Modal de confirmação -->
        <div x-show="showModal" x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div @click.away="showModal = false" class="bg-white w-full max-w-md rounded-xl p-6 shadow-lg space-y-4">
                <h2 class="text-xl font-semibold text-gray-800">Tem certeza?</h2>
                <p class="text-sm text-gray-600">
                    Essa ação irá deletar o cliente permanentemente. Deseja continuar?
                </p>
                <div class="flex justify-end gap-3 pt-2">
                    <button @click="showModal = false"
                        class="px-4 py-2 text-sm bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md">
                        Cancelar
                    </button>
                    <button @click="showModal = false; $wire.call('destroy')"
                        class="px-4 py-2 text-sm bg-rose-600 hover:bg-rose-700 text-white rounded-md">
                        Deletar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--/ Model Deletar -->
</div>
