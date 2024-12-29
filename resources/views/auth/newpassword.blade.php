<x-guest-layout>

    <form method="POST">
        @csrf
        <!-- Email Address -->
        <div >
            <x-input-label class="mt-5" :value="__('Enter New Password')" />
            <x-text-input  class="block mt-1 w-full" type="password" placeholder="*******" name="password"  required autofocus />
           @error('password')
               <p>{{$message}}</p>
           @enderror
        </div>
        <div class="mt-4">
            <x-input-label :value="__('Confirm Password')" />
            <x-text-input  class="block mt-1 w-full" type="password" placeholder="*******" name="repassword"  required autofocus />
           @error('password')
               <p>{{$message}}</p>
           @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
