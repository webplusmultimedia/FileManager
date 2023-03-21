import {Warning} from "./../Support/Notification";

export function ImageSupport() {
    return {
        mimeType: [
            'application/pdf',
            'application/wps-office.xlsx',
            'application/wps-office.xls',
            'application/wps-office.docx',
            'application/wps-office.doc',
            'image/jpeg',
            'image/png',
        ],
        fileSize : 4096000,
        error : null,
        progress : 0,
        /**
         *
         * @param {File[]} files
         * @return {File[]}
         */
        getDesireFiles(files){
            files = Array.from(files).filter((file)=>{
                if(file.size > this.fileSize) {
                    Warning(`Le fichier <strong>${file.name}</strong> doit être inférieur à ${Math.round(this.fileSize/1000000)}Mo `)
                    return false
                }
                if (!this.mimeType.find(type => type === file.type)) {
                    Warning(`L'extension du fichier <strong>${file.name}</strong> (${file.type}) est Invalide`)
                    return false
                }
                return true
            })
            return files
        },
    }
}
