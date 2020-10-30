@extends('layout')
 
@section('content')

                <div class="row">
                    <div class="col-md-3" >
                        <div class="list-group">
                            @if(count($polling_units) > 0)
                                @foreach($polling_units as $item)
                                <!-- {{ route('get-announced-pu-results-unique-id',$item->uniqueid) }} -->
                                    <button  id="button_poll{{$item->uniqueid}}" class="list-group-item list-group-item-action list-group-item-primary">
                                        {{ $item->polling_unit_name .' => '. $item->polling_unit_number}}</button>
                                @endforeach
                            @else
                                <span class="alert alert-info"> No Polling Unit Available </span>
                            @endif
                            
                        </div>
                        <br>
                        {{ $polling_units->links() }}
                        <br>
                    </div>

                    <div class="col-md-9">
                    <div class="card shadow" style="width:100%;">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        
                        <div class="card-body">
                            <h5 class="card-title">Polling Units Results </h5>
                            <p class="card-text">Individual Polling Units results are shown here </p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                             <table class="table table-striped" id="result-table" >
                                <thead>
                                <tr>
                                    <th>Party</th>
                                    <th>Result</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                                <span id="display"></span>
                            </table>
                        </div>
                    </div>
                   
                    </div>
                </div>
                
                        
            </div>
        
        <script type="text/javascript">
            $(document).ready(function() {
                // $('#display').css('display','none');
                var polling_units = <?php echo json_encode($polling_units); ?>;
                console.log(polling_units.data)//;
                $.each(polling_units.data,function(i,item){
                    // console.log(item.uniqueid)
                    $('#button_poll'+ item.uniqueid).mouseout(function(){
                        $(this).addClass('primary');
                    })
                    $('#button_poll'+ item.uniqueid).click(function(){
                        // e.preventDefault();
                        // $(this).css('backgroundColor','red');
                        $('#result-table').find('tbody').empty();
                        
                        $.ajax({
                            type:'GET',
                            url:"/get_announced_pu_results/" + item.uniqueid,
                            // data:{uniqueid:uniqueid},
                            success:function(data){
                                if( JSON.parse(data.party_and_result).length == 0){
                                        $('#display').html('<span class="alert alert-info"> No Record Available </span>');
                                        // $('#result-table > tbody:last-child').append('<tr><span class="alert alert-info"> No Record Available </span></tr>');
                                }else{
                                    $('#display').html('<span> </span>');
                                    // $('#display').css('display','none');
                                    for(var i = 0; i < JSON.parse(data.party_and_result).length ; i++ ){
                                        $('#result-table > tbody:last-child').append('<tr><td>' + JSON.parse(data.party_and_result)[i].party_name + '</td><td>' + JSON.parse(data.party_and_result)[i].party_score + '</td></tr>');
                                    }
                                }
                                // $('#display').html("working");
                                
                                // alert(data.party_and_result);
                                // console.log(data.party_and_result);
                                console.log(JSON.parse(data.party_and_result));

                            }
                        });
                    });
                });                
            });
        </script>
@endsection