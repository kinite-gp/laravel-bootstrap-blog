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
        @foreach($items as $item)
            <li class="list-group-item model_btn">
                    <h3 class="item-title">{{ $item->title }}</h3>
                    <div class="space-x"></div>




            </li>
        @endforeach

        <div class="mau">
            {{ $items->links() }}
        </div>
        
    </ul>


    </div>

@endsection
