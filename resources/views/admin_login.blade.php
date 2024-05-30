<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
    body{
        background-color:black;
        color:white;
    }
    .container {
        display: flex;
        margin-top:0px;
    }
    
    .left_side {
        flex: 1;
        padding-top: 80px;
        
    }
    
    .right_side {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 40px;

        
    }
    
    .welcome_image {
       width: 80%;
       height: 400px;
       border-radius: 10px;  
      }
      
    </style>

    <div class="container">

        <div class="left_side">
            <h1>Pharmacy User Login</h1>
            <form method="POST"  action="{{ route('admin_login') }}">
                
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control col-md-9" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control col-md-9" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>

        <div class="right_side">
            <img src="https://images.pexels.com/photos/6074917/pexels-photo-6074917.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="welcome_image" >
        </div>

     
    </div>
 



