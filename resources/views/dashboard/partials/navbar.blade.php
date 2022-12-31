<div class="navigation active">
    <ul>
        <li>
            <a href="">
                <span class="icon"><img src="/img/logo.jpg" alt="" style="width: 40px; height: 40px;" class="rounded-circle"></span>
                <span class="title mt-1">Arjuna21</span>
            </a>
        </li>
        @foreach ($listnav as $navtitle)
        <li>
            <a href="{{$navtitle['link']}}">
                <span class="icon"><ion-icon name={{$navtitle['icon']}}></ion-icon></span>
                <span class="title">{{$navtitle['title']}}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>

<script src="/js/navadmin.js"></script>