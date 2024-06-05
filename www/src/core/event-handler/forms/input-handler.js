import { fromEvent, map } from 'rxjs'
import { Handler } from './handler'

export class InputHandler extends Handler {

    static getKeyupHandler(control) {
        Handler.focusHandler(control)
        Handler.blurHandler(control)

        return fromEvent(control.supportFormField, 'keyup')
            .pipe(
                map((event) => {
                    control.value = (control.supportFormField).value
                    if (control.value.trim().length === 0) {
                        control.value = ''
                    }
                    return control
                })
            )
            .subscribe((control) => {
                Handler.processValidators(control)
            })
    }


}
