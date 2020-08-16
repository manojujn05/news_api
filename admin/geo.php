<button onclick="showPosition()" id="btn" hidden>Show</button>
<script>
document.getElementById('btn').click();

    function showPosition() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                window.location.href="getWeather.php?lat="+ position.coords.latitude +"&long="+ position.coords.longitude +"";
            });
        } 
		else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }
</script>

   