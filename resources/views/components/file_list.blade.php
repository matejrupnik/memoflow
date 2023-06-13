<!-- Table Section -->
<!-- Card -->
<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                <!-- Header -->
                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                            Your memos
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Create, edit and download memos.
                        </p>
                    </div>

                    <div>
                        <div class="inline-flex gap-x-2">
                            <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                <button onclick="location.href = '{{ route('export') }}'" id="hs-as-table-table-export-dropdown" type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                    Export
                                </button>
                            </div>

                            <div class="hs-dropdown relative inline-block [--placement:bottom-right]" data-hs-dropdown-auto-close="inside">
                                </button>
                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[12rem] z-20 bg-white shadow-md rounded-lg mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-as-table-table-filter-dropdown">
                                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <label for="hs-as-filters-dropdown-frequency" class="flex py-2.5 px-3">
                                            <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-frequency" checked>
                                            <span class="ml-3 text-sm text-gray-800 dark:text-gray-200">Frequency</span>
                                        </label>
                                        <label for="hs-as-filters-dropdown-status" class="flex py-2.5 px-3">
                                            <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-status" checked>
                                            <span class="ml-3 text-sm text-gray-800 dark:text-gray-200">Status</span>
                                        </label>
                                        <label for="hs-as-filters-dropdown-created" class="flex py-2.5 px-3">
                                            <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-created">
                                            <span class="ml-3 text-sm text-gray-800 dark:text-gray-200">Created</span>
                                        </label>
                                        <label for="hs-as-filters-dropdown-due-date" class="flex py-2.5 px-3">
                                            <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-due-date">
                                            <span class="ml-3 text-sm text-gray-800 dark:text-gray-200">Due Date</span>
                                        </label>
                                        <label for="hs-as-filters-dropdown-amount" class="flex py-2.5 px-3">
                                            <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-amount">
                                            <span class="ml-3 text-sm text-gray-800 dark:text-gray-200">Amount</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button onclick="location.href = '{{ route('memos.create') }}'" type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z"></path>
                                    <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z"></path>
                                </svg>
                                New memo
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Header -->

                <!-- Table -->
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-slate-800">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">
                            <a class="group inline-flex items-center gap-x-2" href="#">
            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
              Title
            </span>
                            </a>
                        </th>

                        <th scope="col" class="px-6 py-3 text-left">
                            <a class="group inline-flex items-center gap-x-2" href="#">
            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
              Length
            </span>
                            </a>
                        </th>

                        <th scope="col" class="px-6 py-3 text-left">
                            <a class="group inline-flex items-center gap-x-2" href="#">
            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
              Last edited
            </span>
                            </a>
                        </th>

                        <th scope="col" class="px-6 py-3 text-left">
                            <a class="group inline-flex items-center gap-x-2" href="#">
            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
              Members
            </span>
                            </a>
                        </th>

                        <th scope="col" class="px-6 py-3 text-left">
                            <a class="group inline-flex items-center gap-x-2" href="#">
            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
              Views
            </span>
                            </a>
                        </th>

                        <th scope="col" class="px-6 py-3 text-right"></th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($memos as $memo)
                        <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                            <td class="h-px w-px whitespace-nowrap">
                                <a class="block relative z-10" href="{{ route('memos.edit', $memo) }}">
                                    <div class="px-6 py-2">
                                        <div class="block text-sm text-blue-600 decoration-2 hover:underline dark:text-blue-500">{{ $memo->title }}</div>
                                    </div>
                                </a>
                            </td>
                            <td class="h-px w-px whitespace-nowrap">
                                <a class="block relative z-10" href="{{ route('memos.edit', $memo) }}">
                                    <div class="px-6 py-2">
                                        <p class="text-sm text-gray-500">{{ strlen($memo->content) }} characters</p>
                                    </div>
                                </a>
                            </td>
                            <td class="h-px w-px whitespace-nowrap">
                                <a class="block relative z-10" href="{{ route('memos.edit', $memo) }}">
                                    <div class="px-6 py-2">
              <span class="inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                {{ $memo->updated_at->format('d.m.Y')}}
              </span>
                                    </div>
                                </a>
                            </td>
                            <td class="h-px w-px whitespace-nowrap">
                                <a class="block relative z-10" href="{{ route('memos.edit', $memo) }}">
                                    <div class="px-6 py-2 flex -space-x-2">
                                        @foreach($memo->users as $user)
                                            <div class="hs-tooltip inline-flex">
                                                <img class="hs-tooltip-toggle inline-block h-6 w-6 rounded-full ring-2 ring-white dark:ring-gray-800" src="{{ $user->image }}" alt="Image Description">
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-slate-700" role="tooltip">
                  {{ $user->name }}
                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </a>
                            </td>
                            <td class="h-px w-px whitespace-nowrap">
                                <a class="block relative z-10" href="{{ route('memos.edit', $memo) }}">
                                    <div class="px-6 py-2">
                                        <p class="text-sm text-gray-500">{{ $memo->views }}</p>
                                    </div>
                                </a>
                            </td>
                            <td class="h-px w-px whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                        <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-md text-gray-700 align-middle focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                            </svg>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[10rem] z-20 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-table-dropdown-1">
                                            <div class="py-2 first:pt-0 last:pb-0">
                  <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-600">
                    Actions
                  </span>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="{{ route('memos.edit', $memo) }}">
                                                    Edit memo
                                                </a>
                                                <button class="w-full flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" onclick="navigator.clipboard.writeText('{{ route('share', $memo) }}');">
                                                    Copy link
                                                </button>
                                            </div>
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <form action="{{ route('memos.destroy', $memo) }}" method="POST">
                                                    @csrf

                                                    @method('DELETE')
                                                    <button type="submit" class="w-full flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                                                    Delete
                                                </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- End Table -->

                <!-- Footer -->
                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $memos->total() }}</span> result/s
                        </p>
                    </div>

                    <div>
                        <div class="inline-flex gap-x-2">
                            <button onclick="location.href = '{{ $memos->previousPageUrl() }}'" type="button" class="{{ $memos->onFirstPage() ? 'opacity-50' : '' }} py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                <svg class="w-3 h-3" width="16" height="16" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.506 1.64001L4.85953 7.28646C4.66427 7.48172 4.66427 7.79831 4.85953 7.99357L10.506 13.64" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                Prev
                            </button>

                            <button onclick="location.href = '{{ $memos->nextPageUrl() }}'" type="button" class="{{ $memos->hasMorePages() ? '' : 'opacity-50' }} py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                Next
                                <svg class="w-3 h-3" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.50598 2L10.1524 7.64645C10.3477 7.84171 10.3477 8.15829 10.1524 8.35355L4.50598 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </div>
</div>
<!-- End Card -->
<!-- End Table Section -->
