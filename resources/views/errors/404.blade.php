
@extends('layouts.app')
@section('title', __('Not Found'))
<section id="wrapper" class="error-page">
    <div class="error-box">
        <div class="error-body text-center">
            <h1>404</h1>
            <h3 class="text-uppercase" style="color:black;">Oops! There is something wrong!</h3>
            <p class="text-muted m-t-30 m-b-30">The page you have requested is either moved away or doesn't exist.</p>
            <button onclick="/" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</button>
         </div>
    </div>
</section>
@section('code', '404')
@section('message', __('Not Found'))
<style>
/* .error-body {
    padding-top: 5%;
} */
.text-center {
    text-align: center !important;
}
h1{
    font-family:'font-a-bold';
    font-weight: 900;
    font-size:150px;
    color: black;
}
</style>
