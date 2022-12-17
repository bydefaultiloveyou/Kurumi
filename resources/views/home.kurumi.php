<div>
  @if 1 == 1 and 2 == 2 :
  <h1>Selamat Datang Di {{ !title! }}</h1>
  @elif 1 == 1 :
  <h1>ok</h1>
  @else
  <h1>salah!</h1>
  @endif
</div>

@include "about"

@foreach !hewan! as $hewan :
<h1>
  {{ $hewan }}
</h1>
@endforeach
