@if (!empty($children))
    <ul class="sub-menu ">
       {{-- <p class="ps-10"> <i class="fa-solid text-white fa-sort-down absolute top-0 rotate-180  bg-transparent"></i></p> --}}
        @foreach ($children as $child)
            <li class="submenu-item">
                <a href="{{ $child['link'] }}" class="relative"  style="position: relative;"> {{ $child['label'] }}  <i class="icon fa-solid fa-sort-down" style="position: absolute; right: -13px;  top: 0.75rem;"></i></a>
                @if (!empty($child['child']))
                    @include('ui.layout.childofchildmenu', ['children' => $child['child']])
                @endif
            </li>
        @endforeach
    </ul>
@endif



<style>
  .submenu-item a .icon {
    transform: scaleX(0) rotate(90deg); /* Initial state: scaled down and rotated */
    transition: transform 0.3s ease; /* Adding transition for smooth animation */
}

.submenu-item a:hover > .icon {
    transform: scaleX(1) rotate(90deg); /* On hover: scaled to normal size and rotated */
}

</style>