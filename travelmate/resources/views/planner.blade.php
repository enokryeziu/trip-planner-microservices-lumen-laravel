@extends('inc.template')

@section('pageTitle', 'Trip Planner')


@section('content')
<!-- Start destinations Area -->
<div class="container">
<section class="planner-area section-gap">
<form class="form-wrap" method="GET" action="{{ asset('trip') }}">
    <div id="planner-form">									
        <input type="text" class="form-control dest data-json" name="destiantion1" placeholder="Destination #1 " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Destination #1'" value="{{ app('request')->input('to') }}">
    </div>
    <span class="addDestination" onclick="addDestination()"><span class="lnr lnr-plus-circle"></span>Add Another Destination</span>
    <input autocomplete="off" type="text" class="form-control date-picker" name="start" placeholder="Start " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '" value="{{ app('request')->input('startDate') }}">
    <input autocomplete="off" type="text" class="form-control date-picker" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '" value="{{ app('request')->input('returnDate') }}">
    <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '" value="{{ app('request')->input('adultNo') }}">
    <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '" value="{{ app('request')->input('childNo') }}">							
    <button class="primary-btn text-uppercase" value="NextTrip">Next</button>									
</form>
    </section>
</div>
<!-- End destinations Area -->
@endsection
