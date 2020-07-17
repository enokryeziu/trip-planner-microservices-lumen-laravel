@include('inc.headersidebar-db')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    @foreach($trip as $info)
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            @php 
            $start = new DateTime($info['start_at']);
            $end = new DateTime($info['end_at']);
            $diff = $end->diff($start)->format("%a");
            @endphp
            <h1 class="display-4">Past Trip</h1>
            <p class="lead">This trip was {{ $diff }} day long.</p>
        </div>
    </div>
    @endforeach

    <div class="container-card-trip" style="display: inline-block; padding-left:3%;" >
       <h1>Places</h1><br>
        <div class="row">
            @foreach($places as $place)
                <div class="card justify-content-center" style="width: 17rem;margin:10px" id="{{$place["id"]}}">
                    <img class="card-img-top" src="{{asset("img/d2.jpg")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$place["name"]}}</h5>
                        <p class="card-text"><small class="text-muted">{{$place["description"]}}</small></p>
                        <p class="card-text"><small class="text-muted">{{$place["address"]}}</small></p>
                        <p class="card-text"></p>
                    </div>
                </div>
             @endforeach
        </div><br>
        <h1>Hotels</h1><br>
        <div class="row">
                
                     <p class="card-text"><small class="text-muted">This trip does not have a reserved hotel!</small></p><br><br><br>
                
        </div>
    </div>
</main>
@include('inc.functions-dashb')


