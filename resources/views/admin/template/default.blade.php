<?php 
  use App\Http\Controllers\Controller;
  use Illuminate\Support\Facades\Route;
  use Illuminate\Foundation\Auth\User;
  use Illuminate\Support\Str;
  $routed = explode('.', Route::currentRouteName())[0];
  $section = "";
  if (isset(explode('.', Route::currentRouteName())[1])){
    $section = explode('.', Route::currentRouteName())[1];
  };
//   $component = Controller::getComponent($routed);
//   $user = User::where('id', '=', session('LoggedUser'))->first();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}"  type="text/css"/>
    <link rel="stylesheet" href="{{ asset('/public/css/uikit.css') }}"  type="text/css"/>
    <!-- <link rel="stylesheet" href="{{ asset('public/css/uikit-theme.css') }}"  type="text/css"/> -->
    <link rel="stylesheet" href="{{ asset('/public/css/com_users.css') }}"  type="text/css"/>


    <title><?php // echo $component->title; ?></title>

    <style>
body {
  margin: 0px;
  padding: 0px;
  background: black;
}
:root {
  --menu-button-radius: 3px;
  --menu-button-padding: 6px;
  --menu-extra-padding: 12px;
  font-family: system-ui;
  --topnav-font-size: 18px;
  --menu-second-fontsize: 16px;
  --menu-hovered-boop-radius: 1px;
  --master-paddings: 15px;
  --section-shadow: 0px 1px 11px rgb(0 0 0 / 34%);
  --submenu-shadow: 0px 8px 20px -10px grey;
  
  --sidebar-full-width: 250px;
  --sidebar-small-width: 60px;

  --section-border-radius: 9px;
  --button-radius: 6px;
}
.light-theme {
  --main-bg-color: white;
  --border-color: #ddd;
  --boopin-head-hover-color: #e7e7e7;
  --boopin-hover-color: white;
  --active-boopin-color: #83fd88;
  --active-boopin-hover-color: #00f50a;
  --std-text-color: black;
  --std-sheet-color: white;

  --theme-main-color: green;
  --header-link-color: #444;
  --sider-bg-color: #f4f4f4;

  --btn-default-color: white;
  --btn-create-color: green;

  --badge-color: #2196f3;
}

.dark-theme {
  --main-bg-color: linear-gradient(90deg, #24171b 0%, #1a1d30 100%);
  --boopin-head-hover-color: ##0e4774;
  --boopin-hover-color: #196fb3;
  --active-boopin-color: #83fd88;
  --active-boopin-hover-color: #00f50a;
  --std-text-color: white;
  --std-sheet-color: #333333;
}
#body {
  background-color: var(--main-bg-color);
}
#head {
  box-shadow: var(--section-shadow);
}
#head a {
  color: var(--header-link-color);
  text-decoration: none;
}
.head-body {
  display: flex;
  justify-content: space-between;

}
.head-nav-group {
  display: flex;
  justify-content: space-between;
}
.last-headnav-group svg {
  padding:  var(--menu-button-padding);
  margin: 0 12px;
  opacity: 0.7;
}
.head-nav-item {
  /* border: 1px solid var(--border-color);
  border-radius: var(--menu-button-radius); */
  padding: var(--menu-button-padding);
  cursor: pointer;
  font-size: var(--topnav-font-size);
  padding-top: var(--menu-extra-padding);
}
.head-nav-item > a {
  padding: 0 12px;
}
.head-nav-item > a:hover * {
  color: var(--theme-main-color) !important;
  border-bottom: 1px solid;
}
.head-nav-item.active > a * {
  color: var(--theme-main-color);
  border-bottom: 2px solid;
  font-weight: 700;
}

.head-nav-item svg {
  width: 32px;
}
.last-headnav-group .head-nav-item{
    padding-left: 0px;
    padding-right: 0px;
}

.head-nav-logo {
  padding: var(--menu-extra-padding) var(--menu-button-padding);
  font-weight: 900;
  font-style: italic;
  width: var(--sidebar-full-width);
  font-size: 1.2rem;
}
.head-nav-logo * {
  color: #c01f51 !important;
  text-shadow: 1px 1px 1px #4d4d4d;

}
.head-message {
  background: linear-gradient(90deg, #c01f51 0%, #1f36cc 100%);
  color: white;
  display: flex;
}
#main {
  display: grid;
  grid-template-columns: var(--sidebar-full-width) auto;
}
#sidebar {
  background: var(--sider-bg-color);
  overflow: auto;
}
#sidebar .sidebar-section {
  border-right: 1px solid var(--border-color);
  background: white;
}

.head-nav-submenu {
  display: none;
  position: absolute;
}
.last-headnav-group .head-nav-submenu {
  right: 0px;
}
.head-nav-item:hover > .head-nav-submenu {
  display: block;
  background: var(--main-bg-color);
  padding: 22px var(--menu-extra-padding);

  box-shadow: var(--submenu-shadow);
}
.head-nav-submenu > div {
  padding: var(--menu-button-padding);
  font-size: var(--menu-second-fontsize);
}
.head-nav-submenu > div:hover a {
  color: var(--theme-main-color) !important;
  border-bottom: solid 1px;
}
.hed-nav-submenu-item a {
  display: flex;
  justify-content: space-between;
}
.hed-nav-submenu-item a > span:first-child {
  padding-right: 12px;
}

#maincontent {
  padding: var(--master-paddings);
}
.section {
  margin-top: 12px;
  border: 1px solid var(--border-color);
  border-radius: var(--section-border-radius);
}
.section > *:first-child {
  overflow: hidden;
  border-top-left-radius: var(--section-border-radius);
  border-top-right-radius: var(--section-border-radius);

}


.section-data-control {
  min-height: 40px;
  background: var(--main-bg-color);
  padding: var(--master-paddings);
  display: grid;
  grid-template-columns: auto auto auto;
  grid-gap: var(--master-paddings);
  border-bottom: 1px solid var(--border-color);

}
.section-control-group {
  display: flex;
  justify-content: flex-start;
}
.section-control-group:last-child {
  justify-content: flex-end;
}
.section-control-group:nth-child(2) {
  justify-content: space-around;
}
.section-control-group > * {
  margin-right:  var(--master-paddings);
}
.section-control-group > *:last-child {
  margin-right: 0px;
}

.control {
  border-radius: var(--button-radius);
  display: flex;
  font-size: var(--menu-second-fontsize);
  overflow: hidden;
}
.control > * {
  border: none;
  font-size: var(--menu-second-fontsize);
}
.control > * {
  border-left: 1px solid var(--border-color);
}
.control > *:first-child {
  border: none;
}
.control > button, .control > select {
  cursor: pointer;
  background: none;
}
.control-group {
  display: flex;
  align-items: flex-end;
    justify-content: space-between;
}
.control-group .control {
  border-radius: 0px;
}
.control .control-text {
  font-size: large;
  padding: 6px;
  border-right: 1px solid var(--border-color);
}

.control-group input, .control-group .button, .control-group select,
 .section-control-group .button, .section-control-group input, .section-control-group select {
  min-width: 50px;
  padding: var(--menu-button-padding);
  border: 1px solid transparent;
}
.btn-default {
  border: 1px solid var(--border-color);
}
.btn-default:hover {
  background: white;
  box-shadow: 1px 3px 8px #00000021;
}

.btn-default:hover .button, .btn-default .button {
  background: white;
}
.btn-default:hover .button:hover {
  background: #f6f6f6;
}

.btn-default:hover .button:active {
  background: #f1f1f1;
  box-shadow: inset 1px 1px 12px #e5e5e5;
}


.btn-create {
  border: 1px solid var(--border-color);
  background: var(--btn-create-color);
  color: white;
}
.btn-create * {
  color: white;
}

.badge {
  background: #90caf9;
  border-radius: var(--menu-button-radius);
  color: white;
  font-size: 0.8rem;
  padding: 0px 3px;
  line-height: 1.4rem;
}

.master-table {
  width: 100%;
  border-spacing: 0px;
}
.master-table td {
  border: 0px;
  border-bottom: 1px solid var(--border-color);
  padding: var(--master-paddings);
}
.master-table tr {
  transition: all 0.3s;
}

.master-table:hover tr {
  background-color: #f5f5f5;
  z-index: 1;

}
.tabletotal {
  padding: var(--master-paddings);
}
.uk-table-divider tr:last-child {
  border-bottom: 1px solid var(--border-color);
}

.master-table:hover tr:hover {
  background-color: white;
  box-shadow: 0px 0px 22px white;
  z-index: 9;
}

.sidebar-section {
  border-bottom: 1px solid var(--border-color);
}
.uk-nav-default {
  padding: var(--menu-extra-padding);
}
.uk-nav-default li {
  transition: all 0.5s;

}

.no-border {
  border-radius: 0px;
  border: none;
}

button {
  line-height: 1.5rem;
}

@media only screen and (max-width: 1440px){

}
@media only screen and (max-width: 900px){

}
@media only screen and (max-width: 1440px){
  #main {
  display: grid;
  grid-template-columns: var(--sidebar-small-width) auto;
  }
  .head-nav-logo {
    width:  var(--sidebar-small-width);
  }
  .hide-in-small {
    display: none;
  }
}
@media only screen and (max-width: 900px){
}

@media only screen and (min-width: 1439px){
  
}


    </style>

</head>

<body >
<div id='body' class='light-theme'  >
  <div id='head'>
    <div class='head-message'>
      <p>Party alarma!</p>
    </div>
    <div class='head-body'>
      <div class='head-nav-group'>
        <div class='head-nav-logo'>
          <a><span class='hide-in-small'>Cyber</span>Tel</a>
        </div>
        <div class="head-nav-item  {{ Str::contains(Request::route()->getName(), 'admin.stuff') ? 'active' : '' }}">
          <a href='{{ route("admin.stuff")}}'>
            <span>Оборудование</span>
          </a>
          <div class='head-nav-submenu'>
            <div class='hed-nav-submenu-item'>
              <a href="{{route('admin.stuff.speakers')}}"><span>Громкоговорители</span><span class='badge'>120<span></a>
            </div>
            <div class='hed-nav-submenu-item'>
            <a href="#"><span>Профессиональное оборудование</span><span class='badge'>120<span></a>
            </div>
            <div class='hed-nav-submenu-item'>
            <a href="{{route('admin.stuff.productors')}}"><span>Производители</span></a>
            </div>
          </div>
        </div>
        <div class="head-nav-item {{ Str::contains(Request::route()->getName(), 'admin.info') ? 'active' : '' }}">
        <a href='{{ route("admin.info")}}'>
            <span>Инфоцентр</span>
          </a>
        </div>
        <div class="head-nav-item {{ Str::contains(Request::route()->getName(), 'admin.users') ? 'active' : '' }}">
        <a href='{{ route("admin.users")}}'>
            <span>Пользователи</span>
          </a>
        </div>
        <div class="head-nav-item {{ Str::contains(Request::route()->getName(), 'admin.admins') ? 'active' : '' }}">
        <a href='{{ route("admin.admins")}}'>
            <span>Админы</span>
          </a>
        </div>
      </div>

      <div class='head-nav-group last-headnav-group'>
        <div class='head-nav-item'>
          <span>
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 490.2 490.2" style="enable-background:new 0 0 490.2 490.2;" xml:space="preserve">
<g>
	<g>
		<g>
			<path d="M469.1,173.1h-37.5c-1-3.1-3.1-6.3-4.2-9.4l26.1-26.1c8.3-8.3,8.3-20.9,0-29.2l-71.9-71.9c-8.3-8.3-20.9-8.3-29.2,0
				l-26.1,26.1c-3.1-2.1-6.3-3.1-9.4-4.2V20.9C316.9,9.4,307.5,0,296,0H193.9C182.4,0,173,9.4,173,20.9v37.5c-3.1,1-6.3,3.1-9.4,4.2
				l-26.1-26.1c-8.3-8.3-20.9-8.3-29.2,0l-71.9,71.9c-4.2,4.2-6.3,9.4-6.3,14.6s2.1,10.4,6.3,14.6l26.1,26.1
				c-2.1,3.1-3.1,6.3-4.2,9.4H20.9C9.4,173.1,0,182.5,0,194v102.2c0,11.5,9.4,20.9,20.9,20.9h37.5c1,3.1,3.1,6.3,4.2,9.4l-26.1,26.1
				c-4.2,4.2-6.3,9.4-6.3,14.6s2.1,10.4,6.3,14.6l71.9,71.9c8.3,8.3,20.9,8.3,29.2,0l26.1-26.1c3.1,2.1,6.3,3.1,9.4,4.2v37.5
				c0,11.5,9.4,20.9,20.9,20.9h102.2c11.5,0,20.9-9.4,20.9-20.9v-37.5c3.1-1,6.3-3.1,9.4-4.2l26.1,26.1c8.3,8.3,20.9,8.3,29.2,0
				l71.9-71.9c8.3-8.3,8.3-20.9,0-29.2l-26.1-26.1c2.1-3.1,3.1-6.3,4.2-9.4h37.5c11.5,0,20.9-9.4,20.9-20.9V193.9
				C490,182.4,480.6,173.1,469.1,173.1z M448.3,275.2H417c-9.4,0-16.7,6.3-19.8,14.6c-3.1,10.4-7.3,20.9-12.5,30.2
				c-5.2,8.3-3.1,18.8,3.1,25l21.9,21.9L367,409.7l-21.9-21.9c-7.3-6.3-16.7-7.3-25-3.1c-9.4,5.2-19.8,9.4-30.2,12.5
				c-8.3,2.1-14.6,10.4-14.6,19.8v31.3h-60.5l0,0V417c0-9.4-6.3-16.7-14.6-19.8c-10.4-3.1-20.9-7.3-30.2-12.5
				c-8.3-5.2-18.8-3.1-25,3.1l-22,21.9L80.3,367l21.9-21.9c6.3-7.3,7.3-16.7,3.1-25c-5.2-9.4-9.4-19.8-12.5-30.2
				c-2.1-8.3-10.4-14.6-19.8-14.6H41.7v-60.5H73c9.4,0,16.7-6.3,19.8-14.6c3.1-10.4,7.3-20.9,12.5-30.2c5.2-8.3,3.1-18.8-3.1-25
				l-21.9-22L123,80.3l21.9,21.9c7.3,6.3,16.7,7.3,25,3.1c9.4-5.2,19.8-9.4,30.2-12.5c8.3-2.1,14.6-10.4,14.6-19.8V41.7h60.5V73
				c0,9.4,6.3,16.7,14.6,19.8c10.4,3.1,20.9,7.3,30.2,12.5c8.3,5.2,18.8,3.1,25-3.1l22-21.9l42.7,42.7l-21.9,21.9
				c-6.3,7.3-7.3,16.7-3.1,25c5.2,9.4,9.4,19.8,12.5,30.2c2.1,8.3,10.4,14.6,19.8,14.6h31.3L448.3,275.2L448.3,275.2z"/>
			<path d="M245,131.4c-62.6,0-113.6,51.1-113.6,113.6s51,113.6,113.6,113.6s113.6-51,113.6-113.6S307.6,131.4,245,131.4z
				 M245,316.9c-39.6,0-71.9-32.3-71.9-71.9s32.3-71.9,71.9-71.9s71.9,32.3,71.9,71.9S284.6,316.9,245,316.9z"/>
		</g>
	</g>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
          </span>
          <div class='head-nav-submenu'>
            <div class='hed-nav-submenu-item'>
              <a href="{{route('admin.apps')}}">
              <span>Пользовательские приложения</span>
              </a>
            </div>


          </div>
        </div>


        <div class='head-nav-item'>
        <span>
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 452.739 452.739" style="enable-background:new 0 0 452.739 452.739;" xml:space="preserve">
<path d="M403.109,16.447H49.63C22.211,16.447,0,38.671,0,66.077v224.921c0,27.406,22.211,49.63,49.63,49.63h19.225l-39.253,78.738
	c-2.809,4.41-2.14,10.158,1.586,13.783c2.125,2.095,4.905,3.143,7.699,3.143c2.097,0,4.25-0.611,6.128-1.863l163.531-93.801h194.563
	c27.42,0,49.63-22.224,49.63-49.63V66.077C452.739,38.671,430.528,16.447,403.109,16.447z M124.311,210.947
	c-18.225,0-33-14.775-33-33s14.775-33,33-33c18.226,0,33,14.775,33,33S142.536,210.947,124.311,210.947z M226.37,210.947
	c-18.226,0-33-14.775-33-33s14.774-33,33-33c18.225,0,33,14.775,33,33S244.595,210.947,226.37,210.947z M328.428,210.947
	c-18.225,0-33-14.775-33-33s14.775-33,33-33c18.225,0,33,14.775,33,33S346.654,210.947,328.428,210.947z"/>
<g>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>
          </span>
        </div>

        <div class='head-nav-item'>
        <span>
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 488 488" style="enable-background:new 0 0 488 488;" xml:space="preserve">
<g>
	<g>
		<g>
			<path d="M414.549,317c-46.8-38.5-97.3-64-107.6-69c-1.2-0.6-1.9-1.7-1.9-3v-73c9.2-6.1,15.2-16.5,15.2-28.4V68.1
				c0-37.6-30.5-68.1-68.1-68.1h-8.1h-8.1c-37.6,0-68.1,30.5-68.1,68.1v75.6c0,11.8,6.1,22.3,15.2,28.4V245c0,1.3-0.7,2.5-1.9,3
				c-10.3,5-60.8,30.5-107.6,69c-8.5,7-13.3,17.4-13.3,28.3v51.8h69.4v-5.8c0-15.1,10.7-27.7,24.9-30.6c0.1-0.3,0.3-0.6,0.4-0.9
				c-3.4-5.1-5.2-11-5.2-17.2c0-8.3,3.2-16.2,9.1-22.1l8.4-8.4c5.9-5.9,13.7-9.2,22.1-9.2c6.3,0,12.3,1.8,17.4,5.3
				c0.2-0.1,0.5-0.2,0.7-0.3c2.8-14.3,15.5-25.2,30.6-25.2h11.9l0,0l0,0c15.2,0,27.9,10.9,30.6,25.3c0.2,0.1,0.4,0.1,0.5,0.2
				c5.1-3.5,11.2-5.4,17.5-5.4c8.3,0,16.2,3.2,22,9.1l8.4,8.4c10.8,10.7,12,27.4,3.8,39.6c0.1,0.2,0.2,0.4,0.2,0.5
				c14.4,2.7,25.3,15.4,25.4,30.6v6h69.4v-51.8C427.849,334.3,422.949,323.9,414.549,317z"/>
		</g>
		<g>
			<path d="M327.249,383.4h-11.7c-1.8-9.6-5.6-18.9-11.4-27.3l8.3-8.3c3-3,3-7.9,0-10.9l-8.4-8.4c-3-3-7.9-3-10.9,0l-8.3,8.3
				c-8.4-5.7-17.7-9.5-27.3-11.3v-11.7c0-4.2-3.4-7.7-7.7-7.7h-11.9c-4.2,0-7.7,3.4-7.7,7.7v11.6c-9.7,1.8-19,5.6-27.4,11.3
				l-8.2-8.2c-3-3-7.9-3-10.9,0l-8.4,8.4c-3,3-3,7.9,0,10.9l8.1,8.1c-5.8,8.4-9.6,17.8-11.5,27.5h-11.4c-4.2,0-7.7,3.4-7.7,7.7V403
				c0,4.2,3.4,7.7,7.7,7.7h11.3c1.8,9.7,5.6,19.2,11.4,27.6l-7.9,8c-3,3-3,7.9,0,10.9l8.4,8.4c3,3,7.9,3,10.9,0l7.9-8
				c8.5,5.8,17.9,9.6,27.7,11.4v11.3c0,4.2,3.4,7.7,7.7,7.7h11.9c4.2,0,7.7-3.4,7.7-7.7v-11.4c9.7-1.9,19.1-5.7,27.5-11.5l8.1,8.1
				c3,3,7.9,3,10.9,0l8.4-8.4c3-3,3-7.9,0-10.9l-8.2-8.2c5.7-8.4,9.5-17.8,11.2-27.5h11.6c4.2,0,7.7-3.4,7.7-7.7v-11.9
				C334.949,386.8,331.449,383.4,327.249,383.4z M272.049,425.1c-15.4,15.5-40.5,15.5-56,0.1s-15.5-40.5-0.1-56s40.5-15.5,56-0.1
				S287.549,409.6,272.049,425.1z"/>
		</g>
	</g>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
          </span>
          
          <div class='head-nav-submenu'>
            <div class='hed-nav-submenu-item'>
              <a href="">
              <span>Перейти на публичный сайт</span>
              </a>
            </div>

            <div class='hed-nav-submenu-item'>
              <a href="">
                <span>Учётная запись</span>
              </a>
            </div>
            <div class='hed-nav-submenu-item'>
              <a href="">
                <span>Выход</span>
              </a>
            </div>
          </div>
          
        </div>
      </div>

  </div><!--  end head div -->
</div><!--  end head div -->

  <div id='main'>

    <div id='sidebar'>
      @yield('component-sidebar')
    </div><!--  end sider div -->

    <div id='maincontent'>
      <h3 class='section-breadcrumbs'>
        @yield('page-breadcrumbs')
      </h3>
      <!-- <div class='section'>
        <p>Some shit text</p>
      </div> end section div -->

      <div class='section no-border'>
        @yield('page-cards')
      </div><!--  end section div -->

      <div class='section'>
      @yield('page-content')
      </div><!--  end section div -->

      <div class='section'>
        <p>Some shit text</p>
      </div><!--  end section div -->
      

    </div><!--  end maincontent div -->


</div><!--  end main div -->



  <script>
    class BodyHandler {
  
  
  constructor(){
    this.isMenuOpened = false;
    let leftMenuTrigger = document.querySelectorAll('.left-side-menu-trigger');
    let gridStruct = document.querySelectorAll('.grid-structure');
      
    for (let i = 0; i < leftMenuTrigger.length; i++ ){
       leftMenuTrigger[i].addEventListener('click', function(){
         

            
            if (document.querySelectorAll('body')[0].classList.contains('grid-opened')){        
              document.querySelectorAll('body')[0].classList.remove('grid-opened');
              this.isMenuOpened = false;
               } else {
                 document.querySelectorAll('body')[0].classList.add('grid-opened');
                  this.isMenuOpened = true;
                }
              
       })
       
     }
  }
} // endclass

let Body = new BodyHandler();
  </script>
  
    @include('admin.template.scripts')

    @yield('admin.page-scripts')
</body>