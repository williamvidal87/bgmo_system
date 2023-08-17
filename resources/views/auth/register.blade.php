<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('image/logo/norsu2.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('image/logo/norsu2.png') }}">
    <title>Register page | {{ config('app.name', 'Laravel') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="image/logo/bgmo_logo.gif"  style="width: 3in">
                  {{-- <h2 class="menu-title" style="color:#b66dff">NORSU-G BGMO</h2> --}}
                </div>
                <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="form-group">
                  <select class="form-control form-control-lg" id="dept_id" name="dept_id" required autofocus autocomplete="dept_id" style="color:black">
                    <option value="">Select Deparment</option>
                    <option value="1">CAS</option>
                    <option value="2">CIT</option>
                    <option value="3">CTE</option>
                    <option value="4">CBA</option>
                    <option value="6">CAFF</option>
                    <option value="7">CCJE</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="name" placeholder="Full Name" name="name" :value="old('name')" required autofocus autocomplete="name">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email" :value="old('email')" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" required autocomplete="new-password">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" name="terms"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>