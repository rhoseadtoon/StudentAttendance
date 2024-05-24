@extends('pages.home')


@section('content')

<style>

    body{
        background-color: rgba(82, 211, 247, 0.963);
    }
    h2 {
        margin-left: 20px;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-weight: bold;
        position: center;
        margin-top: 38px;
    }
    .welcome-container {
        text-align: center;
        margin-top: 20px;
    }

    .welcome-container img {
        max-width: 53%;
        height: auto;
    }
    p {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: white;
    padding: 10px 20px; 
    border-radius: 10px; 
    display: inline-block; 
    margin-top: 300px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

</style>

<div class="welcome-container">
    <p>WELCOME</p>
</div>

<div class="container mt-5">
    @yield('content')
</div>


@endsection