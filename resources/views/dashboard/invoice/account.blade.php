@extends('dashboard.layout')



@section('content')
    <div class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Invoice Setting</h1>
        </div>

        @if (!$profile)
            <div class="mt-4 text-center">
                <h3 class="text-xl my-10 text-slate-400">Update your setting</h3>
                <a href="/dashboard/my-invoice-profile/create" class="btn btn-primary">Create Setting</a>
            </div>
        @endif


        @if ($profile)
        <div class=" mt-4">
            <img src="{{$profile->logo}}" class="rounded w-[180px]  overflow-hidden">

            <p class="mt-3">From</p>
            <textarea readonly   rows="1" id="autoResizeTextarea" name="billto_value"
            class="resize-none p-2  focus:outline-none text-gray-500 border-slate-100 w-full mt-3">{!!$profile->from!!}</textarea>
            <p class="mt-3">Notes (optional)</p>
            <textarea readonly   rows="1" id="autoResizeTextarea" name="billto_value"
            class="resize-none p-2  focus:outline-none text-gray-500 border-slate-100 w-full mt-3">{!!$profile->notes!!}</textarea>
            <p class="mt-3">Terms (optional)</p>
            <textarea  readonly  rows="1" id="autoResizeTextarea" name="billto_value"
            class="resize-none p-2  focus:outline-none text-gray-500 border-slate-100 w-full mt-3">{!!$profile->terms!!}</textarea>
            <a href="/dashboard/my-invoice-profile/edit" class="btn btn-orange mt-3"><i class="fa-solid fa-pen-to-square"></i> Edit setting</a>
        </div>
        @endif
        
        <script src="{{asset('assets/js/invoice.js')}}"></script>
    </div>
@endsection