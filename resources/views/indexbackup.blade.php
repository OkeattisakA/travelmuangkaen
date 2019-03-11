@extends('layouts.guest')
@section('title','Travel Muangkaen')

@section('content')

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

    <div id="app" >

        <br>

        <div class="row">
            <div class="col-md-12">

                <input type="text" class="form-control input-lg" id="search" autocomplete="off" v-model="search">
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

        <br>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        @foreach ($places as $place)
                            <div class="col-md-3">
                                <div class="card">

                                    <img src="{{ asset("uploads/covers/".$place->place_cover) }}" class="img-thumbnail" alt="">

                                    <div class="card-body">
                                        <h4 class="card-title">{{ $place->place_name_th }}</h4>
                                        <p class="card-text">{{ $place->place_tagline }}</p>
                                        <p class="card-text"><small class="text-muted">{{ $place->updated_at }}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>




    @push('scripts')


        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>


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
                            axios.post("{{ url('search') }}",{
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