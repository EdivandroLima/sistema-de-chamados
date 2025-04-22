<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-gray-600">

        <x-alert-success />

        <div wire:poll.3000ms class="bg-white overflow-hidden shadow-sm sm:rounded mt-4">
            <div class="p-3">
                <div class="p-5 space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Ticket #{{ $ticket->id }}</h2>
                        <p class="text-sm text-gray-500">Última atualização: {{$ticket->updated_at->format('d/m/Y')}}</p>
                    </div>
                    <!-- Ticket -->
                    <div class="space-y-2">
                        <p class="text-gray-700">
                            <span class="font-semibold">Cliente:</span>
                            {{ $ticket->user->name }}
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Assunto:</span>
                            {{ $ticket->subject }}
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Descrição:</span>
                            {{ $ticket->description }}
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Status:</span>
                            @if ($ticket->status == 'open')
                                <span
                                    class="inline-block bg-gray-200 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full">
                                    Pendente
                                </span>
                            @else
                                <span
                                    class="inline-block bg-emerald-100 text-emerald-600 text-xs font-semibold px-3 py-1 rounded-full">
                                    Resolvido
                                </span>
                            @endif
                        </p>
                    </div>
                    <!-- Respostas -->
                    <div>
                        <h3 class="text-md  text-gray-800 mb-2 flex gap-1 items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-message">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 9h8" />
                                <path d="M8 13h6" />
                                <path
                                    d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
                            </svg>
                            Respostas
                        </h3>
                        <div class="space-y-3 max-h-64 overflow-y-auto pr-1">
                            @foreach ($ticket->ticket_replies()->latest()->get() as $reply)
                                <div class="bg-gray-100 p-3 rounded-lg text-sm text-gray-700">
                                    <p>
                                        <span class="font-semibold">
                                            @if ($reply->user_id == auth()->user()->id)
                                                Você:
                                            @else
                                                {{ $reply->user->name }}
                                            @endif
                                        </span>
                                        {{ $reply->message }}
                                    </p>
                                    <span
                                        class="text-xs text-gray-500 block mt-1">{{ $reply->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                            @endforeach
                            @if ($ticket->ticket_replies()->count() == 0)
                                <div class="p-3 bg-yellow-100 text-sm border border-yellow-300 rounded text-yellow-900">
                                    Aguardando resposta.
                                </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <label for="resposta" class="block text-sm font-medium text-gray-700 mb-1">
                            Responder ticket:
                        </label>
                        <textarea id="resposta" rows="4" wire:model.defer="replyMessage"
                            class="w-full p-3 border border-gray-400 @error('replyMessage') border-red-500 @enderror @if ($ticket->status == 'resolved') bg-gray-100 @endif rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 resize-none text-sm text-gray-700"
                            placeholder="Digite sua resposta..." @if ($ticket->status == 'resolved') disabled @endif></textarea>
                        @error('replyMessage')
                            <div class="text-red-500 font-medium text-xs mb-3">{{ $message }}</div>
                        @enderror
                        <div class="text-start mt-2">
                            <button wire:click="setReplyMessage"
                                class="@if ($ticket->status == 'resolved') bg-gray-400 @else bg-indigo-500 hover:bg-indigo-600 @endif   text-white px-5 py-2 rounded-md text-sm transition font-medium @if ($ticket->status == 'resolved') bg-gray-200 @endif"
                                @if ($ticket->status == 'resolved') disabled @endif>
                                Enviar resposta
                            </button>
                        </div>
                    </div>
                    <!-- Ações -->
                    <div class="flex flex-wrap justify-end gap-3 pt-2 border-t pt-4">
                        <a href="{{ route('dashboard') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-black text-sm font-medium px-4 py-2 rounded transition">
                            Voltar
                        </a>
                        @if ($ticket->status == 'resolved')
                            <button wire:click="setOpen()"
                                class="bg-yellow-400 hover:bg-yellow-500 text-black text-sm font-medium px-4 py-2 rounded transition">
                                Reabrir
                            </button>
                        @else
                            <button wire:click="setResolved()"
                                class="bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-medium px-4 py-2 rounded transition">
                                Marcar como Resolvido
                            </button>
                        @endif
                        <button onclick="document.getElementById('btn-delete').click()"
                            class="bg-rose-500 hover:bg-rose-600 text-white text-sm font-medium px-4 py-2 rounded transition">
                            Deletar Ticket
                        </button>
                    </div>
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
                    Essa ação irá deletar o ticket permanentemente. Deseja continuar?
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
