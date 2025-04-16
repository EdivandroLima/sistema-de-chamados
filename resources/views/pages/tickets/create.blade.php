<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-600">

        <!-- Filtro -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded mt-4">
            <div class="p-3">


                <div class=" p-5 pt-4 space-y-6">
                    <h2 class="text-2xl font-bold text-gray-800">Nova solicitação de suporte</h2>

                    <!-- Mensagem de sucesso/erro (exemplo) -->
                    @if (session()->has('message'))
                        <div class="p-3 bg-green-100 text-green-700 text-sm rounded-md">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="store">
                        <!-- Assunto -->
                        <div class="space-y-1 mb-4">
                            <label for="assunto" class="block text-sm font-medium text-gray-700">Assunto</label>
                            <input type="text" id="assunto" wire:model.defer="assunto"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
                            @error('assunto')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Descrição -->
                        <div class="space-y-1">
                            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                            <textarea id="descricao" rows="5" wire:model.defer="descricao"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm resize-none"
                                placeholder="Explique o problema com detalhes..."></textarea>
                            @error('descricao')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Botão de envio -->
                        <div class="pt-4">
                            <button type="submit"
                                class="bg-indigo-500 hover:bg-indigo-600 text-white px-8 py-3 rounded-md text-sm font-semibold transition ">
                                Enviar Solicitação
                            </button>
                        </div>
                    </form>
                </div>



            </div>
        </div>

    </div>
</div>
