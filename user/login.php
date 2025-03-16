<?php include 'header.php'
?>
<main class="md:mx-40 mx-2 min-h-screen login ">
<section>
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold text-gray-900 md:text-2xl">
                  Sign in to your account
              </h1>
              <form class="space-y-4 md:space-y-6" action="#">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                      <input type="email" name="login_email" id="login_email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 " required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                      <input type="password" name="login_password" id="login_password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" required="">
                  </div>
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" required="">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 ">Remember me</label>
                          </div>
                      </div>
                  </div>
                  <button type="button" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center"  onclick="user_login()">Sign in</button>
                  <p class="text-sm font-light text-gray-500 ">
                      Don’t have an account yet? <a href="signup.php" class="font-medium text-primary-600 hover:underline">Sign up</a>
                  </p>
                  <div id="form-message"></div>
              </form>
          </div>
      </div>
  </div>
</section>
</main>
<script src="js/register.js"></script>
<?php include 'bottom.php'?>