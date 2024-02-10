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

<section class="spot-section">
    {{$courseDetails['name']}}
    <div id="episodes">
        <h3>ویدئو های این کلاس</h3>
        <ul>
            @foreach ($courseDetails['items'] as $item)
                @if ($item['type']=='vid')
                    <li>
                        <a href="#" onclick="play(
                        '{{$licence->licenceKey}}',
                        '{{$courseDetails['_id']}}',
                        '{{$item['_id']}}'
                        )">{{$item['name']}}</a>
                    </li>
                @endif
            @endforeach
            <a href="#" onclick="stop()">توقف پخش</a>
        </ul>
    </div>

    <div id="player"></div>

</section>

<script src="https://app.spotplayer.ir/assets/js/app-api.js"></script>
<script type="application/javascript">
    (function() {
        window.sp = new SpotPlayer(document.getElementById('player'), '/spotx', false);
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