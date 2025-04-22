<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-gray-600">

        <x-alert-success />

        <div class="flex items-center justify-between gap-3">
            <div class="">
                <h2 class="text-2xl">Suas solicitações de suporte</h2>
            </div>
            @role('customer')
                <div class="">
                    <a href="{{ route('tickets.create') }}" class="font-bold flex gap-1  text-indigo-500 text-sm uppercase">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Nova solicitação de suporte
                    </a>
                </div>
            @endrole
        </div>
        <!-- Filtro -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded mt-4">
            <form class="">
                <div class="flex">
                    <!-- Status -->
                    <label for="states" class="sr-only">Status</label>
                    <select wire:model.defer="status"
                        class=" py-5 px-5 border-0 focus:ring-0 text-gray-900 text-sm   dark:border-s-gray-700   block w-[200px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        type="button">
                        <option value="" selected disabled>Status</option>
                        <option value="open">Pendente</option>
                        <option value="resolved">Resolvido</option>
                        <option value="all">Todos</option>
                    </select>

                    <div class="border border-2 border-s-gray-100 mx-3 my-2 border-e-0">
                    </div>

                    <!-- Pesquisa -->
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="search-dropdown" wire:model.defer="search"
                            class="block ps-10 py-5 px-5 w-full z-20 text-sm text-gray-900  border-0  focus:ring-0 focus:border-indigo-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Pesquisar por assunto ou ID" required />
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


            <div class="" wire:poll.3000ms>
                <div class="">

                    @if ($tickets->total() == 0)
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
                                <h3 class="text-lg font-medium">Sem solicitações de suporte</h3>
                            </div>
                            <div class="mt-2 text-sm">
                                Não há nenhuma solicitação de suporte pendente. Assim que uma nova
                                solicitação for registrada, ela aparecerá aqui automaticamente.
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm text-left">
                                <thead class="text-gray-500 border-b">
                                    <tr>
                                        <th class="py-2 px-4">TICKET #</th>
                                        @role('admin')
                                            <th class="py-2 px-4">CLIENTE</th>
                                        @endrole
                                        <th class="py-2 px-4">ASSUNTO</th>
                                        <th class="py-2 px-4">STATUS DA SOLICITAÇÃO</th>
                                        <th class="py-2 px-4">ÚLTIMA ATUALIZAÇÃO</th>
                                        <th class="py-2 px-4"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach ($tickets as $ticket)
                                        <tr class=" border-b-8 border-gray-100 shadow bg-white hover:bg-gray-50">
                                            <td class="py-3 px-4 font-medium">#{{ $ticket->id }}</td>
                                            @role('admin')
                                                <td class="py-3 px-4">
                                                    {{ $ticket->user->name }}
                                                </td>
                                            @endrole
                                            <td class="py-3 px-4">{{ Str::limit($ticket->subject, 100) }}</td>
                                            <td class="py-3 px-4">
                                                @if ($ticket->status == 'open')
                                                    <span
                                                        class="bg-gray-200 text-gray-600 text-xs px-3 py-1 rounded-full">
                                                        Pendente
                                                    </span>
                                                @else
                                                    <span class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full">
                                                        Resolvido
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="py-3 px-4">{{ $ticket->updated_at->format('d-m-Y') }}</td>
                                            <td class="py-3 px-4 text-right relative">
                                                <div class="flex items-center gap-2 justify-end">
                                                    @php
                                                        $ticketTeplies = $ticket
                                                            ->ticket_replies()
                                                            ->where('user_id', '!=', auth()->user()->id)
                                                            ->where('is_read', 0);
                                                    @endphp
                                                    @if ($ticketTeplies->exists())
                                                        <span
                                                            class="bg-red-200 text-red-700 text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                                            {{ $ticketTeplies->count() }}
                                                        </span>
                                                    @endif
                                                    <a href="{{ route('tickets.show', $ticket->id) }}"
                                                        class="bg-indigo-100 text-indigo-600 px-4 py-3 font-semibold rounded hover:bg-indigo-200 uppercase text-xs">
                                                        Visualizar
                                                    </a>
                                                </div>
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
                            {{ $tickets->links() }}
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
