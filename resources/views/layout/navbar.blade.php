     <nav class="navbar bg-base-100 shadow-lg mx-auto w-full max-w-screen-2xl px-2.5 md:px-20 flex justify-between">
         <div class="flex">
             <a href="/" class="btn btn-ghost text-xl">{{ config('app.name', 'Laravel') }}</a>
         </div>
         <div class="flex-none">
             <ul class="menu menu-horizontal px-1 gap-2">
                 <li>
                     <a href="/"
                         class="{{ request()->routeIs('admin.dashboard') || request()->routeIs('user.dashboard') ? 'bg-primary' : '' }}">
                         Dahsboard
                     </a>
                 </li>

                 <!--admin route-->
                 @if (auth()->user()->role === 'admin')
                     <li>
                         <a href="{{ route('admin.user.index') }}"
                             class="{{ request()->routeIs('admin.user.*') ? 'bg-primary' : '' }}">
                             User
                         </a>
                     </li>
                 @endif

             </ul>
         </div>

         <a href="{{ route('login.destroy') }}" class="btn btn-error">Logout</a>
     </nav>
