<!-- component -->
<style>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
    .active\:bg-gray-50:active {
        --tw-bg-opacity:1;
        background-color: rgba(249,250,251,var(--tw-bg-opacity));
    }
</style>
<div x-data="app()" x-init="init($refs.wysiwyg)">
    <div class="w-full flex border-b border-gray-200 text-xl text-gray-600">
        <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('bold')" type="button">
            <i class="mdi mdi-format-bold"></i>
        </button>
        <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('italic')" type="button">
            <i class="mdi mdi-format-italic"></i>
        </button>
        <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('underline')" type="button">
            <i class="mdi mdi-format-underline"></i>
        </button>
        <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','P')" type="button">
            <i class="mdi mdi-format-paragraph"></i>
        </button>
        <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H1')" type="button">
            <i class="mdi mdi-format-header-1"></i>
        </button>
        <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H2')" type="button">
            <i class="mdi mdi-format-header-2"></i>
        </button>
        <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H3')" type="button">
            <i class="mdi mdi-format-header-3"></i>
        </button>
        <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('insertUnorderedList')" type="button">
            <i class="mdi mdi-format-list-bulleted"></i>
        </button>
        <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('insertOrderedList')" type="button">
            <i class="mdi mdi-format-list-numbered"></i>
        </button>
        <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyLeft')" type="button">
            <i class="mdi mdi-format-align-left"></i>
        </button>
        <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyCenter')" type="button">
            <i class="mdi mdi-format-align-center"></i>
        </button>
        <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyRight')" type="button">
            <i class="mdi mdi-format-align-right"></i>
        </button>
    </div>
    <div class="w-full p-5 pt-0">
        <iframe x-ref="wysiwyg" class="w-full h-96 overflow-y-auto"></iframe>
    </div>
</div>
<script>
    function app() {
        return {
            wysiwyg: null,
            init: function(el) {
                // Get el
                this.wysiwyg = el;
                // Add CSS
                this.wysiwyg.contentDocument.querySelector('head').innerHTML += `<style>
                *, ::after, ::before {box-sizing: border-box;}
                :root {tab-size: 4;}
                html {line-height: 1.15;text-size-adjust: 100%;}
                body {margin: 0px; padding: 1rem 0.5rem;}
                body {font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";}
                </style>`;
                this.wysiwyg.contentDocument.body.innerHTML += `
                @isset($memo)
                    {!! $memo->content !!}
                @endisset
                `;
                // Make editable
                this.wysiwyg.contentDocument.designMode = "on";
            },
            format: function(cmd, param) {
                this.wysiwyg.contentDocument.execCommand(cmd, !1, param||null)
            }
        }
    }
</script>
