<section class="spot-section">

    <div class="spot-download-box">
        <script src="http://dl.spotplayer.ir/players/?f=js"></script> 
        <div id="spotplayer-players">
            <h2 class="section-title">دانلود پخش کننده</h2>
            <div id="spotplayer-players-items">
                <script type="application/javascript">
                    var domain = 'http://dl.spotplayer.ir';
                    if (spotplayer_players) document.write(spotplayer_players.map(function (p) {
                        return [
                            '<div class = "spot-links">',
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