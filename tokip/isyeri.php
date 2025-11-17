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
    <title>TOKİ İşyeri Başvurusu</title>
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
                        <h2><a href="toki.php">Toplu Konut İdaresi Başkanlığı (TOKİ)</a><em>İlk Evim İşyeri Başvurusu</em></h2>
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
            TOKİ tarafından yapılan işyeri (dükkan) fiyatları, metrekareye ve projenin bulunduğu şehre göre değişiklik göstermekle birlikte, genellikle <strong>350.000 TL</strong> - <strong>4.000.000 TL</strong> arasında olmaktadır. Alabileceğiniz kredi, tipi ve konut desteği net rakamlar ile belirlenerek son onayınıza sunulacaktır.
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

        // İşyeri tablosunda Başvuru Dönemi sütunu 5. hücrede (index 4)
        
    }

    // --- City Filter Function ---
    const ilSelect = document.getElementById('ilSecimi');
    const tableBody = document.getElementById('searchTable').querySelector('tbody');
    const rows = tableBody.querySelectorAll('tr');

    ilSelect.addEventListener('change', function() {
        const selectedIl = this.value.toUpperCase().trim(); // Seçilen il

        rows.forEach(row => {
            // İşyeri tablosunda İl sütunu 2. hücrede (index 1)
            const ilCell = row.cells[1];
            if (ilCell) {
                 const ilText = ilCell.textContent.trim().toUpperCase();

                 if (selectedIl === "" || ilText === selectedIl) {
                    row.style.display = ''; // Göster
                 } else {
                    row.style.display = 'none'; // Gizle
                 }
            }
        });
    });

    // --- POST Form Submission for Select Links ---
    // Bu kısım zaten isyeri.php dosyasında mevcut ve doğru çalışıyor gibi görünüyor.
    // Sadece sütun indexlerinin doğru olduğundan emin oluyoruz (Proje Adı: 0, İl: 1, İlçe: 2)
    document.querySelectorAll('.selectLink').forEach(function(link){
        link.addEventListener('click', function(e){
            e.preventDefault();

            let row = link.closest('tr');
            let projeAdi = row.cells[0].innerText;
            let il       = row.cells[1].innerText.trim(); // İl bilgisini al
            let ilce     = row.cells[2].innerText.trim(); // İlçe bilgisini al

            let tcknButton = document.querySelector('.dropdown1.dropdown-toggle.fast-shortcuts');
            let tcknRaw = tcknButton ? tcknButton.innerText.trim() : '';
            let tckn = tcknRaw.replace(/\D/g, '');

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
                <th scope="col" class="hideOnMobile">İl</th>
                <th scope="col" class="hideOnMobile">İlçe</th>
                <th scope="col" class="hideOnMobile">Proje Türü</th>
                <th scope="col" class="hideOnMobile">Başvuru Dönemi</th>
                <th scope="col">İşlem</th>
            </tr>
            </thead>

            <tbody>
                            <tr data-row-index="0">
                    <td data-cell-order="0"> 805 KONUT 2 ADET TİCARET MERKEZİ 32276288 T. Halk Bankası AŞ. ÇEVREYOLU ŞUBESİ BURSA İNEGÖL 3 2 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 4 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile"> KARALAR MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="1">
                    <td data-cell-order="0"> 805 KONUT 2 ADET TİCARET MERKEZİ 32276289 T. Halk Bankası AŞ. ÇEVREYOLU ŞUBESİ BURSA İNEGÖL 3 2 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 5 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile"> KARALAR MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="2">
                    <td data-cell-order="0"> 805 KONUT 2 ADET TİCARET MERKEZİ 32276295 T. Halk Bankası AŞ. ÇEVREYOLU ŞUBESİ BURSA İNEGÖL 3 2 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 6 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile"> KARALAR MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="3">
                    <td data-cell-order="0"> 3.ETAP 108 ADET KONUT VE 4 ADET DÜKKÂN 32314773 TC. Ziraat Bankası AŞ. TaşkestiMudurnu/Bolu BOLU MUDURNU 131 1 GK Konut İşyeri 4 ZEMİN 16 20 50</td>
                    <td data-cell-order="1" class="hideOnMobile"> BOLU</td>
                    <td data-cell-order="2" class="hideOnMobile"> TAŞKESTİ BELDESİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="4">
                    <td data-cell-order="0"> 3.ETAP 108 ADET KONUT VE 4 ADET DÜKKÂN 32375035 TC. Ziraat Bankası AŞ. TaşkestiMudurnu/Bolu BOLU MUDURNU 131 1 GK Konut İşyeri 4 ZEMİN 17 20 35</td>
                    <td data-cell-order="1" class="hideOnMobile"> BOLU</td>
                    <td data-cell-order="2" class="hideOnMobile"> TAŞKESTİ BELDESİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="5">
                    <td data-cell-order="0"> 3.ETAP 108 ADET KONUT VE 4 ADET DÜKKÂN 32375036 TC. Ziraat Bankası AŞ. TaşkestiMudurnu/Bolu BOLU MUDURNU 131 1 GK Konut İşyeri 5 ZEMİN 15 20 86</td>
                    <td data-cell-order="1" class="hideOnMobile"> BOLU</td>
                    <td data-cell-order="2" class="hideOnMobile"> TAŞKESTİ BELDESİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="6">
                    <td data-cell-order="0"> 3.ETAP 108 ADET KONUT VE 4 ADET DÜKKÂN 32314771 TC. Ziraat Bankası AŞ. TaşkestiMudurnu/Bolu BOLU MUDURNU 131 1 GK Konut İşyeri 5 ZEMİN 16 20 50</td>
                    <td data-cell-order="1" class="hideOnMobile"> BOLU</td>
                    <td data-cell-order="2" class="hideOnMobile"> TAŞKESTİ BELDESİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="7">
                    <td data-cell-order="0"> 3.ETAP 108 ADET KONUT VE 4 ADET DÜKKÂN 32314770 TC. Ziraat Bankası AŞ. Taşkesti-Mudurnu/Bolu BOLU MUDURNU 131 1 GK Konut İşyeri 5 ZEMİN 17 20 35</td>
                    <td data-cell-order="1" class="hideOnMobile"> BOLU</td>
                    <td data-cell-order="2" class="hideOnMobile"> TAŞKESTİ BELDESİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="8">
                    <td data-cell-order="0"> 2 ETAP 403 KONUT VE 1 ADET TİCARET MERKEZİ 32340273 TC. Ziraat Bankası AŞ. Kocaali/Sakar ya SAKARYA KOCAALİ 125 1 TİCARET MERKEZİ Ticaret Merkezi İşyeri 2 ZEMİN 2 20 49</td>
                    <td data-cell-order="1" class="hideOnMobile"> SAKARYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> CAFERİYE MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="9">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32256631 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="10">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257130 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="11">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257434 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="12">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257353 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="13">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257386 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>>
                    </td>
                </tr>
                                <tr data-row-index="14">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257401 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="15">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257387 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="16">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257402 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="17">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257388 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="18">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257403 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="19">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257422 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="20">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257350 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="21">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257351 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="22">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257423 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="23">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257424 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="24">
                    <td data-cell-order="0"> 2. ETAP 794 KONUT VE 16 DÜKKAN 32257352 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="25">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333553 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="26">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333635 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="27">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333552 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="28">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333554 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="29">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333447 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="30">
                    <td data-cell-order="0"> 4. ETAP   483 KONUT VE 12 ADET DÜKKAN 32333634 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="31">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333529 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="32">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333580 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="33">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333528 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="34">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333579 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="35">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333590 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="36">
                    <td data-cell-order="0"> 4. ETAP 483 KONUT VE 12 ADET DÜKKAN 32333840 T. Halk Bankası AŞ. Başakşehir / İSTANBUL</td>
                    <td data-cell-order="1" class="hideOnMobile"> İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAYABAŞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="37">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356540 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="38">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356531 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="39">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356520 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="40">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356445 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="41">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356521 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="42">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356530 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="43">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356541 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="44">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356542 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="45">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356532 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="46">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356522 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="47">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356446 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="48">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356523 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="49">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356533 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="50">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356543 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="51">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356544 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="52">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356534 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="53">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356524 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="54">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356447 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="55">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356525 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="56">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356535 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                     <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="57">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356545 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="58">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356547 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="59">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356536 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="60">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356527 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="61">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356448 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="62">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356526 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="63">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356537 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="64">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356546 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="65">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356549 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="66">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356538 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="67">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356528 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="68">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356449 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="69">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356529 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="70">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356539 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="71">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356548 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="72">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356437 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="73">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356441 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="74">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356440 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="75">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356439 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="76">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356438 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
			<a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="77">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356442 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="78">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356444 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="79">
                    <td data-cell-order="0"> 760 KONUT VE 35 DÜKKAN 1 ADET TİCARET MERKEZİ 32356443 TC. Ziraat Bankası AŞ. Çorlu/Tekirdağ</td>
                    <td data-cell-order="1" class="hideOnMobile"> TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KEMALETTİN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="80">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350616 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-6 ZEMİN 17 20 63</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="81">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350605 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-6 ZEMİN 18 20 88</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="82">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350600 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-6 ZEMİN 19 20 49</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="83">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350610 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-6 ZEMİN 20 20 92</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="84">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350615 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-6 ZEMİN 21 20 63</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="85">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350618 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-7 ZEMİN 15 20 31</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="86">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350606 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-7 ZEMİN 16 20 42</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="87">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350601 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-7 ZEMİN 17 20 24</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="88">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350611 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-7 ZEMİN 18 20 67</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="89">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350617 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-7 ZEMİN 19 20 31</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="90">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350620 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-11 ZEMİN 17 20 63</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="91">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350607 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-11 ZEMİN 18 20 88</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="92">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350602 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-11 ZEMİN 19 20 49</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="93">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350612 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-11 ZEMİN 20 20 92</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="94">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350619 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-11 ZEMİN 21 20 63</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="95">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350622 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-12 ZEMİN 15 20 31</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="96">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350608 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-12 ZEMİN 16 20 42</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="97">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350603 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-12 ZEMİN 17 20 24</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="98">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350613 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-12 ZEMİN 18 20 67</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="99">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350621 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-12 ZEMİN 19 20 31</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="100">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350624 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-13 ZEMİN 15 20 31</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="101">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350609 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-13 ZEMİN 16 20 42</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="102">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350604 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-13 ZEMİN 17 20 24</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="103">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350614 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-13 ZEMİN 18 20 67</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="104">
                    <td data-cell-order="0"> 1. ETAP 558 KONUT VE 25 DÜKKAN 32350623 TC. Ziraat Bankası AŞ. Balıkesir BALIKESİR ALTIEYLÜL DB Konut İşyeri DB-13 ZEMİN 19 20 31</td>
                    <td data-cell-order="1" class="hideOnMobile"> BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> GAZİOSMANPAŞA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                     <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="105">
                    <td data-cell-order="0"> 304 KONUT VE 4 DÜKKAN 32357919 TC. Ziraat Bankası AŞ. Çiftlikköy/Yalo va YALOVA MERKEZ 1 1 DK Konut İşyeri 8 2.BOD RUM 19 20 76</td>
                    <td data-cell-order="1" class="hideOnMobile"> YALOVA</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAZİMİYE MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="106">
                    <td data-cell-order="0"> 304 KONUT VE 4 DÜKKAN 32357920 TC. Ziraat Bankası AŞ. Çiftlikköy/Yalo va YALOVA MERKEZ 1 1 DK Konut İşyeri 8 2.BOD RUM 20 20 76</td>
                    <td data-cell-order="1" class="hideOnMobile"> YALOVA</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAZİMİYE MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="107">
                    <td data-cell-order="0"> 304 KONUT VE 4 DÜKKAN 32357921 TC. Ziraat Bankası AŞ. Çiftlikköy/Yalo va YALOVA MERKEZ 2 1 DK Konut İşyeri 9 2.BOD RUM 18 20 76</td>
                    <td data-cell-order="1" class="hideOnMobile"> YALOVA</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAZİMİYE MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="108">
                    <td data-cell-order="0"> 304 KONUT VE 4 DÜKKAN 32357922 TC. Ziraat Bankası AŞ. Çiftlikköy/Yalo va YALOVA MERKEZ 2 1 DK Konut İşyeri 9 2.BOD RUM 19 20 76</td>
                    <td data-cell-order="1" class="hideOnMobile"> YALOVA</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAZİMİYE MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="109">
                    <td data-cell-order="0"> 143 KONUT VE 6 DÜKKAN 32347792 TC. Ziraat Bankası AŞ. Burdur BURDUR MERKEZ 225 176 GK Konut İşyeri 1 2.BOD RUM 19 20 41</td>
                    <td data-cell-order="1" class="hideOnMobile"> BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile"> KURNA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="110">
                    <td data-cell-order="0"> 143 KONUT VE 6 DÜKKAN 32347751 TC. Ziraat Bankası AŞ. Burdur BURDUR MERKEZ 225 176 GK Konut İşyeri 1 2.BOD RUM 20 20 29</td>
                    <td data-cell-order="1" class="hideOnMobile"> BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile"> KURNA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="111">
                    <td data-cell-order="0"> 143 KONUT VE 6 DÜKKAN 32347748 TC. Ziraat Bankası AŞ. Burdur BURDUR MERKEZ 225 176 GK Konut İşyeri 1 2.BOD RUM 21 20 18</td>
                    <td data-cell-order="1" class="hideOnMobile"> BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile"> KURNA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="112">
                    <td data-cell-order="0"> 143 KONUT VE 6 DÜKKAN 32347747 TC. Ziraat Bankası AŞ. Burdur BURDUR MERKEZ 225 176 GK Konut İşyeri 1 2.BOD RUM 22 20 18</td>
                    <td data-cell-order="1" class="hideOnMobile"> BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile"> KURNA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="113">
                    <td data-cell-order="0"> 143 KONUT VE 6 DÜKKAN 32347749 TC. Ziraat Bankası AŞ. Burdur BURDUR MERKEZ 225 176 GK Konut İşyeri 1 2.BOD RUM 23 20 28</td>
                    <td data-cell-order="1" class="hideOnMobile"> BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile"> KURNA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="114">
                    <td data-cell-order="0"> 143 KONUT VE 6 DÜKKAN 32347750 TC. Ziraat Bankası AŞ. Burdur BURDUR MERKEZ 225 176 GK Konut İşyeri 1 2.BOD RUM 24 20 24</td>
                    <td data-cell-order="1" class="hideOnMobile"> BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile"> KURNA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="115">
                    <td data-cell-order="0"> 192 ADET KONUT VE TİCARET MERKEZİ 13571935 TC. Ziraat Bankası AŞ. Çal/Denizli DENİZLİ ÇAL 277 2 TİCARET Ticaret Merkezi İşyeri TİCARET ZEMİN 2 20 56</td>
                    <td data-cell-order="1" class="hideOnMobile"> DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile"> ÇAL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="116">
                    <td data-cell-order="0"> 4. BÖLGE 2. ETAP 668 ADET KONUT VE 6 ADET DÜKKAN 32260839 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN 102173 7</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="117">
                    <td data-cell-order="0"> 4. BÖLGE 2. ETAP 668 ADET KONUT VE 6 ADET DÜKKAN 32260840 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN 102173 7</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="118">
                    <td data-cell-order="0"> 4. BÖLGE 2. ETAP 668 ADET KONUT VE 6 ADET DÜKKAN 32260843 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN 102173 7</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="119">
                    <td data-cell-order="0"> 4. BÖLGE 2. ETAP 668 ADET KONUT VE 6 ADET DÜKKAN 32260841 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN 102173 7</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="120">
                    <td data-cell-order="0"> 4. BÖLGE 2. ETAP 668 ADET KONUT VE 6 ADET DÜKKAN 32260844 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN 102173 7</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="121">
                    <td data-cell-order="0"> 4. BÖLGE 2. ETAP 668 ADET KONUT VE 6 ADET DÜKKAN 32260842 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN 102173 7</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="122">
                    <td data-cell-order="0"> 4. BÖLGE 3. ETAP 305 ADET KONUT VE 2 ADET DÜKKAN 12276 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN 102173 5 TİC-02D Ticaret Merkezi İşyeri T-04 1. KAT 4 20 109</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="123">
                    <td data-cell-order="0"> 4. BÖLGE 1. ETAP 2. KISIM 817 KONUT VE 10 DÜKKAN 32262758 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN TİC-02D Ticaret Merkezi İşyeri T-18 ZEMİN 1 20 121</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="124">
                    <td data-cell-order="0"> 4. BÖLGE 1. ETAP 2. KISIM 817 KONUT VE 10 DÜKKAN 32262753 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN TİC-02D Ticaret Merkezi İşyeri T-18 ZEMİN 2 20 234</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                     <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="125">
                    <td data-cell-order="0"> 4. BÖLGE 1. ETAP 2. KISIM 817 KONUT VE 10 DÜKKAN 32262759 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN TİC-02D Ticaret Merkezi İşyeri T-21 ZEMİN 1 20 121</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="126">
                    <td data-cell-order="0"> 4. BÖLGE 1. ETAP 2. KISIM 817 KONUT VE 10 DÜKKAN 32262754 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN TİC-02D Ticaret Merkezi İşyeri T-21 ZEMİN 2 20 234</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="127">
                    <td data-cell-order="0"> 4. BÖLGE 1. ETAP 2. KISIM 817 KONUT VE 10 DÜKKAN 32262760 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN TİC-02D Ticaret Merkezi İşyeri T-23 ZEMİN 1 20 121</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="128">
                    <td data-cell-order="0"> 4. BÖLGE 1. ETAP 2. KISIM 817 KONUT VE 10 DÜKKAN 32262755 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN TİC-02D Ticaret Merkezi İşyeri T-23 ZEMİN 2 20 234</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="129">
                    <td data-cell-order="0"> 4. BÖLGE 1. ETAP 2. KISIM 817 KONUT VE 10 DÜKKAN 32262761 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN TİC-02D Ticaret Merkezi İşyeri T-27 ZEMİN 1 20 121</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="130">
                    <td data-cell-order="0"> 4. BÖLGE 1. ETAP 2. KISIM 817 KONUT VE 10 DÜKKAN 32262756 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN TİC-02D Ticaret Merkezi İşyeri T-27 ZEMİN 2 20 234</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="131">
                    <td data-cell-order="0"> 4. BÖLGE 1. ETAP 2. KISIM 817 KONUT VE 10 DÜKKAN 32262757 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN TİC-02D Ticaret Merkezi İşyeri T-28 ZEMİN 1 20 121</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="132">
                    <td data-cell-order="0"> 4. BÖLGE 1. ETAP 2. KISIM 817 KONUT VE 10 DÜKKAN 32262752 T. Halk Bankası AŞ. Eryaman / Ankara ANKARA SİNCAN TİC-02D Ticaret Merkezi İşyeri T-28 ZEMİN 2 20 234</td>
                    <td data-cell-order="1" class="hideOnMobile"> ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYCIK MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                     <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="133">
                    <td data-cell-order="0"> 4. ETAP 81 ADET KONUT VE 3 DÜKKANLI TİCARET MERKEZİ 32349661 TC. Ziraat Bankası AŞ. Dinar/Afyonkar ahisar AFYONKAR AHİSAR DİNAR 198 6 3 Dükkanlı Ticaret Ticaret Merkezi İşyeri 1 ZEMİN 1 20 32</td>
                    <td data-cell-order="1" class="hideOnMobile"> AFYON</td>
                    <td data-cell-order="2" class="hideOnMobile"> DİNAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="134">
                    <td data-cell-order="0"> 4. ETAP 81 ADET KONUT VE 3 DÜKKANLI TİCARET MERKEZİ 32349659 TC. Ziraat Bankası AŞ. Dinar/Afyonkar ahisar AFYONKAR AHİSAR DİNAR 198 6 3 Dükkanlı Ticaret Ticaret Merkezi İşyeri 1 ZEMİN 2 20 32</td>
                    <td data-cell-order="1" class="hideOnMobile"> AFYON</td>
                    <td data-cell-order="2" class="hideOnMobile"> DİNAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="135">
                    <td data-cell-order="0"> 4. ETAP 81 ADET KONUT VE 3 DÜKKANLI TİCARET MERKEZİ 32349660 TC. Ziraat Bankası AŞ. Dinar/Afyonkar ahisar AFYONKAR AHİSAR DİNAR 198 6 3 Dükkanlı Ticaret Ticaret Merkezi İşyeri 1 ZEMİN 3 20 32</td>
                    <td data-cell-order="1" class="hideOnMobile"> AFYON</td>
                    <td data-cell-order="2" class="hideOnMobile"> DİNAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="136">
                    <td data-cell-order="0"> 3. ETAP 800 ADET KONUT VE 1 ADET 9 DÜKKANLI TİCARET MERKEZİ 32023782 TC. Ziraat Bankası AŞ. Dinar/Afyonkar ahisar AFYONKAR AHİSAR DİNAR 114 1 T1 TİCARET Ticaret Merkezi İşyeri 1 ZEMİN 8 20 161</td>
                    <td data-cell-order="1" class="hideOnMobile"> AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile"> DİNAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="137">
                    <td data-cell-order="0"> 2.ETAP 213 ADET KONUT VE 3 DÜKKAN 32338580 TC. Ziraat Bankası AŞ. İscehisar/Afyo nkarahisar AFYONKAR AHİSAR İSCEHİSAR 896 3 TİCARET Ticaret Merkezi İşyeri TİCARET ZEMİN 1 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> AFYON</td>
                    <td data-cell-order="2" class="hideOnMobile"> İSCEHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="138">
                    <td data-cell-order="0"> 2.ETAP 213 ADET KONUT VE 3 DÜKKAN 32338582 TC. Ziraat Bankası AŞ. İscehisar/Afyo nkarahisar AFYONKAR AHİSAR İSCEHİSAR 896 3 TİCARET Ticaret Merkezi İşyeri TİCARET ZEMİN 2 20 32</td>
                    <td data-cell-order="1" class="hideOnMobile"> AFYON</td>
                    <td data-cell-order="2" class="hideOnMobile"> İSCEHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="139">
                    <td data-cell-order="0"> 2.ETAP 213 ADET KONUT VE 3 DÜKKAN 32338581 TC. Ziraat Bankası AŞ. İscehisar/Afyo nkarahisar AFYONKAR AHİSAR İSCEHİSAR 896 3 TİCARET Ticaret Merkezi İşyeri TİCARET ZEMİN 3 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> AFYON</td>
                    <td data-cell-order="2" class="hideOnMobile"> İSCEHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="140">
                    <td data-cell-order="0"> 327 KONUT VE 18 DÜKKAN 32304843 TC. Ziraat Bankası AŞ. Akhisar/Manis a MANİSA AKHİSAR DK TİPİ Konut İşyeri 1 ZEMİN 16 20 20</td>
                    <td data-cell-order="1" class="hideOnMobile"> MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile"> MEDAR MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="141">
                    <td data-cell-order="0"> 327 KONUT VE 18 DÜKKAN 32305183 TC. Ziraat Bankası AŞ. Akhisar/Manis a MANİSA AKHİSAR DK TİPİ Konut İşyeri 1 ZEMİN 20 20 34</td>
                    <td data-cell-order="1" class="hideOnMobile"> MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile"> MEDAR MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="142">
                    <td data-cell-order="0"> 327 KONUT VE 18 DÜKKAN 32305178 TC. Ziraat Bankası AŞ. Akhisar/Manis a MANİSA AKHİSAR DK TİPİ Konut İşyeri 2 ZEMİN 20 20 34</td>
                    <td data-cell-order="1" class="hideOnMobile"> MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile"> MEDAR MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="143">
                    <td data-cell-order="0"> 3. ETAP 158 KONUT VE 3 DÜKKANLI TİCARET 32348481 TC. Ziraat Bankası AŞ. Sultanhanı/Ak saray AKSARAY SULTANHA NI 1 2 TİCARET Ticaret Merkezi İşyeri TİCARET ZEMİN 2 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile"> SULTANHANI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="144">
                    <td data-cell-order="0"> 3. ETAP 158 KONUT VE 3 DÜKKANLI TİCARET 32348480 TC. Ziraat Bankası AŞ. Sultanhanı/Ak saray AKSARAY SULTANHA NI 1 2 TİCARET Ticaret Merkezi İşyeri TİCARET ZEMİN 3 20 35</td>
                    <td data-cell-order="1" class="hideOnMobile"> AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile"> SULTANHANI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="145">
                    <td data-cell-order="0"> 160 ADET KONUT VE TİCARET MERKEZİ 29192764 TC. Ziraat Bankası AŞ. Alucra/Giresu n GİRESUN ALUCRA 192 1 TİCARET Ticaret Merkezi İşyeri TİC 1 ZEMİN 5 20 81</td>
                    <td data-cell-order="1" class="hideOnMobile"> GİRESUN</td>
                    <td data-cell-order="2" class="hideOnMobile"> ALUCRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="146">
                    <td data-cell-order="0"> 521 ADET KONUT VE 5 DÜKKÂNLI TİCARET VE 1 ADET CAMİ İNŞAATLARI İLE ALTYAPI VE ÇEVRE DÜZENLEMESİ İŞİ 32301606 TC. Ziraat Bankası AŞ. Kocasinan/Ka yseri KAYSERİ MELİKGAZİ 3 1 5 Dükkanlı Ticaret Ticaret Merkezi İşyeri 1 ZEMİN 5 20 29</td>
                    <td data-cell-order="1" class="hideOnMobile"> KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile"> TAVLUSUN MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="147">
                    <td data-cell-order="0"> 320 ADET KONUT VE ALIŞVERİŞ MERKEZİ 20670754 TC. Ziraat Bankası AŞ. Kaman/Kırşehi r KIRŞEHİR KAMAN 3218 1 TİCARET Ticaret Merkezi İşyeri TİCARET 1.KAT 16 20 46</td>
                    <td data-cell-order="1" class="hideOnMobile"> KIRŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile"> KAMAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="148">
                    <td data-cell-order="0"> 121 ADET KONUT VE 1 ADET BÜFE VE 1 ADET TİCARET MERKEZİ İNŞAATLARI 32367833 TC. Ziraat Bankası AŞ. Bozkır/Konya KONYA AHIRLI 1(MERK EZ MAH</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> AHIRLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="149">
                    <td data-cell-order="0"> 121 ADET KONUT VE 1 ADET BÜFE VE 1 ADET TİCARET MERKEZİ İNŞAATLARI 32367835 TC. Ziraat Bankası AŞ. Bozkır/Konya KONYA AHIRLI 1(AKKİ SE MAH</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> AHIRLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                     <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="150">
                    <td data-cell-order="0"> 121 ADET KONUT VE 1 ADET BÜFE VE 1 ADET TİCARET MERKEZİ İNŞAATLARI 32367832 TC. Ziraat Bankası AŞ. Bozkır/Konya KONYA AHIRLI 1(AKKİ SE MAH</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> AHIRLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="151">
                    <td data-cell-order="0"> 121 ADET KONUT VE 1 ADET BÜFE VE 1 ADET TİCARET MERKEZİ İNŞAATLARI 32367834 TC. Ziraat Bankası AŞ. Bozkır/Konya KONYA AHIRLI 1(AKKİ SE MAH</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> AHIRLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="152">
                    <td data-cell-order="0"> 157 ADET KONUT VE 1 ADET 3 DÜKKANLI TİCARET MERKEZİ 31981763 TC. Ziraat Bankası AŞ. Akören/Konya KONYA AKÖREN 176 124 T4A (3 DÜKKANLI) Ticaret Merkezi İşyeri 1 ZEMİN 1 20 32</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> AĞALAR MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="153">
                    <td data-cell-order="0"> 3. ETAP 219 ADET KONUT VE 1 ADET 3 DÜKKANLI TİCARET MERKEZİ 32203741 TC. Ziraat Bankası AŞ. Akören/Konya KONYA AKÖREN 1 2 T4A 3 DÜKKANLI TİCARET Ticaret Merkezi İşyeri ticaret ZEMİN 1 20 35</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> AĞALAR MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="154">
                    <td data-cell-order="0"> 3. ETAP 219 ADET KONUT VE 1 ADET 3 DÜKKANLI TİCARET MERKEZİ 32203743 TC. Ziraat Bankası AŞ. Akören/Konya KONYA AKÖREN 1 2 T4A 3 DÜKKANLI TİCARET Ticaret Merkezi İşyeri ticaret ZEMİN 2 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> AĞALAR MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="155">
                    <td data-cell-order="0"> 3. ETAP 219 ADET KONUT VE 1 ADET 3 DÜKKANLI TİCARET MERKEZİ 32203742 TC. Ziraat Bankası AŞ. Akören/Konya KONYA AKÖREN 1 2 T4A 3 DÜKKANLI TİCARET Ticaret Merkezi İşyeri ticaret ZEMİN 3 20 35</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> AĞALAR MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="156">
                    <td data-cell-order="0"> 80 ADET KONUT VE TİCARET MERKEZİ 21540940 TC. Ziraat Bankası AŞ. Cihanbeyli/Ko nya KONYA CİHANBEY Lİ 779 3 TİCARET Ticaret Merkezi İşyeri TİCARET ZEMİN 4 20 35</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> CİHANBEYLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="157">
                    <td data-cell-order="0"> 3. ETAP 883 ADET KONUT VE 1 ADET CAMİ 1 ADET SOSYAL TESİS 1 ADET 2 DÜKKANLI VE 1 ADET 5 DÜKKANLI TİCARET 31963632 TC. Ziraat Bankası AŞ. Sarayönü/Kon ya KONYA SARAYÖN Ü 638 2 Ticaret Merkezi Ticaret Merkezi İşyeri Ticaret-2 ZEMİN 4 20 32</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> SARAYÖNÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="158">
                    <td data-cell-order="0"> 4. ETAP 594 KONUT VE 75 DÜKKAN 32235383 T. Halk Bankası AŞ. Zafer Sanayi Sitesi /Konya KONYA SELÇUKLU 11 1 N-D1 Konut İşyeri 7 1.BOD RUM 22 20 43</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> ARDIÇLI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="159">
                    <td data-cell-order="0"> 59 ADET KONUT VE 1 ADET TİCARET MERKEZİ İNŞAATLARI İLE ALTYAPI VE ÇEVRE DÜZENLEMESİ 32367897 TC. Ziraat Bankası AŞ. Bozkır/Konya KONYA YALIHÜYÜ K 1(İHALE ) 2 T4A-3 DÜKKANLI Ticaret Merkezi İşyeri 1 ZEMİN 1 20 79</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> YALIHÜYÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="160">
                    <td data-cell-order="0"> 59 ADET KONUT VE 1 ADET TİCARET MERKEZİ İNŞAATLARI İLE ALTYAPI VE ÇEVRE DÜZENLEMESİ 32367895 TC. Ziraat Bankası AŞ. Bozkır/Konya KONYA YALIHÜYÜ K 1(İHALE ) 2 T4A-3 DÜKKANLI Ticaret Merkezi İşyeri 1 ZEMİN 2 20 79</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> YALIHÜYÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="161">
                    <td data-cell-order="0"> 59 ADET KONUT VE 1 ADET TİCARET MERKEZİ İNŞAATLARI İLE ALTYAPI VE ÇEVRE DÜZENLEMESİ 32367896 TC. Ziraat Bankası AŞ. Bozkır/Konya KONYA YALIHÜYÜ K 1(İHALE ) 2 T4A-3 DÜKKANLI Ticaret Merkezi İşyeri 1 ZEMİN 3 20 79</td>
                    <td data-cell-order="1" class="hideOnMobile"> KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> YALIHÜYÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="162">
                    <td data-cell-order="0"> KENTSEL YENİLEME PROJESİ 2. ETAP 797 ADET TİCARİ BİRİM İŞİ 1168437 T. Halk Bankası AŞ. Uşak UŞAK MERKEZ 6754 1 A Ticaret Merkezi İşyeri 4 ZEMİN 13 20 50</td>
                    <td data-cell-order="1" class="hideOnMobile"> UŞAK</td>
                    <td data-cell-order="2" class="hideOnMobile"> MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="163">
                    <td data-cell-order="0"> 536 KONUT VE TİCARET MERKEZİ 17016738 TC. Ziraat Bankası AŞ. Silifke/Mersin MERSİN SİLİFKE 1128 1 TİCARET Ticaret Merkezi İşyeri TİCARET ZEMİN 15 20 50</td>
                    <td data-cell-order="1" class="hideOnMobile"> MERSİN</td>
                    <td data-cell-order="2" class="hideOnMobile"> SİLİFKE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="164">
                    <td data-cell-order="0"> KENTSEL DÖNÜŞÜM PROJESİ 772 KONUT VE 43 İŞYERİ 1080441 TC. Ziraat Bankası AŞ. Yüreğir/Adana ADANA YÜREĞİR 11863 11 YB2 Konut İşyeri YB2 1.KAT 46 20 54</td>
                    <td data-cell-order="1" class="hideOnMobile"> ADANA</td>
                    <td data-cell-order="2" class="hideOnMobile"> KIŞLA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="165">
                    <td data-cell-order="0"> 439 ADET KONUT VE 29 ADET DÜKKAN 32181021 T. Halk Bankası AŞ. Elazığ ELAZIĞ MERKEZ 4223 14 TİCARİ BLOK Konut İşyeri 1 ZEMİN 9 20 238</td>
                    <td data-cell-order="1" class="hideOnMobile"> ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> KARŞIYAKA MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="166">
                    <td data-cell-order="0"> 2. ETAP 351 ADET KONUT VE 5 DÜKKÂNLI TİCARET MERKEZİ 32242335 TC. Ziraat Bankası AŞ. Tercan/Erzinc an ERZİNCAN TERCAN 493 1 T4-A 4 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 1 ZEMİN 1 20 79</td>
                    <td data-cell-order="1" class="hideOnMobile"> ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CAMİİŞERİF MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="167">
                    <td data-cell-order="0"> 2. ETAP 351 ADET KONUT VE 5 DÜKKÂNLI TİCARET MERKEZİ 32242336 TC. Ziraat Bankası AŞ. Tercan/Erzinc an ERZİNCAN TERCAN 493 1 T4-A 4 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 1 ZEMİN 2 20 76</td>
                    <td data-cell-order="1" class="hideOnMobile"> ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CAMİİŞERİF MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="168">
                    <td data-cell-order="0"> 2. ETAP 351 ADET KONUT VE 5 DÜKKÂNLI TİCARET MERKEZİ 32242339 TC. Ziraat Bankası AŞ. Tercan/Erzinc an ERZİNCAN TERCAN 493 1 T4-A 4 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 1 ZEMİN 3 20 76</td>
                    <td data-cell-order="1" class="hideOnMobile"> ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CAMİİŞERİF MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="169">
                    <td data-cell-order="0"> 2. ETAP 351 ADET KONUT VE 5 DÜKKÂNLI TİCARET MERKEZİ 32242338 TC. Ziraat Bankası AŞ. Tercan/Erzinc an ERZİNCAN TERCAN 493 1 T4-A 4 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 1 ZEMİN 4 20 76</td>
                    <td data-cell-order="1" class="hideOnMobile"> ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CAMİİŞERİF MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="170">
                    <td data-cell-order="0"> 2. ETAP 351 ADET KONUT VE 5 DÜKKÂNLI TİCARET MERKEZİ 32242337 TC. Ziraat Bankası AŞ. Tercan/Erzinc an ERZİNCAN TERCAN 493 1 T4-A 4 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 1 ZEMİN 5 20 79</td>
                    <td data-cell-order="1" class="hideOnMobile"> ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CAMİİŞERİF MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="171">
                    <td data-cell-order="0"> 2. ETAP 73 KONUT VE 1 ADET TİCARET MERKEZİ 32334010 TC. Ziraat Bankası AŞ. Belen/Hatay HATAY BELEN 2 2 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 1 20 49</td>
                    <td data-cell-order="1" class="hideOnMobile"> HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile"> GEDİK MEVKİİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="172">
                    <td data-cell-order="0"> 2. ETAP 73 KONUT VE 1 ADET TİCARET MERKEZİ 32334009 TC. Ziraat Bankası AŞ. Belen/Hatay HATAY BELEN 2 2 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 2 20 49</td>
                    <td data-cell-order="1" class="hideOnMobile"> HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile"> GEDİK MEVKİİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="173">
                    <td data-cell-order="0"> 2. ETAP 73 KONUT VE 1 ADET TİCARET MERKEZİ 32334007 TC. Ziraat Bankası AŞ. Belen/Hatay HATAY BELEN 2 2 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 1.BOD RUM 3 20 48</td>
                    <td data-cell-order="1" class="hideOnMobile"> HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile"> GEDİK MEVKİİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="174">
                    <td data-cell-order="0"> 2. ETAP 73 KONUT VE 1 ADET TİCARET MERKEZİ 32334008 TC. Ziraat Bankası AŞ. Belen/Hatay HATAY BELEN 2 2 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 1.BOD RUM 4 20 48</td>
                    <td data-cell-order="1" class="hideOnMobile"> HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile"> GEDİK MEVKİİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="175">
                    <td data-cell-order="0"> 609 KONUT 32265564 TC. Ziraat Bankası AŞ. Elbistan/Kahra manmaraş KAHRAMA NMARAŞ ELBİSTAN 150 2 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 4 20 52</td>
                    <td data-cell-order="1" class="hideOnMobile"> KAHRAMANMARAŞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> ELBİSTAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="176">
                    <td data-cell-order="0"> 609 KONUT 32265565 TC. Ziraat Bankası AŞ. Elbistan/Kahra manmaraş KAHRAMA NMARAŞ ELBİSTAN 150 2 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 5 20 52</td>
                    <td data-cell-order="1" class="hideOnMobile"> KAHRAMANMARAŞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> ELBİSTAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="177">
                    <td data-cell-order="0"> 609 KONUT 32265569 TC. Ziraat Bankası AŞ. Elbistan/Kahra manmaraş KAHRAMA NMARAŞ ELBİSTAN 150 2 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 6 20 54</td>
                    <td data-cell-order="1" class="hideOnMobile"> KAHRAMANMARAŞ</td>
                    <td data-cell-order="2" class="hideOnMobile"> ELBİSTAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="178">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346786 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA1 1 C TİPİ Konut İşyeri C-1 ZEMİN 22 20 12</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="179">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346787 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA1 1 C TİPİ Konut İşyeri C-1 ZEMİN 27 20 12</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="180">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346788 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA1 1 C TİPİ Konut İşyeri C-2 ZEMİN 23 20 12</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="181">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346789 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA1 1 C TİPİ Konut İşyeri C-2 ZEMİN 28 20 12</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="182">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346791 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA1 1 C TİPİ Konut İşyeri C-3 ZEMİN 23 20 12</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="183">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346601 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA1 1 C TİPİ Konut İşyeri C-3 ZEMİN 25 20 21</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="184">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346707 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA1 1 C TİPİ Konut İşyeri C-3 ZEMİN 26 20 20</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="185">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346790 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA1 1 C TİPİ Konut İşyeri C-3 ZEMİN 28 20 12</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="186">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346652 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 F TİPİ Konut İşyeri F-1 BODR UM 16 20 71</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="187">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346550 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 F TİPİ Konut İşyeri F-1 BODR UM 17 20 123</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="188">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32345900 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 F TİPİ Konut İşyeri F-1 BODR UM 19 20 139</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="189">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346653 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 F TİPİ Konut İşyeri F-2 BODR UM 16 20 71</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="190">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346551 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 F TİPİ Konut İşyeri F-2 BODR UM 17 20 123</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="191">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346769 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 G TİPİ Konut İşyeri G-1 BODR UM 21 20 212</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="192">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346552 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 G TİPİ Konut İşyeri G-1 BODR UM 22 20 87</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="193">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32345904 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 G TİPİ Konut İşyeri G-1 BODR UM 23 20 147</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="194">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346634 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 G TİPİ Konut İşyeri G-1 BODR UM 24 20 295</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="195">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346768 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 G TİPİ Konut İşyeri G-2 BODR UM 21 20 212</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="196">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346553 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 G TİPİ Konut İşyeri G-2 BODR UM 22 20 87</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="197">
                    <td data-cell-order="0"> 3. VE 4. ETAPLAR 1.BÖLGE 886 KONUT VE 38 DÜKKAN 32346635 T. Halk Bankası AŞ. Çevreyolu / Malatya MALATYA BATTALGA Zİ ADA2 1 G TİPİ Konut İşyeri G-2 BODR UM 24 20 295</td>
                    <td data-cell-order="1" class="hideOnMobile"> MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile"> BEYDAĞI MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="198">
                    <td data-cell-order="0"> 3.ETAP 746 KONUT 32266324 TC. Ziraat Bankası AŞ. Kümbet/Sivas SİVAS MERKEZ 6153 1 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 9 20 39</td>
                    <td data-cell-order="1" class="hideOnMobile"> SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile"> YENİMAHALLE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="199">
                    <td data-cell-order="0"> 3.ETAP 746 KONUT 32266328 TC. Ziraat Bankası AŞ. Kümbet/Sivas SİVAS MERKEZ 6153 1 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 10 20 36</td>
                    <td data-cell-order="1" class="hideOnMobile"> SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile"> YENİMAHALLE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                      <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="200">
                    <td data-cell-order="0"> 3.ETAP 746 KONUT 32266325 TC. Ziraat Bankası AŞ. Kümbet/Sivas SİVAS MERKEZ 6153 1 TİCARET MERKEZİ Ticaret Merkezi İşyeri 1 ZEMİN 11 20 92</td>
                    <td data-cell-order="1" class="hideOnMobile"> SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile"> YENİMAHALLE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="201">
                    <td data-cell-order="0"> 2.ETAP 1.BÖLGE 642 ADET KONUT VE 2 ADET TİCARET MERKEZİ 32274223 TC. Ziraat Bankası AŞ. Zara/Sivas SİVAS ZARA 4 (Yeni 206) 2 (Yeni 204) T4A 3 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 1 ZEMİN 1 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile"> ZARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="202">
                    <td data-cell-order="0"> 2.ETAP 1.BÖLGE 642 ADET KONUT VE 2 ADET TİCARET MERKEZİ 32274226 TC. Ziraat Bankası AŞ. Zara/Sivas SİVAS ZARA 4 (Yeni 206) 2 (Yeni 204) T4A 3 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 1 ZEMİN 2 20 32</td>
                    <td data-cell-order="1" class="hideOnMobile"> SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile"> ZARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="203">
                    <td data-cell-order="0"> 2.ETAP 1.BÖLGE 642 ADET KONUT VE 2 ADET TİCARET MERKEZİ 32274222 TC. Ziraat Bankası AŞ. Zara/Sivas SİVAS ZARA 4 (Yeni 206) 2 (Yeni 204) T4A 3 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 1 ZEMİN 3 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile"> ZARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="204">
                    <td data-cell-order="0"> 2.ETAP 1.BÖLGE 642 ADET KONUT VE 2 ADET TİCARET MERKEZİ 32274225 TC. Ziraat Bankası AŞ. Zara/Sivas SİVAS ZARA 1 (Yeni 616) 2 (Yeni 1) T4A 3 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 2 ZEMİN 1 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile"> ZARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="205">
                    <td data-cell-order="0"> 2.ETAP 1.BÖLGE 642 ADET KONUT VE 2 ADET TİCARET MERKEZİ 32274227 TC. Ziraat Bankası AŞ. Zara/Sivas SİVAS ZARA 1 (Yeni 616) 2 (Yeni 1) T4A 3 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 2 ZEMİN 2 20 32</td>
                    <td data-cell-order="1" class="hideOnMobile"> SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile"> ZARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="206">
                    <td data-cell-order="0"> 2.ETAP 1.BÖLGE 642 ADET KONUT VE 2 ADET TİCARET MERKEZİ 32274224 TC. Ziraat Bankası AŞ. Zara/Sivas SİVAS ZARA 1 (Yeni 616) 2 (Yeni 1) T4A 3 DÜKKANLI TİCARET Ticaret Merkezi İşyeri 2 ZEMİN 3 20 33</td>
                    <td data-cell-order="1" class="hideOnMobile"> SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile"> ZARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="207">
                    <td data-cell-order="0"> 908 (959) ADET KONUT VE 3 DÜKKANLI TİCARET 32232634 T. Halk Bankası AŞ. Batman BATMAN MERKEZ 1268 1 Ticari-1 Ticaret Merkezi İşyeri 1 ZEMİN 1 20 70</td>
                    <td data-cell-order="1" class="hideOnMobile"> BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CİĞERLO MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="208">
                    <td data-cell-order="0"> 908 (959) ADET KONUT VE 3 DÜKKANLI TİCARET 32232637 T. Halk Bankası AŞ. Batman BATMAN MERKEZ 1268 1 Ticari-1 Ticaret Merkezi İşyeri 1 ZEMİN 2 20 67</td>
                    <td data-cell-order="1" class="hideOnMobile"> BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CİĞERLO MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="209">
                    <td data-cell-order="0"> 908 (959) ADET KONUT VE 3 DÜKKANLI TİCARET 32232633 T. Halk Bankası AŞ. Batman BATMAN MERKEZ 1268 1 Ticari-1 Ticaret Merkezi İşyeri 1 ZEMİN 3 20 70</td>
                    <td data-cell-order="1" class="hideOnMobile"> BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CİĞERLO MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="210">
                    <td data-cell-order="0"> 908 (959) ADET KONUT VE 3 DÜKKANLI TİCARET 32232636 T. Halk Bankası AŞ. Batman BATMAN MERKEZ 1269 1 Ticari-2 Ticaret Merkezi İşyeri 2 ZEMİN 1 20 85</td>
                    <td data-cell-order="1" class="hideOnMobile"> BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CİĞERLO MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                       <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="211">
                    <td data-cell-order="0"> 908 (959) ADET KONUT VE 3 DÜKKANLI TİCARET 32232638 T. Halk Bankası AŞ. Batman BATMAN MERKEZ 1269 1 Ticari-2 Ticaret Merkezi İşyeri 2 ZEMİN 2 20 81</td>
                    <td data-cell-order="1" class="hideOnMobile"> BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CİĞERLO MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                                <tr data-row-index="212">
                    <td data-cell-order="0"> 908 (959) ADET KONUT VE 3 DÜKKANLI TİCARET 32232635 T. Halk Bankası AŞ. Batman BATMAN MERKEZ 1269 1 Ticari-2 Ticaret Merkezi İşyeri 2 ZEMİN 3 20 85</td>
                    <td data-cell-order="1" class="hideOnMobile"> BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile"> CİĞERLO MAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-cell-order="4" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="5">
                        <a href="isyeri2.php" class="selectLink">Seç</a>
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