<section>

    <div>
        <h2 class="flex justify-center my-5 text-2xl">دانلود ویدیوها</h2>
        <div class="text-right my-2">
            <script src="https://dl.spotplayer.ir{{$licence->licenceUrl}}?f=js"></script>
            <script type="application/javascript">
                document.write(window.spotplayer_courses.map(function (c) {
                    return '<h3>' + c.name + '</h3>' +
                    c.items.map(function (v) {
                        return '<div class="sp_' + v.type + '">'
                            + '<a href="https://dl.spotplayer.ir{{$licence->licenceUrl}}' + v._id + '.spot">' 
                            + v.name 
                            + '</a>'
                            + '</div>';
                    }).join('');
                }).join(''));
            </script>
        </div>
    </div>

</section>