import { fromEvent } from "rxjs";
import { EventHandler } from "./event-handler";

export class ClickEventHandler extends EventHandler {
    constructor(forClass) {
        super()
        this.event = 'click'
        this.forClass = forClass
        super._getNodeList()
        super._rxjsEvent()
    }
}
