import { of } from 'rxjs'

export class LoginService {
    signin(value) {
        return of(`Signin complete with ${JSON.stringify(value)}`)
    }
}