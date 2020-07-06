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
            /* height: 57px; */
        }
        .menu-bar ul{
            display: inline-flex;
            
        }
        .menu-bar ul li{
            /* border-left: 1px solid #fff; */
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
            padding: 10px 20px;
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
            width: 150px;
            margin-left: 20px;
            font-size: 14px;
            z-index: 2;
            background-color: #bf9000;
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
            margin-top: 10px;
            cursor: pointer;
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
        <div class="top-nav-bar text-center m-0">
            <div class="menu-bar">
                <ul class="m-0">
                    <li class="active"><a href="#">Aloysius's Board!</a></li>
                    <li class="item-active"><a href="#">Visit an Event!</a></li>
                    <li class="item-active"><a href="#">Visit an Event!</a></li>
                    <li class="item-active"><a href="#">Exhibit in an Event!</a></li>
                    <li class="item-active"><a href="#"></i>Organise an Event!</a></li>
                    <li class="item-active"><a href="#">Megoshopping!</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="card text-center">
            <section class="herder">
                <div class="side-menu" id="side-menu">
                    <ul>
                        <li class="active">Info</li>
                        <li class="item-active">Products</li>
                        <li class="item-active">Activities</li>
                        <li class="item-active">Account Info</li>
                        <li class="item-active">History</li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
@endsection