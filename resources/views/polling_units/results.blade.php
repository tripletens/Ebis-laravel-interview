@extends('layout')
 
@section('content')

<div class="row">
    <div class="col-md-4" >
        <form method="post" action="/results">
            

            @csrf
            <h1>Select a Local Government Area</h1>
            <div class="form-group">
                <select name="lga" required class="form-control" id="lga">
                    @if(count($lga) > 0 )
                        @foreach($lga as $item)
                            <option name="lga[]" value="{{$item->lga_id}}"> {{ $item->lga_name}}</option>
                        @endforeach
                        
                    @endif
                    
                </select>
                <br>
                <button type="submit" id="submit_btn" class="btn btn-primary "> Get Results </button>
            </div>
        </form>
    </div>
    <div class="col-md-8">
    <div class="card shadow" style="width:100%;">
        <div class="card-body">
            <h5 class="card-title">Polling Units Results </h5>
                <p class="card-text">All Polling Units results are shown here </p>
            <div class="result-div"> 
                @if(session('results') )
                    <span class="alert alert-success"> Total Votes for {{ session('lga')->lga_name}}:  {{ session('results') }}</span><br><br>
                @endif

                @if(session('results') == 0 &&  session('lga') )
                    <span class="alert alert-success"> Total Votes for {{ session('lga')->lga_name}}:  {{ session('results') }}</span><br><br>
                @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
            // $(document).ready(function() {
            //     var lga = $('#lga').val();
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     console.log(lga);
            //         $('#submit_btn').click(function(e){
            //             // e.preventDefault();
            //             $.ajax({
            //                 type:'POST',
            //                 url:"/results",
            //                 data: {lga:lga},
            //                 success:function(data){
            //                     console.log(data.results);
            //                     // console.log(data.results);
            //                     $('#result-div').html('<span class="alert alert-info">' + data.result + '</span>');
            //                     // console.log(JSON.parse(data.result));
            //                 }
            //             });
            //         });
                          
            // });
        </script>
@endsection
