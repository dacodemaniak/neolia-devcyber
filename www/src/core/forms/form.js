import { InputHandler } from './../event-handler/forms/input-handler'

export class Form {
    /**
     * Collection of form controls
     * @see Control class
     */
    #controls = new Map()

    /**
     * Object representing form value
     */
    #value = null

    /**
     * Form state
     */
    #valid = false

    /**
     * Form DOM object
     */
    #form = null

    /**
     * Collection of DOM input fields
     */
    #formFields = []

    /**
     * Subscriber list
     */
    #_subscriptions = []


    addControl(control) {
        if (this._checkControl(control)) {
            control.supportFormField = document.querySelector(`[data-rel="${control.controlName}"]`)
            this._configureControl(control)
            this.#controls.set(control.controlName, control)
            return this
        }
        throw new Error(`Control with name ${control.controlName} doesn't exists in form`)
    }

    removeControl(control) {
        this.#controls.delete(control.controlName)
        return this
    }

    set controls(controls) {
        this.#controls = controls
    }

    get controls() {
        return this.#controls
    }
    getControl(controlName) {
        return this.#controls.get(controlName)
    }

    get value() {
        this.#value = {}
        this.#controls.forEach((control) => {
            this.#value[control.controlName] = control.value
        })
        return this.#value
    }

    get valid() {
        this.#valid = false
        let errorCount = 0
        this.#controls.forEach((_control, name) => {
            errorCount += _control.errors.size
        })
        this.#valid = errorCount === 0
        return this.#valid
    }

    get invalid() {
        this._invalid = this.valid
        return this._invalid
    }

    set form(form) {
        this.#form = form
    }

    get form() {
        return this.#form
    }

    get formFields() {
        return this.#formFields
    }

    observeForm() {
        this._controls.forEach((control) => {
            this._configureControl(control)
        })
    }
    unsubscribe() {
        this.#_subscriptions.forEach((subscription) => {
            subscription.unsubscribe()
        })
        InputHandler.unsubscribe()
    }

    _checkControl(control) {
        return this.#formFields.filter((el) => {
            return control.controlName === el.getAttribute('data-rel')
        }).length > 0
    }

    _getField(control) {

        const field = this.#formFields.find((formField) => {
            return formField.getAttribute('data-rel') === control.controlName
        })

        if (field)
            return field

        throw new Error(`Unable to get ${control.controlName} in the form field list`)
    }

    _configureControl(control) {
        if (control.supportFormField.tagName === 'INPUT') {
            this.#_subscriptions.push(
                InputHandler.getKeyupHandler(control)
            )
        }
    }

}