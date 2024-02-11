<section>

    <div id="episodes">
        <h3 class="flex justify-center my-5 text-2xl">ویدئو های این کلاس</h3>
        <p class="text-right">
            برای پخش هر آیتم روی آن کلیک کنید.
            <br>
            <a href="#" onclick="stop()" class="text-right">توقف پخش</a>
        </p>
 
        <br>
        <ul class="text-right my-2">
            @foreach ($courseDetails['items'] as $item)
                @if ($item['type']=='vid')
                    <li>
                        <a href="#" onclick="play(
                        '{{$licence->licenceKey}}',
                        '{{$courseDetails['_id']}}',
                        '{{$item['_id']}}'
                        )">
                            {{$item['name']}}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

</section>