<?php include 'header.php'?>
<main class="md:mx-40 mx-2 min-h-screen login">
<section>
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold text-gray-900 md:text-2xl">
                  Sign up
              </h1>
              <form class="space-y-4 md:space-y-6" action="#">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 " required="">
                  </div>
                  <div>
                      <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900">Your Phone number</label>
                      <input type="text" name="mobile" id="mobile" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 " required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                      <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" required="">
                  </div>
                  <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
              </form>
          </div>
      </div>
  </div>
</section>
</main>
<?php include 'bottom.php'?>