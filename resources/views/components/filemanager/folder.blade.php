@props([
    'folder',
    'parent'=>null
])
<div x-data="{parentId:'{{ $parent }}' }" data-parent="{{$parent}}">
    <div {{ $attributes->class(['folder group duration-300 py-1']) }} :class="{ 'active' : active?? null }">
        <div class="folder-icon" role="button">
            <x-filemanager::icons.folder class="fill-gray-500 group-hover:fill-blue-500"/>
            <span>{{ count($folder)?$folder['file']:'/' }}  </span>
        </div>
        <x-filemanager::icons.plus class="icon-plus group-hover:fill-blue-400" role="button"/>
    </div>
</div>

