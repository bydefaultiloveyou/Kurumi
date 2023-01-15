@section ("layouts")

<x-header x-text="HEADER" x-bg="bg-info" x-align="center"/>

<main class="container">
  <figure class="text-center">
    <img width="400" src="https://pbs.twimg.com/media/FJxua79XwAMXzND?format=jpg&name=900x900" alt="Kurumi" />
    <h2>WELCOME TO KURUMI FRAMEWORK</h2>
    <figcaption>
      <p class="text-secondary">Simple framework for Koneksi.php</p>
      <div class="d-flex w-100 justify-content-center">
        <a href="https://github.com/bydefaultiloveyou/Kurumi.git" target="__blank" style="text-decoration: none;" class="px-4 rounded-5 m-2 py-1 bg-primary text-white">
          <span>Documentation</span>
        </a>
        <div class="px-4 py-1 bg-primary text-white rounded-5 m-2">License MIT</div>
      </div>
    </figcaption>
  </figure>
</main>

<x-footer x-class="justify-content-center" x-bg="bg-secondary" />

@endsection

@extends ("layouts.main")
