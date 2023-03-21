/**
 * Delete tree with input folder
 * @param {Object} parentEditFolder
 */
export function deleteItemEditFolder(parentEditFolder) {
    let item = getEditItem(parentEditFolder)
    item.shift()
    this.editFolder = null
    this.folderEdit = null
}

export function getEditItem(parentEditFolder) {
    if (parentEditFolder && parentEditFolder.children) {
        return parentEditFolder.children
    }

    return parentEditFolder
}
