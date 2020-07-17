@include('inc.headersidebar-db')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

          <div class="container-dash-board">
          <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header">June</div>
              <div class="card-body">
                <h5 class="card-title">Your Trips: </h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <img src="{{asset('img/airplane.png')}}">
              <p class="flights-no" style="font-size:30px; float:right; padding-top:10%;">10</p>
              </div>
            </div>
          </div>
          <div class="container-dash-board">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">July</div>
                <div class="card-body">
                  <h5 class="card-title">Your Reservation: </h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <img src="{{asset('img/booking.png')}}">
              <p class="reservation-no" style="font-size:30px; float:right; padding-top:10%;">7</p>
                </div>
              </div>
          </div>
        <div class="container-dash-board">
              <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                  <div class="card-header">August: </div>
                  <div class="card-body">
                    <h5 class="card-title">Total Payments</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <img src="{{asset('img/credit-card.png')}}">
              <p class="payments-no" style="font-size:30px; float:right; padding-top:10%;">3540$</p>
                  </div>
                </div> 
              </div>

              <style>
              .container-dash-board{
                display: inline-block;
                padding-left: 6%;
                padding-top : 4%;
              }
              </style>
            
          </div>
        </main>

@include('inc.functions-dashb')

