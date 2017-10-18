function CountDown (rowData, rowIndex) {

	var data = rowData
	var index = rowIndex
	var parent = this
	var intervalTimer
	var doneCallback

    this.start = start
	function start(callback) {

		doneCallback = callback
		this.adjust()
		intervalTimer = setInterval(this.adjust, 2000)

	}

	this.adjust = adjust
	function adjust() {

        var now = new Date();
        var endDate = new Date(data.closing_time); 
        var diff = endDate - now; 

        var hours   = Math.floor(diff / 3.6e6);
        var minutes = Math.floor((diff % 3.6e6) / 6e4);
        var seconds = Math.floor((diff % 6e4) / 1000);

        var remaining = ""

        if (hours > 0) {
            remaining += hours + "h "
        }
        if (minutes > 0) {
            remaining += minutes + "m "
        }
        if (seconds > 0) {
            remaining += seconds + "s"
        }
        data.remaining = remaining

        if (diff < 0 ) {
            console.log("removed")
            data.remaining = "Closed"
            clearInterval(intervalTimer)
            doneCallback()
            return false

        } else {

        	return true
        }
 
	}
}

export default CountDown;