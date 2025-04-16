<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-600">
            <div class="flex items-center justify-between gap-3">
                <div class="">
                    <h2 class="text-2xl">Suas solicitações de suporte</h2>
                </div>
                <div class="">
                    <a href="" class="font-bold flex gap-1  text-indigo-500 text-sm uppercase">
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
            </div>
            <!-- Filtro -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded mt-4">
                <form class="">
                    <div class="flex">
                        <!-- Status -->
                        <label for="states" class="sr-only">Status</label>
                        <select
                            class=" py-5 px-5 border-0 focus:ring-0 text-gray-900 text-sm   dark:border-s-gray-700   block w-[200px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                            type="button">

                            <option selected disabled>Status</option>
                            <option value="CA">Todos</option>
                            <option value="CA">Pendente</option>
                            <option value="TX">Lorem</option>
                            <option value="TX">Lorem</option>
                            </svg>
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
                            <input type="search" id="search-dropdown"
                                class="block ps-10 py-5 px-5 w-full z-20 text-sm text-gray-900  border-0  focus:ring-0 focus:border-indigo-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Pesquisar por tópico ou ID" required />
                            <div class="absolute top-0 end-0 flex h-full py-2.5 pe-3">
                                <button type="submit"
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


                {{-- ============ --}}
                <div class="">
                    <div class="">
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm text-left">
                                <thead class="text-gray-500 border-b">
                                    <tr>
                                        <th class="py-2 px-4">TICKET #</th>
                                        <th class="py-2 px-4">TÓPICO</th>
                                        <th class="py-2 px-4">STATUS DA SOLICITAÇÃO</th>
                                        <th class="py-2 px-4">ÚLTIMA ATUALIZAÇÃO</th>
                                        <th class="py-2 px-4"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach ([3,3,3,3] as $item)
                                        <tr class=" border-b-8 border-gray-100 shadow bg-white hover:bg-gray-50">
                                            <td class="py-3 px-4 font-medium">#2345</td>
                                            <td class="py-3 px-4">How can I invite my friend</td>
                                            <td class="py-3 px-4">
                                                <span
                                                    class="bg-gray-200 text-gray-600 text-xs px-3 py-1 rounded-full">Pending</span>
                                            </td>
                                            <td class="py-3 px-4">02-23-2017</td>
                                            <td class="py-3 px-4 text-right">
                                                <div class="flex items-center gap-2 justify-end">
                                                    <button
                                                        class="bg-indigo-100 text-indigo-600 px-4 py-3 font-semibold rounded hover:bg-indigo-200 uppercase text-xs">Visualizar</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class=" border-b-8 border-gray-100 shadow bg-white hover:bg-gray-50">
                                            <td class="py-3 px-4 font-medium">#2343</td>
                                            <td class="py-3 px-4">Balance error</td>
                                            <td class="py-3 px-4">
                                                <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full">Need
                                                    your reply</span>
                                            </td>
                                            <td class="py-3 px-4">02-21-2017</td>
                                            <td class="py-3 px-4 text-right relative">
                                                <div class="flex items-center gap-2 justify-end">
                                                    <span
                                                        class="bg-red-200 text-red-700 text-xs rounded-full w-5 h-5 flex items-center justify-center">1</span>

                                                    <button
                                                        class="bg-blue-100 text-blue-600 px-4 py-3 font-semibold rounded hover:bg-blue-200 uppercase text-xs">Visualizar</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class=" border-b-8 border-gray-100 shadow bg-white hover:bg-gray-50">
                                            <td class="py-3 px-4 font-medium">#2342</td>
                                            <td class="py-3 px-4">How can I contact contractor</td>
                                            <td class="py-3 px-4">
                                                <span
                                                    class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full">Resolved</span>
                                            </td>
                                            <td class="py-3 px-4">02-21-2017</td>
                                            <td class="py-3 px-4 text-right">
                                                <div class="flex items-center gap-2 justify-end">
                                                    <button
                                                        class="bg-blue-100 text-blue-600 px-4 py-3 font-semibold rounded hover:bg-blue-200 uppercase text-xs">Visualizar</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- ============ --}}


            </div>
        </div>
    </div>
</x-app-layout>
