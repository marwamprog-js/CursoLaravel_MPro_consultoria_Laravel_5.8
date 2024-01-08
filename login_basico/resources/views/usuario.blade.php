@auth   
<h4>Você esta logado!</h4>
<p>{{ Auth::user()->id }}</p>
<p>{{ Auth::user()->name }}</p>
<p>{{ Auth::user()->email }}</p>
@endauth

@guest
<h4>Você não esta logado!</h4>
@endguest