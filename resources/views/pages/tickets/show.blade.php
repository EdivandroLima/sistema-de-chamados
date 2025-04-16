<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-gray-600">

        <!-- Filtro -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded mt-4">
            <div class="p-3">


                <div class="p-5 space-y-6">
                    <!-- Header -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Ticket #2343</h2>
                        <p class="text-sm text-gray-500">Última atualização: 21/02/2017</p>
                    </div>

                    <!-- Informações do ticket -->
                    <div class="space-y-2">
                        <p class="text-gray-700">
                            <span class="font-semibold">Assunto:</span> Balance error
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Descrição:</span> O valor do meu saldo está incorreto após
                            realizar uma transferência.
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Status:</span>
                            <span
                                class="inline-block bg-emerald-100 text-emerald-600 text-xs font-semibold px-3 py-1 rounded-full">Aberto</span>
                        </p>
                    </div>

                    <!-- Comentários anteriores -->
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
                        <div class="space-y-3 max-h-48 overflow-y-auto pr-1">
                            <div class="bg-gray-100 p-3 rounded-lg text-sm text-gray-700">
                                <p><span class="font-semibold">Você:</span> Verifiquei que o erro de saldo foi causado
                                    por uma duplicação de transação.</p>
                                <span class="text-xs text-gray-500 block mt-1">21/02/2017 09:33</span>
                            </div>
                            <div class="bg-gray-100 p-3 rounded-lg text-sm text-gray-700">
                                <p><span class="font-semibold">Usuário:</span> Meu saldo está R$ 100,00 menor do que
                                    deveria estar.</p>
                                <span class="text-xs text-gray-500 block mt-1">20/02/2017 22:10</span>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para nova resposta -->
                    <div>
                        <label for="resposta" class="block text-sm font-medium text-gray-700 mb-1">Responder
                            ticket:</label>
                        <textarea id="resposta" rows="4"
                            class="w-full p-3 border border-gray-400 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 resize-none text-sm text-gray-700"
                            placeholder="Digite sua resposta..."></textarea>
                        <div class="text-start mt-2">
                            <button
                                class="bg-indigo-500 hover:bg-indigo-600 text-white px-5 py-2 rounded-md text-sm transition font-medium">Enviar
                                resposta</button>
                        </div>
                    </div>

                    <!-- Botões de ação -->
                    <div class="flex flex-wrap justify-end gap-3 pt-2 border-t pt-4">
                        <button
                            class="bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-medium px-4 py-2 rounded transition">
                            Marcar como Resolvido
                        </button>
                        <button
                            class="bg-yellow-400 hover:bg-yellow-500 text-white text-sm font-medium px-4 py-2 rounded transition">
                            Reabrir
                        </button>
                        <button
                            class="bg-rose-500 hover:bg-rose-600 text-white text-sm font-medium px-4 py-2 rounded transition">
                            Deletar Ticket
                        </button>
                    </div>
                </div>



                <!-- Alpine.js (caso ainda não tenha no projeto) -->
                <script src="https://unpkg.com/alpinejs" defer></script>

                <!-- Componente -->
                <div x-data="{ showModal: false }">

                    <!-- Botão que abre o modal -->
                    <button @click="showModal = true"
                        class="bg-rose-500 hover:bg-rose-600 text-white text-sm font-medium px-4 py-2 rounded transition">
                        Deletar Ticket
                    </button>

                    <!-- Modal de confirmação -->
                    <div x-show="showModal" x-cloak
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                        <div @click.away="showModal = false"
                            class="bg-white w-full max-w-md rounded-xl p-6 shadow-lg space-y-4">
                            <h2 class="text-xl font-semibold text-gray-800">Tem certeza?</h2>
                            <p class="text-sm text-gray-600">
                                Essa ação irá deletar o ticket permanentemente. Deseja continuar?
                            </p>

                            <div class="flex justify-end gap-3 pt-2">
                                <button @click="showModal = false"
                                    class="px-4 py-2 text-sm bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md">
                                    Cancelar
                                </button>

                                <button @click="showModal = false; $wire.call('deleteTicket')"
                                    class="px-4 py-2 text-sm bg-rose-600 hover:bg-rose-700 text-white rounded-md">
                                    Deletar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>

    </div>
</div>
