<!DOCTYPE html>
<html>
<head>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
.topright {
    position: absolute;
    top: 8px;
    right: 16px;
    font-size: 18px;
}

</style>
</head>
<nav class="navbar navbar-expand-lg navbar-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/comic">Publish Your Comic</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/trending">Trending</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/comic/create">Create</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/library">My Library</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item">
        <form method="post" action="{{ url('search')}}" enctype="multipart/form-data">
          {{ csrf_field()}}
      <input style="width:500px" type="text" placeholder="Search for Artist or Comic Title.." name="search">
      <button type="submit" class="btn btn-light">Search</button>
    </form>
      </li>

      <li class="topright">
        <div class=" dropdown">
          @foreach($userId as $userid)

          <button class="btn btn-light dropdown-toggle">{{$userid->firstname}} {{$userid->lastname}}</button>
          <div class="dropdown-content">
          <a href="/profile">Profile</a>
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
          @endforeach
      </div>
      </li>

    </ul>
  </div>
</nav>
