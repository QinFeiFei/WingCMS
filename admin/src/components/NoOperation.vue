<template></template>

<script type="text/ecmascript-6">
    function ScreenSaver(settings) {
        this.settings = settings
        this.nTimeout = this.settings.timeout
        document.body.screenSaver = this
        // link in to body events
        document.body.onmousemove = ScreenSaver.prototype.onevent
        document.body.onmousedown = ScreenSaver.prototype.onevent
        document.body.onkeydown = ScreenSaver.prototype.onevent
        document.body.onkeypress = ScreenSaver.prototype.onevent

        var pThis = this
        var f = function () { pThis.timeout() }
        this.timerID = window.setTimeout(f, this.nTimeout)
    }

    ScreenSaver.prototype.timeout = function () {
        if ( !this.saver ){
            window.location = 'http://www.baidu.com'
        }
    }

    ScreenSaver.prototype.signal = function () {
        if ( this.saver ){
            this.saver.stop()
        }

        window.clearTimeout(this.timerID)

        var pThis = this
        var f = function () { pThis.timeout() }
        this.timerID = window.setTimeout(f, this.nTimeout)
    }

    ScreenSaver.prototype.onevent = function(e){
        this.screenSaver.signal()
    }

    var saver

    function initScreenSaver() {
        saver = new ScreenSaver( { timeout: 5000 } )
    }

    window.onload = function () {
        initScreenSaver()
    }

    export default {
        data: function () {

        },
        created: function () {

        },
        methods: {
        }
    }
</script>