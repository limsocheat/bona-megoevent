@extends('layouts.app')

@section('title', 'Manage')

@section('content')
<style type="text/css">
    .top-nav-bar {
        /* height:57px; */
        top:0;
        position: sticky;
        /* background:#6b6a6a; */
        margin-bottom: 20px;
        /* border: 1px solid #0000; */
        z-index: 2;
    
    }
   .menu-bar{
            width:100%;
        }
        .menu-bar ul{
            display: inline-flex;
            
        }
        .menu-bar ul li{
            list-style-type: none;
            padding: 15px 35px;
            text-align: center;
            padding:5px;
            margin:0.5px;
            border:2px solid #817f7f;
            background-color: #bf9000;
            cursor: pointer;
        }
        .menu-bar ul li a{
            font-size: 16px;
            font-weight: bold;
            padding: 10px 23.7px;
            color:rgb(12, 11, 11);
            text-decoration: none;
        }
        .menu-bar .active{
            background-color:white;
        }
        .fa-shopping-basket{
            margin-right: 5px;
        }
        /* side menu */
        .side-menu{
            width: 200px;
            height: auto;
            margin-left: 20px;
            font-size: 14px;
            z-index: 2;
            
        }
        .side-menu .active{
            background-color:white;
        }
        .side-menu ul{
           margin:0px;
        }
        .side-menu ul li{
            list-style-type: none;
            font-weight: bold;
            /* margin-top: 10px; */
            border-bottom:1px solid rgb(211, 211, 211);
            cursor: pointer;
            background-color: #bf9000;
            text-align: left;
            padding: 10px 18px;
        }
        .side-menu ul li a{
            text-decoration: none;
            padding:15px 0px;
        }
        .side-menu ul li:hover{
            color:orange;
        }
        .side-menu ul li ul{
            display: none;
            z-index: 10;
            top: 77px;
        }
        .side-menu ul li:hover ul{
            color: blue;
            display: block;
            height: 400px;
            width:100px;
            margin-left: 10.3%;
            padding-left: 0 100px 10px 10px;
            position: fixed;
            background:#ecececec;
            box-shadow: 1px 1px 4px 1px rgba(0, 0, 0, 0, 5);
        }
</style>
    <div class="container py-4">
        <h1>Manage</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="top-nav-bar text-center m-0">
                    <div class="menu-bar">
                        <ul class="m-0 p-0">
                            <li class="active">
                                <a href="#">Aloysius's Board!</a>
                            </li>
                            <li class="item-active">
                                <a href="#">Visit an Event!</a>
                            </li>
                            <li class="item-active">
                                <a href="#">Visit an Event!</a>
                            </li>
                            <li class="item-active">
                                <a href="#">Exhibit in an Event!</a>
                            </li>
                            <li class="item-active">
                                <a href="#"></i>Organise an Event!</a>
                            </li>
                            <li class="item-active">
                                <a href="#">Megoshopping!</a>
                            </li>
                
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card text-center mr-5 ml-5">
                <div class="row">
                    <div class="col-md-3">
                        <section class="herder my-4">
                            <div class="side-menu mb-4 border" id="side-menu">
                                <ul class="pl-0 m-0">
                                    <li class="active">
                                        <a href="#">Info</a>
                                    </li>
                                    <li class="item-active">
                                        <a href="#">Products</a>
                                    </li>
                                    <li class="item-active">
                                        <a href="#">Activities</a>
                        
                                    </li>
                                    <li class="item-active">
                                        <a href="#">Account Info</a>
                                    </li>
                                    <li class="item-active">
                                        <a href="#">History</a>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-9">
                        {{-- <div class="row my-2 mt-5" style="border-left: solid 2px;">
                            <div class="col-md-12">
                                <h1 class="text-left pl-0 mb-3 font-weight-bold" id="h1">Upcoming Events</h1>
                            </div>
                            @foreach ($feature_events as $event)
                            <div class="col-md-3 mb-4">
                                @include('front.components.event.card')
                            </div>
                            @endforeach
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection