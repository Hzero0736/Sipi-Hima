  <body>
    <main>
      <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <!-- End Logo -->

                <div class="card mb-3">
                  <div class="card-body">
                    <div class="text-center pt-4 pb-2">
                      <img src="assets/img/hima.svg" alt="" style="height: 200px;" />
                      <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                          <span class="d-none d-lg-block">Inventaris HIMA-TI</span>
                        </a>
                      </div>
                    </div>

                    <form class="row g-3" action="">
                      <div class="col-12">
                        <label for="Username" class="form-label">Username</label>
                        <div class="input-group has-validation">
                          <input type="text" name="username" class="form-control" id="Username" required />
                          <div class="invalid-feedback">
                            Please enter your username.
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="Password" required />
                        <div class="invalid-feedback">
                          Please enter your password!
                        </div>
                      </div>

                      <div class="col-12">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe" />
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">
                          Login
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    <!-- End #main -->