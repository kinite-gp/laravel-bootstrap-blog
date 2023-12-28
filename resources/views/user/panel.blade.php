@extends("layouts.app")

@section("title")
    User Panel
@endsection

@section("header-link")
    <link rel="stylesheet" href="/app/userpanel.css">
@endsection

@section("main_noborder")
    
    <div class="ctitle">Your Account</div>

    <div class="vfl mau">
        <div class="card mlu" style="width: 18rem;">
            <div class="card-body alcenter">
              <h5 class="card-title ctitle">Your Post</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary cvalue">{{ $posts }}</h6>
            </div>
          </div>
          <div class="gap"></div>
          <div class="card mru" style="width: 18rem;">
            <div class="card-body alcenter">
              <h5 class="card-title ctitle">Your Comments</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary cvalue">{{ $comments }}</h6>
            </div>
          </div>
          
    </div>

    <div class="vfl mau menu">
      <div class="">List Your Post</div>
      
    </div>

    <div class="menu">
      <ul class="list-group list-group-flush">

		@if ($posts == 0)
		<li class="list-group-item model_btn">
			<h3 class="item-title">You have not left any posts</h3>
			
		</li>
		@else
			@foreach($items as $item)
			<li class="list-group-item model_btn vfl">
					<h3 class="item-title">{{ $item->title }}</h3>
					<div class="space-x"></div>
					<a class="btn btn-link">Sea more</a>



			</li>
			@endforeach

			<div class="mau">
				{{ $items->links() }}
			</div>
		@endif

        
        
    </ul>

    <div class="vfl mau menu">
      <div class="">List Your Comment</div>
      
    </div>

    <div class="menu">
      <ul class="list-group list-group-flush">

        @if ($comments == 0)
		<li class="list-group-item model_btn">
			<h3 class="item-title">You have not left any comments</h3>
			
		</li>
        @else
          @foreach($items2 as $item2)
            <li class="list-group-item model_btn vfl">
                    <h3 class="item-title">{{ substr($item2->comment, 0 ,30)."...." }}</h3>
                    <div class="space-x"></div>
					<a class="btn btn-link">Sea more</a>



            </li>
          @endforeach

		  <div class="mau">
            {{ $items2->links() }}
          </div>
        @endif

        

        
        
    </ul>


    </div>

@endsection
