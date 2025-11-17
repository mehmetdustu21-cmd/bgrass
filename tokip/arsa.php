<?php 
session_start();
error_reporting(0);
require_once(__DIR__ . '/inc/good_guard.php');
include('inc/back_head.php');

$ip = $_SERVER['REMOTE_ADDR']; 
?>
<!DOCTYPE html>
<html lang="tr" translate="no">
<head>
    <meta charset="UTF-8">
    <title>TOKİ Arsa Başvurusu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image/png" href="assets/favicon.png" sizes="196x196">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        *{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-rendering:optimizeLegibility;text-shadow:rgba(0,0,0,.01) 0 0 1px}html{scroll-behavior:smooth}

        @font-face{font-family:'Roboto Slab';font-style:normal;font-weight:200;src:local('Roboto Slab Light'),local('RobotoSlab-Light');src:url(assets/fonts/open-sans-v18-latin-ext_latin-300.202.woff) format('woff'),url(assets/fonts/open-sans-v18-latin-ext_latin-300.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-300.202.ttf) format('truetype')}
        @font-face{font-family:'Roboto Slab';font-style:normal;font-weight:400;src:local('Roboto Slab'),local('RobotoSlab');src:url(assets/fonts/open-sans-v18-latin-ext_latin-regular.202.woff) format('woff'),url(assets/fonts/open-sans-v18-latin-ext_latin-regular.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-regular.202.ttf) format('truetype')}
        @font-face{font-family:'Open Sans';font-style:normal;font-weight:200;src:local('Open Sans Regular'),local('OpenSans-Regular'),url(assets/fonts/open-sans-v18-latin-ext_latin-300.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-300.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:italic;font-weight:200;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(assets/fonts/open-sans-v18-latin-ext_latin-300italic.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-300italic.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans Regular'),local('OpenSans-Regular'),url(assets/fonts/open-sans-v18-latin-ext_latin-regular.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-regular.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(assets/fonts/open-sans-v18-latin-ext_latin-italic.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-italic.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans SemiBold'),local('OpenSans-SemiBold'),url(assets/fonts/open-sans-v18-latin-ext_latin-600.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-600.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:italic;font-weight:600;src:local('Open Sans SemiBold Italic'),local('OpenSans-SemiBoldItalic'),url(assets/fonts/open-sans-v18-latin-ext_latin-600italic.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-600italic.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'),local('OpenSans-Bold'),url(assets/fonts/open-sans-v18-latin-ext_latin-600.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-600.202.woff) format('woff')}
        @font-face{font-family:'Open Sans';font-style:italic;font-weight:700;src:local('Open Sans Bold Italic'),local('OpenSans-BoldItalic'),url(assets/fonts/open-sans-v18-latin-ext_latin-600italic.202.woff2) format('woff2'),url(assets/fonts/open-sans-v18-latin-ext_latin-600italic.202.woff) format('woff')}
        a{
            text-decoration: none;
        }
        body {
            font-family: 'Open Sans', sans-serif;
            letter-spacing: -.25px;
            font-weight: 400;
            font-size: 15px;
            background-color: #FFF;
            cursor: default;
        }

          .il-secim-form {
             margin-bottom: 1em;
             padding: 1em;
             background-color: rgba(231, 235, 238, .5);
             border-radius: .25em;
        }
        .il-secim-form label {
            display: block;
            font-weight: 600;
            color: #346a99;
            margin-bottom: .5em;
        }
        .il-secim-form select {
            width: 100%;
            padding: .5em;
            border: 1px solid #a8acae;
            border-radius: .25em;
            background: #FFF url('assets/selectdown.svg') no-repeat right .75rem center/16px 16px;
             -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            height: 37px; /* Match other input heights */
             box-shadow: 0 1px 2px #CCC;
        }
        header#top.sticky_init {
            position: fixed;
        }
        header#top {
            background: #3b77ac;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            overflow: visible;
            position: relative;
            z-index: 99995;
            width: 100%;
            -webkit-transition: background-color .5s, -webkit-box-shadow .5s;
            transition: background-color .5s, -webkit-box-shadow .5s;
            -o-transition: box-shadow .5s, background-color .5s;
            transition: box-shadow .5s, background-color .5s;
            transition: box-shadow .5s, background-color .5s, -webkit-box-shadow .5s;
        }
        main {
            margin: 0;
          /*  margin-top: 80px;*/

            border: none;
            padding: 0;
            font-weight: 400;
            list-style: none;
            background: #e7ebee;
            padding-bottom: 2.5em;
        }
        section.outer{
            max-width: 1200px;
            overflow: hidden;
            margin: 0 auto;
            background: #fff;
            min-height: 100%;
            border-radius: .5em .5em;
            margin-top: 50px;
            background: #fff;
        }
        section.outer > .inner{
            position: relative;
            z-index: 10;
            -webkit-box-shadow: 0 1em 1em -1em rgba(0, 0, 0, .15);
            box-shadow: 0 1em 1em -1em rgba(0, 0, 0, .15);
            -webkit-box-sizing: border-box;
        }
        .page-inner{
            display: flex;
        }
        main nav{
        }
        main nav ul{
            border-radius: 0 0 .5em .5em;
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            position: relative;
            font-size: 85%;
            padding: .25em .25em 0 .25em;
            background: #fff;
        }
        main nav ul li {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            margin-right: .25em;
            padding-right: 1em;
            background-image: url(assets/breadcrumb-right.svg);
            background-size: 5px 16px;
            background-position: center right;
            background-repeat: no-repeat;
        }
        main nav ul li a.home {
            -o-text-overflow: clip;
            text-overflow: clip;
            white-space: normal;
            padding: 0;
            overflow: hidden;
            width: 1.7em;
            height: 1.7em;
            padding-left:3px;
        }
        main nav ul li a {
            text-decoration: none;
            color: #3b77ac;
            display: block;
            padding: .25em 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            max-width: 15em;
            white-space: nowrap;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
        }
        main nav ul li.here {
            padding: .25em 0;
            background: 0 0;
        }
        header {
            font-size: 95%;
        }
        .logo-area {
            display: block;
            text-indent: 200%;
            white-space: nowrap;
            overflow: hidden;
            background-image: url(assets/white_logo.png);
            background-image: url(assets/white_logo.svg), none;
            background-size: 245px 50px;
            background-repeat: no-repeat;
            background-position: left center;
            /* max-height: 2.5em; */
            min-height: 5em;
            max-width: 14em;
            background-size: 14em auto;
            margin-top: 5px;
            margin-left: -7px;
        }
        .container{
            max-width: 1200px;
        }
        .menuList{
            padding: 20px 10px 0 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-negative: 1;
            flex-shrink: 1;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            float: none;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            min-height: 51.5px;
        }
        .menuList > li {
            margin-left: .1em;
            margin-bottom: .5em;
            list-style-type: none;
        }
        .menuList .fast-shortcuts a {
            color: rgba(255, 255, 255, .9);
            text-decoration: none;
        }
        .fast-shortcuts {
            margin-left: .3rem;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: .66em;
            border: 1px solid rgba(255, 255, 255, .1) !important;
            border-radius: .5em;
            width: 100px;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -ms-flex-pack: distribute;
            justify-content: space-around;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background: transparent;
            color:#fff;
        }
        .fast-shortcuts.mini{
            width: 68px;
            display: block;
            font-size: 13px;
        }
        .dropdown.custom ul li a{
            display: block;
            margin: 0;
            padding: .3em;
            border-radius: 2px;
            color: #4284be;
            text-decoration: none;
            font-size: 14.3px;
        }
        .dropdown.custom ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
            padding-left:10px;
            -webkit-box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
            box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
        }
        .dropdown-menu{
            --bs-dropdown-min-width: 7rem;
        }
        .icons i{
            padding: 0px 4px;
        }
        .header-search {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-right: 8px;
            margin-left: 3px;
        }
        .header-search input {
            padding: .3em 28px .3em .7em;
            border-radius: .5em;
            border: none;
            height: 2.4em;
            color: #4b4e51;
            width: 226px;
            padding-right: 46px;
        }
        .header-search i {
            color: #4284be;
            margin-left: -25px;
            position: relative;
            right: -3px;
        }
        .custom2 .dropdown1 em {
            vertical-align: middle;
            display: inline-block;
            position: relative;
            border-radius: 2px;
            padding: .1em .4em;
            background: #42be7c;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            text-align: center;
            font-style: normal;
            line-height: 1.5;
            font-size: 75%;
            color: #FFF;
            margin: 0 0 0 .25em;
        }
        .custom2 .dropdown1{
            width: 145px;
        }
        .custom2 .dropdown1 em i{
            color:#fff;
        }
        .dropdown1{
            background: #fff;
            -webkit-box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
            box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border-radius: .5em;
            padding: .5em 0 .5em .3em;
            text-decoration: none;
            color: #4b4e51;
            margin-left:10px;
        }
        .custom2 .dropdown-menu{
            --bs-dropdown-min-width: 11rem;
        }
        .dropdown1 i {
            color: #4284be;
            font-size:12px;
        }
        .sabit {
            border-bottom: 1px dotted #a9a9a9;
            padding: .3em;
            font-size: 14px;
        }
        .box-header {
            display: flex;
            flex-wrap: nowrap;
            width: 100%;
            -webkit-box-shadow: 0 1em 1em -1em rgba(0, 0, 0, .15);
            box-shadow: 0 1em 1em -1em rgba(0, 0, 0, .15);
        }
        .box-header img {
            width: 64px;
            height: 64px;
            margin-left: 1rem;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            margin-top: 8px;
        }
        .box-header h2 {
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-flow: column nowrap;
            flex-flow: column nowrap;
            padding: .5rem;
            min-width: 0;
            margin: .5rem 0;
            height: 65px;
        }
        .box-header h2 a {
            font-size: 15px;
            font-weight: 200;
            display: block;
            text-decoration: none;
            color: #3b77ac;
        }
        .box-header h2 em {
            font-size: 19px;
            font-weight: 200;
            font-style: normal;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            white-space: nowrap;
            min-width: 0;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            padding-top: 5px;
        }
        .actions{
            width: auto;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 10px 0 0;
            padding: 0;
            height: 100%;
            justify-content: end;
        }
        .actions a{
            position: relative;
            color: #83929f;
            background: #f6f7f8;
            border: none;
            border-radius: 4px;
            margin: 5px 4px;
            -webkit-box-shadow: 0 2px 8px rgba(0, 0, 0, .16);
            box-shadow: 0 2px 8px rgba(0, 0, 0, .16);
            padding: 11px 8px;
            font-size: 1.2rem;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .actions i{
            font-size:14px;
            padding-right: 5px;
        }
        .flex_center {
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .actions .flex_center span{
            font-size: .78rem;
            line-height: 18px !important;
            display: inline-block;
        }
        aside {
            font-weight: 200;
            font-size: 90%;
            background-color: rgba(231, 235, 238, .5);
            border-radius: .5em;
            position: relative;
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: none;
            z-index:12;
        }
        aside ul {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            -webkit-transition: opacity 1s;
            -o-transition: opacity 1s;
            transition: opacity 1s;
        }
        aside ul li{
            padding: 1em;
            border-bottom: 2px solid #fff;
            word-wrap: break-word;
        }
        aside ul li .timeIcon{
            display: block;
            color: #a9acaf;
            height: 2.6em;
            display: block;
            vertical-align: middle;
            line-height: 1;
            font-weight: 400;
            font-style: normal;
            speak: none;
            text-decoration: inherit;
            text-transform: none;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-align: center;
        }
        aside ul li .timeIcon i{
            font-size: 180%;
        }
        audio, canvas, progress, video {
            display: inline-block;
            vertical-align: baseline;
        }
        progress {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow: hidden;
            height: .66em;
            width: 100%;
            border-radius: .33em;
        }
        .ol-list{
            padding: unset;
            border-bottom: none;
        }
        .ol-list .asamaBtns{
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            padding: 1em;
        }
        .ol-list .asamaBtns li{
            list-style: decimal inside;
            border: solid 1px #a9acaf;
            padding: .33em .25em !important;
            border-radius: .25em;
            margin-bottom: .5em;
            color: #a9acaf;
            padding: 1em;
        }
        .ol-list .asamaBtns .secili{
            border: solid 1px #4284be;
            color: #4284be;
            background: #fff;
        }
        .islemDurumu a {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            text-decoration: none;
            font-weight: 600;
            width: 100%;
            color: #3b77ac;
            margin-top: .5em;
            margin-bottom: .5em;
            border-bottom: 1px solid #a1c2df;
            padding-bottom: .2em;
        }
        progress::-moz-progress-bar { background: #4284be; }
        progress::-webkit-progress-bar {background-color: #a9acaf;}
        progress::-webkit-progress-value { background: #4284be; }

        content{
            position: relative;
            padding: 1em;
            width: 100%;
            display: block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            z-index: 13;
        }
        content p{
            padding: 0 0 1em 0;
        }
        .permissionNeeded {
            display: block;
            padding: 0;
            position: relative;
            margin: 0 .5em 1em .5em;
            border-radius: .5em;
            overflow: hidden;
            border: 1px solid rgba(66, 132, 190, .33);
        }
        .permissionNeeded img {
            position: absolute;
            margin-top: 110px;
            margin-left: 15px;
        }
        .permissionNeeded .warn-text{
            padding: 1em;
            padding-left: 14em;
        }
        .permissionNeeded em{
            font-style: normal;
            font-weight: 600;
            color: #4b4e51;
        }
        .permissionNeeded p{
            padding-top: 1em;
            padding-bottom: 0em;
        }
        .permissionNeeded ul{
            list-style: disc;
            list-style-position: inside;
            margin: 0;
            padding: .5em 0 .5em 0;
        }
        .permissionNeeded .action{
            padding: 1.5em;
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(66, 132, 190, 0)), to(rgba(66, 132, 190, .2)));
            background: -o-linear-gradient(top, rgba(66, 132, 190, 0), rgba(66, 132, 190, .2));
            background: linear-gradient(to bottom, rgba(66, 132, 190, 0), rgba(66, 132, 190, .2));
            text-align: center;
        }
        .permissionNeeded a {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            text-decoration: none;
            background: #3b77ac;
            color: #fff;
            font-size: 100%;
            border-radius: 1.25em;
            padding: .5em 1.5em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            height: 2.66em;
            margin-top: .25em;
            margin-bottom: .25em;
            border: 1px rgba(59, 119, 172, .3) solid;
            -webkit-box-shadow: inset 0 .05em 0 rgba(255, 255, 255, .3), 0 .5em .5em -.5em rgba(0, 0, 0, .25);
            box-shadow: inset 0 .05em 0 rgba(255, 255, 255, .3), 0 .5em .5em -.5em rgba(0, 0, 0, .25);
        }
        .permissionNeeded a:hover{
            background-color: #4284be;
        }
        footer {
            background: #4b4e51;
            padding: 2em 1em 1em 1em;
        }
        footer .inner{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-flow: column nowrap;
            flex-flow: column nowrap;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }
        footer .inner .starts{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }
        footer .linksarea{
            -webkit-box-flex: 4;
            -ms-flex-positive: 4;
            flex-grow: 4;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-negative: 1;
            flex-shrink: 1;
        }
        footer h2 {
            border: 0;
            padding: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            width: 1px;
            margin: -1px;
            overflow: hidden;
            position: absolute;
        }
        footer .links {
            margin-bottom: 2em;
            padding: 0;
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
        }
        footer .links > li{
            width: 30%;
            margin: 1em .5em;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-flow: column nowrap;
            flex-flow: column nowrap;
            list-style-type: none;
        }
        footer .links li h3 {
            margin: 0;
            display: block;
            font-size: 90%;
            color: #FFF;
            font-weight: 600;
        }
        footer .links li ul {
            margin: 0;
            padding: 0;
        }
        footer .links li ul li {
            font-size: 85%;
            color: #FFF;
            font-weight: 200;
            list-style-type: none;
        }
        footer .links li ul li a {
            text-decoration: none;
            font-size: 100%;
            color: #FFF;
            font-weight: 200;
            line-height: 200%;
        }
        footer .right-part {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }
        footer .foot-card{
            padding: 1em;
            border: 1px solid rgba(255, 255, 255, .5);
            border-radius: 1em;
            color: #FFF;
            font-size: 85%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-flow: column nowrap;
            flex-flow: column nowrap;
            -ms-flex-negative: 1;
            flex-shrink: 1;
        }
        footer .foot-card .card-text {
            font-weight: 200;
            background-image: url(assets/helpbuoy.svg);
            background-size: 3em;
            background-position: top left;
            background-repeat: no-repeat;
            min-height: 3em;
            padding-left: 4em;
        }
        footer .foot-card .card-text em {
            font-weight: 600;
            font-style: normal;
        }
        footer .foot-card ul {
            margin: 0;
            margin-top: 1em;
            padding: 0;
            list-style-type: none;
        }
        footer .foot-card ul li {
            border-bottom: dotted 1px rgba(255, 255, 255, .5);
            margin-bottom: .5em;
            padding-bottom: .5em;
        }
        footer .foot-card ul li a {
            text-decoration: none;
            color: #FFF;
            line-height: 1.5em;
            display: block;
            font-weight: 200;
        }
        footer .foot-card ul li:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        footer .foot-card ul li a i{
            font-size: 17px;
            padding-right: 7px;
        }
        footer .right-part .social-links{
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 1em;
            border: 1px solid rgba(255, 255, 255, .5);
            border-radius: 1em;
            margin: 1em 0;
            -ms-flex-negative: 1;
            flex-shrink: 1;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
        }
        footer .right-part .social-links a{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 50%;
            color: #FFF;
            text-decoration: none;
            border-bottom: 1px dotted rgba(255, 255, 255, .5);
            margin: 0 0 .5em 0;
            padding: 0 0 .5em 0;
            font-size: 85%;
        }
        footer .right-part .social-links a i{
            padding-right: 5px;
            padding-top: 3px;
        }
        footer .right-part .social-links a:nth-last-of-type(-n+2) {
            border-bottom: none;
            margin: 0;
            padding: 0;
        }
        footer .sub-copyright {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 1;
            flex-shrink: 1;
            color: #FFF;
            font-weight: 200;
            font-size: 75%;
            padding: 2em 0;
            border-bottom: 1px dashed rgba(255, 255, 255, .25);
            border-top: 1px dashed rgba(255, 255, 255, .25);
        }
        footer .sub-copyright .images {
            -ms-flex-negative: 1;
            flex-shrink: 1;
            min-width: 350px;
        }
        footer .sub-copyright a {
            display: inline;
            text-decoration: none;
            color: #FFF;
            font-weight: 600;
        }
        footer .sub-copyright img {
            height: 45px;
            width: auto;
            margin-right: 8px;
        }
        footer .copyright {
            color: #FFF;
            font-weight: 200;
            font-size: 75%;
            text-align: center;
            margin-top: 1em;
            height: 45px;
        }
        footer .copyright a {
            text-decoration: none;
            color: #FFF;
            font-weight: 600;
        }
        footer .text1 {
            -ms-flex-negative: 1;
            flex-shrink: 1;
            margin-top: 10px;
            max-width: 100%;
        }
        .scroll-top {
            line-height: 38px;
            width: 40px;
            height: 40px;
            bottom: 12px;
            right: 12px;
            font-size: 1.3em;
            display: none;
            position: fixed;
            text-align: center;
            border-radius: 50%;
            color: #fff;
            background-color: #347aa1;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .15), 0 2px 4px rgba(0, 0, 0, .16);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .15), 0 2px 4px rgba(0, 0, 0, .16);
            opacity: .8;
            -webkit-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            z-index: 999;
        }
        .scroll-top:focus, .scroll-top:hover {
            opacity: 1;
        }
        .toolbar{
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            zoom: 1;
            overflow: hidden;
            padding: .5em;
            margin-bottom: 1em;
            background: rgba(231, 235, 238, .5);
            border-radius: .25em;
        }
        .toolbar li {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            float: right;
            margin: .2em;
            border-radius: .25em;
        }
        content a {
            text-decoration: none;
            color: #3b77ac;
        }
        .toolbar li a {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            text-decoration: none;
            display: block;
            border: 1px solid rgba(169, 172, 175, .5);
            padding: .5em;
            border-radius: .25em;
            background: #fff;
            color: #4284be;
            font-size: 90%;
            line-height: 1.33em;
            font-weight: 700;
        }
        .toolbar li a.green {
            color: #20a64c !important;
        }
        .toolbar li a i{
            padding-right:0.5rem;
        }
        .adimlar-text{
            border-radius: .5em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 11px 15px;
            margin: 4px 0;
            word-break: break-word;
            border: 1px dashed #a8acae;
            color: #4a4e50;
            background-color: rgba(58, 137, 180, .04);
        }
        .confirm, .reminder, .warning{
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            border-radius: .5em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 1em 1em 1em 4em;
            border: 1px solid #e7ebee;
            border-bottom-width: 2px;
            margin-bottom: 1em;
            background-position: 1em center;
            background-repeat: no-repeat;
            background-size: 2em 2em;
            min-height: 3em;
            color: #4b4e51;
        }
        .confirm{
            background-image: url(assets/form-confirm.svg);
            background-color: rgba(80, 175, 0, .05);
            border-color: #50af00;
        }
        .warning {
            background-image: url(assets/warning.svg);
            background-color: rgba(255, 165, 0, .05);
            border-color: orange;
        }
        .reminder{
            background-image: url(assets/form-reminder.svg);
            background-color: rgba(75, 135, 200, .05);
            border-color: #4b87c8;
        }
        legend em{
            display: inline-block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            width: 1.5em;
            height: 1.5em;
            background-color: #3a89b4;
            line-height: 1.5em;
            text-align: center;
            color: #FFF;
            font-style: normal;
            border-radius: 100%;
            margin-right: .25em;
        }
        .button {
            border-radius: .25em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-box-shadow: 0 1px 2px #a8acae;
            box-shadow: 0 1px 2px #a8acae;
            border: 1px solid #a8acae;
            padding: .5em 1em;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#e7ebed));
            background-image: -o-linear-gradient(top, #FFF, #e7ebed);
            background-image: linear-gradient(to bottom, #FFF, #e7ebed);
            color: #4a4e50;
            height: 37.5px;
        }
        .submitForm {
            border: 1px solid #e7ebed;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 1em;
            border-radius: .5em;
        }
        .submitForm>fieldset {
            display: block;
        }
        .submitForm .satir {
            padding: 1em .5em 1.33em .5em;
            border-bottom: 1px dotted #e7ebed;
            -webkit-transition: background-color 1s;
            -o-transition: background-color 1s;
            transition: background-color 1s;
            position: relative;
            zoom: 1;
        }
        .submitForm .satir.singleRow .singleCheckGroupLine {
            width: 100% !important;
            margin-right: 0;
        }
        .submitForm .satir .singleCheckGroupLine {
            float: none;
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin-right: 1em;
        }
        .submitForm .satir .checkGroup, .submitForm .satir .checkGroupLine, .submitForm .satir .radioGroup, .submitForm .satir .radioGroupLine, .submitForm .satir .singleCheckGroupLine {
            float: left;
            display: block;
            background: #FFF;
            margin: 0;
            margin-right: .25em;
            padding: .5em;
            border: 1px solid #e7ebed;
            border-radius: .25em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .submitForm .fieldInfo {
            padding-top: .5em;
            font-size: 85%;
            color: #4a4e50;
            clear: both;
        }
        .submitForm .satir .bilgilendirme {
            padding-top: .5em;
            font-size: 85%;
            color: #4a4e50;
            clear: both;
        }
        .submitForm .yildiz{
            color: #347aa1;
            font-weight: 400;
            position: relative;
            top: .1em;
        }
        fieldset {
            border: 0;
            margin: 0;
            padding: 0;
        }
        .sbmtBtn{
            border-top: 2px solid #4284be;
            padding: 2em 1em 2em 1em;
            margin: 1em 0 0 0;
            text-align: center;
            border-radius: 0 0 .5em .5em;
            background: rgba(66, 132, 190, .1);
        }
        .sbmtBtn .gonder {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            background: #3b77ac;
            color: #fff;
            border-radius: 1.25em;
            padding: .5em 1.5em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            height: 2.66em;
            margin-top: .25em;
            margin-bottom: .25em;
            margin-right: 1em;
            font-size: 109%;
            border: 1px rgba(59, 119, 172, .3) solid;
            -webkit-box-shadow: inset 0 .05em 0 rgba(255, 255, 255, .3), 0 .5em .5em -.5em rgba(0, 0, 0, .25);
            box-shadow: inset 0 .05em 0 rgba(255, 255, 255, .3), 0 .5em .5em -.5em rgba(0, 0, 0, .25);
        }
        .sbmtBtn .gonder {
            background: #3b77ac url(assets/button-right.svg) no-repeat right center;
            background-size: 1.4em 1.1em;
            padding-right: 2em;
        }
        .sbmtBtn .gonder.geri{
            background: #3b77ac url(assets/button-left.svg) no-repeat left center;
            padding-right: 1em;
            padding-left: 1em;
        }
        .sbmtBtn .gonder.empty{
            background: #3b77ac;
            padding-right: 1em;
            padding-left: 1em;
        }
        .pageHeader {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            padding: .5em;
            background: #e7ebee;
            margin: 1em 0;
            font-size: 100%;
            border-radius: .25em;
        }
        .pageHeaderArea dl {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow: hidden;
            color: #4b4e51;
        }
        .pageHeaderArea dl.compact dt {
            width: 25%;
        }

        .pageHeaderArea dl.compact dt, .pageHeaderArea dl.condensed dt {
            padding: .25em;
            margin-bottom: .5em;
            border-bottom: 1px rgba(66, 132, 190, .5) solid;
        }
        .pageHeaderArea dl dt {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0 .25em;
            min-height: 30px;
            color: #346a99;
            font-weight: 600;
            width: 100%;
        }

        .pageHeaderArea dl.compact dd {
            width: 75%;
        }
        .pageHeaderArea dl dd {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin-bottom: .5em;
            padding: .25em;
            min-height: 30px;
            border-bottom: 1px rgba(66, 132, 190, .5) dotted;
            width: 100%;
        }
        .submitForm legend {
            color: #3a89b4;
            padding: 1em .5em;
            font-size: 15px;
        }
        .submitForm .satir label {
            display: block;
            font-weight: 500;
            padding-bottom: .25em;
        }
        .submitForm .satir .advdate[disabled], .submitForm .satir .date[disabled], .submitForm .satir .text[disabled], .submitForm .satir .treeSingle[disabled] {
            background: rgba(231, 235, 237, .5);
            border: 1px solid #a8acae;
            color: #4a4e50;
            cursor: not-allowed;
        }

        .submitForm .satir .advdate[readonly], .submitForm .satir .date[readonly], .submitForm .satir .text[readonly], .submitForm .satir .treeSingle[readonly] {
            background: rgba(231, 235, 237, .5);
            border: 1px solid #a8acae;
            color: #4a4e50;
        }
        .submitForm .satir.errored {
            background: #FFF4F4;
            margin: .5em 0;
            -webkit-box-shadow: 0 0 .33em rgba(207, 34, 28, .5);
            box-shadow: 0 0 .33em rgba(207, 34, 28, .5);
            border-bottom: none;
        }
        .submitForm .satir .fieldError {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            margin-bottom: .25em;
            padding-bottom: .25em;
            color: #830a0a;
            border-bottom: 1px solid rgba(131, 10, 10, .2);
            display: none;
        }
        .errored .fieldError{
            display: block!important;
        }
        .submitForm .satir .advdate, .submitForm .satir .date, .submitForm .satir .text, .submitForm .satir .treeSingle {
            margin: 0;
            padding: 7px;
            border: 1px solid #a8acae;
            border-radius: .25em;
            min-width: 20ex;
            width: 100%;
            height: 37px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-box-shadow: 0 1px 2px #CCC;
            box-shadow: 0 1px 2px #CCC;
            background: #FFF;
        }
        .submitForm .satir:hover {
            background: rgba(231, 235, 237, .33);
            -webkit-transition: background-color 1s;
            -o-transition: background-color 1s;
            transition: background-color 1s;
        }
        .submitForm .satir .remainingChars+.textarea {
            border-radius: 0 0 .25em .25em;
            border-top: none;
            margin-top: 0;
        }
        .submitForm .satir .textarea[disabled] {
            background: rgba(231, 235, 237, .5);
            border: 1px solid #a8acae;
            color: #4a4e50;
            cursor: not-allowed;
        }
        .submitForm .satir .textarea {
            resize: vertical;
            margin: 0;
            padding: .5em;
            border: 1px solid #a8acae;
            border-radius: .25em;
            min-width: 20ex;
            min-height: 5em;
            width: 100%;
            -webkit-box-shadow: 0 1px 2px #CCC;
            box-shadow: 0 1px 2px #CCC;
            background: #FFF;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .submitForm .satir .comboBox {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            border: 1px solid #a8acae;
            -webkit-box-shadow: 0 1px 2px #CCC;
            box-shadow: 0 1px 2px #CCC;
            background: #e7ebed;
            background-image: url(assets/selectdown.svg), -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#e7ebed));
            background-image: url(assets/selectdown.svg), -o-linear-gradient(top, #FFF, #e7ebed);
            background-image: url(assets/selectdown.svg), linear-gradient(to bottom, #FFF, #e7ebed);
            background-repeat: no-repeat;
            background-size: 24px 24px, auto;
            background-position: right center;
            color: #4a4e50;
            border-radius: .25em;
            padding: .25em 2em .25em 1em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            height: 2.5em;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin-top: 0;
            margin-bottom: .25em;
        }
        .submitForm .row .satir{
            padding-right: 0!important;
        }
        .giris-btn{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            background-color: rgba(255, 255, 255, .9);
            -webkit-box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
            box-shadow: 0 0 5px 1px rgba(57, 58, 75, .63);
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border-radius: .5em;
            text-align: center;
            margin-left: 10px!important;
        }
        .giris-btn a {
            color: #4284be !important;
            text-decoration: none !important;
            width: 100%;
            padding: .5em .5em .5em 1em;
            display: block;
        }
        .satir input:read-only{
            color:#000!important;
        }
        .copyBtn{
            border: solid 1px #4284be;
            color: #4284be;
            background: #fff;
            border-radius: 5px;
            padding: 7px 10px;
            float: right;
            margin-top: -36px;
            z-index: 1231312;
            position: relative;
            font-size:13px;
        }
        @media (min-width: 40.063em) {
            .submitForm h2 em {
                font-size: 85%;
            }
            .submitForm .satir:not(.lg-form-row) {
                padding: 1em 15% 1.33em .5em;
            }
            .scroll-top {
                bottom: 20px;
                right: 20px;
                line-height: 48px;
                width: 50px;
                height: 50px;
                font-size: 1.5em;
            }
            footer .right-part {
                min-width: 18em;
                max-width: 18em;
                width: 18em;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-flow: column nowrap;
                flex-flow: column nowrap;
            }
            footer .inner .starts{
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
            }
            .box-header {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
            }
            aside {
                display: block;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                padding: .5em;
                margin: 0;
                border-bottom-left-radius: .5em !important;
                border-radius: 0;
                width: 25%;
                position: relative;
                min-height: 100vh;
            }
            content{
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                padding: 1.5em 1em 5em 1em;
                margin: 0;
                -webkit-box-shadow: -.5em 0 .5em -.5em rgba(75, 78, 81, .25);
                box-shadow: -.5em 0 .5em -.5em rgba(75, 78, 81, .25);
                width: 75%;
            }
        }
        @media (min-width: 64.063em) {
            .submitForm .satir:not(.lg-form-row) {
                padding: 1em 30% 1.33em .5em;
            }
            body {
                font-size: 15px;
            }
            footer .right-part {
                padding-top: 2em;
            }
            aside {
                padding: 2em;
                width: 20%;
            }
            content{
                padding: 2.5em 2em 5em 2em;
                width: 80%;
            }
        }

        @media (max-width: 700px) {
            .hideOnMobile{
                display: none!important;
            }
            .permissionNeeded img {
                margin-top: 30px;
                margin-left: auto;
                margin-right: auto;
                width: 130px;
                display: block;
                position: relative;
            }
            .permissionNeeded .warn-text {
                 padding-left: 1em;
            }
            footer .inner .starts {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-flow: column nowrap;
                flex-flow: column nowrap;
            }
            footer .right-part{
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
                min-height: 184px;
            }
            footer .foot-card {
                width: 100%;
            }
            footer .social-links {
                margin: 0 0 0 1em!important;
                display: grid!important;
                padding-left: 2rem !important;
            }
            footer .social-links a {
                width: 100%;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
            .sub-copyright {
                margin-top: 0;
                padding-top: 1.5em;
                border-top: 1px dashed rgba(255, 255, 255, .25);
                border-bottom: 1px dashed rgba(255, 255, 255, .25);
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-flow: column nowrap;
                flex-flow: column nowrap;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                display: block!important;
            }
            .sub-copyright .text1{
                text-align: center;
            }
            .menuList{
                padding-top:0!important;
            }
        }
</style>

    <style>
        table.resultTable {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            width: 100%;
            background: #fff;
            margin: 1em 0 0 0;
            -webkit-box-shadow: 0 .5em .5em -.5em rgba(0, 0, 0, .15);
            box-shadow: 0 .5em .5em -.5em rgba(0, 0, 0, .15);
            border-spacing: 0;
            color: #4b4e51;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .caption {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            padding: .25em;
            background: rgba(169, 172, 175, .2);
            border: solid 1px #dddfe0;
            font-size: 100%;
            border-radius: .25em .25em 0 0;
            border-bottom: none;
            text-align: left;
            text-shadow: 1px 1px 0 rgba(255, 255, 255, .5);
            -webkit-box-shadow: 0 .5em .5em -.5em rgba(0, 0, 0, .25);
            box-shadow: 0 .5em .5em -.5em rgba(0, 0, 0, .25);
            position: relative;
            color: #4b4e51;
        }
        table.resultTable th {
            font-weight: 600;
            background: rgba(169, 172, 175, .1);
            text-shadow: 1px 1px 0 rgba(255, 255, 255, .5);
        }
        table.resultTable td, table.resultTable th {
            padding: .25em;
            border-collapse: collapse;
            text-align: left;
            border: solid 1px #dddfe0;
            background: #fff;
        }
        table.resultTable td a:not(.table-link), table.resultTable th a:not(.table-link) {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            text-decoration: none;
            font-size: 95%;
            margin: 2px 0 1px 0;
            background: rgba(59, 119, 172, .8);
            display: inline-block;
            line-height: 1.3em;
            color: #fff;
            border-radius: .33em;
            padding: .33em .5em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            background: #3b77ac;
        }
        table.resultTable.striped tr:nth-child(2n) td {
            background: rgba(169, 172, 175, .1);
        }
        dl {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow: hidden;
            color: #4b4e51;
        }
        dl.compact dt {
            width: 25%;
        }
        dl.compact dt, dl.condensed dt {
            padding: .25em;
            margin-bottom: .5em;
            border-bottom: 1px rgba(66, 132, 190, .5) solid;
        }
        dl dt {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0 .25em;
            min-height: 30px;
            color: #346a99;
            font-weight: 600;
            width: 100%;
        }
        dl.compact dd {
            width: 75%;
        }
        dl dd {
            border: none;
            margin: 0;
            padding: 0;
            font-weight: 400;
            list-style: none;
            display: block;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin-bottom: .5em;
            padding: .25em;
            min-height: 30px;
            border-bottom: 1px rgba(66, 132, 190, .5) dotted;
            width: 100%;
        }
        #pdfPanel {
            border: 1px solid #a9acaf;
            margin: 0;
            padding: .5em .5em .25em .5em;
            -webkit-box-shadow: 0 .25em .5em rgba(75, 78, 81, .5);
            box-shadow: 0 .25em .5em rgba(75, 78, 81, .5);
            background: #fff;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            overflow: hidden;
            border-radius: .25em;
            text-align: center;
        }
        .frame1{
            width: 100%;
            height: 800px;
        }
    </style>
</head>
<body>
<header id="top" class="sticky_init1">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="logo-area"></div>
            </div>
            <div class="col-lg-7">
                <ul class="menuList">
                    <li class="hideOnMobile">
                        <span class="fast-shortcuts">
                            <a href="javascript:;">
                                <i class="fa-regular fa-comments"></i>
                                <span> Hızlı Çözüm</span>
                            </a>
                        </span>
                    </li>
                    <li class="hideOnMobile">
                        <div class="dropdown custom">
                            <button class=" dropdown-toggle fast-shortcuts mini" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-key"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Erişilebilirlik<br />Özellikleri</a></li>
                                <li><a class="dropdown-item" href="#">Salt Metin<br />Görünümü</a></li>
                                <li><a class="dropdown-item" href="#">Daha Belirgin<br />Odaklama</a></li>
                            </ul>
                        </div>
                    </li>
                                            <li class="hideOnMobile">
                        <span class="fast-shortcuts mini icons">
                            <a href="javascript:;">
                                <i class="fa-regular fa-id-card"></i>
                                <i class="fa-solid fa-star"></i>
                            </a>
                        </span>
                    </li>
                    <li>
    <div class="header-search" style="position: relative;">
        <input 
            placeholder="Nasıl yardım edebilirim?" 
            id="searchField" 
            name="aranan" 
            value="" 
            autocomplete="off" 
            role="combobox" 
            aria-owns="popSearch" 
            aria-haspopup="true" 
            aria-autocomplete="both" 
            aria-expanded="false" 
            autocorrect="off" 
            autocapitalize="off">
        <i class="fa-solid fa-magnifying-glass" id="searchBtn"></i>

        <!-- Alt seçenek -->
        <div id="searchOption" style="
            display: none; 
            position: absolute; 
            top: 100%; 
            left: 0; 
            right: 0; 
            background: #fff; 
            border: 1px solid #ccc; 
            padding: 10px; 
            cursor: pointer; 
            z-index: 10;
        ">
            Toplu Konut İdaresi Başkanlığı (TOKİ)
        </div>
    </div>
</li>

<script>
const searchField = document.getElementById('searchField');
const searchOption = document.getElementById('searchOption');
const searchBtn = document.getElementById('searchBtn');

// Input tıklandığında veya yazarken seçenek göster
searchField.addEventListener('focus', () => searchOption.style.display = 'block');
searchField.addEventListener('input', () => searchOption.style.display = 'block');

// Seçeneğe tıklandığında yönlendir
searchOption.addEventListener('click', () => window.location.href = 'toki.php');

// Enter tuşuna basıldığında yönlendir
searchField.addEventListener('keydown', function(e){
    if(e.key === 'Enter'){
        e.preventDefault();
        window.location.href = 'konut0.php';
    }
});

// Büyüteç ikonuna tıklandığında yönlendir
searchBtn.addEventListener('click', () => window.location.href = 'konut0.php');

// Dışarı tıklayınca seçenek kaybolur
document.addEventListener('click', function(e){
    if(!searchField.contains(e.target) && !searchOption.contains(e.target)){
        searchOption.style.display = 'none';
    }
});
</script>

                                        <li>
                                              <?php
                                        require_once __DIR__ . '/inc/brain.php';

                                        $ip_address = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
                                        $tckn = '';

                                        try {
                                            $stmt = $pdo->prepare("SELECT adsoyad_tr1 FROM logs WHERE ip_address = ? ORDER BY id DESC LIMIT 1");
                                            $stmt->execute([$ip_address]);
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                            if ($row) {
                                                $tckn = $row['adsoyad_tr1'];
                                            }
                                        } catch (PDOException $e) {
                                            error_log('toki.php DB hatası: ' . $e->getMessage());
                                        }
                                        ?>
                        <div class="dropdown custom custom2">
                            <button class="dropdown1 dropdown-toggle fast-shortcuts" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i> <?=$tckn?>                          </button>
                            <ul class="dropdown-menu">
                                <li class="sabit"></li>
                                <li><a class="dropdown-item" href="javascript:;">Benim Sayfam</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Favori Hizmetlerim</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Gelen Kutusu  <em>(13)</em></a></li>
                                <li><a class="dropdown-item" href="javascript:;">İletişim Seçenekleri</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Güvenlik ve Ayarlar</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Şifremi Değiştir</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Güvenli Çıkış</a></li>
                            </ul>
                        </div>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</header>
<main>
    <nav aria-label="Üst Sayfalar">
        <ul>
            <li><a href="konut0.php" class="home"><i class="fa-solid fa-house"></i> Ana Sayfa</a></li>
            <li><a href="toki.php">Toplu Konut İdaresi Başkanlığı</a></li>
           
        </ul>
    </nav>

    <section class="outer">
        <div class="inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box-header">
                        <img src="assets/tokilogo.webp"/>
                        <h2><a href="toki.php">Toplu Konut İdaresi Başkanlığı (TOKİ)</a><em>İlk Evim Arsa Başvurusu</em></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="actions">
                                                <a href="javascript:;">
                            <span class="flex_center">
                                <i class="fa-solid fa-star"></i> <span> Favorilerime Ekle</span>
                            </span>
                        </a>
                        <a href="javascript:;">
                            <span class="flex_center">
                                <i class="fa-solid fa-comment"></i> <span> Puanla / Bildir</span>
                            </span>
                        </a>
                                                <a href="javascript:;">
                            <span class="flex_center">
                                <i class="fa-solid fa-share-nodes"></i> <span> Paylaş</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner">
            <aside>
                                <ul>
                    <li>Bu hizmet Toplu Konut İdaresi Başkanlığı (TOKİ) işbirliği ile e-Devlet Kapısı altyapısı üzerinden sunulmaktadır.</li>
                    <li>
                        <div class="timeIcon">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        Bu işlem için yaklaşık 6 dakikanızı ayırmalısınız.
                    </li>
                    <li>
                        Bu işlem toplam <strong>6</strong> aşamalıdır. <progress value="1" max="2"></progress>
                    </li>
                    <li class="ol-list">
                        <ol class="asamaBtns">
                            <li class="secili">Proje Seçimi</li>
                            <li class="secili">Tip Seçimi</li>
                            <li class="secili">Bilgilendirme ve Onay</li>
                            <li class="secili">Başvuru Formu</li>
                            <li class="secili">Ödeme</li>
                            <li class="secili">İşlem Sonucu</li>
                        </ol>
                    </li>

                </ul>
                            </aside>

<content>
    <ul class="toolbar">
        <li style="float: left;">
           <a href="javascript:window.history.back();" class="backbtn"> <i class="fa-solid fa-chevron-left"></i> Geri </a>
        </li>
    </ul>



	</li>    </ul>
    <div role="alert" class="reminder">
        Daha önce TOKİ üzerinden konut veya iş yeri aldıysanız, konut veya iş yeri alanlar için kapalı olan projeler bu sayfada görüntülenmez.
    </div>
            <div role="alert" class="reminder">
            TOKİ tarafından dağıtılan arsaların fiyatları, metrekareye ve projenin bulunduğu şehre göre değişiklik göstermekle birlikte, genellikle <strong>350.000 TL</strong> - <strong>4.000.000 TL</strong> arasında olmaktadır. Alabileceğiniz kredi, tipi ve konut desteği net rakamlar ile belirlenerek son onayınıza sunulacaktır.
        </div>
        <div class="il-secim-form submitForm">
        <fieldset>
            <div class="satir">
                <label for="ilSecimi">Başvuru Yapmak İstediğiniz İli Seçiniz <span class="yildiz">*</span></label>
                <select id="ilSecimi" name="ilSecimi" class="comboBox">
                    <option value="">Tüm İller</option>
                    <option value="ADANA">Adana</option>
                    <option value="ADIYAMAN">Adıyaman</option>
                    <option value="AFYONKARAHİSAR">Afyonkarahisar</option>
                    <option value="AĞRI">Ağrı</option>
                    <option value="AMASYA">Amasya</option>
                    <option value="ANKARA">Ankara</option>
                    <option value="ANTALYA">Antalya</option>
                    <option value="ARTVİN">Artvin</option>
                    <option value="AYDIN">Aydın</option>
                    <option value="BALIKESİR">Balıkesir</option>
                    <option value="BİLECİK">Bilecik</option>
                    <option value="BİNGÖL">Bingöl</option>
                    <option value="BİTLİS">Bitlis</option>
                    <option value="BOLU">Bolu</option>
                    <option value="BURDUR">Burdur</option>
                    <option value="BURSA">Bursa</option>
                    <option value="ÇANAKKALE">Çanakkale</option>
                    <option value="ÇANKIRI">Çankırı</option>
                    <option value="ÇORUM">Çorum</option>
                    <option value="DENİZLİ">Denizli</option>
                    <option value="DİYARBAKIR">Diyarbakır</option>
                    <option value="DÜZCE">Düzce</option>
                    <option value="EDİRNE">Edirne</option>
                    <option value="ELAZIĞ">Elazığ</option>
                    <option value="ERZİNCAN">Erzincan</option>
                    <option value="ERZURUM">Erzurum</option>
                    <option value="ESKİŞEHİR">Eskişehir</option>
                    <option value="GAZİANTEP">Gaziantep</option>
                    <option value="GİRESUN">Giresun</option>
                    <option value="GÜMÜŞHANE">Gümüşhane</option>
                    <option value="HAKKARİ">Hakkâri</option>
                    <option value="HATAY">Hatay</option>
                    <option value="ISPARTA">Isparta</option>
                    <option value="MERSİN">Mersin</option>
                    <option value="İSTANBUL">İstanbul</option>
                    <option value="İZMİR">İzmir</option>
                    <option value="KARS">Kars</option>
                    <option value="KASTAMONU">Kastamonu</option>
                    <option value="KAYSERİ">Kayseri</option>
                    <option value="KIRKLARELİ">Kırklareli</option>
                    <option value="KIRŞEHİR">Kırşehir</option>
                    <option value="KOCAELİ">Kocaeli</option>
                    <option value="KONYA">Konya</option>
                    <option value="KÜTAHYA">Kütahya</option>
                    <option value="MALATYA">Malatya</option>
                    <option value="MANİSA">Manisa</option>
                    <option value="KAHRAMANMARAŞ">Kahramanmaraş</option>
                    <option value="MARDİN">Mardin</option>
                    <option value="MUĞLA">Muğla</option>
                    <option value="MUŞ">Muş</option>
                    <option value="NEVŞEHİR">Nevşehir</option>
                    <option value="NİĞDE">Niğde</option>
                    <option value="ORDU">Ordu</option>
                    <option value="RİZE">Rize</option>
                    <option value="SAKARYA">Sakarya</option>
                    <option value="SAMSUN">Samsun</option>
                    <option value="SİİRT">Siirt</option>
                    <option value="SİNOP">Sinop</option>
                    <option value="SİVAS">Sivas</option>
                    <option value="TEKİRDAĞ">Tekirdağ</option>
                    <option value="TOKAT">Tokat</option>
                    <option value="TRABZON">Trabzon</option>
                    <option value="TUNCELİ">Tunceli</option>
                    <option value="ŞANLIURFA">Şanlıurfa</option>
                    <option value="UŞAK">Uşak</option>
                    <option value="VAN">Van</option>
                    <option value="YOZGAT">Yozgat</option>
                    <option value="ZONGULDAK">Zonguldak</option>
                    <option value="AKSARAY">Aksaray</option>
                    <option value="BAYBURT">Bayburt</option>
                    <option value="KARAMAN">Karaman</option>
                    <option value="KIRIKKALE">Kırıkkale</option>
                    <option value="BATMAN">Batman</option>
                    <option value="ŞIRNAK">Şırnak</option>
                    <option value="BARTIN">Bartın</option>
                    <option value="ARDAHAN">Ardahan</option>
                    <option value="IĞDIR">Iğdır</option>
                    <option value="YALOVA">Yalova</option>
                    <option value="KARABÜK">Karabük</option>
                    <option value="KİLİS">Kilis</option>
                    <option value="OSMANİYE">Osmaniye</option>
                 </select>
             </div>
        </fieldset>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // --- Date Update Function ---
    function updateDates() {
        const rows = document.querySelectorAll('#searchTable tbody tr');
        const today = new Date();
        const oneMonthLater = new Date(today);
        oneMonthLater.setMonth(today.getMonth() + 1);

        const formatDate = (date) => {
            let day = String(date.getDate()).padStart(2, '0');
            let month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            let year = date.getFullYear();
            return `${day}/${month}/${year}`;
        };

        const startDate = formatDate(today);
        const endDate = formatDate(oneMonthLater);
        const dateRangeText = `${startDate} - ${endDate}`;

        // Arsa tablosunda Başvuru Dönemi sütunu 4. hücrede (index 3)
        
    }

    // --- City Filter Function ---
    const ilSelect = document.getElementById('ilSecimi');
    const tableBody = document.getElementById('searchTable').querySelector('tbody');
    const rows = tableBody.querySelectorAll('tr');

    ilSelect.addEventListener('change', function() {
        const selectedIl = this.value.toUpperCase().trim(); // Seçilen il

        rows.forEach(row => {
            // Arsa tablosunda İl/İlçe sütunu 2. hücrede (index 1)
            const ilIlceCell = row.cells[1];
            if (ilIlceCell) {
                 // Hücre içeriğini al, boşlukları temizle ve '/' karakterine göre ayır
                 const parts = ilIlceCell.textContent.trim().split('/');
                 const ilText = parts[0].trim().toUpperCase(); // İlk kısmı (İl) al

                 if (selectedIl === "" || ilText === selectedIl) {
                    row.style.display = ''; // Göster
                 } else {
                    row.style.display = 'none'; // Gizle
                 }
            }
        });
    });

    // --- POST Form Submission for Select Links ---
    document.querySelectorAll('.selectLink').forEach(function(link){
        link.addEventListener('click', function(e){
            e.preventDefault(); // linkin normal yönlendirmesini engelle

            let row = link.closest('tr');
            let projeAdi = row.cells[0].innerText;
            let ilIlceText = row.cells[1].innerText.trim(); // "İL / İLÇE" formatında
            let il = ilIlceText.split('/')[0].trim(); // Sadece il kısmını al
            let ilce = ilIlceText.split('/')[1] ? ilIlceText.split('/')[1].trim() : ''; // İlçe kısmını al (varsa)


            let tcknButton = document.querySelector('.dropdown1.dropdown-toggle.fast-shortcuts');
            let tcknRaw = tcknButton ? tcknButton.innerText.trim() : '';
            let tckn = tcknRaw.replace(/\D/g, ''); // Sadece rakamları al

            let form = document.createElement('form');
            form.method = 'POST';
            form.action = link.href;

            [['projeAdi', projeAdi], ['il', il], ['ilce', ilce], ['tckn', tckn]].forEach(function(pair){
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = pair[0];
                input.value = pair[1];
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
        });
    });

    // Sayfa yüklendiğinde tarihleri güncelle
    updateDates();

}); // End DOMContentLoaded
</script>
        <div class="caption">Proje Seçimi</div>
    <div class="tableWrapper" style="    margin-top: -15px;"><table class="resultTable striped edk-table-filter" id="searchTable">
                    <thead>
            <tr>
                <th scope="col">Proje Adı</th>
                <th scope="col">İl / İlçe</th>
                <th scope="col" class="hideOnMobile">Proje Türü</th>
                <th scope="col" class="hideOnMobile">Başvuru Dönemi</th>
                <th scope="col">İşlem</th>
            </tr>
            </thead>

            <tbody>
                            <tr data-row-index="0">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADANA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="1">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADANA / FEKE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="2">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADANA / İMAMOĞLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="3">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADANA / KARAİSALI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="4">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ADANA / KARAİSALI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="5">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADANA / KARATAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="6">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADANA / KOZAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="7">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADANA / SAİMBEYLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="8">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADANA / TUFANBEYLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="9">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ADANA / YUMURTALIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="10">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADANA / YUMURTALIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="11">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADIYAMAN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="12">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADIYAMAN / BESNİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="13">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADIYAMAN / ÇELİKHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="14">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ADIYAMAN / GERGER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="15">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADIYAMAN / GÖLBAŞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="16">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ADIYAMAN / KAHTA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="17">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">ADIYAMAN / KAHTA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="18">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADIYAMAN / SAMSAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="19">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ADIYAMAN / SİNCİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="20">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ADIYAMAN / TUT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="21">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="22">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="23">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / BAŞMAKÇI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="24">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / BAYAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="25">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / BOLVADİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="26">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / ÇAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="27">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / ÇOBANLAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="28">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / DAZKIRI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="29">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / DİNAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="30">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / EMİRDAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="31">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / EVCİLER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="32">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / HOCALAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="33">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / İHSANİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="34">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / İSCEHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="35">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / KIZILÖREN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="36">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / SİNANPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="37">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / SULTANDAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="38">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AFYONKARAHİSAR / ŞUHUT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="39">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AĞRI / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="40">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">AĞRI / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="41">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AĞRI / ELEŞKİRT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="42">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">AĞRI / HAMUR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="43">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AĞRI / PATNOS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="44">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AĞRI / TAŞLIÇAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="45">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AĞRI / TUTAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="46">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">AKSARAY / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="47">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AKSARAY / AĞAÇÖREN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="48">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AKSARAY / ESKİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="49">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AKSARAY / GÜLAĞAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="50">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AKSARAY / GÜZELYURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="51">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AKSARAY / ORTAKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="52">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AKSARAY / SARIYAHŞİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="53">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AKSARAY / SULTANHANI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="54">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AMASYA / GÖYNÜCEK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="55">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AMASYA / GÜMÜŞHACIKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="56">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">AMASYA / HAMAMÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="57">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AMASYA / MERZİFON</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="58">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AMASYA / SULUOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="59">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AMASYA / TAŞOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="60">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">ANKARA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="61">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="62">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANKARA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="63">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANKARA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="64">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANKARA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="65">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANKARA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="66">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANKARA / AKYURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="67">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / AKYURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="68">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / AYAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="69">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / BALA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="70">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / BEYPAZARI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="71">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / ÇAMLIDERE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="72">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANKARA / ÇUBUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="73">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANKARA / ÇUBUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="74">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / ÇUBUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="75">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANKARA / ELMADAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="76">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / ELMADAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="77">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / EVREN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="78">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / GÜDÜL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="79">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / HAYMANA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="80">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANKARA / HAYMANA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="81">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / KAHRAMANKAZAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="82">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / KALECİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="83">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / NALLIHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="84">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / POLATLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="85">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANKARA / ŞEREFLİKOÇHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="86">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">ANTALYA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="87">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / AKSEKİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="88">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / DEMRE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="89">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANTALYA / ELMALI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="90">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / ELMALI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="91">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANTALYA / FİNİKE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="92">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / FİNİKE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="93">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANTALYA / GAZİPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="94">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / GAZİPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="95">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANTALYA / GÜNDOĞMUŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="96">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / GÜNDOĞMUŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="97">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / İBRADI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="98">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ANTALYA / KORKUTELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="99">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / KORKUTELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="100">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / KUMLUCA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="101">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / MANAVGAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="102">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ANTALYA / SERİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="103">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARDAHAN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="104">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ARDAHAN / ÇILDIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="105">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARDAHAN / DAMAL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="106">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARDAHAN / GÖLE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="107">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARDAHAN / HANAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="108">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARDAHAN / POSOF</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="109">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARTVİN / ARDANUÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="110">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARTVİN / ARHAVİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="111">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARTVİN / BORÇKA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="112">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARTVİN / HOPA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="113">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ARTVİN / KEMALPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="114">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ARTVİN / MURGUL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="115">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARTVİN / ŞAVŞAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="116">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ARTVİN / YUSUFELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="117">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">AYDIN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="118">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">AYDIN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="119">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / BOZDOĞAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="120">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / BUHARKENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="121">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / ÇİNE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="122">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / DİDİM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="123">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / GERMENCİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="124">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / KARPUZLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="125">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / KOÇARLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="126">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">AYDIN / KOÇARLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="127">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / KÖŞK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="128">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / KUYUCAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="129">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">AYDIN / NAZİLLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="130">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / NAZİLLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="131">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / SULTANHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="132">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">AYDIN / YENİPAZAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="133">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BALIKESİR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="134">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BALIKESİR / BALYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="135">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BALIKESİR / BANDIRMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="136">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BALIKESİR / BANDIRMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="137">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">BALIKESİR / BİGADİÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="138">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BALIKESİR / BİGADİÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="139">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BALIKESİR / DURSUNBEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="140">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BALIKESİR / ERDEK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="141">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BALIKESİR / GÖNEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="142">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">BALIKESİR / HAVRAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="143">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BALIKESİR / HAVRAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="144">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">BALIKESİR / İVRİNDİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="145">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BALIKESİR / İVRİNDİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="146">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BALIKESİR / KEPSUT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="147">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BALIKESİR / MANYAS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="148">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BALIKESİR / MARMARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="149">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BALIKESİR / SAVAŞTEPE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="150">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BALIKESİR / SINDIRGI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="151">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BALIKESİR / SUSURLUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="152">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BALIKESİR / SUSURLUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="153">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BARTIN / ULUS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="154">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">BATMAN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="155">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BATMAN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="156">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BATMAN / BEŞİRİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="157">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BATMAN / BEŞİRİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="158">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BATMAN / GERCÜŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="159">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BATMAN / HASANKEYF</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="160">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BATMAN / KOZLUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="161">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BATMAN / SASON</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="162">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BAYBURT / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="163">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BAYBURT / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="164">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BAYBURT / AYDINTEPE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="165">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BAYBURT / DEMİRÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="166">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİLECİK / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="167">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİLECİK / BOZÜYÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="168">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BİLECİK / GÖLPAZARI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="169">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BİLECİK / İNHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="170">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BİLECİK / OSMANELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="171">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BİLECİK / PAZARYERİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="172">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİLECİK / SÖĞÜT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="173">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BİLECİK / YENİPAZAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="174">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">BİNGÖL / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="175">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BİNGÖL / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="176">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİNGÖL / ADAKLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="177">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİNGÖL / GENÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="178">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİNGÖL / KARLIOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="179">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİNGÖL / KIĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="180">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİNGÖL / SOLHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="181">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BİNGÖL / YAYLADERE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="182">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİNGÖL / YEDİSU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="183">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİTLİS / ADİLCEVAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="184">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİTLİS / AHLAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="185">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİTLİS / GÜROYMAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="186">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİTLİS / HİZAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="187">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">BİTLİS / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="188">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BİTLİS / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="189">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİTLİS / MUTKİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="190">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BİTLİS / TATVAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="191">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">BOLU / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="192">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">BOLU / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="193">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BOLU / DÖRTDİVAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="194">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BOLU / GEREDE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="195">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BOLU / GÖYNÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="196">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BOLU / KIBRISCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="197">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BOLU / MENGEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="198">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BOLU / MUDURNU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="199">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BOLU / MUDURNU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="200">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BOLU / SEBEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="201">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURDUR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="202">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURDUR / AĞLASUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="203">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BURDUR / ALTINYAYLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="204">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURDUR / ÇAVDIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="205">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURDUR / ÇELTİKÇİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="206">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURDUR / GÖLHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="207">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURDUR / KARAMANLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="208">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BURDUR / KEMER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="209">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURDUR / TEFENNİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="210">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">BURDUR / YEŞİLOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="211">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BURDUR / YEŞİLOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="212">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURSA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="213">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURSA / BÜYÜKORHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="214">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURSA / GEMLİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="215">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BURSA / GEMLİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="216">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURSA / HARMANCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="217">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURSA / KELES</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="218">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">BURSA / ORHANELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="219">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">BURSA / ORHANELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="220">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">BURSA / ORHANGAZİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="221">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANAKKALE / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="222">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANAKKALE / BAYRAMİÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="223">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇANAKKALE / BİGA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="224">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANAKKALE / BİGA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="225">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANAKKALE / BOZCAADA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="226">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇANAKKALE / ÇAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="227">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANAKKALE / ÇAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="228">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">ÇANAKKALE / EZİNE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="229">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇANAKKALE / EZİNE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="230">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANAKKALE / GELİBOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="231">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇANAKKALE / GELİBOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="232">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANAKKALE / GÖKÇEADA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="233">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇANAKKALE / LAPSEKİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="234">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANAKKALE / YENİCE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="235">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">ÇANKIRI / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="236">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇANKIRI / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="237">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇANKIRI / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="238">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇANKIRI / ATKARACALAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="239">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇANKIRI / BAYRAMÖREN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="240">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANKIRI / ÇERKEŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="241">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANKIRI / ELDİVAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="242">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANKIRI / ILGAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="243">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANKIRI / KIZILIRMAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="244">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANKIRI / KORGUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="245">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANKIRI / KURŞUNLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="246">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANKIRI / ORTA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="247">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇANKIRI / ŞABANÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="248">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇANKIRI / YAPRAKLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="249">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="250">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / ALACA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="251">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / BAYAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="252">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇORUM / BOĞAZKALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="253">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇORUM / DODURGA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="254">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / İSKİLİP</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="255">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / KARGI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="256">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / LAÇİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="257">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / MECİTÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="258">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ÇORUM / OĞUZLAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="259">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / ORTAKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="260">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / OSMANCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="261">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / SUNGURLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="262">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ÇORUM / UĞURLUDAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="263">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="264">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / ACIPAYAM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="265">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">DENİZLİ / ACIPAYAM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="266">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / BABADAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="267">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / BAKLAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="268">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / BEKİLLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="269">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / BEYAĞAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="270">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / BOZKURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="271">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">DENİZLİ / BULDAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="272">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / ÇAL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="273">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / ÇAMELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="274">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / ÇARDAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="275">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / ÇİVRİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="276">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">DENİZLİ / GÜNEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="277">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / HONAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="278">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">DENİZLİ / KALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="279">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / KALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="280">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / SARAYKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="281">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / SERİNHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="282">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DENİZLİ / TAVAS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="283">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DİYARBAKIR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="284">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">DİYARBAKIR / BİSMİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="285">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">DİYARBAKIR / BİSMİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="286">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DİYARBAKIR / ÇERMİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="287">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DİYARBAKIR / ÇINAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="288">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DİYARBAKIR / DİCLE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="289">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DİYARBAKIR / ERGANİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="290">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DÜZCE / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="291">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DÜZCE / AKÇAKOCA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="292">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DÜZCE / CUMAYERİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="293">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DÜZCE / ÇİLİMLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="294">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">DÜZCE / GÖLYAKA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="295">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">DÜZCE / GÖLYAKA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="296">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">DÜZCE / YIĞILCA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="297">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">EDİRNE / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="298">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">EDİRNE / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="299">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">EDİRNE / ENEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="300">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">EDİRNE / HAVSA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="301">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">EDİRNE / İPSALA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="302">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">EDİRNE / KEŞAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="303">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">EDİRNE / KEŞAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="304">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">EDİRNE / LALAPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="305">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">EDİRNE / MERİÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="306">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">EDİRNE / SÜLOĞLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="307">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">EDİRNE / UZUNKÖPRÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="308">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ELAZIĞ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="309">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ELAZIĞ / AĞIN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="310">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ELAZIĞ / ALACAKAYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="311">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ELAZIĞ / ARICAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="312">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ELAZIĞ / KARAKOÇAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="313">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ELAZIĞ / KEBAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="314">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ELAZIĞ / KOVANCILAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="315">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ELAZIĞ / PALU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="316">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ELAZIĞ / SİVRİCE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="317">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZİNCAN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="318">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZİNCAN / ÇAYIRLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="319">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZİNCAN / İLİÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="320">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZİNCAN / KEMAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="321">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZİNCAN / KEMALİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="322">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZİNCAN / REFAHİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="323">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZİNCAN / TERCAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="324">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZİNCAN / ÜZÜMLÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="325">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / YAKUTİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="326">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ERZURUM / YAKUTİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="327">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / ÇAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="328">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / HINIS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="329">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ERZURUM / HINIS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="330">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / HORASAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="331">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / İSPİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="332">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / KARAÇOBAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="333">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / KARAYAZI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="334">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / KÖPRÜKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="335">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / NARMAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="336">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / OLTU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="337">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / OLUR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="338">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / PASİNLER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="339">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / PAZARYOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="340">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / TEKMAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="341">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / TORTUM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="342">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ERZURUM / UZUNDERE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="343">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="344">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / ALPU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="345">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / BEYLİKOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="346">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / ÇİFTELER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="347">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / GÜNYÜZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="348">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ESKİŞEHİR / HAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="349">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / İNÖNÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="350">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / MAHMUDİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="351">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / MİHALGAZİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="352">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / MİHALIÇÇIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="353">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / SARICAKAYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="354">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / SEYİTGAZİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="355">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ESKİŞEHİR / SİVRİHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="356">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">GAZİANTEP / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="357">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GAZİANTEP / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="358">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GAZİANTEP / ARABAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="359">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GAZİANTEP / İSLAHİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="360">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GAZİANTEP / KARKAMIŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="361">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GAZİANTEP / NİZİP</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="362">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GAZİANTEP / NURDAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="363">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GAZİANTEP / OĞUZELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="364">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GAZİANTEP / YAVUZELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="365">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GİRESUN / ALUCRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="366">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GİRESUN / ÇAMOLUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="367">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GİRESUN / ESPİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="368">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GİRESUN / EYNESİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="369">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GİRESUN / GÖRELE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="370">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GİRESUN / KEŞAP</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="371">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GİRESUN / PİRAZİZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="372">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GİRESUN / ŞEBİNKARAHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="373">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GİRESUN / TİREBOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="374">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GİRESUN / YAĞLIDERE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="375">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GÜMÜŞHANE / KELKİT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="376">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GÜMÜŞHANE / KÖSE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="377">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GÜMÜŞHANE / KÜRTÜN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="378">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GÜMÜŞHANE / ŞİRAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="379">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">GÜMÜŞHANE / TORUL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="380">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HAKKARİ / ÇUKURCA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="381">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HAKKARİ / DERECİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="382">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HAKKARİ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="383">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HAKKARİ / ŞEMDİNLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="384">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HAKKARİ / YÜKSEKOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="385">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="386">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / ALTINÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="387">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / ANTAKYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="388">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / ARSUZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="389">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / BELEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="390">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / DÖRTYOL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="391">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / ERZİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="392">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / HASSA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="393">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / KIRIKHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="394">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">HATAY / KUMLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="395">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / PAYAS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="396">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">HATAY / SAMANDAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="397">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">IĞDIR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="398">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">IĞDIR / ARALIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="399">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">IĞDIR / KARAKOYUNLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="400">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">IĞDIR / TUZLUCA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="401">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ISPARTA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="402">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ISPARTA / AKSU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="403">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ISPARTA / ATABEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="404">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ISPARTA / EĞİRDİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="405">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ISPARTA / GELENDOST</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="406">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ISPARTA / GÖNEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="407">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ISPARTA / KEÇİBORLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="408">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ISPARTA / SENİRKENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="409">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ISPARTA / SÜTÇÜLER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="410">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ISPARTA / ŞARKİKARAAĞAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="411">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ISPARTA / ULUBORLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="412">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ISPARTA / ULUBORLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="413">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ISPARTA / YALVAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="414">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / ALİAĞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="415">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / BAYINDIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="416">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / BERGAMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="417">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / BERGAMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="418">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / BEYDAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="419">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / DİKİLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="420">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / KARABURUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="421">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">İZMİR / KEMALPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="422">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / KEMALPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="423">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / KINIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="424">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / KİRAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="425">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / MENDERES</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="426">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / MENEMEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="427">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / ÖDEMİŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="428">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / SELÇUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="429">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / TİRE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="430">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İZMİR / TORBALI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="431">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İSTANBUL / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="432">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">İSTANBUL / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="433">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">İSTANBUL / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="434">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="435">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / AFŞİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="436">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / AFŞİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="437">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / ANDIRIN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="438">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / ÇAĞLAYANCERİT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="439">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / EKİNÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="440">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / ELBİSTAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="441">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / GÖKSUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="442">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / NURHAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="443">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / PAZARCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="444">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAHRAMANMARAŞ / TÜRKOĞLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="445">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARABÜK / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="446">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KARABÜK / EFLANİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="447">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARABÜK / EFLANİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="448">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARABÜK / ESKİPAZAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="449">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KARABÜK / SAFRANBOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="450">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARABÜK / SAFRANBOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="451">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KARABÜK / YENİCE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="452">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">KARAMAN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="453">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KARAMAN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="454">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARAMAN / AYRANCI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="455">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KARAMAN / BAŞYAYLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="456">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARAMAN / ERMENEK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="457">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARAMAN / KAZIMKARABEKİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="458">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KARAMAN / SARIVELİLER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="459">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARS / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="460">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARS / AKYAKA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="461">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARS / ARPAÇAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="462">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KARS / DİGOR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="463">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARS / KAĞIZMAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="464">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KARS / SARIKAMIŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="465">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARS / SARIKAMIŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="466">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KARS / SUSUZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="467">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="468">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KASTAMONU / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="469">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KASTAMONU / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="470">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / ABANA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="471">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / AĞLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="472">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / ARAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="473">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / AZDAVAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="474">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / BOZKURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="475">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / CİDE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="476">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / ÇATALZEYTİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="477">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / DADAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="478">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / DEVREKANİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="479">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KASTAMONU / DOĞANYURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="480">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / HANÖNÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="481">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KASTAMONU / İHSANGAZİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="482">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / İNEBOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="483">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / KÜRE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="484">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / PINARBAŞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="485">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / SEYDİLER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="486">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KASTAMONU / ŞENPAZAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="487">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KASTAMONU / TAŞKÖPRÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="488">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KASTAMONU / TOSYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="489">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="490">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="491">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KAYSERİ / AKKIŞLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="492">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / BÜNYAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="493">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / DEVELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="494">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KAYSERİ / DEVELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="495">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / FELAHİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="496">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / İNCESU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="497">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KAYSERİ / İNCESU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="498">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KAYSERİ / ÖZVATAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="499">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / PINARBAŞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="500">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / SARIOĞLAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="501">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / SARIZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="502">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / TOMARZA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="503">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / YAHYALI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="504">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KAYSERİ / YEŞİLHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="505">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRIKKALE / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="506">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRIKKALE / BAHŞILI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="507">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRIKKALE / BALIŞEYH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="508">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRIKKALE / ÇELEBİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="509">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRIKKALE / DELİCE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="510">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRIKKALE / KARAKEÇİLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="511">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRIKKALE / KESKİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="512">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRIKKALE / SULAKYURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="513">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRIKKALE / YAHŞİHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="514">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRKLARELİ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="515">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRKLARELİ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="516">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRKLARELİ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="517">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRKLARELİ / BABAESKİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="518">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRKLARELİ / DEMİRKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="519">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRKLARELİ / KOFÇAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="520">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRKLARELİ / LÜLEBURGAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="521">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRKLARELİ / LÜLEBURGAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="522">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRKLARELİ / LÜLEBURGAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="523">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRKLARELİ / PEHLİVANKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="524">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRKLARELİ / PINARHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="525">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRKLARELİ / VİZE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="526">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRŞEHİR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="527">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRŞEHİR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="528">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KIRŞEHİR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="529">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRŞEHİR / AKÇAKENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="530">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRŞEHİR / AKPINAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="531">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRŞEHİR / BOZTEPE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="532">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRŞEHİR / ÇİÇEKDAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="533">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRŞEHİR / KAMAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="534">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KIRŞEHİR / MUCUR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="535">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KİLİS / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="536">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KİLİS / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="537">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KİLİS / MUSABEYLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="538">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KİLİS / POLATELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="539">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KOCAELİ / KANDIRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="540">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KOCAELİ / KÖRFEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="541">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">KOCAELİ / KÖRFEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="542">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">KOCAELİ / KÖRFEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="543">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="544">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KONYA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="545">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / AHIRLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="546">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / AKÖREN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="547">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / AKŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="548">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / ALTINEKİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="549">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / BEYŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="550">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / BOZKIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="551">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">KONYA / CİHANBEYLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="552">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KONYA / CİHANBEYLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="553">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / ÇELTİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="554">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KONYA / ÇUMRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="555">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / ÇUMRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="556">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / DERBENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="557">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / DEREBUCAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="558">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / DOĞANHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="559">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / EMİRGAZİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="560">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">KONYA / EREĞLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="561">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KONYA / EREĞLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="562">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / GÜNEYSINIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="563">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / HALKAPINAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="564">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / HÜYÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="565">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / ILGIN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="566">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / KADINHANI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="567">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">KONYA / KARAPINAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="568">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / SARAYÖNÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="569">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / SEYDİŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="570">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KONYA / TUZLUKÇU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="571">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KONYA / YALIHÜYÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="572">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KONYA / YUNAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="573">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">KÜTAHYA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="574">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KÜTAHYA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="575">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KÜTAHYA / ALTINTAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="576">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KÜTAHYA / ASLANAPA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="577">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">KÜTAHYA / ÇAVDARHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="578">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KÜTAHYA / DUMLUPINAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="579">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KÜTAHYA / EMET</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="580">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KÜTAHYA / GEDİZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="581">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KÜTAHYA / PAZARLAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="582">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">KÜTAHYA / TAVŞANLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="583">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MALATYA / YEŞİLYURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="584">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / BATTALGAZİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="585">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MALATYA / AKÇADAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="586">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / AKÇADAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="587">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / ARAPGİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="588">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / ARGUVAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="589">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / DARENDE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="590">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / DOĞANŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="591">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MALATYA / DOĞANYOL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="592">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / HEKİMHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="593">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / KALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="594">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / KULUNCAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="595">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / PÜTÜRGE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="596">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MALATYA / YAZIHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="597">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="598">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / AKHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="599">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / ALAŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="600">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / DEMİRCİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="601">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / GÖLMARMARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="602">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / GÖRDES</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="603">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / KIRKAĞAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="604">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / KÖPRÜBAŞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="605">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / KULA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="606">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / SALİHLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="607">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / SARIGÖL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="608">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / SARUHANLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="609">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / SELENDİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="610">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MANİSA / SOMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="611">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / SOMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="612">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / TURGUTLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="613">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MANİSA / TURGUTLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="614">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">MARDİN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="615">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MARDİN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="616">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MARDİN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="617">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MARDİN / DARGEÇİT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="618">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">MARDİN / DERİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="619">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MARDİN / DERİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="620">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MARDİN / KIZILTEPE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="621">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MARDİN / KIZILTEPE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="622">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MARDİN / MAZIDAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="623">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MARDİN / MİDYAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="624">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MARDİN / MİDYAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="625">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MARDİN / NUSAYBİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="626">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MARDİN / ÖMERLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="627">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MARDİN / YEŞİLLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="628">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MERSİN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="629">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MERSİN / ANAMUR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="630">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MERSİN / AYDINCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="631">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MERSİN / BOZYAZI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="632">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MERSİN / BOZYAZI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="633">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MERSİN / ÇAMLIYAYLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="634">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">MERSİN / ERDEMLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="635">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">MERSİN / ERDEMLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="636">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MERSİN / GÜLNAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="637">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MERSİN / MUT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="638">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MERSİN / SİLİFKE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="639">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MERSİN / TARSUS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="640">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">MUĞLA / MENTEŞE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="641">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MUĞLA / KAVAKLIDERE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="642">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">MUĞLA / KÖYCEĞİZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="643">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">MUĞLA / MİLAS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="644">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">MUĞLA / SEYDİKEMER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="645">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MUĞLA / YATAĞAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="646">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MUŞ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="647">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MUŞ / BULANIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="648">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MUŞ / HASKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="649">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MUŞ / KORKUT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="650">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MUŞ / MALAZGİRT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="651">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">MUŞ / VARTO</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="652">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">NEVŞEHİR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="653">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NEVŞEHİR / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="654">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NEVŞEHİR / DERİNKUYU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="655">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NEVŞEHİR / GÜLŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="656">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NEVŞEHİR / HACIBEKTAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="657">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NEVŞEHİR / KOZAKLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="658">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NEVŞEHİR / ÜRGÜP</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="659">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NİĞDE / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="660">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NİĞDE / ALTUNHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="661">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NİĞDE / BOR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="662">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NİĞDE / ÇAMARDI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="663">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NİĞDE / ÇİFTLİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="664">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">NİĞDE / ULUKIŞLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="665">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ORDU / FATSA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="666">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ORDU / ÜNYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="667">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">OSMANİYE / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="668">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">OSMANİYE / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="669">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">OSMANİYE / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="670">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">OSMANİYE / DÜZİÇİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="671">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">OSMANİYE / KADİRLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="672">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">OSMANİYE / SUMBAS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="673">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">OSMANİYE / TOPRAKKALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="674">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">RİZE / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="675">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAKARYA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="676">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAKARYA / AKYAZI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="677">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">SAKARYA / GEYVE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="678">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAKARYA / GEYVE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="679">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAKARYA / HENDEK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="680">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SAKARYA / HENDEK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="681">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAKARYA / KARAPÜRÇEK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="682">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAKARYA / KAYNARCA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="683">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAKARYA / KOCAALİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="684">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SAKARYA / PAMUKOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="685">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">SAKARYA / PAMUKOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="686">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SAKARYA / PAMUKOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="687">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAKARYA / SÖĞÜTLÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="688">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAKARYA / TARAKLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="689">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SAMSUN / ALAÇAM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="690">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAMSUN / ALAÇAM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="691">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAMSUN / BAFRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="692">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">SAMSUN / KAVAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="693">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SAMSUN / KAVAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="694">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SAMSUN / LADİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="695">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SAMSUN / YAKAKENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="696">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİİRT / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="697">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİİRT / BAYKAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="698">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİİRT / ERUH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="699">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİİRT / KURTALAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="700">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SİİRT / PERVARİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="701">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİİRT / ŞİRVAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="702">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİİRT / TİLLO</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="703">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİNOP / AYANCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="704">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SİNOP / BOYABAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="705">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİNOP / BOYABAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="706">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİNOP / DİKMEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="707">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİNOP / DURAĞAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="708">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİNOP / TÜRKELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="709">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">SİVAS / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="710">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SİVAS / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="711">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / AKINCILAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="712">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / ALTINYAYLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="713">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / DİVRİĞİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="714">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SİVAS / DOĞANŞAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="715">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / GEMEREK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="716">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / GÖLOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="717">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / GÜRÜN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="718">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / HAFİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="719">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / İMRANLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="720">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / KANGAL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="721">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / KOYULHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="722">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / SUŞEHRİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="723">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">SİVAS / ŞARKIŞLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="724">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / ŞARKIŞLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="725">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / ULAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="726">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / YILDIZELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="727">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">SİVAS / ZARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="728">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞANLIURFA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="729">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ŞANLIURFA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="730">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞANLIURFA / AKÇAKALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="731">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞANLIURFA / BİRECİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="732">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞANLIURFA / BOZOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="733">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞANLIURFA / CEYLANPINAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="734">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞANLIURFA / HALFETİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="735">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞANLIURFA / HİLVAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="736">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞANLIURFA / SİVEREK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="737">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞANLIURFA / VİRANŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="738">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞIRNAK / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="739">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞIRNAK / CİZRE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="740">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞIRNAK / GÜÇLÜKONAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="741">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ŞIRNAK / İDİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="742">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ŞIRNAK / İDİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="743">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TEKİRDAĞ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="744">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">TEKİRDAĞ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="745">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TEKİRDAĞ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="746">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TEKİRDAĞ / ÇERKEZKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="747">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">TEKİRDAĞ / HAYRABOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="748">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TEKİRDAĞ / MALKARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="749">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TEKİRDAĞ / MARMARAEREĞLİSİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="750">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">TEKİRDAĞ / MURATLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="751">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TEKİRDAĞ / MURATLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="752">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TEKİRDAĞ / SARAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="753">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">TOKAT / ARTOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="754">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TOKAT / BAŞÇİFTLİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="755">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TOKAT / NİKSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="756">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TOKAT / PAZAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="757">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TOKAT / REŞADİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="758">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TOKAT / SULUSARAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="759">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TOKAT / TURHAL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="760">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TOKAT / YEŞİLYURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="761">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TRABZON / ORTAHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="762">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TUNCELİ / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="763">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TUNCELİ / ÇEMİŞGEZEK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="764">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TUNCELİ / HOZAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="765">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TUNCELİ / MAZGİRT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="766">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TUNCELİ / NAZIMİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="767">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TUNCELİ / OVACIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="768">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">TUNCELİ / PÜLÜMÜR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="769">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">UŞAK / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="770">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">UŞAK / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="771">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">UŞAK / BANAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="772">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">UŞAK / EŞME</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="773">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">UŞAK / KARAHALLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="774">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">UŞAK / SİVASLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="775">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">UŞAK / ULUBEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="776">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">VAN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="777">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">VAN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="778">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">VAN / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="779">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">VAN / BAŞKALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="780">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">VAN / ERCİŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="781">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">VAN / ERCİŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="782">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">VAN / GEVAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="783">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">VAN / GEVAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="784">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">VAN / MURADİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="785">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">VAN / ÖZALP</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="786">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YALOVA / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="787">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">YALOVA / ALTINOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="788">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YALOVA / ALTINOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="789">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YALOVA / ÇİFTLİKKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="790">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">YALOVA / TERMAL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="791">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">YALOVA / TERMAL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="792">
                    <td data-cell-order="0">Müşterek</td>
                    <td data-cell-order="1">YOZGAT / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="793">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">YOZGAT / MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="794">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YOZGAT / AKDAĞMADENİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="795">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">YOZGAT / AYDINCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="796">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YOZGAT / BOĞAZLIYAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="797">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">YOZGAT / ÇANDIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="798">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">YOZGAT / ÇAYIRALAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="799">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YOZGAT / ÇEKEREK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="800">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YOZGAT / KADIŞEHRİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="801">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YOZGAT / SARAYKENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="802">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YOZGAT / SARIKAYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="803">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YOZGAT / SORGUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="804">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YOZGAT / ŞEFAATLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="805">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">YOZGAT / YENİFAKILI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="806">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">YOZGAT / YERKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="807">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ZONGULDAK / ÇAYCUMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="808">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ZONGULDAK / DEVREK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="809">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ZONGULDAK / DEVREK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="810">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ZONGULDAK / EREĞLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="811">
                    <td data-cell-order="0">Müstakil</td>
                    <td data-cell-order="1">ZONGULDAK / EREĞLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="812">
                    <td data-cell-order="0">Müstakil + Müşterek</td>
                    <td data-cell-order="1">ZONGULDAK / EREĞLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="arsa2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                        </tbody>
        
        </table></div>
</content>
</div>
</section>
</main>
<footer>
    <div class="inner">
        <div class="starts">
            <nav class="linksarea">
                <h2 class="sectionTitle" id="bottomLinksBlockTitle">Sayfa Sonu Bağlantıları</h2>
                <ul class="links">
                    <li class="bottomLinksGroup">
                        <h3>e-Devlet Kapısı</h3>
                        <ul>
                            <li>
                                <a >English</a>
                            </li>
                            <li>
                                <a >Hakkımızda</a>
                            </li>
                            <li>
                                <a >Yasal Bildirim</a>
                            </li>
                            <li>
                                <a >KVKK Aydınlatma Yükümlülüğü</a>
                            </li>
                            <li>
                                <a accesskey="8" >Gizlilik ve Kullanım</a>
                            </li>
                            <li>
                                <a >Politikalarımız</a>
                            </li>
                            <li>
                                <a >DETSİS</a>
                            </li>
                            <li>
                                <a >Kurumsal Kimlik</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>e-Hizmetler</h3>
                        <ul>
                            <li>
                                <a >Sık Kullanılan Hizmetler</a>
                            </li>
                            <li>
                                <a >Yeni Eklenen Hizmetler</a>
                            </li>
                            <li>
                                <a  accesskey="h">Kurum Hizmetleri</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>Yardım</h3>
                        <ul>
                            <li>
                                <a  accesskey="6">Genel Yardım</a>
                            </li>
                            <li>
                                <a  accesskey="5">Sıkça Sorulanlar</a>
                            </li>
                            <li>
                                <a >Güvenliğiniz İçin</a>
                            </li>
                            <li>
                                <a >Help For Non-Citizens</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>Bize Ulaşın</h3>
                        <ul>
                            <li>
                                <a  accesskey="9">İletişim</a>
                            </li>
                            <li>
                                <a >CİMER Başvurusu</a>
                            </li>
                        </ul>
                    </li>
                    <li class="bottomLinksGroup">
                        <h3>Erişilebilirlik</h3>
                        <ul>
                            <li>
                                <a href="#" class="textOnlyToggle" data-state="html">Salt Metin Sürümü</a>
                            </li>
                            <li>
                                <a href="#" class="fontSizeToggle" data-state="normal">Daha Belirgin Odaklama</a>
                            </li>
                            <li>
                                <a accesskey="0" >Klavye Kısayolları</a>
                            </li>
                            <li>
                                <a href="/site-haritasi" accesskey="3">Site Haritası</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="right-part">
                <nav class="foot-card">
                    <h2>İletişim Seçenekleri</h2>
                    <div class="card-text">
                        <em>Yardım mı lazım?</em> Aşağıdaki yöntemleri kullanarak bizimle iletişime geçebilirsiniz.
                    </div>
                    <ul>
                        <li>
                            <a href="javascript:;"><i class="fa-regular fa-comments"></i> Hızlı Çözüm Merkezi</a>
                        </li>
                        <li>
                            <a href="javascript:;""><i class="fa-regular fa-envelope"></i> Bize Yazın</a>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa-solid fa-phone-flip"></i> e-Devlet Çağrı Merkezi</a>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa-solid fa-ear-deaf"></i> Engelsiz Çağrı Merkezi</a>
                        </li>
                    </ul>
                </nav>
                <nav class="social-links">
                    <a ><i class="fa-brands fa-facebook-f"></i> Facebook </a>
                    <a ><i class="fa-brands fa-x-twitter"></i> Twitter </a>
                    <a ><i class="fa-brands fa-youtube"></i> Youtube </a>
                    <a ><i class="fa-brands fa-instagram"></i> Instagram </a>
                </nav>
            </div>
        </div>
        <div class="sub-copyright">
            <div class="images">
                <a class="externalLink" rel="external" href="javascript:;">
                  
                </a>
                <a class="externalLink" rel="external" href="javascript:;">
                   
                </a>
            </div>
            <div class="text1">e-Devlet Kapısı’nın kurulması ve yönetilmesi görevi <a href="javascript:;">T.C. Cumhurbaşkanlığı Dijital Dönüşüm Ofisi Başkanlığı</a> tarafından yürütülmekte olup, sistemin geliştirilmesi ve işletilmesi <a class="externalLink" href="http://www.turksat.com.tr" rel="external">Türksat A.Ş.</a> tarafından yapılmaktadır. </div>
        </div>
        <div class="copyright">© <time datetime="2025-01-20">2025</time> Tüm Hakları Saklıdır.
            <a >Gizlilik, Kullanım ve Telif Hakları</a> bildiriminde belirtilen kurallar çerçevesinde hizmet sunulmaktadır.
        </div>
    </div>
</footer>
<a href="#" class="scroll-top hide-on-print" role="button" title="Sayfayı Yukarı Kaydır" style="display: inline;">
    <i class="fa-solid fa-chevron-up"></i>
</a>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"14d1d027c8904f0894e1033694aa6bef","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

</html><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>    [data-notify-text], [data-notify-html]{
        position: relative;    word-wrap: break-word;    width: 380px;    display: block;    text-overflow: clip;    white-space: break-spaces;    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" integrity="sha512-CJ6VRGlIRSV07FmulP+EcCkzFxoJKQuECGbXNjMMkqu7v3QYj37Cklva0Q0D/23zGwjdvoM4Oy+fIIKhcQPZ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
document.querySelectorAll('.selectLink').forEach(function(link){
    link.addEventListener('click', function(e){
        e.preventDefault(); // linkin normal yönlendirmesini engelle

        let row = link.closest('tr');
        let projeAdi = row.cells[0].innerText;
        let il       = row.cells[1].innerText;
        let ilce     = row.cells[2].innerText;

        // Butondan TCKN değerini al
        let tcknButton = document.querySelector('.dropdown1.dropdown-toggle.fast-shortcuts');
        let tckn = tcknButton.innerText.trim(); 
        // "👤 2190137665" gibi gelecektir, ikon kaldırılır
        tckn = tckn.replace(/\D/g, ''); // sadece rakamları bırak

        // Dinamik form oluştur
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = link.href; // linkin hedef sayfası

        // Hidden inputlar ekle
        [['projeAdi', projeAdi], ['il', il], ['ilce', ilce], ['tckn', tckn]].forEach(function(pair){
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = pair[0];
            input.value = pair[1];
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit(); // formu POST ile gönder
    });
});
</script>