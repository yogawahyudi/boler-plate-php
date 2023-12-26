
<?php
  $routes = [
    [
      'title' => 'Home',
      'url' => '/',
      'name' => '',
      'active' => true
    ],
    [
      'title' => 'Data',
      'url' => '/data',
      'name'=>'data',
      'active' => false
    ],
    [
      'title' => 'About',
      'url' => '/about/about',
      'name' => 'about',
      'active' => false
    ]
  ];

  $currentUrl = $_SERVER['REQUEST_URI'];
  $curPage = explode('/', trim($currentUrl, '/'))[0];
  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-2 py-2">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse py-4" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="/">Sistem Pengambilan Keputusan</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
          foreach ($routes as $route) {
            echo '<li class="nav-item"><a aria-current="'.($curPage == $route['name'] ? 'page' : null).'" class="nav-link '.($curPage == $route['name'] ? 'active' : '').'" href="' . $route['url'] . '">' . $route['title'] . '</a></li>';
          }
        ?>
      </ul>
      <button class="btn btn-primary">
          login
      </button>
    </div>
  </div>
</nav>