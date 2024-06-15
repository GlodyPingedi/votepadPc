<div>


<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
          <a href="https://flowbite.com" class="flex ms-2 md:me-24">
            <img src="{{ asset('img/orange.png') }}" class="h-8 me-3" alt="FlowBite Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">VotePad2</span>
          </a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ms-3">
              <div>
                <button type="button" class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only">Open user menu</span> 
                  <img class="w-8 h-8 rounded-full" src="{{ asset('img/profil.jpeg') }}" alt="user photo">
                  
                </button>
              </div>
              <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                <div class="px-4 py-3" role="none">
                  <p class="text-sm text-gray-900 dark:text-white" role="none">
                    {{ Auth::user()->name }}
                  </p>
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                    {{ Auth::user()->email }}
                  </p>
                </div>
                <ul class="py-1" role="none"> 
                  <li>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profil</a>
                  </li>
                   
                  <li>
                     
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Deconnexion') }}
                            </x-dropdown-link>
                        </form>
                    
                    
                  </li>
                </ul>
              </div>
            </div>
          </div>
      </div>
    </div>
  </nav>


  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
          <li>
             <a href="{{route('dashboard')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                   <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                   <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="ms-3">Dashboard</span>
             </a>
          </li>
          <li>
             <a href="{{route('evenements.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                </svg>
                <span class="ms-3">Evénements</span>
             </a>
          </li>
          <li>
             <a href="{{route('phases.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M107-67v-306h120v-160h200v-54H307v-306h346v306H533v54h200v160h120v306H507v-306h120v-54H333v54h120v306H107Zm306-626h134v-94H413v94ZM213-173h134v-94H213v94Zm400 0h134v-94H613v94ZM480-693ZM347-267Zm266 0Z"/></svg>
                <span class="ms-3">Phase</span>
             </a>
          </li>
          <li>
             <a href="{{route('questions.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
             <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M194-88q-43.73 0-74.86-31.14Q88-150.27 88-194v-164h106v164h164v106H194Zm572 0H602v-106h164v-164h106v164q0 43.73-31.14 74.86Q809.72-88 766-88ZM88-766q0-43.72 31.14-74.86Q150.27-872 194-872h164v106H194v164H88v-164Zm784 0v164H766v-164H602v-106h164q43.72 0 74.86 31.14T872-766ZM477.86-217q25.14 0 42.64-17.36t17.5-42.5q0-25.14-17.36-42.64t-42.5-17.5q-25.14 0-42.64 17.36t-17.5 42.5q0 25.14 17.36 42.64t42.5 17.5ZM430-385h98q0-36 12.5-64t41.5-56q31-29 44.5-55t13.5-56.99q0-55.77-43.5-90.89T484-743q-60 0-102.5 31.5T324-625l86 34q2-27 23.6-45.5T484-655q26 0 43 14t17 36.04q0 16.96-11 34.46T500-535q-37 32-53.5 67T430-385Z"/></svg>
                <span class="ms-3">Question</span>
             </a>
          </li>
          <li>
             <a href="{{route('assertions.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
             <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M227-8v-377L95-599l193-313h384l193 313-132 214V-8L480-93 227-8Zm106-147 147-48 147 53v-136H333v131Zm14-651L219-599l128 207h266l128-207-128-207H347Zm91 388L278-577l75-75 85 85 169-170 75 74-244 245ZM333-286h294-294Z"/></svg>
                <span class="ms-3">Assertion</span>
             </a>
          </li>
          <li>
             <a href="{{route('reponses.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
             <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m590-128-74-74 104-104-104-104 74-74 104 104 104-104 74 74-104 104 104 104-74 74-104-104-104 104Zm79-374L509-662l74-74 85 85 170-170 74 75-243 244ZM48-267v-106h401v106H48Zm0-320v-106h401v106H48Z"/></svg>                
             <span class="ms-3">Reponses</span>
             </a>
          </li>
          <li>
            <a href="{{route('intervenants.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m590-128-74-74 104-104-104-104 74-74 104 104 104-104 74 74-104 104 104 104-74 74-104-104-104 104Zm79-374L509-662l74-74 85 85 170-170 74 75-243 244ZM48-267v-106h401v106H48Zm0-320v-106h401v106H48Z"/></svg>                
            <span class="ms-3">Intervenant</span>
            </a>
         </li>
       </ul>
    </div>
 </aside>
</div>