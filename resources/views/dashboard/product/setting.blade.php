@extends('dashboard.layout')

@section('content')
    <section class="p-3">


        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h1 class="text-[20px]">Setting Shop</h1>
            <div>
                <a class="btn btn-sm btn-orange" href="/dashboard/product/setting/privacy-policy">Privacy Policy</a>
                <a class="btn btn-sm btn-orange" href="/dashboard/product/setting/terms">Terms & Conditions</a>
                <a class="btn btn-sm btn-orange" href="/dashboard/product/setting/refund">Refund Policy</a>
            </div>
        </div>

        <form class="mt-5" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" name="name" value="{{ old('name') ?? ($setting->name ?? '') }}" class="form-control">
                @error('name')
                    <p class="text-red-500 my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{ old('address') ?? ($setting->address ?? '') }}" class="form-control">
                @error('address')
                    <p class="text-red-500 my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="full-address">Full Address</label>
                <input type="text" name="full_address" value="{{ old('full_address') ?? ($setting->full_address ?? '') }}" class="form-control">
                @error('full_address')
                    <p class="text-red-500 my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone') ?? ($setting->phone ?? '') }}" class="form-control">
                @error('phone')
                    <p class="text-red-500 my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') ?? ($setting->s_email ?? '') }}" class="form-control">
                @error('email')
                    <p class="text-red-500 my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="facebook">Facebook Link</label>
                <input type="text" name="facebook" value="{{ old('facebook') ?? ($setting->facebook ?? '') }}" class="form-control">
                @error('facebook')
                    <p class="text-red-500 my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="map">Map</label>
                <input type="text" name="map" value="{{ old('map') ?? ($setting->map ?? '') }}" class="form-control">
                @error('map')
                    <p class="text-red-500 my-1">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-orange">Save</button>
        </form>
    </section>
@endsection
