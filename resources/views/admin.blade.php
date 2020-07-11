@extends('layouts.header')

@section('content')
<style>
    div.body {
      margin: 0;
      font-family: "Lato", sans-serif;
      color:whitesmoke;
      margin-top: 4%;
    }
    
    .sidebar {
      margin: 0;
      padding: 0;
      width: 200px;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
    }
    
    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }
     
    .sidebar a.active {
      background-color: rgb(45,45,45);
      color: white;
    }
    
    .sidebar a:hover:not(.active) {
      background-color: #555;
      color: white;
    }
    
    div.content {
      margin-left: 200px;
      padding: 1px 16px;
      height: 1000px;
    }
    
    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        margin-top: 8%;
      }
      .sidebar a {float: left;}
      div.content {margin-left: 0;}
    }
    
    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    }
    </style>
   
    <div class="body">
    <div class="sidebar">
      <a href="{{ url('/admin_home') }}">Home</a>
      <a href="{{ url('/registered_users') }}">Registered Users</a>
      <a href="{{ url('/advertisements') }}">Advertisements</a>
      <a href="{{ url('/subscribers') }}">Newsletter</a>
    </div>
    <div class="py-4 content">
      @yield('admin_content')
    </div>

@endsection