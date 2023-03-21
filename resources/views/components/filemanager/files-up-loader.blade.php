<div x-data=""
        {{ $attributes->class(['relative flex justify-center items-center p-6 text-lg']) }}
        x-bind="overZone"
       x-show="showZoneFiles"
>

    <div class="flex flex-col w-full justify-between items-center text-gray-500 bg-slate-100 py-10" x-show="!showFiles()">
        <p class="text-lg ">
            Ce répertoire est vide
        </p>
        <p class="text-lg font-medium py-2 pb-5">
            Déposez un fichier ici pour le téléverser
        </p>
        <button
            class="py-2 px-3 text-lg bg-pink-600 hover:bg-pink-700 text-white text-xl font-bold transition rounded"
            x-bind="deleteFolder"
        >
            Supprimer ce répertoire
        </button>
    </div>
    <x-filemanager::filemanager.thumbnail/>
    <span
            class="wm-dropzone flex justify-center items-center dropZone absolute transition pointer-events-none
                            right-0 left-0 bottom-0 top-0 bg-indigo-500 bg-opacity-60 opacity-0
                            after:content-[''] after:absolute after:right-0 after:left-0 after:bottom-0 after:top-0 after:bg-opacity-30
                            after:border after:border-indigo-500 after:border-dashed after:m-2"
            x-ref="dropzone"

            x-bind="dropZone"
            x-transition.duration.500ms
            x-transition:enter="opacity-100"
            x-transition:leave="opacity-0 "
    >
        <svg width="150" height="150" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-white">
            <path d="M21.5416 39.1666H12.7291C9.75901 39.1666 7.22166 38.1385 5.1171 36.0823C3.01124 34.026 1.95831 31.5128 1.95831 28.5427C1.95831 25.9969 2.72533 23.7285 4.25935 21.7375C5.79338 19.7465 7.80067 18.4736 10.2812 17.9187C11.0972 14.916 12.7291 12.4844 15.1771 10.6239C17.625 8.76352 20.3993 7.83331 23.5 7.83331C27.3187 7.83331 30.5578 9.16302 33.2172 11.8224C35.878 14.4832 37.2083 17.7229 37.2083 21.5416C39.4604 21.8028 41.3293 22.7734 42.815 24.4537C44.2994 26.1352 45.0416 28.1021 45.0416 30.3541C45.0416 32.8021 44.1852 34.8831 42.4723 36.5973C40.7581 38.3102 38.6771 39.1666 36.2291 39.1666H25.4583V25.1646L28.5916 28.2L31.3333 25.4583L23.5 17.625L15.6666 25.4583L18.4083 28.2L21.5416 25.1646V39.1666Z" />
        </svg>

    </span>
    <span class="absolute top-2 left-0 h-1 bg-blue-400 mx-6" :style="{right: progress+'%'}"></span>
</div>
