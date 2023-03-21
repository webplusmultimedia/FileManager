<div
    class="relative flex gap-x-8"
    x-data="Filemanager(@js($folders))"
    x-cloak
    wire:ignore
>
    <div class="left__side" >
        <div class="py-1" x-html="await renderFolder()">
        </div>
        <template x-for="(folder,index) in folders.children" :key="'Web-'+index">
            <div class="pl-5 py-1" x-html="await renderFolder(folder)">
            </div>
        </template>
    </div>
    <div class="right__side">
        <div
            x-data="dragableFiles"
            class="flex flex-col"
        >
            <div x-data="WbFile" class="mx-6 px-2 py-2 bg-gray-100 text-blue-500" x-html="title">
            </div>
            <x-files-up-loader/>
        </div>
    </div>
</div>
