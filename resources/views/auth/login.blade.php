<x-layout>
    <h1 class="title">Welcome Back</h1>
    {{-- <h1 class="title">Welcome Back, {{ Auth::check() ? Auth::user()->name : 'Guest' }}</h1> --}}

    <div class="mx-auto max-w-scr
    een-sm card">

        <form action="{{ route('login') }}" method="post">
            @csrf
            @error('failed')
                <p class="error">{{ $message }}</p>
            @enderror
            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}"
                    class="input @error('email')
                    ring-red-500
                @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password"
                    class="input @error('password')
                    ring-red-500
                @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember me --}}
            <div class="mb-4 flex gap-x-2">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>


            {{-- Submit Button --}}
            <button class="btn">Login</button>
        </form>
    </div>

</x-layout>
