<?php include 'header.php'?>
<main class="mt-20 md:mx-40 mx-2 min-h-screen products">
    <section>
        <div class="flex mb-5">
            <div class="bg-rose-700 px-9.5 flex items-center justify-center">
            <i class="fa-solid fa-location-dot text-5xl text-white"></i>
            </div>
            <div class="flex-col bg-gray-300 min-w-96 max-w-96">
                <h2 class="text-gray-900 text-xl font-bold m-8">Address
                <p class="text-gray-500 text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </h2>
            </div>
        </div>

        <div class="flex mb-5">
            <div class="bg-rose-700 px-8 py-3 flex items-center justify-center">
            <i class="fa-solid fa-envelope text-5xl text-white"></i>
            </div>
            <div class="flex-col bg-gray-300 min-w-96 max-w-96">
                <h2 class="text-gray-900 text-xl font-bold m-8">Email
                <p class="text-gray-500 text-base">beststore1234@gmail.com</p>
                </h2>
            </div>
        </div>

        <div class="flex">
            <div class="bg-rose-700 px-8 py-3 flex items-center justify-center">
            <i class="fa-solid fa-phone text-5xl text-white"></i>
            </div>
            <div class="flex-col bg-gray-300 min-w-96 max-w-96">
                <h2 class="text-gray-900 text-xl font-bold m-8">Phone number
                <p class="text-gray-500 text-base">+91 99222 22222</p>
                </h2>
            </div>
        </div>
    </section>


    <section>
    <form class="mt-8 space-y-5">
      <div>
      <label class='text-sm text-slate-800 font-medium mb-2 block'>Name</label>
        <input id="name" name="name" type='text' placeholder='Enter Name'
          class="w-full py-2.5 px-4 text-slate-800 bg-gray-100 border focus:border-slate-900 focus:bg-transparent text-sm outline-none transition-all" />
        </div>
        <div>
            <label class='text-sm text-slate-800 font-medium mb-2 block'>Email</label>
        <input id="email" name="email" type='email' placeholder='Enter Email'
          class="w-full py-2.5 px-4 text-slate-800 bg-gray-100 border focus:border-slate-900 focus:bg-transparent text-sm outline-none transition-all" />
        </div>
        <div>
            <label class='text-sm text-slate-800 font-medium mb-2 block'>Mobile</label>
        <input id="mobile" name="mobile" type='text' placeholder='Enter number'
          class="w-full py-2.5 px-4 text-slate-800 bg-gray-100 border focus:border-slate-900 focus:bg-transparent text-sm outline-none transition-all" />
        </div>
        <div>
            <label class='text-sm text-slate-800 font-medium mb-2 block'>Message</label>
        <textarea id="comment" name="comment" placeholder='Enter Message' rows="4"
          class="w-full px-4 text-slate-800 bg-gray-100 border focus:border-slate-900 focus:bg-transparent text-sm pt-3 outline-none transition-all"></textarea>
        </div>
        <button type='button' onclick="send_message()"
          class="mt-8 mb-10 text-white bg-slate-900 hover:bg-slate-800 tracking-wide text-[15px] px-4 py-2 w-full outline-none">Send</button>
      </form>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/contact.js"></script>
<?php include 'bottom.php'?>