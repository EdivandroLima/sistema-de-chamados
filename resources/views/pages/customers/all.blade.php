<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-gray-600">
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
                        <input type="search" id="search-dropdown"
                            class="block ps-12 py-5 px-5 w-full z-20 text-sm text-gray-900  border-0  focus:ring-0 focus:border-indigo-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Pesquisar por nome" required />
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
                                    <th class="py-2 px-4">NOME</th>
                                    <th class="py-2 px-4">EMAIL</th>
                                    <th class="py-2 px-4">CADASTRO</th>
                                    <th class="py-2 px-4"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ([3, 3, 3, 3] as $item)
                                    <tr class=" border-b-8 border-gray-100 shadow bg-white hover:bg-gray-50">
                                        <td class="py-3 px-4">{{ fake()->name() }}</td>
                                        <td class="py-3 px-4">
                                            {{ fake()->email() }}
                                        </td>
                                        <td class="py-3 px-4">02-23-2017</td>
                                        <td class="py-3 px-4 text-right">
                                            <button
                                                class="bg-rose-500 hover:bg-rose-600 text-white text-sm font-medium px-4 py-2 rounded transition">
                                                Deletar
                                            </button>
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
