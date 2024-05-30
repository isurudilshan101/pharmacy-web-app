@extends('layout')

@section('content')
    <div class="container">
        <h1>User Dashboard</h1>
      
        {{--  
        @if (session()->has('loged_user_name'))
                <p>   Hi, Welcome : {{ session('loged_user_name') }}</p>
                

        @endif  --}}


        @if(session('data'))
            <h2>Welcome, {{ session('data')['loged_user_name'] }}</h2>
            <p>Your user ID: {{ session('data')['loged_user_id'] }}</p>



        <div>
            <form  method="POST" enctype="multipart/form-data" action="{{ route('submit_prescription') }}">
             
                @csrf
                <div class="form-group">
                   
                    <input name="user_id" id="user_id" class="form-control" type="hidden" value="{{ session('data')['loged_user_id'] }}" >
                    
                </div>
               
                <div class="form-group">
                    <label for="images">Upload Prescription (Max 5 images)</label>
                    <input type="file" name="images[]" id="images" class="form-control" multiple   required>
                </div>
            
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea name="note" id="note" class="form-control" rows="3"></textarea>
                </div>
            
                <div class="form-group">
                    <label for="delivery_address">Delivery Address</label>
                    <input type="text" name="delivery_address" id="delivery_address" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="delivery_time">Delivery Time (2 hour time slots)</label>
                    <select name="delivery_time" id="delivery_time" class="form-control" required>
                        <option value="">Select a time slot</option>
                        <option value="10AM-12PM">10AM-12PM</option>
                        <option value="12PM-2PM">12PM-2PM</option>
                        <option value="2PM-4PM">2PM-4PM</option>
                        <option value="4PM-6PM">4PM-6PM</option>
                    </select>
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
        @endif
    </div>
 
@endsection