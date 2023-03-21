export function WbFile() {
    return {
        get title(){
            let dir = (this.selectedFolder?this.selectedFolder.id: '/')??'-- Nouveau répertoire --'
            return `.:: ${dir}`
        }
    }
}
