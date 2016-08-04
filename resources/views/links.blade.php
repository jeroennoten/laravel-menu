@foreach(\JeroenNoten\LaravelMenu\Menu::build() as $item)
    <a href="{{ url($item['url']) }}"
       @if($item['active']) class="active" @endif
    >{{ $item['text'] }}</a>
@endforeach