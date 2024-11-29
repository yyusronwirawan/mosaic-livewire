<x-app-layout background="bg-white">
    <!-- Content -->
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-4 md:mb-2">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">$47,347.09</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Delete button -->
                <div class="table-items-action hidden">
                    <div class="flex items-center">
                        <div class="hidden xl:block text-sm italic mr-2 whitespace-nowrap"><span class="table-items-count"></span> items selected</div>
                        <button class="btn bg-white border-slate-200 hover:border-slate-300 text-rose-500 hover:text-rose-600">Delete</button>
                    </div>
                </div>

                <!-- Search form -->
                <x-search-form />

                <!-- Export button -->
                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">Export Transactions</button>                            
                
            </div>

        </div>

        <div class="mb-5">
            <span>Transactions from </span>
            <div class="relative inline-flex" x-data="{ open: false }">
                <button class="inline-flex justify-center items-center group" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                    <div class="flex items-center truncate">
                        <span class="truncate font-medium text-indigo-500 group-hover:text-indigo-600">My Personal Account</span>
                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-indigo-400" viewBox="0 0 12 12">
                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                        </svg>
                    </div>
                </button>
                <div
                    class="origin-top-right z-10 absolute top-full left-0 min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                    @click.outside="open = false"
                    @keydown.escape.window="open = false" x-show="open"
                    x-transition:enter="transition ease-out duration-200 transform"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-out duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-cloak
                >
                    <ul>
                        <li>
                            <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Business Account</a>
                        </li>
                        <li>
                            <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Family Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="mb-5">
            <ul class="flex flex-wrap -m-1">
                <li class="m-1">
                    <button class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-transparent shadow-sm bg-indigo-500 text-white duration-150 ease-in-out">View All</button>
                </li>
                <li class="m-1">
                    <button class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">Completed</button>
                </li>
                <li class="m-1">
                    <button class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">Pending</button>
                </li>
                <li class="m-1">
                    <button class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">Canceled</button>
                </li>
            </ul>
        </div>

        <!-- Table -->
        <x-finance.transactions-table :transactions="$transactions" />
        
        <!-- Pagination -->
        <div class="mt-8">
            {{$transactions->links()}}
        </div>

    </div>
</x-app-layout>
