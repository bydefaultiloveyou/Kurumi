<div class="container p-4">
  { @if (1 == 2) : }
  <h1>{{ $data['title'] }}</h1>
  { @elif (1 == 1) : }
  <h1>kurumi: bener mas lutfii >//• </h1>
  { @else : }
  <h1>kurumi: salah mas lutfii :( </h1>
  { @endif }
  <p class=" text-secondary">Selamat Datang Di Kurumi Framework</p>
</div>
