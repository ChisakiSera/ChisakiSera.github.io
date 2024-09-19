<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Bootatrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  {{-- <div class="container">
    <div class="row justify-content-center">
      <div class="card mx-auto">
        <div class="card-header">
          Hello {{ $name }}!
        </div>
        <div class="card-body bg-primary">
          Please access the website <i class="fab fa-facebook"></i> <a href="{{ $app_url }}">here.</a>
          <p>Thank you!</p>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="container">
    <div class="row justify-content-center">
      <div class="card mx-auto">
        <div class="card-header text-center text-white" style="background-color: darkslategray">
          <p class="text-center">
            <i class="fab fa-instagram"></i> <span class="fst-italic"> Laravel insta</span>
          </p><hr>
          <h3>Welcome to Laravel Insta</h3>
        </div>
        <div class="card-body bg-light">
          <h5>Hello {{ $name }}. Starting Your Adventure!</h5>
          <div class="row justify-content-center d-flex align-items-center">
            <div class="col text-end pe-4">
              <i class="fas fa-icons text-success fa-5x"></i>
            </div>
            <div class="col ps-4">
              <p class="fw-bold">Share your first photo.</p>
              <a href="{{ $app_url }}" class="btn btn-outline-secondary btn-sm px-5">Add a Photo</a>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <p>
            If you didn't create a Laravel Insta account using this email address, <a href="{{ $app_url }}" class="fw-bold">let us know</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>