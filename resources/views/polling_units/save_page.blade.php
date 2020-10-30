@extends('layout')
 
@section('content')

<div class="row">
    
    <div class="col-md-8">
        <div class="card shadow" style="width:80%;">
            <div class="card-body">
                <h5 class="card-title">Save Polling Units Results </h5>
                    
                <form method="post" action="/save">
                <!-- `result_id`, `polling_unit_uniqueid`, `party_abbreviation`, 
                `party_score`, `entered_by_user`, `date_entered`, `user_ip_address` -->
                @if(session('success'))
                    <span class="alert alert-success"> {{ session('success')}}</span><br><br>
                @endif
                
                @csrf
                    <div class="form-group">
                        <input type="number" required name="polling_unit_uniqueid" class="form-control" required placeholder="Enter Polling Unit Unique ID "/>
                    </div>
                    <div class="form-group">
                    <select name="party_abbreviation" class="form-control" required>
                        <option value="">-- Select a Polling Unit  -- </option>
                            @if(count($polling_unit) > 0 )
                                @foreach($polling_unit as $item)
                                    <option value="{{$item->uniqueid}}"> {{$item->polling_unit_name}}</option>
                                @endforeach
                            @endif
                            
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <select name="party_abbreviation" class="form-control" required>
                        <option value="">-- Select a Party -- </option>
                            @if(count($party) > 0 )
                                @foreach($party as $item)
                                    <option value="{{$item->partyname}}"> {{$item->partyname}}</option>
                                @endforeach
                            @endif
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" required name="party_score" class="form-control" required placeholder="Enter Party Score"/>
                    </div>
                    <div class="form-group">
                        <input type="text" required name="entered_by_user" class="form-control" required placeholder="Entered by who?"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
