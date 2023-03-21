import {Icons} from "./Icons/Icons";
import {arraySupport} from "./Support/ArraySupport";
import {ui} from "./functions/Ui";

export function Filemanager(folders) {
    return {
        folders: {children: [], files: []},
        files: [],
        getFiles() {
            if (!this.selectedFolder) {
                return this.folders.files
            }
            if (this.selectedFolder.files && this.selectedFolder.files.length) {
                return this.selectedFolder.files;
            }
            return []
        },
        setFiles() {
            if (!this.selectedFolder) {
                this.files =  this.folders.files
                return
            }
            if (this.selectedFolder.files && this.selectedFolder.files.length) {
                this.files = this.selectedFolder.files;
                return
            }
            this.files = []
        },
        showFiles() {
            return this.files.length > 0
        },
        showZoneFiles(){
            return !(this.selectedFolder && !this.selectedFolder.id);
        },
        isNewFolder: false,
        folderEdit: null,
        supportArray: arraySupport(),
        selectedFolder: null,
        getTitle(folder) {
            return folder ? folder.name : '/'
        },
        getInput() {
            return `<input x-bind="editInputFolder" type="text"  class="input-component"  x-init="$el.focus()" x-model="folderEdit"/>`
        },
        keyId() {
            return Math.random().toString(36).slice(2)
        },
        async renderFolder(folder) {
            let isBtnAddingNewFolder = !folder || (folder && folder.id !== null)
            let htmlTemplate =
                `<div x-data="Folder(${folder ? 'folder' : null})">
                <div x-data="inputEditFolder" class="folder group duration-300 " :class="{ 'active' : getActive()?? null }">
                    <div class="folder-icon" role="button" x-bind="loadChildren" >
                        ${(folder && !folder.open) ? Icons().folder : Icons().folderOpen}
                        <span class="w-full">${isBtnAddingNewFolder ? this.getTitle(folder) : this.getInput()} </span>
                    </div>
                        ${ui(isBtnAddingNewFolder)}
                </div>
            </div>`
            if (folder && folder.children && folder.children.length) {
                htmlTemplate += `<template x-if="renderFolder">
                                     <template  x-for="(folder,index) in folder.children" :key="'-'+folder.id??'xxxxx-webX'">
                                         <div class="pl-5 pt-1" x-html="renderFolder(folder)"  x-show="folder.open" x-transition></div>
                                     </template>
                                 </template>`
            }
            return htmlTemplate;
        },
        async init() {
            this.folders.children = folders
            this.supportArray.items = folders
            this.folders.files = await this.$wire.getFiles()
            this.files = this.folders.files
        }
    }
}
