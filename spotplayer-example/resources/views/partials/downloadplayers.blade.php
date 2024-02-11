<section>

    <div>
        <script src="http://dl.spotplayer.ir/players/?f=js"></script> 
        <div id="spotplayer-players">
            <h2 class="flex justify-center my-5 text-2xl">دانلود پخش کننده</h2>
            <div id="spotplayer-players-items" class="flex items-center justify-center">
                <script type="application/javascript">
                    var domain = 'http://dl.spotplayer.ir';
                    if (spotplayer_players) document.write(spotplayer_players.map(function (p) {
                        return [
                            '<div class = "spot-links px-5">',
                            '<a target="_blank" ' + (p.file ? ('href="' + domain + p.file + '"') : '') + '>',
                            ' <img alt="' + p.name +'" src="' + domain + p.image + '" class= "spot-image">',
                            ' <h3 class="spot-os"> دانلود برای ' + p.name + '</h3>',
                            '  <h4 class="spot-os-ver">' + (p.file ? ('نسخه ' + p.version) : 'به زودی') + '</h4>',
                            '</a>',
                            '</div>'
                        ].join('');
                    }).join(''));
                </script>
            </div>
        </div>
    </div>

</section>