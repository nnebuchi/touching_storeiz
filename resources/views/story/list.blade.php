@extends('layouts.main.app')
@section('content')
<!-- chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="container" style="margin-top:-60px!important">

  <section class="publication">
     <div class="alert-holder"></div>
    @include('layouts.shared.writer-table-start')
    
    <div class="row mt-5" style="border-top: 1px solid #D9AD89;">
      <div class="col-xl-9 col-lg-12 table-responsive " style="padding: 30px 0;">
          <table class="table cust_table">
          <thead>
            <tr>
              <th scope="col" width="150" class="text-start story-data-heading">Title </th>
              <th scope="col" width="150" class="text-start story-data-heading">Tags </th>
              <th scope="col" width="50" class="text-start story-data-heading">Reads </th>
              <th scope="col" width="50" class="text-start story-data-heading">Likes </th>
              <th scope="col" width="50" class="text-start story-data-heading">Dislikes </th>
              <th scope="col" width="50" class="text-start story-data-heading">Comments </th>
              <th scope="col" width="100" class="text-start story-data-heading"> <span class="d-none d-lg-inline">Read</span>  Hour </th>
              <th scope="col" width="100">Action</th>
            </tr>
          </thead>
            <tbody class="">
              @foreach($stories as $story)
                <tr class="table_hover story-row">
                  <td class="text-start title" width="150">{{$story->title}}</td>
                  <td class="text-start tags" width="150">
                    @foreach($story->tags as $t_key=> $tag)
                    <small class="text-mute" style="font-size:13px;">
                      {{$tag->title}} @if($t_key < count($story->tags)) &nbsp;<span class="bi bi-dot story-slider-dot"> </span>@endif
                    </small>
                    @endforeach
                  </td>
                  <td class="text-start reads" width="50">{{number_format($story->reads_count)}}</td>
                  <td class="text-start likes" width="50">{{number_format($story->likes_count)}}</td>
                  <td class="text-start dislikes" width="50">{{number_format($story->dislikes_count)}}</td>
                  <td class="text-start comments" width="50">{{number_format($story->comments_count)}}</td>
                  <td class="text-start time_spent" width="100" >{{formatReadTimeCount($story->reads->sum('time_spent'))}}</td>
                  <td class="text_start" width="100">
                    <div class="d-flex align-items-center">
                      <a href="{{route('edit-story', $story->slug)}}" class="btn btn-sm ts-btn-secondary me-1"> <span class="action-text d-none">Edit</span> <i class="fa fa-edit"></i></a>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#deleteStoryModal-{{$story->slug}}" class="btn btn-sm btn-danger me-1"> <span class="action-text d-none">Delete</span>  <i class="fa fa-trash"></i></button>
                      <div class="form-check form-switch" style="width:100%;">
                        <input class="form-check-input " type="checkbox" role="switch" id="flexSwitchCheckChecked" @if($story->published == 1)  checked @endif style="padding: 10px;" onchange="toggleStatus('{{$story->id}}')">
                        {{-- <label class="form-check-label" for="flexSwitchCheckChecked">On</label> --}}
                      </div>
                    </div>
                    
                  </td>
                </tr>
              @endforeach
                
            </tbody>
          </table>
      </div>
      <div class="col-xl-3 col-lg-12 cust-border d-none d-md-block" >
        <div class="row story-analitics" id="analitics-{{$story ? $story->id : ''}}">
          <div class="col-xl-12 col-lg-12">
            <h2 class="analytics-reactions text-capitalize" >Reactions</h2>
            <div id="donut_single"> </div>
          </div>
          <div class="col-xl-12 col-lg-12">
            <h2 class="analytics-reactions text-capitalize" >engagements</h2>
            <div id="curve_chart"></div>
          </div>
          
            {{-- <div class="col-xl-12">
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
            </div> --}}
        </div>
        
        
      </div>
    </div>
     
  </section>

  @foreach ($stories as $story)
      <!--Delete Comment  Modal -->
   <div class="modal fade" id="deleteStoryModal-{{$story->slug}}" tabindex="-1" aria-labelledby="deleteStoryModal-{{$story->slug}}Label" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-scrollable"  >
        <div class="modal-content modal-content-cust "  >
            <div class="modal-head d-flex">
                <h6 class="modal-titl  modal-center mx-auto my-3" id="deleteStoryModal-{{$story->slug}}Label">Delete story ?</h6>
                <span type="button" class="btn-close close-x my-3" data-bs-dismiss="modal" aria-label="Close"></span>
            </div>
            <div class="modal-body text-center" >
              <p class="modal-title  modal-center mx-auto my-3" id="deleteStoryModal-{{$story->slug}}Label" style="font-size:16px;">Are you sure you want to delete this story ?</p>
                <div class="modal-foote text-center mt-2">
                    <button type="button" class="btn ts-btn-primary-outline" data-bs-dismiss="modal">No</button>
                    <a href="{{route('delete-story', $story->slug)}}" class="btn ts-btn-primary mx-auto my-4 comment-btn" >Delete</a>
                </div>
            </div>
        </div>
      </div>
   </div>
  @endforeach

<script type="text/javascript">

    const toggleStatus = (id)=>{
      $.ajax({
        type:"get",
        url:`${url}/story/mine/${id}/toggle-publish-status`,
        success:(resp) => {
          if(resp?.status === 'success'){
            showAlert('success', resp?.message)
          }else{
            showAlert('danger', resp?.error)
          }
        },
        error:(par1, par2, par3)=>{
          console.log(par3);
          showAlert('danger', 'something went wrong')
        }
      });
    }

    google.charts.load('current', {'packages':['corechart']});

   $('.story-row').on('click', function(){
      const likes =$(this).find('.likes').text();
      const dislikes =$(this).find('.dislikes').text();
      const comments =$(this).find('.comments').text();
      const reads =$(this).find('.reads').text();
      const time_spent =$(this).find('.time_spent').text();

      console.log(likes);
      google.charts.setOnLoadCallback(drawChart({
        likes: likes,
        dislikes: dislikes
      }));

      google.charts.setOnLoadCallback(drawEngagementGraph);


   });
  
    function drawChart(story_data) {

      var data = google.visualization.arrayToDataTable([
        ['Effort', 'Amount given'],
        ['Likes',     parseInt(story_data.likes)],
        ['Dislikes',     parseInt(story_data.dislikes)]
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
    
   

    function drawEngagementGraph() {
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

    $(document).ready(function(){
      setTimeout(() => {
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart({
          likes: $('.likes').text(),
          dislikes: $('.dislikes').text()
        }));

        google.charts.setOnLoadCallback(drawEngagementGraph);

      }, 1000);
    
    })

   
  </script>

  @endsection