import {Success, Warning} from "./Support/Notification";
import {SaveFolderAction} from "./Actions/FolderAction";

export function inputEditFolder() {
    return {
        removeInput() {
            this.supportArray.deleteItemEditFolder()
            this.isNewFolder = false
            this.selectedFolder = null
            this.setFiles()
            this.folderEdit = null
        },
        folderValue: null,
        'editInputFolder': {
            ['x-ref']: "folderEdit",
            async ['@keyup.enter']() {
                await SaveFolderAction(this.$data)
            },
            async ['@keyup.esc']() {
                this.removeInput()
            },
            async ['@click.outside']() {
                this.removeInput()
            },
        },
        'validateInput': {
            async ['@click.prevent.stop']() {
                await SaveFolderAction(this.$data)
            }
        }
    }
}
