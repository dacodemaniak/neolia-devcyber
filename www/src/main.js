import { Login } from './login-form/login'

import './main.scss'

export class Main {
    constructor() {
        this.#run()
    }

    #run() {
        const controller = new Login()
    }
}

const app = new Main()