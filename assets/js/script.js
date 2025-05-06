document.addEventListener("DOMContentLoaded", function () {
    // Set the date we're counting down to
    var countDownDate = new Date("april 21, 2024 00:00:00").getTime();

    // Update the countdown every 1 second
    var x = setInterval(function () {

        // Get the current date and time
        var now = new Date().getTime();

        // Calculate the remaining time
        var distance = countDownDate - now;

        // Calculate days, hours, minutes, and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the countdown
        document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        // If the countdown is over, display a message
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
});


function _call_carousel(cnt){
	// INIT CAROUSEL
	 window['carousel_' +cnt] = new CgCarousel('#js-carousel_'+cnt,  window['carousel_options_' +cnt], {});
	// Navigation
	window['next_' +cnt] = document.getElementById('js-carousel__next_'+cnt);
	window['next_' +cnt].addEventListener('click', () => window['carousel_' +cnt].next());
	window['prev_' +cnt] = document.getElementById('js-carousel__prev_'+cnt);
	window['prev_' +cnt].addEventListener('click', () => window['carousel_' +cnt].prev());
}