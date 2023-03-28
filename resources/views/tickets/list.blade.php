@extends('layouts.main.app')
@section('content')
<!-- chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="container">

            
  <section class="publication">
     <div class="row">
        <div class="col-xl-9  ">
           <h1 class="publication_title feed_title">Publications</h1>
              <div class="input-group mt-5">
                 <input type="search" class="form-control search_input" id="" placeholder="Search">
                 <div class="input-group-text bg-white custgrp_text">
                    <span><i class="bi bi-search "></i></span>
                 </div>
               </div>
            
        </div>
        <div class="col-xl-3  mt-4">
          <h1 class="publisher_name popular"><span><i class="bi bi-person "></i></span> Jennifer Rowland</h1>
        
              <div class="input-group mt-5">
                <input type="search" class="form-control filter_input" id="" placeholder="Filter">
                <div class="input-group-text bg-white custgrp_text">
                    <span><i class="bi bi-funnel "></i></span>
                </div>

              </div>
        
        </div>
     </div>
    
      
      <div class="row my-5" >
        <div class="col-xl-9 col-lg-12 table-responsive">
             
           <table class="table">
              <thead>
                <tr>
                  <th scope="col" width="300" class="text-center">Title </th>
                  <th scope="col" width="300" class="text-center">Category </th>
                  <th scope="col" width="200" class="text-center">Reads </th>
                  <th scope="col" width="200" class="text-center">Likes </th>
                  <th scope="col" width="200" class="text-center">Dislikes </th>
                  <th scope="col" width="200" class="text-center">Comments </th>
                  <th scope="col" width="300" class="text-center">Date Published </th>
                  
                </tr>
              </thead>
             
          </table>      
        </div>
        
      </div>
      <div class="row " style="border-top: 1px solid #D9AD89;">
        <div class="col-xl-9 col-lg-12 table-responsive " style="padding: 30px 0;">
           <table class="table cust_table">
             
              <tbody class="">
                 <tr class="table_hover">
                    <td width="150">Seasons of Horror</td>
                    <td width="150" class="text-cente">Horror</td>
                    <td width="100">6,000</td>
                    <td width="100">2,000</td>
                    <td width="110">500</td>
                    <td width="150">450</td>
                    <td width="100" >25-10-22</td>
                  </tr>
                  <tr style="height: 30px;"> 
                  </tr>
                 <tr class="table_hover">
                    <td width="150">Seasons of Horror</td>
                    <td width="150" class="text-cente">Horror</td>
                    <td width="100">6,000</td>
                    <td width="100">2,000</td>
                    <td width="110">500</td>
                    <td width="150">450</td>
                    <td width="100" >25-10-22</td>
                  </tr>
                  <tr style="height: 30px;"> 
                  </tr>
                 <tr class="table_hover">
                    <td width="150">Seasons of Horror</td>
                    <td width="150" class="text-cente">Horror</td>
                    <td width="100">6,000</td>
                    <td width="100">2,000</td>
                    <td width="110">500</td>
                    <td width="150">450</td>
                    <td width="100" >25-10-22</td>
                  </tr>
                  <tr style="height: 30px;"> 
                  </tr>
                 
              </tbody>
            </table>
        </div>
        <div class="col-xl-3 col-lg-12 cust-border" >
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <h2 class="analytics-reactions text-capitalize" >Reactions</h2>
              <div id="donut_single"> </div>
            </div>
            <div class="col-xl-12 col-lg-12">
              <h2 class="analytics-reactions text-capitalize" >engagements</h2>
              <div id="curve_chart"></div>
            </div>
            
             <div class="col-xl-12">
                <h2 class="analytics-reactions text-capitalize">Comments</h2>
                <div class="custom_card border border-1 rounded-2 px-3 py-2 my-4">
                  <div class="d-flex justify-content-between">
                       <div class="card-title">
                           John Michael
                       </div>
                       <small class="text-mut">
                           2 days ago
                       </small>
                      
                   </div>
                   <div class="custom-card_text mt-2">
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non incidunt expedita perspiciatis ullam id voluptatibus.
                   </div>
               </div>
             </div>
          </div>
          
         
        </div>
      </div>
     
  </section>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Effort', 'Amount given'],
        ['Likes',     80],
        ['Dislikes',     20]
      ]);

      var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
      chart.draw(data, {
        // width: 300,
        // height: 240,
        // title: 'Toppings I Like On My Pizza',
        colors: ['#ff8219', '#0097b2'],
        legend: 'bottom',
        pieHole: 0.3,
        pieSliceTextStyle: {
          color: 'black',
        }
      });
    }
   

  </script>
   <script type="text/javascript">
    
    google.charts.load('current', {'packages':['line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Month', 'Likes', 'Comments'],
        ['Jan',  350, 200],
        ['Feb',  110, 100],
        ['March',  660, 500],
        ['Apr',  900, 900],
        ['May',  850, 800],
        ['Jun',  900, 950]
      ]);

      var options = {
        title: 'Story Engagement',
        curveType: '',
        legend: { position: 'bottom' },
        colors: ['#ff8219', '#0097b2'],
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
  </script>

  @endsection