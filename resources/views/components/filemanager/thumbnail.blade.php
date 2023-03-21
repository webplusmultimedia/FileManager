<template x-if="showFiles">
    <div x-data="" {{ $attributes->class(['grid grid-cols-4  gap-4 py-6 w-full']) }} >

        <template x-for="(file,index) in files" :key="file.name+'-'+ Math.random().toString(36).slice(2) +index">
            <div
                x-data="thumbnail(file,index)"
                x-bind="imgTransition"
                x-show="showImg"
                class="relative flex flex-col gap-3 justify-between items-center  text-sm py-2 bg-gray-50 duration-300 cursor-pointer hover:bg-gray-100 group"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-0"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-0"
            >
                <img :src="file.url" :alt="file.name" class="object-cover w-20 h-20">
                <p x-text="file.name" class="px-2 break-all"></p>
                <div x-text="Math.ceil(file.size/1000) + 'Ko'"></div>
                <div role="button"
                     class="absolute -top-1 -right-1 bg-gray-50 border border-gray-200 p-1 opacity-0 transition text-red-600  group-hover:opacity-100 transition"
                     x-bind="deletingFile"
                >
                    <x-filemanager::icons.plus class=" w-6 h-6 rotate-45 fill-gray-300 hover:fill-red-400 transition"/>
                </div>
            </div>
        </template>
    </div>
</template>


