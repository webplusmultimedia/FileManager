export function arraySupport() {
    return {
         deleteItemEditFolder() {
            let item = this.getEditItem()
             item.shift()
             this.editFolder = null
             this.folderEdit = null
        },
        async deleteFolder(parent, id) {
            if (!parent) {
                this.items.forEach((value,index)=>{
                        if (value.id === id) {
                            this.items.splice(index, 1)
                        }
                })
                return
            }
            await this.findById(parent, id)

        },
        async findById(parent = null, id) {
            if (!parent) return this.items

            return this.items.map((value) => {
                if (value.id === parent) {

                    if (value.children.length) {
                        value.children.forEach((v, index) => {
                            if (v.id === id) {
                                value.children.splice(index, 1)
                            }
                        })
                    }
                    return value
                }
                if (value.children) {
                    let arr = arraySupport()
                    arr.items = value.children
                    arr = arr.findById(parent, id)
                    if (arr) {
                        return value.children
                    }
                }

            })
        },
        getEditFolder() {
            return this.getEditItem().slice(-1)[0]
        },
        getEditItem() {
            if (this.parentEditFolder && this.parentEditFolder.children) {
                return this.parentEditFolder.children
            }

            return this.items
        },
        editFolder: null,
        parentEditFolder: null,
        items: [],

    }
}
