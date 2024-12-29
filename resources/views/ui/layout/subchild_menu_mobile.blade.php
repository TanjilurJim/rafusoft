@if (!empty($children))
    <ul class="sub-child-menu hidden bg-slate-700 p-4">
        @foreach ($children as $child)
            <li class="py-2 text-white" style="list-style: none">
                <div class="flex justify-between items-center" style="display: flex; justify-content: space-between; align-items: center;">
                    <a class="text-white" href="{{ $child['link'] }}">{{ $child['label'] }}</a>

                    @if (!empty($child['child']))
                        <button class="text-white btn child-toggle">
                            <i class="fas fa-plus"></i>
                        </button>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
@endif


<style>
    .child-menu {
    display: none;
}

.sub-child-menu{
    display: none;
}
</style>