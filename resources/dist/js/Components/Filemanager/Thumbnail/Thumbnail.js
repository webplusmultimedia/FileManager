import {Success} from "./../Support/Notification";
import {DeleteFile} from "./../Actions/FileAction";


/**
 *
 * @param {Object} file
 * @param {Number} index
 * @return {{fuck, deletingFile: {"@click"(): void}, imgTransition: {":show"(): void}, showImg: boolean}}
 */
export function thumbnail(file,index) {
    return {
        showImg : false,
        file,
        index,
      /*  getSize(){
            return  getFileSizeForHuman().getSizeDevideBy(file.size) + 'Ko'
        },*/
        'imgTransition':{
            //Transition after load an image
            [':show'](){
                setTimeout(()=>{
                    this.showImg = true
                },5)
            }
        },
        'deletingFile':{
            async ['@click']() {
                DeleteFile(this.$data)
            }
        }
    }
}
