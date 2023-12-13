@extends("layouts.app")

@section("title")
    User Panel
@endsection

@section("header-link")
    <link rel="stylesheet" href="/app/userpanel.css">
@endsection

@section("main_noborder")
    <div class="vfl alcenter">Your Account</div>

    <div class="vfl mau">
        <div class="card mlu" style="width: 18rem;">
            <div class="card-body alcenter">
              <h5 class="card-title ctitle">Post</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary cvalue">{{ $posts }}</h6>
              <a href="#" class="card-link clink">Show</a>
            </div>
          </div>
          <div class="card mc20" style="width: 18rem;">
            <div class="card-body alcenter">
              <h5 class="card-title ctitle">Card title</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary cvalue">{{ $comments }}</h6>
              <a href="#" class="card-link clink">Show</a>
            </div>
          </div>
          <div class="card mru" style="width: 18rem;">
            <div class="card-body alcenter">
              <h5 class="card-title ctitle">Card title</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary cvalue">number</h6>
              <a href="#" class="card-link clink">Show</a>
            </div>
          </div>
    </div>
@endsection
