<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta
         name="viewport"
         content="width=device-width, initial-scale=1, shrink-to-fit=no"
      />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Perpustakaan - Register</title>
      <link
         href="{{asset('vendor/login/all.min.css')}}"
         rel="stylesheet"
         type="text/css"
      />
      <link
         href="{{asset('vendor/login/bootstrap.min.css')}}"
         rel="stylesheet"
         type="text/css"
      />
      <link href="{{asset('css/ruang-admin.min.css')}}" rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   </head>

   <body class="bg-gradient-login">
      <!-- Login Content -->
      <div class="container-login">
         <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
               <div class="card shadow-sm my-5">
                  <div class="card-body p-0">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="login-form">
                              <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">Register</h1>
                              </div>
                              <form class="user" method="POST" action="/register">
                                 @csrf
                                 <div class="form-group">
                                    <input
                                       type="text"
                                       name="nama"
                                       class="form-control @error('nama') is-invalid @enderror"
                                       id="nama"
                                       aria-describedby="emailHelp"
                                       placeholder="nama"
                                       required
                                       value="{{old('nama')}}"
                                    />
                                 </div>
                                 <div class="form-group">
                                    <input
                                       type="text"
                                       name="jurusan"
                                       class="form-control @error('jurusan') is-invalid @enderror"
                                       id="jurusan"
                                       aria-describedby="emailHelp"
                                       placeholder="jurusan"
                                       required
                                       value="{{old('jurusan')}}"
                                    />
                                 </div>
                                 <div class="form-group">
                                    <input
                                       type="email"
                                       name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       aria-describedby="emailHelp"
                                       placeholder="email"
                                       required
                                       value="{{old('email')}}"
                                    />
                                 </div>
                                 <div class="form-group">
                                    <input
                                       type="password"
                                       name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       placeholder="password"
                                       required
                                    />
                                 </div>
                                 <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">
                                       Register
                                    </button>
                                 </div>
                              </form>
                              <hr />
                              <div class="text-center">
                                 <a
                                    class="font-weight-bold small"
                                    href="/"
                                    >Already Register?</a
                                 >
                              </div>
                              <div class="text-center"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Login Content -->
      <script src="{{asset('vendor/login/jquery.min.js')}}"></script>
      <script src="{{asset('vendor/login/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('vendor/login/jquery.easing.min.js')}}"></script>
      <script src="{{asset('js/ruang-admin.min.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      @if ($errors->any())
    <script>
        var errorMessages = @json($errors->all());
        var errorMessage = errorMessages.join('<br>');
        Swal.fire({
            icon: 'error',
            title: 'Validation Errors',
            html: errorMessage,
        });
    </script>
@endif
   </body>
</html>
