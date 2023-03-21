@props([
    'folders',
    'parent'=>null
])
<div class="pl-5 py-1">
    @foreach($folders as $folder)
        <x-filemanager::filemanager.folder :folder="$folder" :parent="$parent" x-data="{ active : false }"/>
        @if($folder && isset($folder['children']))
            <x-filemanager::filemanager.folders :folders="$folder['children']" :parent="$parent?$parent.'/'.$folder['file']:$folder['file']"/>
        @endif
    @endforeach
</div>
