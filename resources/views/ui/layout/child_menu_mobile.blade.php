@if (!empty($children))
    <ul class="child-menu hidden bg-zinc-800 py-2" style="list-style: none; padding: 0;">
        @foreach ($children as $child)
            <li class="py-2 text-white px-4" style="list-style: none;">
                <div class="flex justify-between items-center" style="display: flex; justify-content: space-between; align-items: center;">
                    <a class="text-white" href="{{ $child['link'] }}">{{ $child['label'] }}</a>

                    @if (!empty($child['child']))
                        <button class="text-white sub-child-toggle btn">
                            <i class="fas fa-plus"></i>
                        </button>
                    @endif
                </div>

                @if (!empty($child['child']))
                    @include('ui.layout.subchild_menu_mobile', ['children' => $child['child']])
                @endif
            </li>
        @endforeach
    </ul>
@endif
