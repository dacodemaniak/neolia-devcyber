import { Handler } from "../core/event-handler/forms/handler"
import { TemplateLoader } from "../core/template/template-loader"
import { Form } from './../core/forms/form'
import { Control } from './../core/forms/control'
import { Validators } from './../core/forms/validator/validators'

import './../scss/material/button.scss'
import './../scss/material/input.scss'

export class LoginForm extends Form {
    constructor(formSelector) {
        super()
        this.form = this.#loadForm(formSelector)
    }

    #setFields() {
        this
            .addControl(new Control('username', '', [Validators.required]))
            .addControl(new Control('userpassword', '', [Validators.required]))
        
        // Place form handler    
        Handler.formHandler(this)
    }

    async #loadForm(formSelector) {
        const templateLoader = new TemplateLoader('login-form')
        const el = await templateLoader.loadFromFile()
        
        if (!el) {
            throw new Error(`Unable to load component`)
        }
        document.querySelector('main').appendChild(el.documentElement)

        const form = document.querySelector('form')
        
        form.querySelectorAll('[data-rel]').forEach((el, key) => {
            this.formFields.push(el)
        })

        this.#setFields()

        form.addEventListener('submit', (event) => this.onSubmit(event))

        return form
    }
}
