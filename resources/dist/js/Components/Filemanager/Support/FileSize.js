export function getFileSizeForHuman() {
    return{
        divideBy : 1000,
        sizeType : ['ko','Mo'],
        getSize(size){

        },
        getSizeDevideBy(size){
            let calcSize =  Math.ceil(size/this.divideBy)
            console.log(calcSize % this.divideBy,calcSize)
           /* if(calcSize % this.divideBy){
                calcSize = this.getSizeDevideBy(calcSize)
            }*/
            return calcSize
        }
    }


}
