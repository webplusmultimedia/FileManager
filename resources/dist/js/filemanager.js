import {Filemanager} from "./Components/Filemanager/Filemanager";
import {folder} from "./Components/Filemanager/Folder";
import {inputEditFolder} from "./Components/Filemanager/InputEditFolder";
import {dragableFiles} from "./Components/Filemanager/DragableFiles";
import {thumbnail} from "./Components/Filemanager/Thumbnail/Thumbnail";
import {WbFile} from "./Components/Filemanager/File";


Alpine.data('Filemanager',Filemanager)
Alpine.data('Folder',folder)
Alpine.data('inputEditFolder',inputEditFolder)
Alpine.data('dragableFiles',dragableFiles)
Alpine.data('thumbnail',thumbnail)
Alpine.data('WbFile',WbFile)
