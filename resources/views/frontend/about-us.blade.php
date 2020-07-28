@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')

<section id="about-sms">
<div class="container">
<div class="row">
<div class="col-md-12">
                 <div class="section-title">
                    <span>Welcome to</span>
                    <h2>The Ecarkhana Online</h2>
                    <div class="separator"></div>
                </div>
</div>
<div class="col-md-12">
<p style="text-align:center;">
E-carkhana is the best premium WordPress Theme. We provide everything you need to build an Amazing dealership website developed especially for car sellers, dealers or auto motor retailers. You can use this template for creating website based on any framework language.
</p>
</div>

<div class="col-md-6">
<p>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus vero voluptatibus natus, magnam perferendis reprehenderit cupiditate deleniti, laudantium dolorum adipisci reiciendis corrupti vel dignissimos ipsam molestias esse! Dolorum ipsa ducimus corporis. Ad vitae, provident consectetur fugit ratione ut molestias aperiam optio laborum blanditiis placeat. Ab, in excepturi. Accusantium delectus, dignissimos id aliquam veniam, corporis asperiores totam nostrum, nam magnam error! Voluptate quis possimus quam? Aperiam excepturi distinctio explicabo veniam eum. Et totam, autem illo aut error cupiditate quibusdam odio id!
</p>
</div>

<div class="col-md-6">
<p>
Lorem ipsum dolor sit amet consectetur adipisicing elit. A pariatur numquam aspernatur necessitatibus inventore repudiandae! Minus animi voluptatem iure. Repudiandae quis voluptatum eaque itaque explicabo assumenda nemo ullam, cupiditate tenetur culpa dicta hic sint quos accusantium eum, beatae maiores inventore labore eos aperiam laudantium? Hic cum, deleniti ipsum odio saepe vitae ipsa. Veniam, architecto quas? Ipsa temporibus accusamus deserunt, necessitatibus officiis libero et impedit sint ullam eius vero rem soluta earum harum minima perspiciatis voluptate in eum sunt veritatis. Dicta!
</p>
</div>

<div class="row">
	<div class="col-md-6 sms-abt-img">
		<img src="http://ecarkhana/images/sms15.jpg" alt="">
	</div>

	<div class="col-md-6">
		<p>
			Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati dignissimos voluptates, ut quia corrupti asperiores atque expedita voluptatum laboriosam at officia repudiandae animi quam harum temporibus aliquid consequatur autem quae odit quos omnis rem? In, veniam quibusdam. Odio quidem quasi tenetur, exercitationem suscipit debitis ratione cum natus voluptas aspernatur a molestias numquam illo deleniti veniam porro nobis eum? Exercitationem ullam eaque, quibusdam porro quaerat nemo necessitatibus obcaecati. Ullam vel perferendis ratione ipsa expedita sunt rerum, tempora nulla laboriosam omnis soluta est earum, consequatur repellendus vero commodi excepturi. Neque molestiae itaque beatae. Sunt, similique corporis velit dolor ipsa quia nesciunt adipisci porro itaque illum consequuntur saepe voluptatem eos iste natus rerum modi perspiciatis quis eveniet aut doloremque ab placeat. Eum, labore?
		</p>
	</div>
</div>

</div>
</div>
</section>

@endsection