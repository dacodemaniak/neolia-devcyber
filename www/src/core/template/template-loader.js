export class TemplateLoader {
    #_templateId = ''

    constructor(templateId) {
        this.#_templateId = templateId
    }

    loadFromTemplate() {
        const el = document.querySelector(`#${this._templateId}`)
        if (el) {
            return el.content.cloneNode(true)
        }
        throw new Error(`Template with ${this._templateId} was not found`)
    }

    async loadFromFile() {
        const file = '/src/login-form/' + this.#_templateId + '.html'

        try {
            const response = await fetch(file /*, options */)

            if (!response.ok) {
                throw new Error(`HTTP error while fetching ${file} : ${response.status}`)
            }

            const htmlAsText = await response.text()
        return new DOMParser().parseFromString(htmlAsText, 'text/html')
        } catch (error) {
            throw new Error(error)
        }
    }
}
