import {Icons} from "./../Icons/Icons";

export function ui(is_folder) {
    let divPlus = `<div x-bind="addNewFolder" role="button">
        ${Icons().plus }
    </div>`
    let divNewFolder = `<div role="button" x-bind="validateInput">
        ${Icons().enter}
    </div>`

    if (is_folder){
        return divPlus
    }
    return divNewFolder
}
