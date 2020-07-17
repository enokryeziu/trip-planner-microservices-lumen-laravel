@include('inc.headersidebar-db')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Past Trips</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>


    <div class="container-card-trip" style="display: inline-block; padding-left:3%;" >
      <div class="row">
       @foreach($trips as $trip)
        <div class="card" style="width: 18rem;margin-left:20px;">
            <img src="{{asset("img/packages/d2.jpg")}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
            </div>
            <ul class="list-group list-group-flush">
               <li class="list-group-item">City: Paris, Munich </li>
                <li class="list-group-item">Begin date: {{$trip["start_at"]}}</li>
                <li class="list-group-item">End date: {{$trip["end_at"]}}</li>
                
            </ul>


            <div class="card-body">
               <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="trips/{{$trip["id"]}}" class="btn btn-primary">More details</a>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</main>
@include('inc.functions-dashb')


