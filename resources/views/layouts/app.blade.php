<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- link google icon --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        table.glyphicon-hover .glyphicon {
            visibility: hidden;
        }
        table.glyphicon-hover td:hover .glyphicon {
            visibility: visible;
        }
    </style>
</head>
<body>
    <div id="app">
        @if (Auth::check())
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

            <div class="menu">
                <a class="navbar-brand" href="{{ route('home') }}" onfocus="myFunction(this)">
                    {{ __('Your leave') }}
                </a>
                <a class="navbar-brand" href="{{ route('request.index') }}" onfocus="myFunction(this)">
                    {{ __('Leaves') }}
                </a>
                <a class="navbar-brand" href="{{ route('employee.index') }}" onfocus="myFunction(this)">
                    {{ __('Employees') }}
                </a>
                <a class="navbar-brand" href="{{ route('showPosition') }}" onfocus="myFunction(this)">
                    {{ __('Positions') }}
                </a>
                <a class="navbar-brand" href="{{ route('showDepartment') }}" onfocus="myFunction(this)">
                    {{ __('Department') }}
                </a>
            </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong> {{ Auth::user()->firstName }} <span class="caret"></span> </strong>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModals"
                                    onclick="event.preventDefault();
                                                  document.getElementById('myModals').submit();">
                                     {{ __('Profile') }}
                                 </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                </div>
                <div class="col-2"></div>
            </div>
        </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        function myFunction(x) {
          x.style.color = "blue";
        }
    </script>
    
    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
      
    </script>
    <!-- The Modal -->
<div class="modal" id="myModals">
    <div class="modal-dialog">
       <div class="modal-content" style="border-radius: 20px;">
       
             <!-- Modal Header -->
             <div class="modal-header">
               <h4 class="modal-title">My information</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
       
             <!-- Modal body -->
             <div class="modal-body">
                 <div class="row">
                     <div class="col-8">
                        <table class="table table-borderless">
                            <tr>
                                <th class="header-table">Firstname</th>
                                <td>{{Auth::user()->firstName}}</td>
                            </tr>
                            <tr>
                                <th class="header-table">Lastname</th>
                                <td>{{Auth::user()->lastName}}</td>
                            </tr>
                              <tr>
                                <th class="header-table">Department</th>
                                <td>{{Auth::user()->department->department}}</td>
                              </tr>
                              <tr>
                                <th class="header-table">Position</th>
                                <td>{{Auth::user()->position->position}}</td>
                              </tr>
                              <tr>
                                <th class="header-table">Startdate</th>
                                <td>{{Auth::user()->startDate}}</td>
                              </tr>
                         </table>
                     </div>
                     <div class="col-4">
                            <div class="form-group">
                                <img style=" width: 80px;height:80px" src="{{asset('img/'.Auth::user()->profile)}}">
                            </div>
                            <div class="form-group">
                                <form id="addProfile" action="{{route('addProfile', Auth::user()->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('POST')
                                        <label for="picture"><i class="material-icons">add</i></label>
                                        <input type="file" id="picture" name="image" autocomplete="picture" style="display:none">
                                        <label for="newPicture"><i class="material-icons">edit</i></label>
                                        <input type="file" id="newPicture" name="newPicture" autocomplete="newPicture" style="display:none">
                                        <a href="{{route('deleteProfile' , Auth::user()->id)}}" style="color: black"  onclick="return confirm('Are you sure you want to delete this item')"><i class="material-icons">delete</i></a>
                                </form>
                            </div>
                    </div>
                 </div>
             </div>
             <!-- Modal footer -->
             <div class="modal-footer">
               <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
             </div>
       
           </div>
         </div>
   </div>
</body>
</html>
