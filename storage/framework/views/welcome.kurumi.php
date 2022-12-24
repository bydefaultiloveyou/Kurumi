<main class="container">
  <figure class="text-center p-5">
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

<audio class="d-none" controls loop>
  <source type="audio/ogg" src="<?php echo 'music/backsound-kurumi.mp3' ?>" />
</audio>

<div class="modal fade show d-block mt-5" id="welcome-modal" style="z-index: 100">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header px-3">
        <h1 class="modal-title fs-5">Welcome to Kurumi Framework</h1>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<div id="backdrop" class="modal-backdrop fade show" style="z-index: 99"></div>

<script src="js/welcome.js"></script>
