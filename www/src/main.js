import { LoginForm } from './login-form/login-form'

import './main.scss'

export class Main {
    constructor() {
        this.#run()
    }

    #run() {
        const controller = new LoginForm('login-form')
    }
}

const app = new Main()