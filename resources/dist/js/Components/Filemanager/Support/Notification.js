import {Icons} from "./../Icons/Icons";

/**
 *
 * @param {String} message
 * @param {null|String}type
 * @return {{wrapperId: null, getModal(): string, count: number, show(): void, message :string, type: string, danger(): notificationBuilder, getModalWrapper(): string, delay: number, widthVar: string, success(): notificationBuilder, warning(): notificationBuilder, Id: null, setDelay({Number}): notificationBuilder, info(): notificationBuilder}|*|string}
 */
export function notificationBuilder(message, type = 'success') {
    return {
        message,
        type,
        info() {
            this.type = 'info'
            return this
        }
        , success() {
            this.type = 'success'
            return this
        },
        danger() {
            this.type = 'danger'
            return this
        }
        , warning() {
            this.type = 'warning'
            return this
        },
        setDelay(delay) {
            this.delay = delay
            return this
        },
        count: 100,
        wrapperId: null,
        Id: null,
        delay: 4000,
        getModalWrapper() {
            this.wrapperId = `webplus-${Math.round(Math.random() * 100)}`
            return `<div class="wrapper-webnotification" id="webplus-m-modal_wrapper"></div>`
        },
        widthVar : null,
        getModal() {
            this.Id = `webplus-${Math.random().toString(36).slice(2)}`
            this.widthVar = '--' + this.Id + '-width'
            return `<div class="webnotification ${this.type}" id="${this.Id}" style="${this.widthVar}:100%">
                        <div class=""> ${Icons()[this.type]} </div>
                        <div>${this.message}</div>
                        <span class="${this.type} h-1 absolute bottom-0 right-0 " style="width: var(${this.widthVar});background-color: inherit"></span>
                    </div>`
        },
        show() {
            if (!document.getElementById('webplus-m-modal_wrapper')) {
                document.body.insertAdjacentHTML('beforeend', this.getModalWrapper())
            }
            document.getElementById('webplus-m-modal_wrapper').insertAdjacentHTML('beforeend', this.getModal())
            let i = 1
             const  el = document.getElementById(this.Id),
                 interval_id = setInterval(() => {
                this.count = 100 - Math.ceil(((i * 10) / this.delay) * 100)
                el.style.setProperty(this.widthVar,this.count + "%")
                i++
            }, 10)
            setTimeout(() => {
                el.remove()
                this.Id = null
                clearInterval(interval_id)
            }, this.delay)
        }

    }
}
export  function Success(message) {
    notificationBuilder(message).success().show()
}
export  function Info(message) {
    notificationBuilder(message).info().show()
}
export  function Danger(message) {
    notificationBuilder(message).danger().show()
}
export  function Warning(message) {
    notificationBuilder(message).warning().show()
}
