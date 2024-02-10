<section class="spot-section">
    
    <div class="spot-download-box">

        <div class="spot-licence">
            <h2 class="section-title">کلید لایسنس</h2>
            <textarea class="spot-licence-box" readonly >{{$licence->licenceKey}}</textarea>
        </div> 

        <div>
            <h2>دانلود ویدیوها</h2>
            <div>
                <script src="https://dl.spotplayer.ir{{$licence->licenceUrl}}?f=js"></script>
                <script type="application/javascript">
                    document.write(window.spotplayer_courses.map(function (c) {
                        return '<h3>' + c.name + '</h3>' +
                        c.items.map(function (v) {
                            return '<div class="sp_' + v.type + '">'
                                + '<a href="https://dl.spotplayer.ir{{$licence->licenceUrl}}' + v._id + '.spot">' 
                                + dl_icon 
                                + v.name 
                                + '</a>'
                                + '</div>';
                        }).join('');
                    }).join(''));
                </script>
            </div>
        </div>

    </div>

</section>