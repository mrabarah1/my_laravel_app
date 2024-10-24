
{{-- h1 is taking the place of the yield --}}

<x-layout>
    
    @auth
        <h1>Welcome Back, {{ Auth::user()->username}}</h1>
    @endauth

    @guest
        <h1>Guest</h1>
    @endguest
    

</x-layout>
