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
                            Connections
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Connect with other users.
                        </p>
                    </div>
                </div>
                <!-- End Header -->
                <!-- Table -->
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-slate-900">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center gap-x-2">
                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                  Name
                </span>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center gap-x-2">
                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                  E-Mail address
                </span>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-right"></th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($users as $user)
                        @if(auth()->user()->email == $user->email)
                            @continue
                        @endif
                    <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                        <td class="h-px w-px whitespace-nowrap">
                            <a class="block" href="javascript:;" data-hs-overlay="#hs-ai-invoice-modal">
                                <div class="px-6 py-2">
                                    <span class="font-mono text-sm text-blue-600 dark:text-blue-500">{{ $user->name }}</span>
                                </div>
                            </a>
                        </td>
                        <td class="h-px w-px whitespace-nowrap">
                            <a class="block" href="javascript:;" data-hs-overlay="#hs-ai-invoice-modal">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</span>
                                </div>
                            </a>
                        </td>
                        <td class="h-px w-px whitespace-nowrap">
                            @if(auth()->user()->mergeUsers()->contains($user))
                                <form method="POST" action="{{ route('connections.destroy', $user) }}">
                                    @csrf
                                    @method('delete')
                                    <div class="px-6 py-1.5">
                                        <button type="submit" class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-red-700 text-white shadow-sm align-middle hover:bg-gray-50 hover:text-black text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white">
                                            Remove
                                        </button>
                                    </div>
                                </form>


                            @else


                            <form method="POST" action="{{ route('connections.store', $user) }}">
                                @csrf
                                <div class="px-6 py-1.5">
                                        <button type="submit" class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-green-700 text-white shadow-sm align-middle hover:bg-gray-50 hover:text-black text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white">
                                            Add
                                        </button>
                                </div>
                            </form>
                            @endif

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
                            <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $users->total()-1 }}</span> result/s
                        </p>
                    </div>

                    <div>
                        <div class="inline-flex gap-x-2">
                            <button onclick="location.href = '{{ $users->previousPageUrl() }}'" type="button" class="{{ $users->onFirstPage() ? 'opacity-50' : '' }} py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                <svg class="w-3 h-3" width="16" height="16" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.506 1.64001L4.85953 7.28646C4.66427 7.48172 4.66427 7.79831 4.85953 7.99357L10.506 13.64" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                Prev
                            </button>

                            <button onclick="location.href = '{{ $users->nextPageUrl() }}'" type="button" class="{{ $users->hasMorePages() ? '' : 'opacity-50' }} py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
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
</div>
<!-- End Table Section -->
