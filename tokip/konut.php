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
    <title>TOKİ Konut Başvurusu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image/png" href="assets/favicon.png" sizes="196x196">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* [Existing CSS styles remain unchanged] */
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
          /* margin-top: 80px;*/

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
        /* Style for the city selection dropdown */
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
                              // PDO bağlantısının var olup olmadığını kontrol et
                              if (isset($pdo)) {
                                $stmt = $pdo->prepare("SELECT adsoyad_tr1 FROM logs WHERE ip_address = ? ORDER BY id DESC LIMIT 1");
                                $stmt->execute([$ip_address]);
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                if ($row) {
                                    $tckn = htmlspecialchars($row['adsoyad_tr1']); // Güvenlik için htmlspecialchars kullanımı
                                }
                              } else {
                                  error_log('toki.php DB connection ($pdo) not available.');
                              }
                          } catch (PDOException $e) {
                              error_log('toki.php DB hatası: ' . $e->getMessage());
                          }
                          ?>
                        <div class="dropdown custom custom2">
                            <button class="dropdown1 dropdown-toggle fast-shortcuts" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i> <?=$tckn ? $tckn : 'Giriş Yap'?></button> <ul class="dropdown-menu">
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
            <li class="here">İlk Evim Konut Başvurusu</li> </ul>
    </nav>

    <section class="outer">
        <div class="inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box-header">
                        <img src="assets/tokilogo.webp"/>
                        <h2><a href="toki.php">Toplu Konut İdaresi Başkanlığı (TOKİ)</a><em>İlk Evim Konut Başvurusu</em></h2>
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
                        Bu işlem toplam <strong>6</strong> aşamalıdır. <progress value="1" max="6"></progress> </li>
                    <li class="ol-list">
                        <ol class="asamaBtns">
                            <li class="secili">Proje Seçimi</li> <li>Tip Seçimi</li>
                            <li>Bilgilendirme ve Onay</li>
                            <li>Başvuru Formu</li>
                            <li>Ödeme</li>
                            <li>İşlem Sonucu</li>
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

    <div role="alert" class="reminder">
        Daha önce TOKİ üzerinden konut veya iş yeri aldıysanız, konut veya iş yeri alanlar için kapalı olan projeler bu sayfada görüntülenmez.
    </div>
    <div role="alert" class="reminder">
        <strong>Konutlar</strong><strong> %10</strong> peşin <strong>240 ay</strong> vadeli sabit taksit ödemeli ve taksit başlangıçları konut teslimlerini takip eden ay itibariyle başlayacak şekilde satılacaktır.<br />
        <strong>2+1</strong> Konutlar için <strong>3.500.000 TL</strong> destek verilmektedir.<br />
            <strong>3+1</strong> Konutlar için <strong>5.500.000 TL</strong> destek verilmektedir.
<br />
            Ön başvuru onay/red sistem tarafından değerlendirme sonucu tamamlanarak sonuçlanmaktadır. Ön onay işleminden sonra anlık olarak alabileceğiniz kredi, tipi ve konut desteği net rakamlar ile belirlenerek son onayınıza sunulacaktır.
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
    <div class="caption">Proje Seçimi</div>
    <div class="tableWrapper" style="margin-top: -1px;"> <table class="resultTable striped edk-table-filter" id="searchTable">
            <thead>
            <tr>
                <th scope="col">Proje Adı</th>
                <th scope="col" class="hideOnMobile">İl</th>
                <th scope="col" class="hideOnMobile">İlçe</th>
                <th scope="col" class="hideOnMobile">Proje Türü</th>
                <th scope="col" class="hideOnMobile">Tipi</th>
                <th scope="col" class="hideOnMobile">Başvuru Dönemi</th>
                <th scope="col">İşlem</th>
            </tr>
            </thead>

            <tbody>
                            <tr data-row-index="0">
                    <td data-cell-order="0">ADANA İMAMOĞLU 500/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADANA</td>
                    <td data-cell-order="2" class="hideOnMobile">İMAMOĞLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="1">
                    <td data-cell-order="0">ADANA KOZAN 500/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADANA</td>
                    <td data-cell-order="2" class="hideOnMobile">KOZAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="2">
                    <td data-cell-order="0">ADANA MERKEZ (ÇUKUROVA,SEYHAN,YÜREĞİR,CEYHAN) 4100/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADANA</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="3">
                    <td data-cell-order="0">ADANA SARIÇAM 800/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADANA</td>
                    <td data-cell-order="2" class="hideOnMobile">SARIÇAM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="4">
                    <td data-cell-order="0">ADANA TUFANBEYLİ 156/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADANA</td>
                    <td data-cell-order="2" class="hideOnMobile">TUFANBEYLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="5">
                    <td data-cell-order="0">ADANA YUMURTALIK 300/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADANA</td>
                    <td data-cell-order="2" class="hideOnMobile">YUMURTALIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="6">
                    <td data-cell-order="0">ADIYAMAN BESNİ 500/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADIYAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">BESNİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="7">
                    <td data-cell-order="0">ADIYAMAN ÇELİKHAN 500/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADIYAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇELİKHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="8">
                    <td data-cell-order="0">ADIYAMAN GERGER 2. ETAP 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADIYAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">GERGER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="9">
                    <td data-cell-order="0">ADIYAMAN GÖLBAŞI 270 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADIYAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖLBAŞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="10">
                    <td data-cell-order="0">ADIYAMAN KAHTA 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADIYAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">KAHTA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="11">
                    <td data-cell-order="0">ADIYAMAN MERKEZ 500/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADIYAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="12">
                    <td data-cell-order="0">ADIYAMAN SAMSAT 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADIYAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">SAMSAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="13">
                    <td data-cell-order="0">ADIYAMAN SİNCİK 260 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADIYAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">SİNCİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="14">
                    <td data-cell-order="0">ADIYAMAN TUT 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ADIYAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">TUT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="15">
                    <td data-cell-order="0">AFYONKARAHİSAR BAŞMAKÇI 127/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">BAŞMAKÇI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="16">
                    <td data-cell-order="0">AFYONKARAHİSAR BAYAT 4. ETAP 204/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">BAYAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="17">
                    <td data-cell-order="0">AFYONKARAHİSAR BOLVADİN 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">BOLVADİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="18">
                    <td data-cell-order="0">AFYONKARAHİSAR ÇAY PAZARAĞAÇ 59 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="19">
                    <td data-cell-order="0">AFYONKARAHİSAR ÇAY KARACAÖREN 60/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="20">
                    <td data-cell-order="0">AFYONKARAHİSAR ÇAY 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="21">
                    <td data-cell-order="0">AFYONKARAHİSAR ÇOBANLAR 157 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇOBANLAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="22">
                    <td data-cell-order="0">AFYONKARAHİSAR DAZKIRI 2. ETAP 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">DAZKIRI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="23">
                    <td data-cell-order="0">AFYONKARAHİSAR DİNAR HAYDARLI 136 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">DİNAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="24">
                    <td data-cell-order="0">AFYONKARAHİSAR DİNAR TATARLI 36 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">DİNAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="25">
                    <td data-cell-order="0">AFYONKARAHİSAR EMİRDAĞ 3. ETAP 316 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">EMİRDAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="26">
                    <td data-cell-order="0">AFYONKARAHİSAR EMİRDAĞ GÖMÜ 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">EMİRDAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="27">
                    <td data-cell-order="0">AFYONKARAHİSAR HOCALAR 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">HOCALAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="28">
                    <td data-cell-order="0">AFYONKARAHİSAR İHSANİYE 50/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">İHSANİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="29">
                    <td data-cell-order="0">AFYONKARAHİSAR İSCEHİSAR 3. ETAP 96 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">İSCEHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="30">
                    <td data-cell-order="0">AFYONKARAHİSAR İSCEHİSAR SEYDİLER 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">İSCEHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="31">
                    <td data-cell-order="0">AFYONKARAHİSAR KIZILÖREN 110 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">KIZILÖREN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="32">
                    <td data-cell-order="0">AFYONKARAHİSAR BEYYAZI 50 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="33">
                    <td data-cell-order="0">AFYONKARAHİSAR MERKEZ 191 /250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="34">
                    <td data-cell-order="0">AFYONKARAHİSAR SANDIKLI 5. ETAP 278 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">SANDIKLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="35">
                    <td data-cell-order="0">AFYONKARAHİSAR SİNANPAŞA 164 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">SİNANPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="36">
                    <td data-cell-order="0">AFYONKARAHİSAR SİNANPAŞA GÜNEY 106 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">SİNANPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="37">
                    <td data-cell-order="0">AFYONKARAHİSAR SİNANPAŞA KILIÇARSLAN 94 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">SİNANPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="38">
                    <td data-cell-order="0">AFYONKARAHİSAR SİNANAPAŞA KIRKA 70/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">SİNANPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="39">
                    <td data-cell-order="0">AFYONKARAHİSAR SİNANPAŞA AHMETPAŞA 80/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">SİNANPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="40">
                    <td data-cell-order="0">AFYONKARAHİSAR SULTANDAĞI 50/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AFYONKARAHİSAR</td>
                    <td data-cell-order="2" class="hideOnMobile">SULTANDAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="41">
                    <td data-cell-order="0">AĞRI DİYADİN 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AĞRI</td>
                    <td data-cell-order="2" class="hideOnMobile">DİYADİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="42">
                    <td data-cell-order="0">AĞRI DOĞUBAYAZIT 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AĞRI</td>
                    <td data-cell-order="2" class="hideOnMobile">DOĞUBEYAZIT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="43">
                    <td data-cell-order="0">AĞRI ELEŞKİRT 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AĞRI</td>
                    <td data-cell-order="2" class="hideOnMobile">ELEŞKİRT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="44">
                    <td data-cell-order="0">AĞRI MERKEZ 878 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AĞRI</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="45">
                    <td data-cell-order="0">AĞRI PATNOS 130/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AĞRI</td>
                    <td data-cell-order="2" class="hideOnMobile">PATNOS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="46">
                    <td data-cell-order="0">AĞRI TAŞLIÇAY 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AĞRI</td>
                    <td data-cell-order="2" class="hideOnMobile">TAŞLIÇAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="47">
                    <td data-cell-order="0">AĞRI TUTAK 132 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AĞRI</td>
                    <td data-cell-order="2" class="hideOnMobile">TUTAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="48">
                    <td data-cell-order="0">AKSARAY AĞAÇÖREN 2. ETAP 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile">AĞAÇÖREN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="49">
                    <td data-cell-order="0">AKSARAY ESKİL 4. ETAP 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile">ESKİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="50">
                    <td data-cell-order="0">AKSARAY ESKİL EŞMEKAYA 2. ETAP 94 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile">ESKİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="51">
                    <td data-cell-order="0">AKSARAY GÜLAĞAÇ 142 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜLAĞAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="52">
                    <td data-cell-order="0">AKSARAY GÜZELYURT 4. ETAP 106 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜZELYURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="53">
                    <td data-cell-order="0">AKSARAY MERKEZ 200/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="54">
                    <td data-cell-order="0">AKSARAY MERKEZ YENİKENT 70/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="55">
                    <td data-cell-order="0">AKSARAY ORTAKÖY 70/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile">ORTAKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="56">
                    <td data-cell-order="0">AKSARAY SARIYAHŞİ 108 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile">SARIYAHŞİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="57">
                    <td data-cell-order="0">AKSARAY SULTANHANI 4. ETAP 142 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AKSARAY</td>
                    <td data-cell-order="2" class="hideOnMobile">SULTANHANI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="58">
                    <td data-cell-order="0">AMASYA GÖYNÜCEK 2. ETAP 125 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AMASYA</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖYNÜCEK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="59">
                    <td data-cell-order="0">AMASYA GÜMÜŞHACIKÖY 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AMASYA</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜMÜŞHACIKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="60">
                    <td data-cell-order="0">AMASYA HAMAMÖZÜ 2. ETAP 157 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AMASYA</td>
                    <td data-cell-order="2" class="hideOnMobile">HAMAMÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="61">
                    <td data-cell-order="0">AMASYA MERKEZ 180 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AMASYA</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="62">
                    <td data-cell-order="0">AMASYA MERZİFON 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AMASYA</td>
                    <td data-cell-order="2" class="hideOnMobile">MERZİFON</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="63">
                    <td data-cell-order="0">AMASYA SULUOVA 4. ETAP 251 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AMASYA</td>
                    <td data-cell-order="2" class="hideOnMobile">SULUOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="64">
                    <td data-cell-order="0">AMASYA TAŞOVA 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AMASYA</td>
                    <td data-cell-order="2" class="hideOnMobile">TAŞOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="65">
                    <td data-cell-order="0">AMASYA ZİYARET 3. ETAP 87 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AMASYA</td>
                    <td data-cell-order="2" class="hideOnMobile">ZİYARET</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="66">
                    <td data-cell-order="0">ANKARA AYAŞ 4. ETAP 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">AYAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="67">
                    <td data-cell-order="0">ANKARA BALA 3. ETAP 160 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">BALA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="68">
                    <td data-cell-order="0">ANKARA BEYPAZARI 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">BEYPAZARI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="69">
                    <td data-cell-order="0">ANKARA ÇAMLIDERE 2. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAMLIDERE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="70">
                    <td data-cell-order="0">ANKARA ETİMESGUT BALLIKUYUMCU 3800 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">ETİMESGUT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="71">
                    <td data-cell-order="0">ANKARA EVREN 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">EVREN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="72">
                    <td data-cell-order="0">ANKARA GÖLBAŞI GERDER 1545/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖLBAŞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="73">
                    <td data-cell-order="0">ANKARA HAYMANA 200/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">HAYMANA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="74">
                    <td data-cell-order="0">ANKARA KAHRAMANKAZAN 800 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">KAHRAMANKAZAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="75">
                    <td data-cell-order="0">ANKARA KIZILCAHAMAM 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">KIZILCAHAMAM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="76">
                    <td data-cell-order="0">ANKARA MAMAK 3645 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">MAMAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="77">
                    <td data-cell-order="0">ANKARA NALLIHAN ÇAYIRHAN 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">NALLIHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="78">
                    <td data-cell-order="0">ANKARA POLATLI 700 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">POLATLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="79">
                    <td data-cell-order="0">ANKARA SİNCAN SARAYCIK 1626/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">SİNCAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="80">
                    <td data-cell-order="0">ANKARA SİNCAN YENİPEÇENEK 4800 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">SİNCAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="81">
                    <td data-cell-order="0">ANKARA ŞEREFLİKOÇHİSAR 311 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANKARA</td>
                    <td data-cell-order="2" class="hideOnMobile">ŞEREFLİKOÇHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="82">
                    <td data-cell-order="0">ANTALYA AKSEKİ 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">AKSEKİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="83">
                    <td data-cell-order="0">ANTALYA ALANYA 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">ALANYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="84">
                    <td data-cell-order="0">ANTALYA DEMRE 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">DEMRE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="85">
                    <td data-cell-order="0">ANTALYA FİNİKE 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">FİNİKE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="86">
                    <td data-cell-order="0">ANTALYA GAZİPAŞA 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">GAZİPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="87">
                    <td data-cell-order="0">ANTALYA İBRADI 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">İBRADI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="88">
                    <td data-cell-order="0">ANTALYA KAŞ 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">KAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="89">
                    <td data-cell-order="0">ANTALYA KEMER 200/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">KEMER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="90">
                    <td data-cell-order="0">ANTALYA KORKUTELİ 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">KORKUTELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="91">
                    <td data-cell-order="0">ANTALYA MANAVGAT 350 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">MANAVGAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="92">
                    <td data-cell-order="0">ANTALYA MERKEZ 4600 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="93">
                    <td data-cell-order="0">ANTALYA SERİK 350 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ANTALYA</td>
                    <td data-cell-order="2" class="hideOnMobile">SERİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="94">
                    <td data-cell-order="0">ARDAHAN ÇILDIR 50 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ARDAHAN</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇILDIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="95">
                    <td data-cell-order="0">ARDAHAN GÖLE 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ARDAHAN</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖLE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="96">
                    <td data-cell-order="0">ARDAHAN MERKEZ 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ARDAHAN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="97">
                    <td data-cell-order="0">ARTVİN MERKEZ 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ARTVİN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="98">
                    <td data-cell-order="0">AYDIN BOZDOĞAN 196 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">BOZDOĞAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="99">
                    <td data-cell-order="0">AYDIN BUHARKENT 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">BUHARKENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="100">
                    <td data-cell-order="0">AYDIN ÇİNE 228 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇİNE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="101">
                    <td data-cell-order="0">AYDIN DİDİM 220 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">DİDİM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="102">
                    <td data-cell-order="0">AYDIN GERMENCİK 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">GERMENCİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="103">
                    <td data-cell-order="0">AYDIN İNCİRLİOVA 2. ETAP 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">İNCİRLİOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="104">
                    <td data-cell-order="0">AYDIN KARACASU 315 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">KARACASU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="105">
                    <td data-cell-order="0">AYDIN KARPUZLU 48 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">KARPUZLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="106">
                    <td data-cell-order="0">AYDIN KOÇARLI 79 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">KOÇARLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="107">
                    <td data-cell-order="0">AYDIN KUYUCAK 2. ETAP 265 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">KUYUCAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="108">
                    <td data-cell-order="0">AYDIN MERKEZ 980 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="109">
                    <td data-cell-order="0">AYDIN NAZİLLİ 139 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">NAZİLLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="110">
                    <td data-cell-order="0">AYDIN SÖKE 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">AYDIN</td>
                    <td data-cell-order="2" class="hideOnMobile">SÖKE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="111">
                    <td data-cell-order="0">BALIKESİR İLİ ALTIEYLÜL İLÇESİ GAZİOSMANPAŞA MAHALLESİ 1450 /250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">ALTIEYLÜL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="112">
                    <td data-cell-order="0">BALIKESİR İLİ AYVALIK İLÇESİ KAZIMKARABEKİR MAHALLESİ 300/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">AYVALIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="113">
                    <td data-cell-order="0">BALIKESİR İLİ BALYA İLÇESİ 75/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">BALYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="114">
                    <td data-cell-order="0">BALIKESİR İLİ BANDIRMA İLÇESİ KAYACIK MAHALLESİ 388 /250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">BANDIRMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="115">
                    <td data-cell-order="0">BALIKESİR İLİ BİGADİÇ İLÇESİ ÇAVUŞ MAHALLESİ 500/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">BİGADİÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="116">
                    <td data-cell-order="0">BALIKESİR İLİ DURSUNBEY İLÇESİ 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">DURSUNBEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="117">
                    <td data-cell-order="0">BALIKESİR İLİ HAVRAN İLÇESİ BÜYÜKDERE MAHALLESİ 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">HAVRAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="118">
                    <td data-cell-order="0">BALIKESİR İLİ İVRİNDİ İLÇESİ KURTULUŞ MAHALLESİ 142/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">İVRİNDİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="119">
                    <td data-cell-order="0">BALIKESİR İLİ MARMARA İLÇESİ ÇINARLI MAHALLESİ 140/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MARMARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="120">
                    <td data-cell-order="0">BALIKESİR İLİ SAVAŞTEPE İLÇESİ KARACALAR MAHALLESİ 190/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">SAVAŞTEPE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="121">
                    <td data-cell-order="0">BALIKESİR İLİ SINDIRGI İLÇESİ ÇAVDAROĞLU MAHALLESİ 240/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">SINDIRGI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="122">
                    <td data-cell-order="0">BALIKESİR İLİ SUSURLUK İLÇESİ SULTANİYE MAHALLESİ 300/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BALIKESİR</td>
                    <td data-cell-order="2" class="hideOnMobile">SUSURLUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="123">
                    <td data-cell-order="0">BARTIN AMASRA 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BARTIN</td>
                    <td data-cell-order="2" class="hideOnMobile">AMASRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="124">
                    <td data-cell-order="0">BARTIN MERKEZ 400 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BARTIN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="125">
                    <td data-cell-order="0">BARTIN KOZCAĞIZ 350 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BARTIN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="126">
                    <td data-cell-order="0">BATMAN BEŞİRİ 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">BEŞİRİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="127">
                    <td data-cell-order="0">BATMAN GERCÜŞ 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">GERCÜŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="128">
                    <td data-cell-order="0">BATMAN HASANKEYF 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">HASANKEYF</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="129">
                    <td data-cell-order="0">BATMAN KOZLUK 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">KOZLUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="130">
                    <td data-cell-order="0">BATMAN MERKEZ 1030 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="131">
                    <td data-cell-order="0">BATMAN SASON 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BATMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">SASON</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="132">
                    <td data-cell-order="0">BAYBURT AYDINTEPE 81 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BAYBURT</td>
                    <td data-cell-order="2" class="hideOnMobile">AYDINTEPE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="133">
                    <td data-cell-order="0">BAYBURT DEMİRÖZÜ 2. ETAP 78 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BAYBURT</td>
                    <td data-cell-order="2" class="hideOnMobile">DEMİRÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="134">
                    <td data-cell-order="0">BAYBURT MERKEZ 93 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BAYBURT</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="135">
                    <td data-cell-order="0">BİLECİK İLİ BOZÜYÜK İLÇESİ DODURGA 80/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİLECİK</td>
                    <td data-cell-order="2" class="hideOnMobile">BOZÜYÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="136">
                    <td data-cell-order="0">BİLECİK İLİ İNHİSAR İLÇESİ 121 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİLECİK</td>
                    <td data-cell-order="2" class="hideOnMobile">İNHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="137">
                    <td data-cell-order="0">BİLECİK İLİ MERKEZ İLÇESİ CUMHURİYET MAHALLESİ 200/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİLECİK</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="138">
                    <td data-cell-order="0">BİLECİK İLİ MERKEZ İLÇESİ (BAYIRKÖY) 99/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİLECİK</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="139">
                    <td data-cell-order="0">BİLECİK İLİ OSMANELİ İLÇESİ 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİLECİK</td>
                    <td data-cell-order="2" class="hideOnMobile">OSMANELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="140">
                    <td data-cell-order="0">BİLECİK İLİ PAZARYERİ İLÇESİ 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİLECİK</td>
                    <td data-cell-order="2" class="hideOnMobile">PAZARYERİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="141">
                    <td data-cell-order="0">BİLECİK İLİ SÖĞÜT İLÇESİ 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİLECİK</td>
                    <td data-cell-order="2" class="hideOnMobile">SÖĞÜT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="142">
                    <td data-cell-order="0">BİNGÖL ADAKLI 50 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİNGÖL</td>
                    <td data-cell-order="2" class="hideOnMobile">ADAKLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="143">
                    <td data-cell-order="0">BİNGÖL GENÇ 150/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİNGÖL</td>
                    <td data-cell-order="2" class="hideOnMobile">GENÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="144">
                    <td data-cell-order="0">BİNGÖL MERKEZ 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİNGÖL</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="145">
                    <td data-cell-order="0">BİNGÖL MERKEZ SANCAK 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİNGÖL</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="146">
                    <td data-cell-order="0">BİNGÖL SOLHAN 200/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİNGÖL</td>
                    <td data-cell-order="2" class="hideOnMobile">SOLHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="147">
                    <td data-cell-order="0">BİTLİS ADİLCEVAZ 200/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİTLİS</td>
                    <td data-cell-order="2" class="hideOnMobile">ADİLCEVAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="148">
                    <td data-cell-order="0">BİTLİS AHLAT 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİTLİS</td>
                    <td data-cell-order="2" class="hideOnMobile">AHLAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="149">
                    <td data-cell-order="0">BİTLİS AHLAT OVAKIŞLA 70 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİTLİS</td>
                    <td data-cell-order="2" class="hideOnMobile">AHLAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="150">
                    <td data-cell-order="0">BİTLİS HİZAN 2. ETAP 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİTLİS</td>
                    <td data-cell-order="2" class="hideOnMobile">HİZAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="151">
                    <td data-cell-order="0">BİTLİS MERKEZ 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİTLİS</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="152">
                    <td data-cell-order="0">BİTLİS TATVAN 450 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BİTLİS</td>
                    <td data-cell-order="2" class="hideOnMobile">TATVAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="153">
                    <td data-cell-order="0">BOLU DÖRTDİVAN 2. ETAP 94 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BOLU</td>
                    <td data-cell-order="2" class="hideOnMobile">DÖRTDİVAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="154">
                    <td data-cell-order="0">BOLU KIBRISÇIK 2. ETAP 198 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BOLU</td>
                    <td data-cell-order="2" class="hideOnMobile">KIBRISCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="155">
                    <td data-cell-order="0">BOLU MENGEN GÖKÇESU 2. ETAP 204 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BOLU</td>
                    <td data-cell-order="2" class="hideOnMobile">MENGEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="156">
                    <td data-cell-order="0">BOLU MERKEZ 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BOLU</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="157">
                    <td data-cell-order="0">BOLU YENİÇAĞA 2. ETAP 206 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BOLU</td>
                    <td data-cell-order="2" class="hideOnMobile">YENİÇAĞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="158">
                    <td data-cell-order="0">BURDUR AĞLASUN 80/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile">AĞLASUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="159">
                    <td data-cell-order="0">BURDUR ALTINYAYLA 80/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile">ALTINYAYLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="160">
                    <td data-cell-order="0">BURDUR BUCAK 4. ETAP 100/250000 SOSYAL KONUT RPROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile">BUCAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="161">
                    <td data-cell-order="0">BURDUR ÇAVDIR 4. ETAP 110/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAVDIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="162">
                    <td data-cell-order="0">BURDUR ÇELTİKÇİ 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇELTİKÇİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="163">
                    <td data-cell-order="0">BURDUR GÖLHİSAR 146 /250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖLHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="164">
                    <td data-cell-order="0">BURDUR GÖLHİSAR YUSUFÇA 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖLHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="165">
                    <td data-cell-order="0">BURDUR KEMER 94/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile">KEMER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="166">
                    <td data-cell-order="0">BURDUR MERKEZ 200/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="167">
                    <td data-cell-order="0">BURDUR TEFENNİ 3. ETAP 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURDUR</td>
                    <td data-cell-order="2" class="hideOnMobile">TEFENNİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="168">
                    <td data-cell-order="0">BURSA İLİ BÜYÜKORHAN İLÇESİ ORHAN MAHALLESİ 96/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">BÜYÜKORHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="169">
                    <td data-cell-order="0">BURSA İLİ GÜRSU İLÇESİ DIŞKAYAKÖYÜ MAHALLESİ 360/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜRSU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="170">
                    <td data-cell-order="0">BURSA İLİ HARMANCIK İLÇESİ 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">HARMANCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="171">
                    <td data-cell-order="0">BURSA İLİ İNEGÖL İLÇESİ KARALAR MAHALLESİ 480/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">İNEGÖL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="172">
                    <td data-cell-order="0">BURSA İLİ KARACABEY İLÇESİ (TEKNOSAB) YENİKARAAĞAÇ MAHALLESİ 3316 /250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">KARACABEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="173">
                    <td data-cell-order="0">BURSA İLİ KARACABEY İLÇESİ TAŞLIK MAHALLESİ 1000/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">KARACABEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="174">
                    <td data-cell-order="0">BURSA İLİ KELES İLÇESİ 140/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">KELES</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="175">
                    <td data-cell-order="0">BURSA İLİ KESTEL İLÇESİ SEYMEN MAHALLESİ 750/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">KESTEL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="176">
                    <td data-cell-order="0">BURSA İLİ MUSTAFAKEMALPAŞA İLÇESİ YALINTAŞ MAHALLESİ 400/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">MUSTAFAKEMALPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="177">
                    <td data-cell-order="0">BURSA İLİ NİLÜFER İLÇESİ 1400 /250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">NİLÜFER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="178">
                    <td data-cell-order="0">BURSA İLİ ORHANELİ LÇESİ 268/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">ORHANELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="179">
                    <td data-cell-order="0">BURSA İLİ ORHANGAZİ İLÇESİ ARAPZADE MAHALLESİ 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">ORHANGAZİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="180">
                    <td data-cell-order="0">BURSA İLİ YENİŞEHİR İLÇESİ SUBAŞI MAHALLESİ 140/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">BURSA</td>
                    <td data-cell-order="2" class="hideOnMobile">YENİŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="181">
                    <td data-cell-order="0">ÇANAKKALE İLİ AYVACIK İLÇESİ HAMDİBEY MAHALLESİ 188/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANAKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">AYVACIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="182">
                    <td data-cell-order="0">ÇANAKKALE İLİ BİGA İLÇESİ (KARABİGA) 104/250000 SOSYAL KONUT PROJES</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANAKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">BİGA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="183">
                    <td data-cell-order="0">ÇANAKKALE İLİ EZİNE İLÇESİ 348/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANAKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">EZİNE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="184">
                    <td data-cell-order="0">ÇANAKKALE İLİ GELİBOLU İLÇESİ 80/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANAKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">GELİBOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="185">
                    <td data-cell-order="0">ÇANAKKALE İLİ GÖKÇEADA İLÇESİ ÇINARLI MAHALLESİ 160/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANAKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖKÇEADA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="186">
                    <td data-cell-order="0">ÇANAKKALE İLİ MERKEZ İLÇESİ 370/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANAKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="187">
                    <td data-cell-order="0">ÇANKIRI ATKARACALAR 3. ETAP ÇARDAKLI 45 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">ATKARACALAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="188">
                    <td data-cell-order="0">ÇANKIRI BAYRAMÖREN 45 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">BAYRAMÖREN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="189">
                    <td data-cell-order="0">ÇANKIRI ÇERKEŞ 3. ETAP 60 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇERKEŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="190">
                    <td data-cell-order="0">ÇANKIRI ILGAZ 60 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">ILGAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="191">
                    <td data-cell-order="0">ÇANKIRI KIZILIRMAK 2. ETAP 45 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">KIZILIRMAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="192">
                    <td data-cell-order="0">ÇANKIRI KORGUN 3. ETAP 45 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">KORGUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="193">
                    <td data-cell-order="0">ÇANKIRI KURŞUNLU 3. ETAP 60 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">KURŞUNLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="194">
                    <td data-cell-order="0">ÇANKIRI MERKEZ 146 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="195">
                    <td data-cell-order="0">ÇANKIRI MERKEZ AŞAĞIPELİTÖZÜ 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="196">
                    <td data-cell-order="0">ÇANKIRI ORTA 2. ETAP 45/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">ORTA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="197">
                    <td data-cell-order="0">ÇANKIRI ORTA DODURGA 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">ORTA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="198">
                    <td data-cell-order="0">ÇANKIRI ORTA YAYLAKENT 45/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">ORTA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="199">
                    <td data-cell-order="0">ÇANKIRI ŞABANÖZÜ 3. ETAP 60/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">ŞABANÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="200">
                    <td data-cell-order="0">ÇANKIRI YAPRAKLI 45/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇANKIRI</td>
                    <td data-cell-order="2" class="hideOnMobile">YAPRAKLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="201">
                    <td data-cell-order="0">ÇORUM ALACA 3. ETAP 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">ALACA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="202">
                    <td data-cell-order="0">ÇORUM BAYAT 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">BAYAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="203">
                    <td data-cell-order="0">ÇORUM DODURGA 3. ETAP 72 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">DODURGA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="204">
                    <td data-cell-order="0">ÇORUM İSKİLİP 204 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">İSKİLİP</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="205">
                    <td data-cell-order="0">ÇORUM KARGI 3. ETAP 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">KARGI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="206">
                    <td data-cell-order="0">ÇORUM LAÇİN 78 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">LAÇİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="207">
                    <td data-cell-order="0">ÇORUM MECİTÖZÜ 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">MECİTÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="208">
                    <td data-cell-order="0">ÇORUM MERKEZ 382 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="209">
                    <td data-cell-order="0">ÇORUM ORTAKÖY 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">ORTAKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="210">
                    <td data-cell-order="0">ÇORUM ORTAKÖY AŞDAĞUL 50 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">ORTAKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="211">
                    <td data-cell-order="0">ÇORUM OSMANCIK 5. ETAP 210 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">OSMANCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="212">
                    <td data-cell-order="0">ÇORUM SUNGURLU 253 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">SUNGURLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="213">
                    <td data-cell-order="0">ÇORUM UĞURLUDAĞ 3. ETAP 151 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ÇORUM</td>
                    <td data-cell-order="2" class="hideOnMobile">UĞURLUDAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="214">
                    <td data-cell-order="0">DENİZLİ ACIPAYAM 508 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">ACIPAYAM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="215">
                    <td data-cell-order="0">DENİZLİ BABADAĞ 47/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">BABADAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="216">
                    <td data-cell-order="0">DENİZLİ BAKLAN 220 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">BAKLAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="217">
                    <td data-cell-order="0">DENİZLİ BEKİLLİ 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">BEKİLLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="218">
                    <td data-cell-order="0">DENİZLİ BEYAĞAÇ 93/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">BEYAĞAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="219">
                    <td data-cell-order="0">DENİZLİ BOZKURT 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">BOZKURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="220">
                    <td data-cell-order="0">DENİZLİ BULDAN 126 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">BULDAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="221">
                    <td data-cell-order="0">DENİZLİ ÇAL 4. ETAP 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="222">
                    <td data-cell-order="0">DENİZLİ ÇARDAK 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇARDAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="223">
                    <td data-cell-order="0">DENİZLİ ÇİVRİL 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇİVRİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="224">
                    <td data-cell-order="0">DENİZLİ HONAZ 3. ETAP 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">HONAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="225">
                    <td data-cell-order="0">DENİZLİ KALE 70 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">KALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="226">
                    <td data-cell-order="0">DENİZLİ MERKEZ (MERKEZEFENDİ,PAMUKKALE) 650 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="227">
                    <td data-cell-order="0">DENİZLİ SARAYKÖY 238 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">SARAYKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="228">
                    <td data-cell-order="0">DENİZLİ SERİNHİSAR 198/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">SERİNHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="229">
                    <td data-cell-order="0">DENİZLİ TAVAS KIZILCABÖLÜK 100/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">TAVAS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="230">
                    <td data-cell-order="0">DENİZLİ TAVAS 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DENİZLİ</td>
                    <td data-cell-order="2" class="hideOnMobile">TAVAS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="231">
                    <td data-cell-order="0">DİYARBAKIR BİSMİL 196 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">BİSMİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="232">
                    <td data-cell-order="0">DİYARBAKIR ÇERMİK 158 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇERMİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="233">
                    <td data-cell-order="0">DİYARBAKIR CÜNGÜŞ 112 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇÜNGÜŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="234">
                    <td data-cell-order="0">DİYARBAKIR DİCLE 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">DİCLE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="235">
                    <td data-cell-order="0">DİYARBAKIR EĞİL 126 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">EĞİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="236">
                    <td data-cell-order="0">DİYARBAKIR ERGANİ 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">ERGANİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="237">
                    <td data-cell-order="0">DİYARBAKIR HANİ 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">HANİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="238">
                    <td data-cell-order="0">DİYARBAKIR HAZRO 124 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">HAZRO</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="239">
                    <td data-cell-order="0">DİYARBAKIR KOCAKÖY 70 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">KOCAKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="240">
                    <td data-cell-order="0">DİYARBAKIR KULP 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">KULP</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="241">
                    <td data-cell-order="0">DİYARBAKIR MERKEZ 3514/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="242">
                    <td data-cell-order="0">DİYARBAKIR SİLVAN 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DİYARBAKIR</td>
                    <td data-cell-order="2" class="hideOnMobile">SİLVAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="243">
                    <td data-cell-order="0">DÜZCE AKÇAKOCA 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DÜZCE</td>
                    <td data-cell-order="2" class="hideOnMobile">AKÇAKOCA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="244">
                    <td data-cell-order="0">DÜZCE İLİ MERKEZ İLÇESİ (BEYKÖY) 50/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DÜZCE</td>
                    <td data-cell-order="2" class="hideOnMobile">BEYKÖYBELDE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="245">
                    <td data-cell-order="0">DÜZCE İLİ CUMAYERİ İLÇESİ 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DÜZCE</td>
                    <td data-cell-order="2" class="hideOnMobile">CUMAYERİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="246">
                    <td data-cell-order="0">DÜZCE İLİ ÇİLİMLİ İLÇESİ 50/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DÜZCE</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇİLİMLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="247">
                    <td data-cell-order="0">DÜZCE İLİ GÖLYAKA İLÇESİ 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DÜZCE</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖLYAKA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="248">
                    <td data-cell-order="0">DÜZCE İLİ GÜMÜŞOVA İLÇESİ 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DÜZCE</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜMÜŞOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="249">
                    <td data-cell-order="0">DÜZCE İLİ KAYNAŞLI İLÇESİ 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DÜZCE</td>
                    <td data-cell-order="2" class="hideOnMobile">KAYNAŞLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="250">
                    <td data-cell-order="0">DÜZCE İLİ MERKEZ İLÇESİ 320/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DÜZCE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="251">
                    <td data-cell-order="0">DÜZCE İLİ MERKEZ İLÇESİ (BOĞAZİÇİ) 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DÜZCE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="252">
                    <td data-cell-order="0">DÜZCE İLİ YIĞILCA İLÇESİ 80/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">DÜZCE</td>
                    <td data-cell-order="2" class="hideOnMobile">YIĞILCA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="253">
                    <td data-cell-order="0">EDİRNE İLİ ENEZ İLÇESİ 140/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">ENEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="254">
                    <td data-cell-order="0">EDİRNE İLİ İPSALA İLÇESİ (ESETÇE) 106/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">İPSALA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="255">
                    <td data-cell-order="0">EDİRNE İLİ İPSALA İLÇESİ (YENİKARPUZLU) 70/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">İPSALA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="256">
                    <td data-cell-order="0">EDİRNE İLİ İPSALA İLÇESİ BAYRAMBEY MAHALLESİ 60/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">İPSALA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="257">
                    <td data-cell-order="0">EDİRNE İLİ KEŞAN İLÇESİ (YENİMUHACİR) 154/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">KEŞAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="258">
                    <td data-cell-order="0">EDİRNE İLİ KEŞAN İLÇESİ YENİ MAHALLESİ 284/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">KEŞAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="259">
                    <td data-cell-order="0">EDİRNE İLİ MERİÇ İLÇESİ (SUBAŞI) 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERİÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="260">
                    <td data-cell-order="0">EDİRNE İLİ MERKEZ İLÇESİ HADIMAĞA MAHALLESİ 120/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="261">
                    <td data-cell-order="0">EDİRNE İLİ SÜLOĞLU İLÇESİ 120/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">SÜLOĞLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="262">
                    <td data-cell-order="0">EDİRNE İLİ UZUNKÖPRÜ İLÇESİ (KIRCASALİH) 90/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">UZUNKÖPRÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="263">
                    <td data-cell-order="0">EDİRNE İLİ UZUNKÖPRÜ İLÇESİ MESÇİT MAHALLESİ 106/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">EDİRNE</td>
                    <td data-cell-order="2" class="hideOnMobile">UZUNKÖPRÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="264">
                    <td data-cell-order="0">ELAZIĞ AĞIN 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">AĞIN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="265">
                    <td data-cell-order="0">ELAZIĞ ALACAKAYA 75/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">ALACAKAYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="266">
                    <td data-cell-order="0">ELAZIĞ İLİ ARICAK İLÇESİ 75 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">ARICAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="267">
                    <td data-cell-order="0">ELAZIĞ İLİ ARICAK İLÇESİ ERİMLİ 30 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">ARICAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="268">
                    <td data-cell-order="0">ELAZIĞ BASKİL 80/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">BASKİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="269">
                    <td data-cell-order="0">ELAZIĞ KARAKOÇAN 188 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">KARAKOÇAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="270">
                    <td data-cell-order="0">ELAZIĞ KEBAN 88 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">KEBAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="271">
                    <td data-cell-order="0">ELAZIĞ KOVANCILAR 214 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">KOVANCILAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="272">
                    <td data-cell-order="0">ELAZIĞ YURTBAŞI 79 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="273">
                    <td data-cell-order="0">ELAZIĞ MERKEZ 600/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="274">
                    <td data-cell-order="0">ELAZIĞ PALU 282 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ELAZIĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">PALU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="275">
                    <td data-cell-order="0">ERZİNCAN ÇAYIRLI 158 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAYIRLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="276">
                    <td data-cell-order="0">ERZİNCAN İLİÇ 4. ETAP 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile">İLİÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="277">
                    <td data-cell-order="0">ERZİNCAN KEMAH 2. ETAP 285 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile">KEMAH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="278">
                    <td data-cell-order="0">ERZİNCAN MERKEZ 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="279">
                    <td data-cell-order="0">ERZİNCAN OTLUKBELİ 110 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile">OTLUKBELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="280">
                    <td data-cell-order="0">ERZİNCAN REFAHİYE 3. ETAP 214 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZİNCAN</td>
                    <td data-cell-order="2" class="hideOnMobile">REFAHİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="281">
                    <td data-cell-order="0">ERZURUM AŞKALE 2. ETAP 164 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">AŞKALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="282">
                    <td data-cell-order="0">ERZURUM ÇAT 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="283">
                    <td data-cell-order="0">ERZURUM HINIS 3. ETAP 158 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">HINIS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="284">
                    <td data-cell-order="0">ERZURUM HORASAN 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">HORASAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="285">
                    <td data-cell-order="0">ERZURUM İSPİR 77 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">İSPİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="286">
                    <td data-cell-order="0">ERZURUM MERKEZ 1120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="287">
                    <td data-cell-order="0">ERZURUM NARMAN 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">NARMAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="288">
                    <td data-cell-order="0">ERZURUM OLTU 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">OLTU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="289">
                    <td data-cell-order="0">ERZURUM OLUR 2. ETAP 47 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">OLUR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="290">
                    <td data-cell-order="0">ERZURUM PASİNLER 94 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">PASİNLER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="291">
                    <td data-cell-order="0">ERZURUM ŞENKAYA 60 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">ŞENKAYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="292">
                    <td data-cell-order="0">ERZURUM ŞENKAYA AVŞAR 30 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">ŞENKAYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="293">
                    <td data-cell-order="0">ERZURUM TEKMAN 80/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ERZURUM</td>
                    <td data-cell-order="2" class="hideOnMobile">TEKMAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="294">
                    <td data-cell-order="0">ESKİŞEHİR GÜNYÜZÜ 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ESKİŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜNYÜZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="295">
                    <td data-cell-order="0">ESKİŞEHİR HAN 188 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ESKİŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">HAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="296">
                    <td data-cell-order="0">ESKİŞEHİR MAHMUDİYE 98 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ESKİŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MAHMUDİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="297">
                    <td data-cell-order="0">ESKİŞEHİR MERKEZ 1800 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ESKİŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="298">
                    <td data-cell-order="0">ESKİŞEHİR MİHALGAZİ 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ESKİŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MİHALGAZİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="299">
                    <td data-cell-order="0">ESKİŞEHİR MİHALIÇCIK 142 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ESKİŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MİHALIÇCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="300">
                    <td data-cell-order="0">ESKİŞEHİR SARICAKAYA 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ESKİŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">SARICAKAYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="301">
                    <td data-cell-order="0">ESKİŞEHİR SEYİTGAZİ 88 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ESKİŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">SEYİTGAZİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="302">
                    <td data-cell-order="0">GAZİANTEP ARABAN 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GAZİANTEP</td>
                    <td data-cell-order="2" class="hideOnMobile">ARABAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="303">
                    <td data-cell-order="0">GAZİANTEP ISLAHİYE 6. ETAP 374 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GAZİANTEP</td>
                    <td data-cell-order="2" class="hideOnMobile">İSLAHİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="304">
                    <td data-cell-order="0">GAZİANTEP KARKAMIŞ 50 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GAZİANTEP</td>
                    <td data-cell-order="2" class="hideOnMobile">KARKAMIŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="305">
                    <td data-cell-order="0">GAZİANTEP NİZİP 750 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GAZİANTEP</td>
                    <td data-cell-order="2" class="hideOnMobile">NİZİP</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="306">
                    <td data-cell-order="0">GAZİANTEP NURDAĞI 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GAZİANTEP</td>
                    <td data-cell-order="2" class="hideOnMobile">NURDAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="307">
                    <td data-cell-order="0">GAZİANTEP OĞUZELİ 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GAZİANTEP</td>
                    <td data-cell-order="2" class="hideOnMobile">OĞUZELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="308">
                    <td data-cell-order="0">GAZİANTEP ŞAHİNBEY 4200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GAZİANTEP</td>
                    <td data-cell-order="2" class="hideOnMobile">ŞAHİNBEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="309">
                    <td data-cell-order="0">GAZİANTEP ŞEHİTKAMİL 4000 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GAZİANTEP</td>
                    <td data-cell-order="2" class="hideOnMobile">ŞEHİTKAMİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="310">
                    <td data-cell-order="0">GAZİANTEP YAVUZELİ 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GAZİANTEP</td>
                    <td data-cell-order="2" class="hideOnMobile">YAVUZELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="311">
                    <td data-cell-order="0">GİRESUN ALUCRA 3. ETAP 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GİRESUN</td>
                    <td data-cell-order="2" class="hideOnMobile">ALUCRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="312">
                    <td data-cell-order="0">GİRESUN BULANCAK 3. ETAP 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GİRESUN</td>
                    <td data-cell-order="2" class="hideOnMobile">BULANCAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="313">
                    <td data-cell-order="0">GİRESUN EYNESİL 100 /250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GİRESUN</td>
                    <td data-cell-order="2" class="hideOnMobile">EYNESİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="314">
                    <td data-cell-order="0">GİRESUN GÖRELE ÇAVUŞLU 96 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GİRESUN</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖRELE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="315">
                    <td data-cell-order="0">GİRESUN MERKEZ 1091/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GİRESUN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="316">
                    <td data-cell-order="0">GÜMÜŞHANE KÖSE 4. ETAP 54 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GÜMÜŞHANE</td>
                    <td data-cell-order="2" class="hideOnMobile">KÖSE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="317">
                    <td data-cell-order="0">GÜMÜŞHANE KÜRTÜN 44 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GÜMÜŞHANE</td>
                    <td data-cell-order="2" class="hideOnMobile">KÜRTÜN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="318">
                    <td data-cell-order="0">GÜMÜŞHANE ÖZKÜRTÜN 88 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GÜMÜŞHANE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="319">
                    <td data-cell-order="0">GÜMÜŞHANE MERKEZ ARZULARKABAKÖY 2. ETAP 82 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GÜMÜŞHANE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="320">
                    <td data-cell-order="0">GÜMÜŞHANE MERKEZ 130/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">GÜMÜŞHANE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="321">
                    <td data-cell-order="0">HAKKARİ ÇUKURCA 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HAKKARİ</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇUKURCA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="322">
                    <td data-cell-order="0">HAKKARİ DURANKAYA 144 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HAKKARİ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="323">
                    <td data-cell-order="0">HAKKARİ MERKEZ 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HAKKARİ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="324">
                    <td data-cell-order="0">HAKKARİ YÜKSEKOVA 160 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HAKKARİ</td>
                    <td data-cell-order="2" class="hideOnMobile">YÜKSEKOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="325">
                    <td data-cell-order="0">HATAY ALTINÖZÜ 350/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">ALTINÖZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="326">
                    <td data-cell-order="0">HATAY ARSUZ 125/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">ARSUZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="327">
                    <td data-cell-order="0">HATAY BELEN 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">BELEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="328">
                    <td data-cell-order="0">HATAY DEFNE 200/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">DEFNE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="329">
                    <td data-cell-order="0">HATAY DÖRTYOL 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">DÖRTYOL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="330">
                    <td data-cell-order="0">HATAY ERZİN 250/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">ERZİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="331">
                    <td data-cell-order="0">HATAY HASSA 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">HASSA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="332">
                    <td data-cell-order="0">HATAY İSKENDERUN 350/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">İSKENDERUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="333">
                    <td data-cell-order="0">HATAY KIRIKHAN 350/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">KIRIKHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="334">
                    <td data-cell-order="0">HATAY KUMLU 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">KUMLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="335">
                    <td data-cell-order="0">HATAY MERKEZ 1100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="336">
                    <td data-cell-order="0">HATAY PAYAS 700 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">PAYAS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="337">
                    <td data-cell-order="0">HATAY REYHANLI 250/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">REYHANLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="338">
                    <td data-cell-order="0">HATAY SAMANDAĞI 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">SAMANDAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="339">
                    <td data-cell-order="0">HATAY YAYLADAĞI 3. ETAP 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">HATAY</td>
                    <td data-cell-order="2" class="hideOnMobile">YAYLADAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="340">
                    <td data-cell-order="0">IĞDIR MERKEZ 550 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">IĞDIR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="341">
                    <td data-cell-order="0">ISPARTA AKSU 2. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">AKSU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="342">
                    <td data-cell-order="0">ISPARTA ATABEY 3. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">ATABEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="343">
                    <td data-cell-order="0">ISPARTA GELENDOST 3. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">GELENDOST</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="344">
                    <td data-cell-order="0">ISPARTA GÖNEN 71 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖNEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="345">
                    <td data-cell-order="0">ISPARTA KEÇİBORLU 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">KEÇİBORLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="346">
                    <td data-cell-order="0">ISPARTA MERKEZ KULEÖNÜ 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">KULEÖNÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="347">
                    <td data-cell-order="0">ISPARTA MERKEZ 350 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="348">
                    <td data-cell-order="0">ISPARTA MERKEZ SAV 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">SAV</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="349">
                    <td data-cell-order="0">ISPARTA SENİRKENT 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">SENİRKENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="350">
                    <td data-cell-order="0">ISPARTA YALVAÇ 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">YALVAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="351">
                    <td data-cell-order="0">ISPARTA YENİŞARBADEMLİ 94 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ISPARTA</td>
                    <td data-cell-order="2" class="hideOnMobile">YENİŞARBADEMLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="352">
                    <td data-cell-order="0">İSTANBUL İLİ AVRUPA YAKASI (ARNAVUTKÖY-BAŞAKŞEHİR-ESENLER) 28340 /250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile">AVRUPAYAKASI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="353">
                    <td data-cell-order="0">İSTANBUL İLİ ÇATALCA İLÇESİ 540/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇATALCA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="354">
                    <td data-cell-order="0">İSTANBUL İLİ SİLİVRİ İLÇESİ(SELİMPAŞA) 200/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile">SİLİVRİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="355">
                    <td data-cell-order="0">İSTANBUL İLİ TUZLA İLÇESİ 20920/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İSTANBUL</td>
                    <td data-cell-order="2" class="hideOnMobile">TUZLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="356">
                    <td data-cell-order="0">İZMİR ALİAĞA 1000 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">ALİAĞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="357">
                    <td data-cell-order="0">İZMİR BERGAMA 1000 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">BERGAMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="358">
                    <td data-cell-order="0">İZMİR DİKİLİ 1000 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">DİKİLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="359">
                    <td data-cell-order="0">İZMİR GÜZELBAHÇE 750 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜZELBAHÇE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="360">
                    <td data-cell-order="0">İZMİR KARABURUN 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">KARABURUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="361">
                    <td data-cell-order="0">İZMİR KEMALPAŞA 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">KEMALPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="362">
                    <td data-cell-order="0">İZMİR KINIK 2.ETAP 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">KINIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="363">
                    <td data-cell-order="0">İZMİR KİRAZ 271 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">KİRAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="364">
                    <td data-cell-order="0">İZMİR MENEMEN 1500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MENEMEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="365">
                    <td data-cell-order="0">İZMİR MERKEZ 3479 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="366">
                    <td data-cell-order="0">İZMİR SEFERİHİSAR 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">SEFERİHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="367">
                    <td data-cell-order="0">İZMİR SELÇUK 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">SELÇUK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="368">
                    <td data-cell-order="0">İZMİR TİRE 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">TİRE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="369">
                    <td data-cell-order="0">İZMİR TORBALI 1000 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">TORBALI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="370">
                    <td data-cell-order="0">İZMİR URLA 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">İZMİR</td>
                    <td data-cell-order="2" class="hideOnMobile">URLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="371">
                    <td data-cell-order="0">KAHRAMANMARAŞ AFŞİN 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAHRAMANMARAŞ</td>
                    <td data-cell-order="2" class="hideOnMobile">AFŞİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="372">
                    <td data-cell-order="0">KAHRAMANMARAŞ ÇAĞLAYANCERİT 121 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAHRAMANMARAŞ</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAĞLAYANCERİT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="373">
                    <td data-cell-order="0">KAHRAMANMARAŞ ELBİSTAN 750 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAHRAMANMARAŞ</td>
                    <td data-cell-order="2" class="hideOnMobile">ELBİSTAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="374">
                    <td data-cell-order="0">KAHRAMANMARAŞ GÖKSUN 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAHRAMANMARAŞ</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖKSUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="375">
                    <td data-cell-order="0">KAHRAMANMARAŞ MERKEZ 1070 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAHRAMANMARAŞ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="376">
                    <td data-cell-order="0">KAHRAMANMARAŞ PAZARCIK 2. ETAP 210 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAHRAMANMARAŞ</td>
                    <td data-cell-order="2" class="hideOnMobile">PAZARCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="377">
                    <td data-cell-order="0">KAHRAMANMARAŞ TÜRKOĞLU 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAHRAMANMARAŞ</td>
                    <td data-cell-order="2" class="hideOnMobile">TÜRKOĞLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="378">
                    <td data-cell-order="0">KARABÜK EFLANİ 2. ETAP 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARABÜK</td>
                    <td data-cell-order="2" class="hideOnMobile">EFLANİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="379">
                    <td data-cell-order="0">KARABÜK ESKİPAZAR 3. ETAP 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARABÜK</td>
                    <td data-cell-order="2" class="hideOnMobile">ESKİPAZAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="380">
                    <td data-cell-order="0">KARABÜK YORTAN 59 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARABÜK</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="381">
                    <td data-cell-order="0">KARABÜK MERKEZ 280 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARABÜK</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="382">
                    <td data-cell-order="0">KARABÜK OVACIK 30 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARABÜK</td>
                    <td data-cell-order="2" class="hideOnMobile">OVACIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="383">
                    <td data-cell-order="0">KARABÜK SAFRANBOLU 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARABÜK</td>
                    <td data-cell-order="2" class="hideOnMobile">SAFRANBOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="384">
                    <td data-cell-order="0">KARAMAN BAŞYAYLA 3. ETAP 45 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">BAŞYAYLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="385">
                    <td data-cell-order="0">KARAMAN KAZIMKARABEKİR 216 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">KAZIMKARABEKİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="386">
                    <td data-cell-order="0">KARAMAN MERKEZ 340 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="387">
                    <td data-cell-order="0">KARAMAN AKÇAŞEHİR 2. ETAP 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARAMAN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="388">
                    <td data-cell-order="0">KARS KAĞIZMAN 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARS</td>
                    <td data-cell-order="2" class="hideOnMobile">KAĞIZMAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="389">
                    <td data-cell-order="0">KARS MERKEZ 600 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARS</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="390">
                    <td data-cell-order="0">KARS SARIKAMIŞ 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARS</td>
                    <td data-cell-order="2" class="hideOnMobile">SARIKAMIŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="391">
                    <td data-cell-order="0">KARS SELİM 70/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KARS</td>
                    <td data-cell-order="2" class="hideOnMobile">SELİM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="392">
                    <td data-cell-order="0">KASTAMONU AĞLI 3. ETAP 46 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KASTAMONU</td>
                    <td data-cell-order="2" class="hideOnMobile">AĞLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="393">
                    <td data-cell-order="0">KASTAMONU ARAÇ 79 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KASTAMONU</td>
                    <td data-cell-order="2" class="hideOnMobile">ARAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="394">
                    <td data-cell-order="0">KASTAMONU CİDE 94 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KASTAMONU</td>
                    <td data-cell-order="2" class="hideOnMobile">CİDE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="395">
                    <td data-cell-order="0">KASTAMONU ÇATALZEYTİN 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KASTAMONU</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇATALZEYTİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="396">
                    <td data-cell-order="0">KASTAMONU DEVREKANİ 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KASTAMONU</td>
                    <td data-cell-order="2" class="hideOnMobile">DEVREKANİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="397">
                    <td data-cell-order="0">KASTAMONU HANÖNÜ 60/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KASTAMONU</td>
                    <td data-cell-order="2" class="hideOnMobile">HANÖNÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="398">
                    <td data-cell-order="0">KASTAMONU İHSANGAZİ 2. ETAP 135 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KASTAMONU</td>
                    <td data-cell-order="2" class="hideOnMobile">İHSANGAZİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="399">
                    <td data-cell-order="0">KASTAMONU KÜRE 2. ETAP 98 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KASTAMONU</td>
                    <td data-cell-order="2" class="hideOnMobile">KÜRE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="400">
                    <td data-cell-order="0">KASTAMONU MERKEZ 400 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KASTAMONU</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="401">
                    <td data-cell-order="0">KASTAMONU SEYDİLER 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KASTAMONU</td>
                    <td data-cell-order="2" class="hideOnMobile">SEYDİLER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="402">
                    <td data-cell-order="0">KAYSERİ AKKIŞLA 83 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">AKKIŞLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="403">
                    <td data-cell-order="0">KAYSERİ BÜNYAN 118 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">BÜNYAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="404">
                    <td data-cell-order="0">KAYSERİ DEVELİ 134 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">DEVELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="405">
                    <td data-cell-order="0">KAYSERİ FELAHİYE 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">FELAHİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="406">
                    <td data-cell-order="0">KAYSERİ HACILAR 400 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">HACILAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="407">
                    <td data-cell-order="0">KAYSERİ İNCESU GARİPÇE 6. ETAP 190 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">İNCESU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="408">
                    <td data-cell-order="0">KAYSERİ İNCESU SARAYCIK 7. ETAP 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">İNCESU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="409">
                    <td data-cell-order="0">KAYSERİ MERKEZ 2300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="410">
                    <td data-cell-order="0">KAYSERİ ÖZVATAN 75/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">ÖZVATAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="411">
                    <td data-cell-order="0">KAYSERİ PINARBAŞI 4. ETAP 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">PINARBAŞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="412">
                    <td data-cell-order="0">KAYSERİ SARIZ 2. ETAP 173 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">SARIZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="413">
                    <td data-cell-order="0">KAYSERİ TOMARZA 3. ETAP 176 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">TOMARZA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="414">
                    <td data-cell-order="0">KAYSERİ YAHYALI 100 /250000 SOSYAL KONUT</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">YAHYALI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="415">
                    <td data-cell-order="0">KAYSERİ YEŞİLHİSAR 3. ETAP 236 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KAYSERİ</td>
                    <td data-cell-order="2" class="hideOnMobile">YEŞİLHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="416">
                    <td data-cell-order="0">KIRIKKALE BAHŞILI 6. ETAP 53 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRIKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">BAHŞILI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="417">
                    <td data-cell-order="0">KIRIKKALE ÇELEBİ 3. ETAP 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRIKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇELEBİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="418">
                    <td data-cell-order="0">KIRIKKALE DELİCE 3. ETAP 126 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRIKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">DELİCE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="419">
                    <td data-cell-order="0">KIRIKKALE DELİCE ÇERİKLİ 2. ETAP 201 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRIKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">DELİCE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="420">
                    <td data-cell-order="0">KIRIKKALE KARAKEÇİLİ 123 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRIKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">KARAKEÇİLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="421">
                    <td data-cell-order="0">KIRIKKALE KESKİN 4. ETAP 79 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRIKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">KESKİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="422">
                    <td data-cell-order="0">KIRIKKALE MERKEZ 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRIKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="423">
                    <td data-cell-order="0">KIRIKKALE SULAKYURT 74 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRIKKALE</td>
                    <td data-cell-order="2" class="hideOnMobile">SULAKYURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="424">
                    <td data-cell-order="0">KIRKLARELİ İLİ BABAESKİ İLÇESİ(BÜYÜKMANDIRA) 84/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRKLARELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">BABAESKİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="425">
                    <td data-cell-order="0">KIRKLARELİ İLİ BABAESKİ İLÇESİ(ALPULLU) 91/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRKLARELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">BABAESKİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="426">
                    <td data-cell-order="0">KIRKLARELİ İLİ DEMİRKÖY İLÇESİ 114/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRKLARELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">DEMİRKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="427">
                    <td data-cell-order="0">KIRKLARELİ İLİ KOFÇAZ İLÇESİ 80/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRKLARELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">KOFÇAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="428">
                    <td data-cell-order="0">KIRKLARELİ İLİ LÜLEBURGAZ İLÇESİ(AHMETBEY) 70/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRKLARELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">LÜLEBURGAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="429">
                    <td data-cell-order="0">KIRKLARELİ İLİ LÜLEBURGAZ İLÇESİ EVRENSEKİZ 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRKLARELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">LÜLEBURGAZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="430">
                    <td data-cell-order="0">KIRKLARELİ İLİ MERKEZ İLÇESİ 160/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRKLARELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="431">
                    <td data-cell-order="0">KIRKLARELİ İLİ MERKEZ İLÇESİ (ÜSKÜP) 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRKLARELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="432">
                    <td data-cell-order="0">KIRKLARELİ İLİ MERKEZ İLÇESİ(KAVAKLI) 55/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRKLARELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="433">
                    <td data-cell-order="0">KIRKLARELİ LİL PINARHİSAR İLÇESİ 246/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRKLARELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">PINARHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="434">
                    <td data-cell-order="0">KIRŞEHİR AKPINAR 4. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">AKPINAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="435">
                    <td data-cell-order="0">KIRŞEHİR ÇİÇEKDAĞI 3. ETAP 205 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇİÇEKDAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="436">
                    <td data-cell-order="0">KIRŞEHİR KAMAN 96 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">KAMAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="437">
                    <td data-cell-order="0">KIRŞEHİR ÖZBAĞ 285 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="438">
                    <td data-cell-order="0">KIRŞEHİR MERKEZ 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="439">
                    <td data-cell-order="0">KIRŞEHİR MUCUR 253 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KIRŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MUCUR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="440">
                    <td data-cell-order="0">KİLİS MERKEZ 550 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KİLİS</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="441">
                    <td data-cell-order="0">KOCAELİ İLİ DERİNCE İLÇESİ SOPALI MAHALLESİ 260/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KOCAELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">DERİNCE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="442">
                    <td data-cell-order="0">KOCAELİ İLİ DİLOVASI İLÇESİ 1150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KOCAELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">DİLOVASI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="443">
                    <td data-cell-order="0">KOCAELİ İLİ GEBZE İLÇESİ(KİRAZPINAR) 450/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KOCAELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">GEBZE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="444">
                    <td data-cell-order="0">KOCAELİ İLİ İZMİT İLÇESİ (SEKBANLI-SEPETÇİ) 2255/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KOCAELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">İZMİT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="445">
                    <td data-cell-order="0">KOCAELİ İLİ KANDIRA İLÇESİ ORHAN MAHALLESİ 85/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KOCAELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">KANDIRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="446">
                    <td data-cell-order="0">KOCAELİ İLİ KÖRFEZ İLÇESİ(İLİMTEPE) 1000/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KOCAELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">KÖRFEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="447">
                    <td data-cell-order="0">KONYA AKŞEHİR 350/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">AKŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="448">
                    <td data-cell-order="0">KONYA BEYŞEHİR 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">BEYŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="449">
                    <td data-cell-order="0">KONYA BOZKIR 3. ETAP 142 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">BOZKIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="450">
                    <td data-cell-order="0">KONYA CİHANBEYLİ 2. ETAP 198 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">CİHANBEYLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="451">
                    <td data-cell-order="0">KONYA ÇELTİK 40 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇELTİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="452">
                    <td data-cell-order="0">KONYA ÇUMRA 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇUMRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="453">
                    <td data-cell-order="0">KONYA DERBENT 2. ETAP 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">DERBENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="454">
                    <td data-cell-order="0">KONYA DOĞANHİSAR 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">DOĞANHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="455">
                    <td data-cell-order="0">KONYA EREĞLİ 350 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">EREĞLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="456">
                    <td data-cell-order="0">KONYA GÜNEYSINIR 114 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜNEYSINIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="457">
                    <td data-cell-order="0">KONYA HADİM 3. ETAP 189 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">HADİM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="458">
                    <td data-cell-order="0">KONYA HÜYÜK 4. ETAP SELKİ MAHALLESİ 118 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">HÜYÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="459">
                    <td data-cell-order="0">KONYA HÜYÜK 5. ETAP AKDAĞ MAHALLESİ 141 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">HÜYÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="460">
                    <td data-cell-order="0">KONYA ILGIN 275 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">ILGIN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="461">
                    <td data-cell-order="0">KONYA KADINHANI 6. VE 7. ETAPLAR 373 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">KADINHANI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="462">
                    <td data-cell-order="0">KONYA KARAPINAR 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">KARAPINAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="463">
                    <td data-cell-order="0">KONYA KULU 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">KULU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="464">
                    <td data-cell-order="0">KONYA MERKEZ 2891 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="465">
                    <td data-cell-order="0">KONYA SARAYÖNÜ 4. ETAP 127 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">SARAYÖNÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="466">
                    <td data-cell-order="0">KONYA SEYDİŞEHİR 496/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">SEYDİŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="467">
                    <td data-cell-order="0">KONYA TAŞKENT 3. ETAP 188 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">TAŞKENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="468">
                    <td data-cell-order="0">KONYA TUZLUKÇU 2. ETAP 175 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">TUZLUKÇU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="469">
                    <td data-cell-order="0">KONYA YALIHÜYÜK 2. ETAP 59 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">YALIHÜYÜK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="470">
                    <td data-cell-order="0">KONYA YUNAK 3. ETAP 216 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KONYA</td>
                    <td data-cell-order="2" class="hideOnMobile">YUNAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="471">
                    <td data-cell-order="0">KÜTAHYA ALTINTAŞ 6. ETAP 47 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">ALTINTAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="472">
                    <td data-cell-order="0">KÜTAHYA ASLANAPA 110 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">ASLANAPA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="473">
                    <td data-cell-order="0">KÜTAHYA DOMANİÇ 131 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">DOMANİÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="474">
                    <td data-cell-order="0">KÜTAHYA DUMLUPINAR 3. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">DUMLUPINAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="475">
                    <td data-cell-order="0">KÜTAHYA EMET 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">EMET</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="476">
                    <td data-cell-order="0">KÜTAHYA GEDİZ 5. ETAP 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">GEDİZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="477">
                    <td data-cell-order="0">KÜTAHYA HİSARCIK 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">HİSARCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="478">
                    <td data-cell-order="0">KÜTAHYA MERKEZ 600/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="479">
                    <td data-cell-order="0">KÜTAHYA SİMAV GÜNEY 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">SİMAV</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="480">
                    <td data-cell-order="0">KÜTAHYA SİMAV AKDAĞ 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">SİMAV</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="481">
                    <td data-cell-order="0">KÜTAHYA SİMAV NAŞA 46 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">SİMAV</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="482">
                    <td data-cell-order="0">KÜTAHYA SİMAV ÇİTGÖL 70 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">SİMAV</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="483">
                    <td data-cell-order="0">KÜTAHYA SİMAV 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">SİMAV</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="484">
                    <td data-cell-order="0">KÜTAHYA TAVŞANLI 4. ETAP 303 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">KÜTAHYA</td>
                    <td data-cell-order="2" class="hideOnMobile">TAVŞANLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="485">
                    <td data-cell-order="0">MALATYA AKÇADAĞ 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">AKÇADAĞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="486">
                    <td data-cell-order="0">MALATYA ARAPGİR 3. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">ARAPGİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="487">
                    <td data-cell-order="0">MALATYA DARENDE 4. ETAP 241 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">DARENDE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="488">
                    <td data-cell-order="0">MALATYA DARENDE BALABAN 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">DARENDE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="489">
                    <td data-cell-order="0">MALATYA DOĞANŞEHİR 350 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">DOĞANŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="490">
                    <td data-cell-order="0">MALATYA HEKİMHAN 2. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">HEKİMHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="491">
                    <td data-cell-order="0">MALATYA KALE 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">KALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="492">
                    <td data-cell-order="0">MALATYA KULUNCAK 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">KULUNCAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="493">
                    <td data-cell-order="0">MALATYA MERKEZ 1180 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="494">
                    <td data-cell-order="0">MALATYA PÜTÜRGE 2. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">PÜTÜRGE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="495">
                    <td data-cell-order="0">MALATYA YAZIHAN 2. ETAP 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MALATYA</td>
                    <td data-cell-order="2" class="hideOnMobile">YAZIHAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="496">
                    <td data-cell-order="0">MANİSA AHMETLİ 78 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">AHMETLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="497">
                    <td data-cell-order="0">MANİSA AKHİSAR 267 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">AKHİSAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="498">
                    <td data-cell-order="0">MANİSA ALAŞEHİR 240 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">ALAŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="499">
                    <td data-cell-order="0">MANİSA DEMİRCİ 2. ETAP 140 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">DEMİRCİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="500">
                    <td data-cell-order="0">MANİSA GÖRDES 3. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖRDES</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="501">
                    <td data-cell-order="0">MANİSA KIRKAĞAÇ 230 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">KIRKAĞAÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="502">
                    <td data-cell-order="0">MANİSA KULA 3. ETAP 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">KULA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="503">
                    <td data-cell-order="0">MANİSA SALİHLİ DURASILLI 180 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">SALİHLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="504">
                    <td data-cell-order="0">MANİSA SARUHANLI 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">SARUHANLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="505">
                    <td data-cell-order="0">MANİSA SOMA 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">SOMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="506">
                    <td data-cell-order="0">MANİSA ŞEHZADELER 1415 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">ŞEHZADELER</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="507">
                    <td data-cell-order="0">MANİSA YUNUSEMRE 750 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MANİSA</td>
                    <td data-cell-order="2" class="hideOnMobile">YUNUSEMRE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="508">
                    <td data-cell-order="0">MARDİN ARTUKLU 1600 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MARDİN</td>
                    <td data-cell-order="2" class="hideOnMobile">ARTUKLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="509">
                    <td data-cell-order="0">MARDİN DARGEÇİT 183 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MARDİN</td>
                    <td data-cell-order="2" class="hideOnMobile">DARGEÇİT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="510">
                    <td data-cell-order="0">MARDİN KIZILTEPE 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MARDİN</td>
                    <td data-cell-order="2" class="hideOnMobile">KIZILTEPE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="511">
                    <td data-cell-order="0">MARDİN MAZIDAĞI 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MARDİN</td>
                    <td data-cell-order="2" class="hideOnMobile">MAZIDAĞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="512">
                    <td data-cell-order="0">MARDİN MİDYAT 354 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MARDİN</td>
                    <td data-cell-order="2" class="hideOnMobile">MİDYAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="513">
                    <td data-cell-order="0">MARDİN YEŞİLLİ 2. ETAP 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MARDİN</td>
                    <td data-cell-order="2" class="hideOnMobile">YEŞİLLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="514">
                    <td data-cell-order="0">MERSİN ANAMUR 1000 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MERSİN</td>
                    <td data-cell-order="2" class="hideOnMobile">ANAMUR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="515">
                    <td data-cell-order="0">MERSİN AYDINCIK 128 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MERSİN</td>
                    <td data-cell-order="2" class="hideOnMobile">AYDINCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="516">
                    <td data-cell-order="0">MERSİN MERKEZ 2122 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MERSİN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="517">
                    <td data-cell-order="0">MERSİN MUT 400 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MERSİN</td>
                    <td data-cell-order="2" class="hideOnMobile">MUT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="518">
                    <td data-cell-order="0">MERSİN SİLİFKE 400 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MERSİN</td>
                    <td data-cell-order="2" class="hideOnMobile">SİLİFKE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="519">
                    <td data-cell-order="0">MERSİN TARSUS 400 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MERSİN</td>
                    <td data-cell-order="2" class="hideOnMobile">TARSUS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="520">
                    <td data-cell-order="0">MERSİN TOROSLAR 650 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MERSİN</td>
                    <td data-cell-order="2" class="hideOnMobile">TOROSLAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="521">
                    <td data-cell-order="0">MUĞLA BODRUM 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUĞLA</td>
                    <td data-cell-order="2" class="hideOnMobile">BODRUM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="522">
                    <td data-cell-order="0">MUĞLA FETHİYE 53 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUĞLA</td>
                    <td data-cell-order="2" class="hideOnMobile">FETHİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="523">
                    <td data-cell-order="0">MUĞLA KAVAKLIDERE 350 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUĞLA</td>
                    <td data-cell-order="2" class="hideOnMobile">KAVAKLIDERE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="524">
                    <td data-cell-order="0">MUĞLA KAVAKLIDERE ÇAMYAYLA 55 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUĞLA</td>
                    <td data-cell-order="2" class="hideOnMobile">KAVAKLIDERE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="525">
                    <td data-cell-order="0">MUĞLA KÖYCEĞİZ TOPARLAR 292 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUĞLA</td>
                    <td data-cell-order="2" class="hideOnMobile">KÖYCEĞİZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="526">
                    <td data-cell-order="0">MUĞLA MERKEZ 1100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUĞLA</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="527">
                    <td data-cell-order="0">MUĞLA MİLAS 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUĞLA</td>
                    <td data-cell-order="2" class="hideOnMobile">MİLAS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="528">
                    <td data-cell-order="0">MUĞLA SEYDİKEMER 2. ETAP 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUĞLA</td>
                    <td data-cell-order="2" class="hideOnMobile">Seydikemer</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="529">
                    <td data-cell-order="0">MUĞLA YATAĞAN 2. ETAP 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUĞLA</td>
                    <td data-cell-order="2" class="hideOnMobile">YATAĞAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="530">
                    <td data-cell-order="0">MUŞ KORKUT 79 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUŞ</td>
                    <td data-cell-order="2" class="hideOnMobile">KORKUT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="531">
                    <td data-cell-order="0">MUŞ MERKEZ 1071 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">MUŞ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="532">
                    <td data-cell-order="0">NEVŞEHİR ACIGÖL 2. ETAP 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">ACIGÖL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="533">
                    <td data-cell-order="0">NEVŞEHİR AVANOS 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">AVANOS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="534">
                    <td data-cell-order="0">NEVŞEHİR MERKEZ ÇAT 70 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="535">
                    <td data-cell-order="0">NEVŞEHİR DERİNKUYU 2. ETAP 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">DERİNKUYU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="536">
                    <td data-cell-order="0">NEVŞEHİR MERKEZ GÖRE 2. ETAP 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖRE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="537">
                    <td data-cell-order="0">NEVŞEHİR GÜLŞEHİR 2. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜLŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="538">
                    <td data-cell-order="0">NEVŞEHİR HACIBEKTAŞ 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">HACIBEKTAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="539">
                    <td data-cell-order="0">NEVŞEHİR KOZAKLI 3. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">KOZAKLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="540">
                    <td data-cell-order="0">NEVŞEHİR MERKEZ 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="541">
                    <td data-cell-order="0">NEVŞEHİR MERKEZ KAYMAKLI 50/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="542">
                    <td data-cell-order="0">NEVŞEHİR SULUSARAY 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">SULUSARAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="543">
                    <td data-cell-order="0">NEVŞEHİR TATLARİN 59 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">TATLARİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="544">
                    <td data-cell-order="0">NEVŞEHİR ÜRGÜP 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NEVŞEHİR</td>
                    <td data-cell-order="2" class="hideOnMobile">ÜRGÜP</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="545">
                    <td data-cell-order="0">NİĞDE BOR 180 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NİĞDE</td>
                    <td data-cell-order="2" class="hideOnMobile">BOR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="546">
                    <td data-cell-order="0">NİĞDE ÇAMARDI 4. ETAP 285 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NİĞDE</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAMARDI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="547">
                    <td data-cell-order="0">NİĞDE ÇİFTLİK AZATLI 95 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NİĞDE</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇİFTLİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="548">
                    <td data-cell-order="0">NİĞDE MERKEZ 230 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NİĞDE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="549">
                    <td data-cell-order="0">NİĞDE AKTAŞ 210 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">NİĞDE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="550">
                    <td data-cell-order="0">ORDU AKKUŞ 59 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ORDU</td>
                    <td data-cell-order="2" class="hideOnMobile">AKKUŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="551">
                    <td data-cell-order="0">ORDU ÇAMAŞ 80 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ORDU</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAMAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="552">
                    <td data-cell-order="0">ORDU ÇAYBAŞI 53 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ORDU</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAYBAŞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="553">
                    <td data-cell-order="0">ORDU FATSA 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ORDU</td>
                    <td data-cell-order="2" class="hideOnMobile">FATSA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="554">
                    <td data-cell-order="0">ORDU GÖLKÖY 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ORDU</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖLKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="555">
                    <td data-cell-order="0">ORDU GÜRGENTEPE 2. ETAP 47 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ORDU</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜRGENTEPE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="556">
                    <td data-cell-order="0">ORDU MERKEZ 1111 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ORDU</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="557">
                    <td data-cell-order="0">ORDU MESUDİYE 100/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ORDU</td>
                    <td data-cell-order="2" class="hideOnMobile">MESUDİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="558">
                    <td data-cell-order="0">ORDU ÜNYE 300/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ORDU</td>
                    <td data-cell-order="2" class="hideOnMobile">ÜNYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="559">
                    <td data-cell-order="0">OSMANİYE BAHÇE 2. ETAP 143 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">OSMANİYE</td>
                    <td data-cell-order="2" class="hideOnMobile">BAHÇE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="560">
                    <td data-cell-order="0">OSMANİYE DÜZİÇİ 94 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">OSMANİYE</td>
                    <td data-cell-order="2" class="hideOnMobile">DÜZİÇİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="561">
                    <td data-cell-order="0">OSMANİYE DÜZİÇİ ELLEK 160 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">OSMANİYE</td>
                    <td data-cell-order="2" class="hideOnMobile">DÜZİÇİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="562">
                    <td data-cell-order="0">OSMANİYE KADİRLİ 309 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">OSMANİYE</td>
                    <td data-cell-order="2" class="hideOnMobile">KADİRLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="563">
                    <td data-cell-order="0">OSMANİYE MERKEZ 624 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">OSMANİYE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="564">
                    <td data-cell-order="0">OSMANİYE SUMBAS 126 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">OSMANİYE</td>
                    <td data-cell-order="2" class="hideOnMobile">SUMBAS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="565">
                    <td data-cell-order="0">OSMANİYE TOPRAKKALE 94 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">OSMANİYE</td>
                    <td data-cell-order="2" class="hideOnMobile">TOPRAKKALE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="566">
                    <td data-cell-order="0">RİZE GÜNEYSU 350 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">RİZE</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜNEYSU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="567">
                    <td data-cell-order="0">RİZE MERKEZ 673 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">RİZE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="568">
                    <td data-cell-order="0">RİZE MERKEZ KENDİRLİ 77 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">RİZE</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="569">
                    <td data-cell-order="0">SAKARYA İLİ MERKEZ 1760/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAKARYA</td>
                    <td data-cell-order="2" class="hideOnMobile">ADAPAZARI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="570">
                    <td data-cell-order="0">SAKARYA İLİ ARİFİYE İLÇESİ 120/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAKARYA</td>
                    <td data-cell-order="2" class="hideOnMobile">Arifiye</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="571">
                    <td data-cell-order="0">SAKARYA İLİ FERİZLİ İLÇESİ SİNANOĞLU MAHALLESİ 250/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAKARYA</td>
                    <td data-cell-order="2" class="hideOnMobile">FERİZLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="572">
                    <td data-cell-order="0">SAKARYA İLİ HENDEK İLÇESİ 220/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAKARYA</td>
                    <td data-cell-order="2" class="hideOnMobile">HENDEK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="573">
                    <td data-cell-order="0">SAKARYA İLİ KOCAALİ İLÇESİ CAFERİYE MAHALLESİ 300/250000 SOSYAL KONUT PROJES</td>
                    <td data-cell-order="1" class="hideOnMobile">SAKARYA</td>
                    <td data-cell-order="2" class="hideOnMobile">KOCAALİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="574">
                    <td data-cell-order="0">SAKARYA İLİ TARAKLI İLÇESİ 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAKARYA</td>
                    <td data-cell-order="2" class="hideOnMobile">TARAKLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="575">
                    <td data-cell-order="0">SAMSUN ASARCIK 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">ASARCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="576">
                    <td data-cell-order="0">SAMSUN BAFRA 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">BAFRA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="577">
                    <td data-cell-order="0">SAMSUN CANİK 320 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">CANİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="578">
                    <td data-cell-order="0">SAMSUN ÇARŞAMBA 600 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇARŞAMBA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="579">
                    <td data-cell-order="0">SAMSUN HAVZA 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">HAVZA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="580">
                    <td data-cell-order="0">SAMSUN İLKADIM 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">İLKADIM</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="581">
                    <td data-cell-order="0">SAMSUN KAVAK 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">KAVAK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="582">
                    <td data-cell-order="0">SAMSUN LADİK 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">LADİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="583">
                    <td data-cell-order="0">SAMSUN MERKEZ 1700 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="584">
                    <td data-cell-order="0">SAMSUN ONDOKUZMAYIS 380 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">ONDOKUZMAYIS</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="585">
                    <td data-cell-order="0">SAMSUN VEZİRKÖPRÜ 200/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SAMSUN</td>
                    <td data-cell-order="2" class="hideOnMobile">VEZİRKÖPRÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="586">
                    <td data-cell-order="0">SİİRT BAYKAN 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİİRT</td>
                    <td data-cell-order="2" class="hideOnMobile">BAYKAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="587">
                    <td data-cell-order="0">SİİRT ERUH 2. ETAP 47/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİİRT</td>
                    <td data-cell-order="2" class="hideOnMobile">ERUH</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="588">
                    <td data-cell-order="0">SİİRT MERKEZ 629 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİİRT</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="589">
                    <td data-cell-order="0">SİİRT TİLLO 124 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİİRT</td>
                    <td data-cell-order="2" class="hideOnMobile">TİLLO</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="590">
                    <td data-cell-order="0">SİNOP AYANCIK 79 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİNOP</td>
                    <td data-cell-order="2" class="hideOnMobile">AYANCIK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="591">
                    <td data-cell-order="0">SİNOP BOYABAT 2. ETAP 159 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİNOP</td>
                    <td data-cell-order="2" class="hideOnMobile">BOYABAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="592">
                    <td data-cell-order="0">SİNOP DİKMEN 88 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİNOP</td>
                    <td data-cell-order="2" class="hideOnMobile">DİKMEN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="593">
                    <td data-cell-order="0">SİNOP MERKEZ 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİNOP</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="594">
                    <td data-cell-order="0">SİNOP SARAYDÜZÜ 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİNOP</td>
                    <td data-cell-order="2" class="hideOnMobile">SARAYDÜZÜ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="595">
                    <td data-cell-order="0">SİVAS ALTINYAYLA 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">ALTINYAYLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="596">
                    <td data-cell-order="0">SİVAS DİVRİĞİ 3. ETAP 170 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">DİVRİĞİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="597">
                    <td data-cell-order="0">SİVAS DOĞANŞAR 67 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">DOĞANŞAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="598">
                    <td data-cell-order="0">SİVAS GEMEREK 2. ETAP 197 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">GEMEREK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="599">
                    <td data-cell-order="0">SİVAS GÜRÜN 2. ETAP 203 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">GÜRÜN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="600">
                    <td data-cell-order="0">SİVAS HAFİK 2. ETAP 110 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">HAFİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="601">
                    <td data-cell-order="0">SİVAS İMRANLI 2. ETAP 157 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">İMRANLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="602">
                    <td data-cell-order="0">SİVAS KANGAL 2. ETAP 175 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">KANGAL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="603">
                    <td data-cell-order="0">SİVAS MERKEZ 400 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="604">
                    <td data-cell-order="0">SİVAS GEMEREK SIZIR 111 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">SIZIR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="605">
                    <td data-cell-order="0">SİVAS İLİ SUŞEHRİ İLÇESİ 200/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">SUŞEHRİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="606">
                    <td data-cell-order="0">SİVAS ŞARKIŞLA 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">ŞARKIŞLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="607">
                    <td data-cell-order="0">SİVAS ŞARKIŞLA GÜRÇAYIR 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">ŞARKIŞLA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="608">
                    <td data-cell-order="0">SİVAS YILDIZELİ 3. ETAP 206 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">YILDIZELİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="609">
                    <td data-cell-order="0">SİVAS ZARA 3. ETAP 260 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">SİVAS</td>
                    <td data-cell-order="2" class="hideOnMobile">ZARA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="610">
                    <td data-cell-order="0">ŞANLIURFA BİRECİK 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞANLIURFA</td>
                    <td data-cell-order="2" class="hideOnMobile">BİRECİK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="611">
                    <td data-cell-order="0">ŞANLIURFA BOZOVA 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞANLIURFA</td>
                    <td data-cell-order="2" class="hideOnMobile">BOZOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="612">
                    <td data-cell-order="0">ŞANLIURFA CEYLANPINAR 130 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞANLIURFA</td>
                    <td data-cell-order="2" class="hideOnMobile">CEYLANPINAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="613">
                    <td data-cell-order="0">ŞANLIURFA EYYÜBİYE 4250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞANLIURFA</td>
                    <td data-cell-order="2" class="hideOnMobile">EYYÜBİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="614">
                    <td data-cell-order="0">ŞANLIURFA HALFETİ 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞANLIURFA</td>
                    <td data-cell-order="2" class="hideOnMobile">HALFETİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="615">
                    <td data-cell-order="0">ŞANLIURFA HARRAN 250/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞANLIURFA</td>
                    <td data-cell-order="2" class="hideOnMobile">HARRAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="616">
                    <td data-cell-order="0">ŞANLIURFA HİLVAN 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞANLIURFA</td>
                    <td data-cell-order="2" class="hideOnMobile">HİLVAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="617">
                    <td data-cell-order="0">ŞANLIURFA SİVEREK 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞANLIURFA</td>
                    <td data-cell-order="2" class="hideOnMobile">SİVEREK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="618">
                    <td data-cell-order="0">ŞANLIURFA İLİ SURUÇ İLÇESİ 250 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞANLIURFA</td>
                    <td data-cell-order="2" class="hideOnMobile">SURUÇ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="619">
                    <td data-cell-order="0">ŞANLIURFA VİRANŞEHİR 750 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞANLIURFA</td>
                    <td data-cell-order="2" class="hideOnMobile">VİRANŞEHİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="620">
                    <td data-cell-order="0">ŞIRNAK İDİL 301 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞIRNAK</td>
                    <td data-cell-order="2" class="hideOnMobile">İDİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="621">
                    <td data-cell-order="0">ŞIRNAK İDİL KARALAR 49 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞIRNAK</td>
                    <td data-cell-order="2" class="hideOnMobile">İDİL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="622">
                    <td data-cell-order="0">ŞIRNAK MERKEZ 1100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ŞIRNAK</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="623">
                    <td data-cell-order="0">TEKİRDAĞ İLİ ÇORLU İLÇESİ 2210/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇORLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="624">
                    <td data-cell-order="0">TEKİRDAĞ İLİ HAYRABOLU İLÇESİ KAHYA MAHALLESİ 50/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">HAYRABOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="625">
                    <td data-cell-order="0">TEKİRDAĞ İLİ HAYRABOLU İLÇESİ ÇERKEZMÜSELLİM MAHALLESİ 70/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">HAYRABOLU</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="626">
                    <td data-cell-order="0">TEKİRDAĞ İLİ MURATLI İLÇESİ 120/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">MURATLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="627">
                    <td data-cell-order="0">TEKİRDAĞ İLİ SARAY İLÇESİ AYASPAŞA MAHALLESİ 150/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">SARAY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="628">
                    <td data-cell-order="0">TEKİRDAĞ İLİ SÜLEYMANPAŞA İLÇESİ ZAFER MAHALLESİ 500 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TEKİRDAĞ</td>
                    <td data-cell-order="2" class="hideOnMobile">SÜLEYMANPAŞA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="629">
                    <td data-cell-order="0">TOKAT ARTOVA 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TOKAT</td>
                    <td data-cell-order="2" class="hideOnMobile">ARTOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="630">
                    <td data-cell-order="0">TOKAT ERBAA 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TOKAT</td>
                    <td data-cell-order="2" class="hideOnMobile">ERBAA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="631">
                    <td data-cell-order="0">TOKAT MERKEZ 687 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TOKAT</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="632">
                    <td data-cell-order="0">TOKAT PAZAR 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TOKAT</td>
                    <td data-cell-order="2" class="hideOnMobile">PAZAR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="633">
                    <td data-cell-order="0">TOKAT TURHAL 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TOKAT</td>
                    <td data-cell-order="2" class="hideOnMobile">TURHAL</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="634">
                    <td data-cell-order="0">TOKAT YEŞİLYURT 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TOKAT</td>
                    <td data-cell-order="2" class="hideOnMobile">YEŞİLYURT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="635">
                    <td data-cell-order="0">TRABZON AKÇAABAT 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">AKÇAABAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="636">
                    <td data-cell-order="0">TRABZON ARAKLI 4. ETAP 200 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">ARAKLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="637">
                    <td data-cell-order="0">TRABZON ARSİN 90 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">ARSİN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="638">
                    <td data-cell-order="0">TRABZON ÇARŞIBAŞI 166 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇARŞIBAŞI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="639">
                    <td data-cell-order="0">TRABZON DÜZKÖY 240 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">DÜZKÖY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="640">
                    <td data-cell-order="0">TRABZON HAYRAT 50 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">HAYRAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="641">
                    <td data-cell-order="0">TRABZON MAÇKA 158 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">MAÇKA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="642">
                    <td data-cell-order="0">TRABZON MERKEZ 1146 / 250000 SOSYAL KONUT PROJES</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="643">
                    <td data-cell-order="0">TRABZON OF 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">OF</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="644">
                    <td data-cell-order="0">TRABZON SÜRMENE 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">SÜRMENE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="645">
                    <td data-cell-order="0">TRABZON VAKFIKEBİR 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TRABZON</td>
                    <td data-cell-order="2" class="hideOnMobile">VAKFIKEBİR</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="646">
                    <td data-cell-order="0">TUNCELİ HOZAT 2. ETAP 89 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TUNCELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">HOZAT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="647">
                    <td data-cell-order="0">TUNCELİ MAZGİRT 2. ETAP 68 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TUNCELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">MAZGİRT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="648">
                    <td data-cell-order="0">TUNCELİ MERKEZ 93 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">TUNCELİ</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="649">
                    <td data-cell-order="0">UŞAK EŞME 3. ETAP 158 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">UŞAK</td>
                    <td data-cell-order="2" class="hideOnMobile">EŞME</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="650">
                    <td data-cell-order="0">UŞAK MERKEZ 570 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">UŞAK</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="651">
                    <td data-cell-order="0">UŞAK SİVASLI PINARBAŞI 204 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">UŞAK</td>
                    <td data-cell-order="2" class="hideOnMobile">SİVASLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="652">
                    <td data-cell-order="0">UŞAK ULUBEY 118 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">UŞAK</td>
                    <td data-cell-order="2" class="hideOnMobile">ULUBEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="653">
                    <td data-cell-order="0">VAN ÇALDIRAN 118 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">VAN</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇALDIRAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="654">
                    <td data-cell-order="0">VAN EDREMİT 400 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">VAN</td>
                    <td data-cell-order="2" class="hideOnMobile">EDREMİT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="655">
                    <td data-cell-order="0">VAN ERCİŞ 830 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">VAN</td>
                    <td data-cell-order="2" class="hideOnMobile">ERCİŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="656">
                    <td data-cell-order="0">VAN GEVAŞ 189 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">VAN</td>
                    <td data-cell-order="2" class="hideOnMobile">GEVAŞ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="657">
                    <td data-cell-order="0">VAN MERKEZ 1130 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">VAN</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="658">
                    <td data-cell-order="0">VAN MURADİYE 133 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">VAN</td>
                    <td data-cell-order="2" class="hideOnMobile">MURADİYE</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="659">
                    <td data-cell-order="0">VAN ÖZALP 400 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">VAN</td>
                    <td data-cell-order="2" class="hideOnMobile">ÖZALP</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="660">
                    <td data-cell-order="0">YALOVA İLİ ALTINOVA İLÇESİ HÜRRİYET MAHALLESİ 60/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YALOVA</td>
                    <td data-cell-order="2" class="hideOnMobile">ALTINOVA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="661">
                    <td data-cell-order="0">YALOVA İLİ MERKEZ İLÇESİ KAZİMİYE MAHALLESİ 740/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YALOVA</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="662">
                    <td data-cell-order="0">YOZGAT AKDAĞMADENİ OLUKÖZÜ 2. ETAP 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">AKDAĞMADENİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="663">
                    <td data-cell-order="0">YOZGAT AKDAĞMADENİ UMUTLU 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">AKDAĞMADENİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="664">
                    <td data-cell-order="0">YOZGAT AKDAĞMADENİ 100/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">AKDAĞMADENİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="665">
                    <td data-cell-order="0">YOZGAT BOĞAZLIYAN YENİPAZAR 79 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">BOĞAZLIYAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="666">
                    <td data-cell-order="0">YOZGAT BOĞAZLIYAN 2. ETAP 315 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">BOĞAZLIYAN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="667">
                    <td data-cell-order="0">YOZGAT ÇEKEREK 202 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇEKEREK</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="668">
                    <td data-cell-order="0">YOZGAT MERKEZ 300/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="669">
                    <td data-cell-order="0">YOZGAT SARAYKENT 2. ETAP 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">SARAYKENT</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="670">
                    <td data-cell-order="0">YOZGAT SARIKAYA 50/250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">SARIKAYA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="671">
                    <td data-cell-order="0">YOZGAT SORGUN 100/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">SORGUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="672">
                    <td data-cell-order="0">YOZGAT SORGUN DOĞANKENT 2. ETAP 141 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">SORGUN</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="673">
                    <td data-cell-order="0">YOZGAT ŞEFAATLİ 104 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">ŞEFAATLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="674">
                    <td data-cell-order="0">YOZGAT YENİFAKILI 5. ETAP 141 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">YOZGAT</td>
                    <td data-cell-order="2" class="hideOnMobile">YENİFAKILI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="675">
                    <td data-cell-order="0">ZONGULDAK ALAPLI 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ZONGULDAK</td>
                    <td data-cell-order="2" class="hideOnMobile">ALAPLI</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="676">
                    <td data-cell-order="0">ZONGULDAK ÇAYCUMA SALTUKOVA 4. ETAP 150 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ZONGULDAK</td>
                    <td data-cell-order="2" class="hideOnMobile">ÇAYCUMA</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="677">
                    <td data-cell-order="0">ZONGULDAK EREĞLİ 100 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ZONGULDAK</td>
                    <td data-cell-order="2" class="hideOnMobile">EREĞLİ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="678">
                    <td data-cell-order="0">ZONGULDAK GÖKÇEBEY 300 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ZONGULDAK</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖKÇEBEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="679">
                    <td data-cell-order="0">ZONGULDAK GÖKÇEBEY BAKACAKKADI 278/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ZONGULDAK</td>
                    <td data-cell-order="2" class="hideOnMobile">GÖKÇEBEY</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="680">
                    <td data-cell-order="0">ZONGULDAK MERKEZ KARAMAN 63 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ZONGULDAK</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="681">
                    <td data-cell-order="0">ZONGULDAK ÇAYDEĞİRMENİ 5. ETAP 317 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ZONGULDAK</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="682">
                    <td data-cell-order="0">ZONGULDAK MERKEZ 222/ 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ZONGULDAK</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
                            <tr data-row-index="683">
                    <td data-cell-order="0">ZONGULDAK BEYCUMA 120 / 250000 SOSYAL KONUT PROJESİ</td>
                    <td data-cell-order="1" class="hideOnMobile">ZONGULDAK</td>
                    <td data-cell-order="2" class="hideOnMobile">MERKEZ</td>
                    <td data-cell-order="3" class="hideOnMobile">BAŞVURU</td>
                    <td data-tip="Konut" data-cell-order="4" class="hideOnMobile">                        2+1 / 3+1
                        <br>
                    </td>

                    <td data-cell-order="5" class="hideOnMobile">
                        07/09/2025 - 07/10/2025                    </td>

                    <td data-cell-order="6">
                        <a href="konut2.php" class="selectLink">Seç</a>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
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
document.addEventListener('DOMContentLoaded', function() {

    // --- Date Update Function ---
    function updateDates() {
        // Select all rows in the table body
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

        // Iterate through each row and update the 6th cell (index 5)
        rows.forEach(row => {
            if (row.cells.length > 5) { // Ensure the row has enough cells
                 row.cells[5].textContent = dateRangeText; // Update Başvuru Dönemi cell
            }
        });
    }

    // --- City Filter Function ---
    const ilSelect = document.getElementById('ilSecimi');
    const tableBody = document.getElementById('searchTable').querySelector('tbody');
    const rows = tableBody.querySelectorAll('tr');

    ilSelect.addEventListener('change', function() {
        const selectedIl = this.value.toUpperCase(); // Ensure comparison is case-insensitive

        rows.forEach(row => {
            // Select the 2nd cell (index 1) for the City (İl)
            const ilCell = row.cells[1];
            if (ilCell) {
                 const ilText = ilCell.textContent.trim().toUpperCase();
                 // Show row if "Tüm İller" is selected or if the row's city matches the selected city
                 if (selectedIl === "" || ilText === selectedIl) {
                    row.style.display = ''; // Show row
                 } else {
                    row.style.display = 'none'; // Hide row
                 }
            }
        });
    });

    // --- POST Form Submission for Select Links ---
    document.querySelectorAll('.selectLink').forEach(function(link){
        link.addEventListener('click', function(e){
            e.preventDefault(); // prevent default link behavior

            let row = link.closest('tr');
            let projeAdi = row.cells[0].innerText; // Proje Adı from 1st cell (index 0)
            let il = row.cells[1].innerText;      // İl from 2nd cell (index 1)
            let ilce = row.cells[2].innerText;    // İlçe from 3rd cell (index 2)

            // Get TCKN from the button, removing the icon and spaces
            let tcknButton = document.querySelector('.dropdown1.dropdown-toggle.fast-shortcuts');
            let tcknRaw = tcknButton ? tcknButton.innerText.trim() : '';
            let tckn = tcknRaw.replace(/\D/g, ''); // Keep only digits

            // Create a dynamic form
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = link.href; // Target page from link's href

            // Add hidden inputs
            [['projeAdi', projeAdi], ['il', il], ['ilce', ilce], ['tckn', tckn]].forEach(function(pair){
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = pair[0];
                input.value = pair[1];
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit(); // Submit the form via POST
        });
    });

    // Initial date update on page load
    updateDates();

}); // End DOMContentLoaded
</script>