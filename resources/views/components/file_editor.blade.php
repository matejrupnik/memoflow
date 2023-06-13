<!-- Table Section -->
<!-- Card -->
<form id="myForm" method="POST"
      @isset($memo)
          action="{{ route('memos.update', $memo) }}"
>
    @method('PUT')
@else
          action="{{ route('memos.store') }}"
>
@endisset
    @csrf
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                    <!-- Header -->
                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                        <div>
                            @isset($memo)
                                <label for="title" class="sr-only">{{ $memo->title }}</label>
                                <input type="text" name="title" id="title" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="New memo title" value="{{ $memo->title }}">
                            @else
                                <label for="title" class="sr-only">New memo title</label>
                                <input type="text" name="title" id="title" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="New memo title">
                            @endisset
                        </div>

                        @if ($errors->any())
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <p class="text-sm text-red-600">{{ $error }}</p>
                                        @break
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div>
                            <div class="inline-flex gap-x-2">
                                @isset($memo)
                                    <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                        <button onclick="location.href = '{{ route('export.show', $memo) }}'" id="hs-as-table-table-export-dropdown" type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                            </svg>
                                            Export
                                        </button>
                                    </div>
                                <div class="hs-dropdown relative inline-block [--placement:bottom-right]" data-hs-dropdown-auto-close="inside">
                                    <button id="hs-as-table-table-filter-dropdown" type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                        Share
                                        <span class="inline-flex items-center gap-1.5 py-0.5 px-1.5 rounded-full text-xs font-medium border border-gray-300 text-gray-800 dark:border-gray-700 dark:text-gray-300">
                  {{ $memo->users->count()-1 }}
                </span>
                                    </button>
                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[12rem] z-20 bg-white shadow-md rounded-lg mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-as-table-table-filter-dropdown">
                                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                            @php
                                            $counter = 0;
                                            @endphp
                                            @foreach(auth()->user()->mergeUsers() as $key => $user)
                                                @if(auth()->user() == $user)
                                                    @continue
                                                @endif

                                                @if($memo->hasUser($user))
                                                        <label for="connection{{ $key }}" class="flex py-2.5 px-3" onclick="location.href = '{{ route('remove_user', [$user, $memo] ) }}'">
                                                            <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="connection{{ $key }}" name="connection{{ $key }}" checked>
                                                            <button type="button" class="ml-3 text-sm text-gray-800 dark:text-gray-200">{{ $user->name }}</button>
                                                        </label>

                                                    @else
                                                        <label for="connection{{ $key }}" class="flex py-2.5 px-3" onclick="location.href = '{{ route('add_user', [$user, $memo] ) }}'">
                                                            <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="connection{{ $key }}" name="connection{{ $key }}">
                                                            <button type="button" class="ml-3 text-sm text-gray-800 dark:text-gray-200">{{ $user->name }}</button>
                                                        </label>
                                                    @endif



                                                @php
                                                $counter = $key;
                                                @endphp
                                            @endforeach
                                            <input type="hidden" id="key" name="key" value="{{ $counter }}">
                                        @if(auth()->user()->mergeUsers()->count() == 0)
                                                    <label for="hs-as-filters-dropdown-frequency" class="flex py-2.5 px-3">
                                                        <span class="text-sm text-gray-800 dark:text-gray-200">You have no connections.</span>
                                                    </label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endisset

                                <button onclick="submitDivContent()" type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                    Save memo
                                </button>
                                <input type="hidden" id="hiddenInput" name="content" value="">
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->
                    @include('components.wysiwyg')
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Card -->
<!-- End Table Section -->
<script>
    function submitDivContent() {
        let divContent = document.querySelector("iframe[x-ref='wysiwyg']").contentDocument.body.innerHTML;
        document.getElementById("hiddenInput").value = divContent;
        document.getElementById("myForm").submit();
    }
</script>
