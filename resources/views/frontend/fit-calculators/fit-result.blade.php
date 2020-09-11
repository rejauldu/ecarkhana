<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <style>
            html {
                font-family: sans-serif;
                line-height: 1.15;
                -webkit-text-size-adjust: 100%;
                -webkit-tap-highlight-color: rgba(0,0,0,0);
            }

            body {
                margin: 0;
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
            }
            *, :after, :before {
                box-sizing: border-box;
            }
            .clearfix:after {
                display: block;
                clear: both;
                content: "";
            }
            .container, .container-fluid {
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }
            @media (min-width: 576px) {
                .container {
                    max-width: 540px;
                }
            }
            @media (min-width: 768px) {
                .container {
                    max-width: 720px;
                }
            }
            @media (min-width: 992px) {
                .container {
                    max-width: 960px;
                }
            }
            @media (min-width: 1200px) {
                .container {
                    max-width: 1140px;
                }
            }
            @media (min-width: 576px) {
                .container, .container-sm {
                    max-width: 540px;
                }
            }
            @media (min-width: 768px) {
                .container, .container-md, .container-sm {
                    max-width: 720px;
                }
            }
            @media (min-width: 992px) {
                .container, .container-lg, .container-md, .container-sm {
                    max-width: 960px;
                }
            }
            @media (min-width: 1200px) {
                .container, .container-lg, .container-md, .container-sm, .container-xl {
                    max-width: 1140px;
                }
            }
            .text-secondary {
                color: #6c757d!important;
            }
            .mt-3, .my-3 {
                margin-top: 1rem!important;
            }
            .mt-5 {
                margin-top: 3rem!important;
            }
            .ml-5, .mx-5 {
                margin-left: 3rem!important;
            }
            .mb-3, .my-3 {
                margin-bottom: 1rem!important;
            }
            .mr-5, .mx-5 {
                margin-right: 3rem!important;
            }
            .mt-3, .my-3 {
                margin-top: 1rem!important;
            }
            .ml-5, .mx-5 {
                margin-left: 3rem!important;
            }
            .mb-3, .my-3 {
                margin-bottom: 1rem!important;
            }
            .pr-3 {
                padding-right: 1rem!important;
            }
            .pl-3 {
                padding-left: 1rem!important;
            }
            .float-left {
                float: left!important;
            }
            .float-right {
                float: right!important;
            }
            .w-50 {
                weight: 50%!important;
            }
            .height-100 {
                height: 100px !important;
            }
            .height-132 {
                height: 132px !important;
            }
            .display-6 {
                font-size: 1rem;
            }
            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }
            .font-weight-bold {
                font-weight: 700!important;
            }
            h1, h2, h3, h4, h5, h6 {
                margin-top: 0;
                margin-bottom: .5rem;
            }
            .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
                margin-bottom: .5rem;
                font-weight: 500;
                line-height: 1.2;
            }
            .h3, h3 {
                font-size: 1.575rem;
            }
            .text-center {
                text-align: center!important;
            }

            img {
                border-style: none;
            }
            img, svg {
                vertical-align: middle;
            }
            .width-500 {
                width: 400px !important;
            }
            .bg-deep-light {
                background: #EBEBEB !important;
            }
            .text-right {
                text-align: right;
            }
            .text-center {
                text-align: right;
            }
            .striped>p:nth-of-type(odd) {
                background-color: rgba(0,0,0,.05);
                margin: 0;
                padding-bottom:10px;
                padding:0 15px 10px 15px;
            }
            .striped>p:nth-of-type(even) {
                background-color: #f7e6e8;
                color:#721c24;
                margin: 0;
                padding:0 15px 10px 15px;
            }
        </style>
    </head>
    <body>
        <div class="bg-deep-light clearfix" style="height:132px">
            <img class="height-100 float-left mx-5 my-3 h-132" src="{{ asset('/images/logo.png') }}" />
            <h4 class="mt-3">Bicycle Fit Calculator</h4>
            <p class="text-secondary">Ecarkhana</p>
        </div>
        <div class="clearfix">
            <div style="width:48%; float:left" class="pr-3">
                <h3 class="mt-3">Your Fit Summary</h3>
                <div class="striped">
                    <p class="display-6"><span class="font-weight-bold">Top Tube Length</span> <span class="float-right">55.9-56.3 Cm</span></p>
                    <p class="display-6"><span class="font-weight-bold">Seat Tube Range CC</span> <span class="float-right">55.9-56.3 Cm</span></p>
                    <p class="display-6"><span class="font-weight-bold">Seat Tube Range CT</span> <span class="float-right">55.9-56.3 Cm</span></p>
                    <p class="display-6"><span class="font-weight-bold">Stem Length</span> <span class="float-right">55.9-56.3 Cm</span></p>
                    <p class="display-6"><span class="font-weight-bold">BB Saddle Position</span> <span class="float-right">55.9-56.3 Cm</span></p>
                    <p class="display-6"><span class="font-weight-bold">Saddle Handlebar</span> <span class="float-right">55.9-56.3 Cm</span></p>
                    <p class="display-6"><span class="font-weight-bold">Saddle Setback</span> <span class="float-right">55.9-56.3 Cm</span></p>
                    <p class="display-6"><span class="font-weight-bold">Seatpost Type</span> <span class="float-right">55.9-56.3 Cm</span></p>
                </div>
            </div>
            <div style="width:47%; float:left" class="pl-3">
                <h3 class="mt-3">Your Fit Measurement</h3>
                <div class="p-lg-3 striped">
                    <p class="display-6"><span class="font-weight-bold">Actual Inseam</span> <span class="float-right">@{{ inseam }} Cm</span></p>
                    <p class="display-6" v-if="tab == 'advance'"><span class="font-weight-bold">Trunk</span> <span class="float-right">@{{ trunk }} Cm</span></p>
                    <p class="display-6" v-if="tab == 'advance'"><span class="font-weight-bold">Forearm</span> <span class="float-right">@{{ forearm }} Cm</span></p>
                    <p class="display-6"><span class="font-weight-bold">Arm</span> <span class="float-right">@{{ arm }} Cm</span></p>
                    <p class="display-6" v-if="tab == 'advance'"><span class="font-weight-bold">Thigh</span> <span class="float-right">@{{ thigh }} Cm</span></p>
                    <p class="display-6" v-if="tab == 'advance'"><span class="font-weight-bold">Lower Leg</span> <span class="float-right">@{{ leg }} Cm</span></p>
                    <p class="display-6" v-if="tab == 'advance'"><span class="font-weight-bold">Sternal Notch</span> <span class="float-right">@{{ sternal_notch }} Cm</span></p>
                    <p class="display-6"><span class="font-weight-bold">Total Height</span> <span class="float-right">@{{ height }} Cm</span></p>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="text-center">
                <img src="{{ url('/') }}/images/bicycle/result.png" class="width-500">
            </div>
        </div>
        <div style="position:absolute; bottom: 0; width: 100%">
            <p class="text-center">&copy; Ecarkhana</p>
        </div>
    </body>
</html>