@extends('layouts.guest')
@section('title','ภูมิปัญญาท้องถิ่น')
@section('content')
    <style>
        a:link {
            color:inherit;
            text-decoration: none;
        }

        .column {
            padding-bottom: 20px;
        }

        .post-module {
            position: relative;
            z-index: 1;
            display: block;
            background: #FFFFFF;
            min-width: 270px;
            height: 350px;
            -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
            -webkit-transition: all 0.3s linear 0s;
            -moz-transition: all 0.3s linear 0s;
            -ms-transition: all 0.3s linear 0s;
            -o-transition: all 0.3s linear 0s;
            transition: all 0.3s linear 0s;
        }
        .post-module:hover,
        .hover {
            -webkit-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
        }
        .post-module:hover .thumbnail img,
        .hover .thumbnail img {
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            transform: scale(1.1);
            opacity: .6;
        }
        .post-module .thumbnail {
            background: #000000;
            height: 350px;
            overflow: hidden;padding: 0;
        }
        .post-module .thumbnail .date {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1;
            background: #f2b202;
            width: 55px;
            height: 55px;
            padding: 12.5px 0;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            color: #FFFFFF;
            font-weight: 700;
            text-align: center;
            -webkti-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .post-module .thumbnail .date .day {
            font-size: 18px;
            line-height: 31px;
            color: #fff;
        }
        .post-module .thumbnail .date .month {
            font-size: 12px;
            text-transform: uppercase;
        }
        .post-module .thumbnail img {
            display: block;
            width: 120%;
            -webkit-transition: all 0.3s linear 0s;
            -moz-transition: all 0.3s linear 0s;
            -ms-transition: all 0.3s linear 0s;
            -o-transition: all 0.3s linear 0s;
            transition: all 0.3s linear 0s;
        }
        .post-module .post-content {
            position: absolute;
            bottom: 0;
            background: #FFFFFF;
            width: 100%;
            padding: 0 30px;
            -webkti-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
            -moz-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
            -ms-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
            -o-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
            transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
        }
        .post-module .post-content .category {
            position: absolute;
            top: -34px;
            left: 0;
            background: #f2b202;
            padding: 10px 15px;
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .post-module .post-content .title {
            margin: 0;
            padding: 0 0 10px;
            color: #222 !important;
            font-size: 24px !important;
            font-weight: 700;    margin: 40px 0 0 !important;
        }
        .post-module .post-content .sub_title {
            margin: 0;
            padding: 0 0 20px;
            color: #f2b202;
            font-size: 20px;
            font-weight: 400;
        }
        .post-module .post-content .description {
            display: none;
            color: #666666;
            font-size: 14px;
            line-height: 1.8em;
        }
        .post-module .post-content .post-meta {
            margin: 0px 0px 10px;
            color: #999999;
        }
        .post-module .post-content .post-meta .timestamp {
            margin: 0 16px 0 0;
        }
        .post-module .post-content .post-meta a {
            color: #999999;
            text-decoration: none;
        }
        .hover .post-content .description {
            display: block !important;
            height: auto !important;
            opacity: 1 !important;
        }

        .container .column {
            width: 100%;
            /* padding: 0 25px; */
            -webkti-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            float: left;
        }
        .container .column .demo-title {
            margin: 0 0 15px;
            color: #666666;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .container .info {
            width: 300px;
            margin: 50px auto;
            text-align: center;
        }
        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }
        .container .info span {
            color: #666666;
            font-size: 12px;
        }
        .container .info span a {
            color: #000000;
            text-decoration: none;
        }
        .container .info span .fa {
            color: #f2b202;
        }

    </style>

    <style>
        [v-cloak] {
            display: none;
        }

        /* Styling Vue Search Widget - You can customize it as you wish */
        .widget {
            border: 1px solid #c5c5c5;
            background: white;
            position: static;
            cursor: pointer;
            list-style: none;
            padding: 0;
            z-index: 100;
            margin-bottom: 0;
        }
        .menu-item{
            height: 80px;
            border: 1px solid #ececf9;
        }
        .list_item_container {
            width: 100%;
            float: left;
        }
        .image {
            width: 10%;
            float: left;
            padding: 10px;
        }
        .image img{
            width: 80px;
            height : 60px;
        }
        .label{
            width: 89%;
            float:right;
            color: rgb(124,77,255);
            font-weight: bold;
            text-align: left;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        @media only screen and (max-width:768px) {

            .image img{
                width: 70px;
                height : 55px;
            }
            .label{
                width: 70%;
            }
        }

    </style>
    <br>
    <div id="app" >

        <div class="row">
            <div class="col-md-12">


                <div class="input-group">
                    <span class="input-group-prepend">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i> ค้นหา
                        </button>
                    </span>
                    <input type="text" class="form-control input-lg" id="search" autocomplete="off" v-model="search" placeholder="ค้นหาภูมิปัญญาท้องถิ่น">
                </div>
                <!-- Vue Search List Start-->
                <ul v-cloak v-if="posts" v-bind:style="{ width : width + 'px' }" class="widget">
                    <li v-for="(post,key) in posts" :id="key +1"
                        v-bind:class="[(key + 1 == count) ? activeClass : '', menuItem]"
                    >
                        <a v-bind:href="post.url" >
                            <div class="list_item_container" v-bind:title="post.title">
                                <div class="image">
                                    <img v-bind:src="post.image" >
                                </div>
                                <div class="label">
                                    @{{ post.title  }}<br>
                                    @{{ post.titleeng  }}
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- Vue Search List End-->

            </div>
        </div>
    </div>
    <br>


    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0"><img src="/icon/wisdoms.png"> ภูมิปัญญาท้องถิ่น</h4>
                </div>
            </div>
            <hr>

            <div class="row">
                @foreach ($wisdoms as $wisdom)
                    <div class="col-md-4">
                        <div class="column">
                            <!-- Post-->
                            <a href="{{ url("wisdoms/{$wisdom->wisdom_id}") }}">
                                <div class="post-module">
                                    <!-- Thumbnail-->
                                    <div class="thumbnail">
                                        <img src="{{ asset("uploads/covers/".$wisdom->wisdom_cover) }}" class="img-thumbnail">
                                    </div>
                                    <!-- Post Content-->
                                    <div class="post-content">

                                        <h1 class="title">{{ $wisdom->wisdom_name_th }}</h1>
                                        <h2 class="sub_title">{{ $wisdom->wisdom_name_eng }}</h2>
                                        <p class="description">{{ $wisdom->wisdom_tagline }}</p>
                                        {{--<div class="post-meta"><span class="timestamp"><i class="fa fa-clock-">o</i> 6 mins ago</span><span class="comments"><i class="fa fa-comments"></i><a href="#"> 39 comments</a></span></div>--}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>





    {{--<div id="fb-root"></div>--}}

    {{--<script>--}}
    {{--(function(d, s, id) {--}}
    {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
    {{--if (d.getElementById(id)) return;--}}
    {{--js = d.createElement(s); js.id = id;--}}
    {{--js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.11&appId=160917601320611';--}}
    {{--fjs.parentNode.insertBefore(js, fjs);--}}
    {{--}(document, 'script', 'facebook-jssdk'));--}}
    {{--</script>--}}

    @push('scripts')

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

        <script type="text/javascript">
            $(function () {
                $('.post-module').hover(function() {
                    $(this).find('.description').stop().animate({
                        height: "toggle",
                        opacity: "toggle"
                    }, 300);
                });
            })
        </script>

        <script type="text/javascript">
            var app = new Vue({
                el: '#app',
                data: {
                    posts : '',
                    search : '',
                    count : 0,
                    width: 0,
                    menuItem : 'menu-item',
                    activeClass : 'active'

                },
                methods: {
                    getPosts: _.debounce(function() {
                        this.posts = "";
                        this.count = 0;
                        self = this;

                        if (this.search.trim() != '') {
                            axios.post("{{ url('wisdomssearch') }}",{
                                search : self.search
                            })
                                .then(function (response) {
                                    self.posts = response.data;
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                        }

                    }, 500),
                    selectPost: function(keyCode) {
                        // If down arrow key is pressed
                        if (keyCode == 40 && this.count < this.posts.length) {
                            this.count++;
                        }
                        // If up arrow key is pressed
                        if (keyCode == 38 && this.count > 1) {
                            this.count--;
                        }
                        // If enter key is pressed
                        if (keyCode == 13) {
                            // Go to selected post
                            document.getElementById(this.count).childNodes[0].click();
                        }
                    },
                    clearData: function(e) {
                        if (e.target.id != 'search') {
                            this.posts = '',
                                this.count = 0
                        }
                    }
                },
                mounted:function(){
                    self = this;

                    // get width of search input for vue search widget on initial load
                    this.width = document.getElementById("search").offsetWidth;
                    // get width of search input for vue search widget when page resize
                    window.addEventListener('resize', function(event){
                        self.width = document.getElementById('search').offsetWidth;
                    });

                    // To clear vue search widget when click on body
                    document.body.addEventListener('click',function (e) {
                        self.clearData(e);
                    });

                    document.getElementById('search').addEventListener('keydown', function(e) {
                        // check whether arrow keys are pressed
                        if(_.includes([37, 38, 39, 40, 13], e.keyCode) ) {
                            if (e.keyCode === 38 || e.keyCode === 40) {
                                // To prevent cursor from moving left or right in text input
                                e.preventDefault();
                            }

                            if (e.keyCode === 40 && self.posts == "") {
                                // If post list is cleared and search input is not empty
                                // then call ajax again on down arrow key press
                                self.getPosts();
                                return;
                            }

                            self.selectPost(e.keyCode);

                        } else {
                            self.getPosts();
                        }
                    });
                },
            });
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125267750-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-125267750-1');
        </script>

    @endpush
@endsection