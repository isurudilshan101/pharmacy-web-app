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
        margin-top:-20px;
    }
    
    .left_side {
        flex: 1;
        padding-top: 20px;
        
    }
    
    .right_side {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
    
    .welcome_image {
       max-width: 100%;
       height: 550px;
       border-radius: 10px;  
      }
      
    </style>
    <div class="container">
        <div class="left_side">
            <h2>User Registration</h2>
            <form method="POST"  action="{{ route('user_register') }}">
    
                 @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact No</label>
                    <input type="text" class="form-control" id="contact_no" name="contact_no" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="name" name="password" required>
                </div>

                <div class="form-group">
                    <label for="re-password">Re-Enter Password</label>
                    <input type="password" class="form-control" id="re-password" name="re-password" required>
                </div>
              
                
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <div class="already_have_acc">
                <p>Already Have an Account ? 
                    <a href="{{ route('user_login_view') }}">Login here</a> 
                </p>                   
            </div>
        </div>

        <div class="right_side">
            <img src="https://images.pexels.com/photos/9742780/pexels-photo-9742780.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="welcome_image" >
    
        </div>
       
    </div>
 
