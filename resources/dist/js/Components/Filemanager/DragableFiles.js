import {ImageSupport} from "./../Filemanager/Support/ImageSupport";
import {SaveFilesAction} from "./../Filemanager/Actions/FileAction";
import {DeleteFolderAction} from "../Filemanager/Actions/FolderAction";

export function dragableFiles() {
    return {
        progress: 100,
        resetProgress() {
            this.progress = 100
        },
        'overZone': {
            ['@dragover.prevent.stop']() {

                if (this.$event.target.classList.contains('dropZone')) {

                }
            },
            ['@dragenter.prevent.stop']() {
                this.$refs.dropzone.classList.remove('pointer-events-none')
                this.$refs.dropzone.classList.add('after:opacity-75', 'opacity-100', 'pointer-events-auto')
            },
            ['@dragleave.prevent.stop']() {
                if (this.$event.target === this.$refs.dropzone) {
                    this.$refs.dropzone.classList.remove('after:opacity-75', 'opacity-100', 'pointer-events-auto')
                    this.$refs.dropzone.classList.add('pointer-events-none')
                }
                return false
            },
        },
        'dropZone': {
            ['@drop.prevent.stop']() {
                if (this.$event.target.classList.contains('dropZone')) {
                    this.$refs.dropzone.classList.remove('after:opacity-75', 'opacity-100', 'pointer-events-auto')
                    this.$refs.dropzone.classList.add('pointer-events-none')

                    SaveFilesAction(ImageSupport().getDesireFiles(this.$event.dataTransfer.files), this.$data)
                }
            }
        },
        'deleteFolder': {
            async ['@click.stop']() {
                await DeleteFolderAction(this.$data)
            },
            ['x-show']() {
                return this.selectedFolder && this.selectedFolder.children && !this.selectedFolder.children.length
            }
        }
    }
}
