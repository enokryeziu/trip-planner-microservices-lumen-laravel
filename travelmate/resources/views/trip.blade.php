@extends('inc.template')

@php 
$user = "";
$counterCheck = 0;
$nrOfDest = count($_GET)-4;
$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
$start = new DateTime(app('request')->input('start'));
$end = new DateTime(app('request')->input('return'));
$diff = $end->diff($start)->format("%a");
$dests = app('request')->input('destiantion1');
$dest2 = app('request')->input('destiantion2');
$dest3 = app('request')->input('destiantion3');
if($dest2 != ''){
$dests .= ', ' . $dest2;
if($dest3 != '') $dests .= ' and ' . $dest3;
}
@endphp

@section('pageTitle', $diff . ' days in ' .$dests)


@section('content')
<!-- Start destinations Area -->
<div class="container">


    <div id="cd-shadow-layer"></div>

    <div id="cd-cart">
        <h2>Places</h2>
        <ul class="cd-cart-items" id="placeList">
            <li>
                <span class="cd-qty">Please add places you want to visit</span>
            </li>
        </ul> <!-- cd-cart-items -->
        <h2>Hotel</h2>
        <ul class="cd-cart-items" id="placeList">
            <li>
                <span class="cd-qty">Please add the hotels you're gonna stay during the trip</span>
            </li>
        </ul> 

        <a href="#0" class="checkout-btn">Save</a>

        <p class="cd-go-to-cart"><a href="#0">Go to your saved trips</a></p>
    </div> <!-- cd-cart -->
    <section class="section-gap">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="route-tab" data-toggle="tab" href="#route" role="tab" aria-controls="home" aria-selected="true">Route</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="places-tab" data-toggle="tab" href="#places" role="tab" aria-controls="profile" aria-selected="false">Places</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="hotels-tab" data-toggle="tab" href="#hotels" role="tab" aria-controls="contact" aria-selected="false">Hotels</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent"><br>
            <div class="tab-pane fade show active" id="route" role="tabpanel" aria-labelledby="route-tab">
                <ul class="timeline">
                    <li class="timeline-inverted">
                        <div class="timeline-badge"><i class="glyphicon glyphicon-check"><img src="{{asset("img/airplane.png")}}" alt="" style="height:30px;"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Start: 
                                    @php 
                                    if ($query && $query['status'] == 'success') {
                                    echo $query['city'] . ', ' . $query['country'];
                                    }
                                    @endphp
                                </h4>
                                <small class="text-muted"><i class="glyphicon glyphicon-time"></i> Fly: 2h</small>
                            </div>
                        </div>
                    </li>

                    @for($i=1; $i <= $nrOfDest; $i++)
                                              <li class="timeline-inverted">
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card">{{ $i }}</i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">{{ app('request')->input('destiantion' . $i) }}</h4>
                        </div>
                        <div class="timeline-body">
                            <small class="text-muted" data-toggle="modal" data-target="#exampleModalCenter" style="text-decoration:underline;cursor:pointer"> Edit</small>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Change Destination</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control dest data-json" name="destiantion{{ $i}}" placeholder="Destination #{{$i}} " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Destination #{{$i}}'" value="{{ app('request')->input('destiantion'. $i) }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </li>
                @endfor
                <li class="timeline-inverted">
                    <div class="timeline-badge"><i class="glyphicon glyphicon-credit-card"><img src="{{asset("img/airplaned.png")}}" alt="" style="height:30px;"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">End: 
                                @php 
                                if ($query && $query['status'] == 'success') {
                                echo $query['city'] . ', ' . $query['country'];
                                }
                                @endphp
                            </h4>
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                        </div>
                    </div>
                </li>
                </ul>
        </div>

        <div class="tab-pane fade" id="places" role="tabpanel" aria-labelledby="places-tab">
            <div class="row">
                <div class="tabInfoDiv">
                    <form>
                        <h3>ACTIVITIES</h3>
                        @foreach($typePlaces as $type)
                        <input type="checkbox" id="{{ $type["name"] }}" value="{{ $type["name"]}}">{{ $type["name"]}}<br>
                        @endforeach
                    </form>
                </div>
                <div class="tabInfoDiv">
                    <h3>Price <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;"></h3>
                    <label for="amount">Price range:</label>
                    <div id="slider-range"></div>
                </div>
            </div>
            <div class="row">
                <div class="card justify-content-center text-center" style="width: 17rem;">
                    <div class="city-card"></div>
                    <img class="card-img" src="{{asset("img/paris.jpg")}}" alt="Card image cap" style="height:100%">
                    <div class="card-img-overlay">
                        <h1 class="card-title">{{app('request')->input('destiantion1')}}</h1>
                    </div>
                </div>
                @foreach($places1 as $place)
                <div class="card justify-content-center" style="width: 17rem;" id="{{$place["id"]}}">
                    <div class="overlay"></div>
                    <div class="button"><a href="javascript:void(0);" onclick="placeAdded({{$place["id"]}})" id="{{$place["id"]}}"> ADD </a></div>
                    <img class="card-img-top" src="{{asset("img/d2.jpg")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$place["name"]}}</h5>
                        <p class="card-text"><small class="text-muted">{{$place["address"]}}</small></p>
                        <p class="card-text">{{$place["description"]}}</p>
                    </div>
                </div>
                @endforeach
                @if(isset($places2))
                <div class="card justify-content-center text-center" style="width: 17rem;">
                    <div class="city-card"></div>
                    <img class="card-img" src="{{asset("img/munich.jpg")}}" alt="Card image cap" style="height:100%">
                    <div class="card-img-overlay">
                        <h1 class="card-title">{{app('request')->input('destiantion2')}}</h1>
                    </div>
                </div>
                @foreach($places2 as $place)
                <div class="card justify-content-center" style="width: 17rem;" id="{{$place["id"]}}">
                    <div class="overlay"></div>
                    <div class="button"><a href="javascript:void(0);" onclick="placeAdded({{$place["id"]}})" id="{{$place["id"]}}"> ADD </a></div>
                    <img class="card-img-top" src="{{asset("img/d1.jpg")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$place["name"]}}</h5>
                        <p class="card-text"><small class="text-muted">{{$place["address"]}}</small></p>
                        <p class="card-text">{{$place["description"]}}</p>
                    </div>
                </div>
                @endforeach
                @endif
                @if(isset($places3))
                <div class="card justify-content-center text-center" style="width: 17rem;">
                    <div class="city-card"></div>
                    <img class="card-img" src="{{asset("img/munich.jpg")}}" alt="Card image cap" style="height:100%">
                    <div class="card-img-overlay">
                        <h1 class="card-title">{{app('request')->input('destiantion3')}}</h1>
                    </div>
                </div>
                @foreach($places3 as $place)
                <div class="card justify-content-center" style="width: 17rem;">
                    <div class="overlay"></div>
                    <div class="button"><a href="#"> ADD </a></div>
                    <img class="card-img-top" src="{{asset("img/d1.jpg")}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$place["name"]}}</h5>
                        <p class="card-text"><small class="text-muted">{{$place["address"]}}</small></p>
                        <p class="card-text">{{$place["description"]}}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="tab-pane fade" id="hotels" role="tabpanel" aria-labelledby="hotels-tab">Hotels</div>
        </div>
    <!--<button id="go">Save</button>
<input type="text" class="tick_name">-->
    </section>
</div>
<div class="saveNav">
    @if (Auth::check())
     @php
      $user = Auth::user();
     @endphp
      <a href="#home" class="active" id="saveTour">Save</a>
    @else
      <a href="#home" class="active" onclick="alert('You have to be logged in !')">Save</a>
    @endif
    <a href="#home" onMouseOver="this.style.filter='invert(0%)'" onMouseOut="this.style.filter='invert(100%)'" style="filter: invert(100%)"><img style="width:20px;"  src="{{ asset('img/print.png')}}" alt=""></a>
    <div id="cd-cart-trigger" ><a class="cd-img-replace" href="#0">Plan</a></div>
</div>
<script>
    var myObj = {
        "tour":[],
        "places": []
    };
    var placeList = {
        "places": []
    };
    var url = new URL(window.location.href);
    var startD = url.searchParams.get("start"); 
    var endD = url.searchParams.get("return");  
    myObj.tour.push({"start_at": startD ,"end_at": endD, "user_id": "1"});    
    console.log(myObj);
    function placeAdded(id){

        var container = document.getElementById(id);
        var count = container.getElementsByClassName('placeAdded');
        if( count.length == 1){
            var addOverlay = container.getElementsByClassName('overlay')[0].classList.remove("placeAdded");
            var buttonOpa = container.getElementsByClassName('button')[0].removeAttribute("style");
            var buttonRemoveText = container.getElementsByClassName('button')[0].firstChild.innerHTML = 'Add';
            var removeId = id;
            var items=myObj.places;
            var i=items.length;
            while (i--) {
                if(items[i].place_id == removeId){
                    items.splice(i,1);
                }
            }
            console.log(myObj);
            var findPlaceName = container.getElementsByClassName('card-title')[0].innerHTML;
            var items=placeList.places;
            var i=items.length;
            while (i--) {
                if(items[i].name == findPlaceName){
                    items.splice(i,1);
                }
            }
            var inr;
            var findPlacePlan = document.getElementById('placeList');
            findPlacePlan.innerHTML = "";
            for (inr = 0; inr < placeList.places.length; inr++) { 
                findPlacePlan.innerHTML += "<li> "
                                        + placeList.places[inr].name
                                        + "<div class=\"cd-price\">"+ placeList.places[inr].address +"</div>"
                                        + "<a href=\"#0\" class=\"cd-item-remove cd-img-replace\"></a></li>";
            }
            if(placeList.places.length == 0){
                findPlacePlan.innerHTML += "<li><span class=\"cd-qty\">Please add places you want to visit</span></li>"
            }
        }else {
            var addOverlay = container.getElementsByClassName('overlay')[0].classList.add("placeAdded");
            var buttonOpa = container.getElementsByClassName('button')[0].setAttribute("style", "opacity: 1");
            var buttonRemoveText = container.getElementsByClassName('button')[0].firstChild.innerHTML = 'Remove';
            myObj.places.push({"place_id": id,"tour_id": "4"});
            var findPlaceName = container.getElementsByClassName('card-title')[0].innerHTML;
            var findPlaceAdress = container.getElementsByClassName('text-muted')[0].innerHTML;
            placeList.places.push({"name": findPlaceName, "address": findPlaceAdress});
            var inr;
            var findPlacePlan = document.getElementById('placeList');
            findPlacePlan.innerHTML = "";
            for (inr = 0; inr < placeList.places.length; inr++) { 
                findPlacePlan.innerHTML += "<li> "
                                        + placeList.places[inr].name
                                        + "<div class=\"cd-price\">"+ placeList.places[inr].address +"</div>"
                                        + "<a href=\"#0\" class=\"cd-item-remove cd-img-replace\"></a></li>";
            }
        }
    }

</script>
<!-- End destinations Area -->
@endsection