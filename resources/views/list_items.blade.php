@foreach(\JeroenNoten\LaravelMenu\Menu::build() as $item)
    <li>
        <a href="{{ url($item['url']) }}"
           @if($item['active']) class="active" @endif
        >{{ $item['text'] }}</a>
    </li>
@endforeach