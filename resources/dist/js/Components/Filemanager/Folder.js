import {Info, Warning} from "./Support/Notification";

/**
 *
 * @param folder
 * @return {{addNewFolder: {"@click.prevent.stop"(): Promise<void>}, fakeFolder(): {parent: null, name: string, id: null, open: boolean}, active: boolean, _newFolder: null, getActive(): boolean, loadChildren: {"@click.prevent.stop"(): Promise<void>}, getFolders(): Promise<void>, checkOpen(): void, parentId: null}|{parent: *, name: string, id: null, open: boolean}|boolean}
 */
export function folder(folder) {


    return {
        parentId: null,
        active: false,
        async getFolders() {
            if (folder && folder.id && (!folder.children || !folder.files)) {
                folder.children = await this.$wire.getFolders(folder.id)
                folder.files = await this.$wire.getFiles(folder.id)
            }
            this.setFiles()
        },
        getActive() {
            return this.selectedFolder === folder
        },
        _newFolder: null,
        fakeFolder() {
            let parent = folder ? folder.id : null
            return {name: null, id: null, parent: parent, open: true, children: []}
        },

        'addNewFolder': {
            async ['@click.prevent.stop']() {
                await this.getFolders()
                if (this.isNewFolder && this.folderEdit) {
                    Warning("Vous ajouter déjà un répertoire")
                    return;
                }
                if (this.isNewFolder && !this.folderEdit) {
                    Info("Suppression edit")
                    this.supportArray.deleteItemEditFolder()
                }

                this.isNewFolder = true
                this.supportArray.editFolder = this.fakeFolder()
                this.supportArray.parentEditFolder = folder
                this.selectedFolder = this.supportArray.editFolder
                if (folder) {
                    folder.children.unshift(this.supportArray.editFolder)
                } else {
                    this.folders.children.unshift(this.supportArray.editFolder)
                }
            }
        },

        'loadChildren': {
            async ['@click.prevent.stop']() {
                this.checkOpen()
                this.selectedFolder = folder
                await this.getFolders();
            }
        },
        checkOpen() {

            if (folder && folder.id && this.selectedFolder === folder) {
                folder.children.forEach((v) => {
                    if (v.id) {
                        v.open = !v.open
                    }
                })
            } else if (folder && folder.children) {
                folder.children.forEach((v) => {
                    v.open = true
                })
            }
        }


    }
}
