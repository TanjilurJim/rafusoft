@extends('dashboard.layout')


@section('content')
        <div class="p-3">
            <div class="bg-[#343A40] p-3 flex justify-between rounded text-white">
                <h4 class="text-[20px]">Files</h4>
                <div>
                    Storage : {{auth()->user()->dir_file_limit}} MB | Used : {{$totalSizeMBFormatted}}MB
                </div>
            </div>

            <div class="py-3 grid xl:grid-cols-6 lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-5">
                <a href="/dashboard/dir/user/files/favicon" class="btn btn-sm bg-[#F15A29] font-medium text-[20px] text-white py-5">
                    <i class="fa-solid fa-image"></i>
                    <p>Favicon</p>
                </a>
                <a href="/dashboard/dir/user/files/og_image" class="btn btn-sm bg-[#F15A29] font-medium text-[20px] text-white py-5">
                    <i class="fa-solid fa-image"></i>
                    <p>Open Graph</p>
                </a>
                <a href="/dashboard/dir/user/files/schema_image" class="btn btn-sm bg-[#F15A29] font-medium text-[20px] text-white py-5">
                    <i class="fa-solid fa-image"></i>
                    <p>Schema</p>
                </a>
                <a href="/dashboard/dir/user/files/publisher_image" class="btn btn-sm bg-[#F15A29] font-medium text-[20px] text-white py-5">
                    <i class="fa-solid fa-image"></i>
                    <p>Publisher</p>
                </a>
                <a href="/dashboard/dir/user/files/pop-up" class="btn btn-sm bg-[#F15A29] font-medium text-[20px] text-white py-5">
                    <i class="fa-solid fa-image"></i>
                    <p>Pop Up</p>
                </a>
                <a href="/dashboard/dir/user/files/custom" class="btn btn-sm bg-[#F15A29] font-medium text-[20px] text-white py-5">
                    <i class="fa-solid fa-image"></i>
                    <p>Custom Size</p>
                </a>
            </div>

        </div>
@endsection