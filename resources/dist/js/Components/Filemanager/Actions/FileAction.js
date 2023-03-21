import {Danger, Success, Warning} from "./../Support/Notification";

/**
 *
 * @param {File[]} files
 * @param {Proxy} data
 */
export function SaveFilesAction(files, data) {
    if (!files.length) {
        Warning('Aucun fichier à transféré');
        return
    }
    data.resetProgress()
    data.$wire.uploadMultiple('photos', files, (uploadFilenames) => {
            data.resetProgress()
            if (uploadFilenames) {
                let folder = data.selectedFolder ? data.selectedFolder.id : null
                data.$wire.saveFiles(folder).then((value) => {
                    let result = value?.result
                    if (value && !value.error && result.files && result.files.length) {
                        data.files.unshift(...result.files)
                        Success(value.message)
                        return
                    }
                    Danger(value?.message ?? "Erreur sur les fichiers téléchargés")
                })
            }

        },
        () => {
            data.resetProgress()
            Danger("Erreur sur les fichiers téléchargés")
        },
        (e) => {
            data.progress = 100 - Math.ceil((e.loaded / e.total) * 100)
        })
}
/**
 *
 * @param {Proxy} data
 * @return void
 */
export async function DeleteFile(data) {
    const root = data.selectedFolder ? data.selectedFolder.id + '/' + data.file.filename : data.file.filename,
        result = await data.$wire.deleteFile(root)

    if (!result.error) {
        Success(result.message)
        data.showImg = false
        data.files.splice(data.index, 1);
        return
    }
    Warning(result.message)
}
