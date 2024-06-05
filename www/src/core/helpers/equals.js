export class Equals {
    static areEquals(object1, object2) {
        const object1Keys = Object.keys(object1)
        const object2Keys = Object.keys(object2)

        if (object1Keys.length !== object2Keys.length) return false

        for (const key of object1Keys) {
            const val1 = object1[key]
            const val2 = object2[key]

            const areObjects = this._isObject(val1) && this._isObject(val2)

            if (areObjects && !this.areEquals(val1, val2) || !areObjects && val1 !== val2) return false

            return true
        }
    }

    static _isObject(object) {
        return object != null && typeof object === 'object'
    }
}
