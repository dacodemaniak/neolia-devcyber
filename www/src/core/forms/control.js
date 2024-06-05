import { AbstractControl } from "./abstract-control"
import { Handler } from "../event-handler/forms/handler"

export class Control extends AbstractControl {
    constructor(name, state = null, validators = null) {
        super()
        this.controlName = name

        if (state) {
            this.value = state
        }

        if (validators) {
            this.validators = validators
            // Store validators in registry
            validators.forEach((validator) => {
                const validationErrorJson = `{"type": {"${validator.name}": true}}`
                this.validatorRegistry.set(
                    validator.name,
                    JSON.parse(validationErrorJson)
                )
            })

            Handler.placeErrors(this)
        }
    }
}
