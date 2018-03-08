<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $head['title']; ?></title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      #map {
        height: 100%;
        width: 100%;
      }

      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>
    <div class="container-fluid" style="height:100%; width:100%;">
      <div class="row" style="">
        <div class="col" style="">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href=".">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="office">Offices</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="car">Cars</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <?php include($body['content']); ?>
    </div>
  </body>
</html>
