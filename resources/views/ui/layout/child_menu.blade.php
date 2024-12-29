@if (!empty($children))
    <ul class="sub-menu relative">
       
        @foreach ($children as $child)
            <li class="submenu-item">

                <a href="{{ $child['link'] }}" class="relative" title=""> {{ $child['label'] }}  <i class="icon fa-solid fa-sort-down" style="position: absolute; right: -13px;  top: 0.75rem; "></i></a>
               
                @if (!empty($child['child']))
                    @include('ui.layout.childofchildmenu', ['children' => $child['child']])
                @endif
            </li>
        @endforeach
    </ul>
@endif



<style>
  .submenu-item a .icon {
    transform: scaleX(0) rotate(90deg);
    transition: transform 0.3s ease;  
}

.submenu-item a:hover > .icon {
    transform: scaleX(1) rotate(90deg); 
}

</style>