@extends('layout')

@section('content')

<style>
    .nav_bar{
        margin-top:0px;
        background-color: rgb(26, 29, 220);
    }
</style>


    <div class="container">
       
      
        <h4>Welcome, {{ $data['loged_pha_user_name'] }}</h4>
        {{--  <h4>Welcome, {{ $data['loged_pha_user_id'] ?? 'Unknown' }}</h4>  --}}



        
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>user_id</th>
                          
                        <th>note</th>                    
                        <th>deliver_address</th>
                        <th>deliver_time_slot</th>
                        <th>Action</th>

                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($prescriptions as $prescription)
                         
                    <tr>
                        <td>{{ $prescription->id }}</td>
                        <td>{{ $prescription->user_id }}</td>
                        {{--  <td style= "display:flex; >

                            @foreach($images as $image)  
                           
                            <img src="{{ asset($image) }}" alt="Thumbnail Image" style= "width: 48px; height: 75px;" class="thumbnail">
                            @endforeach  

                        </td>  --}}
                        <td>{{ $prescription->note }}</td>
                        <td>{{ $prescription->deliver_address }}</td>
                        <td>{{ $prescription->deliver_time_slot }}</td>
                        {{--  <a href="{{ route('') }}" class="btn btn-primary">VIEW</a>  --}}
                        <td><a href="{{ route('prescriptions_view', [$prescription->user_id ]) }}" class="btn btn-primary">VIEW</a></td>
                                             
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $prescriptions->links() }}
            
        </div>
     
    </div>
 
@endsection
 
