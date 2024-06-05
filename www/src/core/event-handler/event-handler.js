import { fromEvent, map, switchMap } from "rxjs"

export class EventHandler {
    #forClass = null
    #event = ''
    #els = null

    get forClass() {
        return this.#forClass
    }

    set forClass(forClass) {
        this.#forClass = forClass
    }

    get event() {
        return this.#event
    }

    set event(event) {
        this.#event = event
    }

    _getNodeList() {
        this.#els = document.querySelectorAll(`body [${this.#event}]`)
        return this.#els
    }

    addHandlers(selector) {
        this.#els = document.querySelectorAll(selector + `[${this.#event}]`)
        this._rxjsEvent()
    }

    _rxjsEvent() {
        this.#els.forEach((el) => {
            const method = el.getAttribute(this.#event)
            fromEvent(el, this.#event)
            .pipe(
                map((value, index) => {
                    return {
                        method,
                        value
                    }
                })
            ).subscribe((event) => {
                this.#forClass[event.method](el, event.value)
            })
        })
    }
}
