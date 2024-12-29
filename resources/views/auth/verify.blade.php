<x-guest-layout>

    <form method="POST">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="otp" :value="__('Varification OTP')" />
            <p class="mb-4 text-sm text-gray-600">A one-time password has been sent to your email, check your inbox and enter OTP hare in 5 minutes.</p>
            <x-text-input id="otp" class="block mt-1 w-full" type="text" placeholder="Enter Your OTP" name="otp"  required autofocus />
            @session('error')
                <p class="mt-3 text-red-600">{{session('error')}}</p>
            @endsession
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('verify') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
