<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Security</title>
</head>

<body class="min-h-screen bg-gray-50">

<header class="flex items-center justify-between p-6">
    <a href="{{ route('login') }}" class="flex items-center gap-2">
        <span class="text-xl font-black">Security</span>
    </a>
</header>
<main class="flex flex-col justify-center p-6 pb-12">
    <div class="mx-auto max-w-md">

        <h2 class="mt-2 text-2xl font-bold text-gray-900 sm:mt-6 sm:text-3xl">Forgot your password?</h2>
    </div>
    <div class="mx-auto mt-6 w-full max-w-md rounded-xl bg-white/80 p-6 shadow-xl backdrop-blur-xl sm:mt-10 sm:p-10">
        @if (session('status'))
            <div class="flex gap-3 rounded-md border border-green-500 bg-green-50 p-4 mb-6">

                <h3 class="text-sm font-medium text-green-800">{{ session('status') }}</h3>
            </div>
        @endif
        <form action="{{ route('password.request_email') }}" method="post" autocomplete="off">
            @csrf

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative mt-1 rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">

                    </div>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="{{ $errors->has('email') ? 'text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 border-red-300' : 'border-gray-300 focus:border-green-500 focus:ring-green-500 placeholder:text-gray-400' }} w-full rounded-md pl-10 text-sm" placeholder="john@example.com" />
                    @error('email')
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">

                    </div>
                    @enderror
                </div>
                @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="flex w-full items-center justify-center rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Send Reset Link</button>
            </div>
        </form>
    </div>
</main>
</body>

</html>
