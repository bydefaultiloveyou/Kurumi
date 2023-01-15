@section ("layouts")

<x-header x-text="HEADER" x-bg="bg-info" x-align="center"/>

<main class="container">
  <figure class="text-center">
    <img width="400" src="https://pbs.twimg.com/media/FJxua79XwAMXzND?format=jpg&name=900x900" alt="Kurumi" />
    <h2>WELCOME TO KURUMI FRAMEWORK</h2>
    <figcaption>
      <p class="text-secondary">Simple framework for Koneksi.php</p>
      <ul class="d-flex w-100 justify-content-center">
        <a href="https://github.com/bydefaultiloveyou/Kurumi.git" target="__blank" style="text-decoration: none;" class="px-4 rounded-5 m-2 py-1 bg-primary text-white">
          <li>Documentation</li>
        </a>
        <li class="px-4 py-1 bg-primary text-white rounded-5 m-2">Lincense MIT</li>
      </ul>
    </figcaption>
  </figure>
</main>

<x-footer x-class="justify-content-center" x-year="2023" x-bg="bg-secondary" />

@endsection

@extends ("layouts.main")
