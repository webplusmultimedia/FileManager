import {Success, Warning} from "./../Support/Notification";
/**
 *
 * @param {Proxy} data
 * @return void
 */
export async function SaveFolderAction(data) {
    const name = data.$refs.folderEdit.value
    if (!name) {
        data.removeInput()
        return
    }
    const result = await data.$wire.createFolder(name, data.folder.parent)
    if(result.error){
        Warning(result.message)
        return
    }
    data.folder.name = name
    data.folder.children = []
    data.folder.files = []
    data.folder.id = result.result.id
    Success(`Le répertoire <strong>${name}</strong> a été ajouté`)
    data.isNewFolder = false
    data.files =[]
    data.setFiles()
    data.this.folderEdit = null
}
/**
 *
 * @param {Proxy} data
 * @return void
 */
export async function DeleteFolderAction(data) {
    const result = await data.$wire.deleteFolder(data.selectedFolder.id)
    if (!result.error) {
        await data.supportArray.deleteFolder(data.selectedFolder.parent, data.selectedFolder.id)
        Success(result.message)
        data.selectedFolder = null
        data.setFiles()
        return
    }
    Warning(result.message)
}
