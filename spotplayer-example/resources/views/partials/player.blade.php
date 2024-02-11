<style>
    #player {
        width: 100%; 
        height:300px;
    }
    #spotplayer {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    }
</style>

<section>
    
    <div id="player"></div>

</section>

<script src="https://app.spotplayer.ir/assets/js/app-api.js"></script>
<script type="application/javascript">
    (function() {
        /* set the third parameter to false if you dont want the play list in the player. */
        window.sp = new SpotPlayer(document.getElementById('player'), '/spotx', true);
    })();

    async function play(key, courseId, episodeId){
    try {
        await sp.Open(key, courseId, episodeId);
    }
    catch(ex) {
        console.log(ex);
    }
    }
    
    async function stop(){
    try {
        await sp.Stop();
    }
    catch(ex) {
        console.log(ex);
    }  
    }

    async function hide() {
    try {
        await sp.Hide();
    }
    catch(ex) {
        console.log(ex);
    }
    }
</script>