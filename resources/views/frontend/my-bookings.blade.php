@extends('frontend/index')
@section('content')


<style>
    .go_back_button {
    background: #173854;
    padding: 10px 40px;
    border-radius: 5px;
    color: #fff;
    font-weight: 500;
    margin: auto;
    cursor: pointer;
}
</style>

<div class="My_Bookings">
    <div class="container">
        <div class="My_Bookings_Heading">
            <h2 class="text-white">All Bookings</h2>
        </div>

         @php $current_step = 'get'.$currentStep['current_step']; @endphp
        <div class="My_Bookings_Section">    

            <a href="{{route($current_step)}}"><button class="go_back_button">Back</button></a><br><br>               
            <div class="table-responsive">
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Date</th>                     
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                    </thead>
                    <tbody> 
                          {{-- dd($get_my_bookings) --}}
                          @foreach($get_my_bookings as $my_bookings)     
                                         
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$my_bookings->bookings_belongs_slots->date}}</td>
                              <td>{{date('h:i a', strtotime($my_bookings->bookings_belongs_slots->start_time))}}</td>
                              <td>{{date('h:i a', strtotime($my_bookings->bookings_belongs_slots->end_time))}}</td>
                            </tr>
                          @endforeach  
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>S.no</th>
                            <th>Date</th>                     
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection