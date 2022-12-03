<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-forms.validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
            @csrf

            <!-- Name -->
            <x-forms.control id="username" :label="__('auth.fields.username')">
                <x-forms.input required type="text" :value="old('username')" placeholder="John Doe" autofocus />
            </x-forms.control>

            <!-- Email Address -->
            <x-forms.control id="email" :label="__('auth.fields.email')">
                <x-forms.input required type="email" :value="old('email')" placeholder="john@example.com" />
            </x-forms.control>

            <!-- Password -->
            <x-forms.control id="password" :label="__('auth.fields.password')">
                <x-forms.input required type="password" autocomplete="new-password" />
            </x-forms.control>

            <!-- Confirm Password -->
            <x-forms.control id="password_confirmation" :label="__('auth.fields.confirm_password')">
                <x-forms.input required type="password" />
            </x-forms.control>

            <div class="flex items-center justify-between pt-4 border-t-1">
                <a class="underline text-primary hover:text-emerald-900" href="{{ route('login') }}">
                    {{ __('auth.actions.registered') }}
                </a>

                <x-forms.button type="submit" variant="primary">{{ __('auth.actions.register') }}</x-forms.button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
