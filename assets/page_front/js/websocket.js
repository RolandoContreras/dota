function Queue(){
    var queue  = []
    var offset = 0
    this.getLength = function(){
        return (queue.length - offset)
    }
    this.isEmpty = function(){
        return (queue.length == 0)
    }
    this.enqueue = function(item){
        queue.push(item)
    }
    this.dequeue = function(){
        if (queue.length == 0) return undefined
        var item = queue[offset]
        if (++ offset * 2 >= queue.length){
            queue  = queue.slice(offset)
            offset = 0
        }
        return item
    }
    this.peek = function(){
        return (queue.length > 0 ? queue[offset] : undefined)
    }
}

/*!
 * EventEmitter v5.2.4 - git.io/ee
 * Unlicense - http://unlicense.org/
 * Oliver Caldwell - http://oli.me.uk/
 * @preserve
 */
!function(e){"use strict";function t(){}function n(e,t){for(var n=e.length;n--;)if(e[n].listener===t)return n;return-1}function r(e){return function(){return this[e].apply(this,arguments)}}function i(e){return"function"==typeof e||e instanceof RegExp||!(!e||"object"!=typeof e)&&i(e.listener)}var s=t.prototype,o=e.EventEmitter;s.getListeners=function(e){var t,n,r=this._getEvents();if(e instanceof RegExp){t={};for(n in r)r.hasOwnProperty(n)&&e.test(n)&&(t[n]=r[n])}else t=r[e]||(r[e]=[]);return t},s.flattenListeners=function(e){var t,n=[];for(t=0;t<e.length;t+=1)n.push(e[t].listener);return n},s.getListenersAsObject=function(e){var t,n=this.getListeners(e);return n instanceof Array&&(t={},t[e]=n),t||n},s.addListener=function(e,t){if(!i(t))throw new TypeError("listener must be a function");var r,s=this.getListenersAsObject(e),o="object"==typeof t;for(r in s)s.hasOwnProperty(r)&&n(s[r],t)===-1&&s[r].push(o?t:{listener:t,once:!1});return this},s.on=r("addListener"),s.addOnceListener=function(e,t){return this.addListener(e,{listener:t,once:!0})},s.once=r("addOnceListener"),s.defineEvent=function(e){return this.getListeners(e),this},s.defineEvents=function(e){for(var t=0;t<e.length;t+=1)this.defineEvent(e[t]);return this},s.removeListener=function(e,t){var r,i,s=this.getListenersAsObject(e);for(i in s)s.hasOwnProperty(i)&&(r=n(s[i],t),r!==-1&&s[i].splice(r,1));return this},s.off=r("removeListener"),s.addListeners=function(e,t){return this.manipulateListeners(!1,e,t)},s.removeListeners=function(e,t){return this.manipulateListeners(!0,e,t)},s.manipulateListeners=function(e,t,n){var r,i,s=e?this.removeListener:this.addListener,o=e?this.removeListeners:this.addListeners;if("object"!=typeof t||t instanceof RegExp)for(r=n.length;r--;)s.call(this,t,n[r]);else for(r in t)t.hasOwnProperty(r)&&(i=t[r])&&("function"==typeof i?s.call(this,r,i):o.call(this,r,i));return this},s.removeEvent=function(e){var t,n=typeof e,r=this._getEvents();if("string"===n)delete r[e];else if(e instanceof RegExp)for(t in r)r.hasOwnProperty(t)&&e.test(t)&&delete r[t];else delete this._events;return this},s.removeAllListeners=r("removeEvent"),s.emitEvent=function(e,t){var n,r,i,s,o,u=this.getListenersAsObject(e);for(s in u)if(u.hasOwnProperty(s))for(n=u[s].slice(0),i=0;i<n.length;i++)r=n[i],r.once===!0&&this.removeListener(e,r.listener),o=r.listener.apply(this,t||[]),o===this._getOnceReturnValue()&&this.removeListener(e,r.listener);return this},s.trigger=r("emitEvent"),s.emit=function(e){var t=Array.prototype.slice.call(arguments,1);return this.emitEvent(e,t)},s.setOnceReturnValue=function(e){return this._onceReturnValue=e,this},s._getOnceReturnValue=function(){return!this.hasOwnProperty("_onceReturnValue")||this._onceReturnValue},s._getEvents=function(){return this._events||(this._events={})},t.noConflict=function(){return e.EventEmitter=o,t},"function"==typeof define&&define.amd?define(function(){return t}):"object"==typeof module&&module.exports?module.exports=t:e.EventEmitter=t}(this||{});



/* global WebSocket, window, toastr, INTERNAL_USER_ID, WS_CONNECTION_HASH */
const _wsQueue = new Queue()
const rouletteSocket = new EventEmitter()
let _rouletteSocket, _hostname
rouletteSocket.isActive = false

const createSocket = (hostname) => {
    if (hostname) {
        _hostname = hostname
    }
    _rouletteSocket = new WebSocket('wss://' + _hostname + '/websocket')

    _rouletteSocket.addEventListener('open', _socketOpenEvent)
    _rouletteSocket.addEventListener('message', _socketMessageEvent)
    _rouletteSocket.addEventListener('close', _socketCloseEvent)

    rouletteSocket.sendJson = (event, data = false) => {
        if (!rouletteSocket.isActive) {
            return _wsQueue.enqueue({event, data})
        }
        const message = JSON.stringify({ event, data })
        _rouletteSocket.send(message)
    }
}

const _socketOpenEvent = () => {
    rouletteSocket.isActive = true
    while (!_wsQueue.isEmpty()) {
        const {event, data} = _wsQueue.dequeue()

        rouletteSocket.sendJson(event, data)
    }

    if (typeof INTERNAL_USER_ID !== 'undefined') {
        rouletteSocket.sendJson('setUserID', {
            id: INTERNAL_USER_ID,
            key: WS_CONNECTION_HASH
        })
    }

    toastr.remove()

    setInterval(() => {
        _rouletteSocket.send('PING')
    }, 5000)
}

const _socketCloseEvent = () => {
    rouletteSocket.isActive = false
    toastr.error('We can not connect to the game server, try to reload the site page', 'WebSocket ERROR', {
        positionClass : 'toast-top-center',
        timeOut: 10000
    })
    _rouletteSocket.removeEventListener('open', _socketOpenEvent)
    _rouletteSocket.removeEventListener('message', _socketMessageEvent)
    _rouletteSocket.removeEventListener('close', _socketCloseEvent)
    setTimeout(() => createSocket(false), 5000)
}

const _socketMessageEvent = (event) => {
    if (event.data === 'PONG') {
        return true
    }

    try {
        const message = JSON.parse(event.data)
        rouletteSocket.emitEvent(message.event, [message.data])
    } catch (parseError) {
        console.error(parseError)
    }
}