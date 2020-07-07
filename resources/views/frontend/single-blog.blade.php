@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


    <!--=================================
   blog  -->

    <section class="blog blog-single page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-entry">
                        <div class="blog-entry-image  clearfix">
                            <div class="portfolio-item">
                                <img class="img-fluid" src="images/blog-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="entry-title">
                            <a href="#">Time to change your</a>
                        </div>
                        <div class="entry-meta">
                            <ul>
                                <li><a href="#"><i class="fa fa-user"></i> By Cardealer </a> /</li>
                                <li><a href="#"><i class="fa fa-comments-o"></i> 5 Comments</a> /</li>
                                <li><a href="#"><i class="fa fa-folder-open"></i> News 2016</a> /</li>
                                <li><a href="#"><i class="fa fa-heart-o"></i>10</a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <p>Proin gravida nibh lorem ipsum dolor sit amet of Lorem Ipsum. vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh
                                vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt pharetra.<br /><br /> Nec sagittis sem lorem ipsum dolor sit amet of Lorem Ipsum. Proin graelit consequat ipsum, nibh id elit.
                                Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt pharetra.</p>
                            <blockquote> Cupiditate veritatis lorem ipsum dolor sit amet, consectetur adipisicing elit. autem nobis magni alias dolorum ad maxime inventore! Hic voluptate temporibus maxime obcaecati qui iusto, nulla dolorem corrupti voluptatibus sequi.
                                <cite> – John Doe</cite>
                            </blockquote>
                            <p>Aenean sollicitudin lorem ipsum dolor sit amet of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
                                cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt pharetra.<br /><br /> Sagittis sem nibh lorem ipsum dolor sit amet of Lorem Ipsum. Proin graelit consequat ipsum, nec id elit. Duis sed
                                odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt pharetra.</p>
                        </div>
                        <div class="entry-share clearfix">
                            <a class="button red float-left" href="#"> Read More </a>
                            <div class="share float-right">
                                <ul class="list-style-none">
                                    <li> <a href="#"><i class="fa fa-facebook"></i></a> </li>
                                    <li> <a href="#"><i class="fa fa-twitter"></i></a> </li>
                                    <li> <a href="#"><i class="fa fa-instagram"></i></a> </li>
                                    <li> <a href="#"><i class="fa fa-pinterest-p"></i></a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-form">
                        <div class="gray-form row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputphone" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="7" placeholder="Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a class="button red" href="#">SUBMIT</a>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================ -->
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget">
                            <h6>Search here</h6>
                            <div class="widget-search">
                                <i class="fa fa-search"></i>
                                <input type="search" class="form-control placeholder" placeholder="Search....">
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h6>categories</h6>
                            <div class="widget-link">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-angle-right"></i> Test Drives </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-angle-right"></i> Video Reviews </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-angle-right"></i> Analysis & Features</a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-angle-right"></i> Pre-purchase Car Inspection </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-angle-right"></i> Analysis & Features</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h6>Recent Posts</h6>
                            <div class="recent-post">
                                <div class="recent-post-image">
                                    <img src="images/11.jpg" alt="">
                                </div>
                                <div class="recent-post-info">
                                    <a href="#">Time to change your </a>
                                    <span><i class="fa fa-calendar"></i> September 30, 2017</span>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="recent-post-image">
                                    <img src="images/12.jpg" alt="">
                                </div>
                                <div class="recent-post-info">
                                    <a href="#">The best time to</a>
                                    <span><i class="fa fa-calendar"></i> September 30, 2017</span>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="recent-post-image">
                                    <img src="images/14.jpg" alt="">
                                </div>
                                <div class="recent-post-info">
                                    <a href="#">Replacing a timing</a>
                                    <span><i class="fa fa-calendar"></i> September 30, 2017</span>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h6>Tags</h6>
                            <div class="tags">
                                <ul>
                                    <li><a href="#">Bootstrap</a></li>
                                    <li><a href="#">HTML5</a></li>
                                    <li><a href="#">Wordpress</a></li>
                                    <li><a href="#">CSS3</a></li>
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Multipurpose</a></li>
                                    <li><a href="#">Bootstrap</a></li>
                                    <li><a href="#">HTML5</a></li>
                                    <li><a href="#">Wordpress</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h6>archives</h6>
                            <div class="widget-link">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-angle-right"></i> June <span class="float-right">12</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-angle-right"></i> January <span class="float-right">28</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-angle-right"></i> March <span class="float-right">08</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-angle-right"></i> November <span class="float-right">04</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-angle-right"></i> December <span class="float-right">13</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
  blog -->


@endsection