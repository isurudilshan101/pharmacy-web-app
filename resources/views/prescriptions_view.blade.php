<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    {{--  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.all.min.js"></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Dilshan Pharmacy</title>
</head>
    <style>

        .main-page{
            {{--  border: solid 1px;   --}}
            {{--  display:flex; gap:20px;   --}}
            {{--  width: 75%;  --}}
            {{--  justify-content: space-between;  --}}
            
        }
       

        .image-viewer {
            display: flex;
            flex-direction: column;
            align-items: left;
            padding: 10px;
            border: solid 1px;
        }
        
        .main-image img {
            width: 350px;
            height: 400px;   
            margin-bottom: 10px;
        }
        
        .thumbnail-images {
            display: flex;
        }
        
        .thumbnail {
            width: 80px;
            height: 80px;
            
            margin-right: 10px;
            cursor: pointer;
        }
        .table-viewer{
            border: solid 1px;
        }

        .display_total{
            display: none;
        }

        .send_quotation{
            float : right;
            
                
        }
    
        body{
            background-color:black;
            color:white !important;
        }
        .container {
            display: flex;
            margin-top:-20px;
            gap:200px !important;
            border: solid 2px;
        }
        
        .left_side {
            flex: 1;
            padding-top: 20px;
            
        }
        
        .right_side {
            flex: 2;
            display: flex;
            justify-content: center;
            align-items: center;           
        }
        hr{
            border-color:rgb(255, 255, 255) !important; 
        }

        .table thead th {
            color: rgb(255, 255, 255);
          }
        
         
          .table tbody tr {
            color: rgb(255, 255, 255) !important;
          }
         
        </style>

<body>
    <h4>Prescription Details</h4>
     {{--  images_path  --}}
    @php
    $user_id=$prescription->user_id;
    $user_id=$prescription->user_id;

    @endphp
 
    <p> <br ><input type="hidden" name="user_id_for_send_quotation" value=" {{  $user_id }}" class="form-control" id="user_id_for_send_quotation" > </p>
   
     <div class="container main-page" >

        <div class="image-viewer">
                <div class="main-image">
                    
                    <img src="{{ asset($main_image) }}" alt="Prescription Image" >
                
                </div>

                <div class="thumbnail-images">
                    @foreach($images_path as $image_path)
                        <img src="{{ asset($image_path) }}" alt="Thumbnail Image"   class="thumbnail">
                    @endforeach
                </div>
        </div>

        {{--  image-viewer  --}}

            <div class="right-side">  

                    <div class="table-viewer">
                        <table class="table table-borderless mb-2"  id="prescriptionTable">
                            <thead>
                            <tr>
                                <th scope="col" class="w-50">Drug</th>
                                <th scope="col" class="w-25">Quantity</th>
                                <th scope="col" class="w-25">Amount</th>                             
                            </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>

                        <div  class="display_total" id="display_total">
                            <div class="form-group row">
                                <label for="drugInput" class="col-sm-2 col-form-label">Total:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="total" class="form-control col-md-3" id="total" >
                                </div>
                                </div>
                        </div>
                     
                    </div>  
                    {{--  end table-viewer  --}}

                    <div class="form-viewer">

                        <form>
                            <div class="form-group row mt-5">
                            <label for="drugInput" class="col-sm-2 col-form-label">Drugs:</label>
                            <div class="col-sm-10">
                                <input type="text" name="drug_name" class="form-control" id="drug_name" placeholder="Enter drug name" >
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="quantityInput" class="col-sm-2 col-form-label">Quantity:</label>
                            <div class="col-sm-10">
                                <input type="number" name="quantity_input"  class="form-control" id="quantity_input" placeholder="Enter quantity" >
                            </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="button" id="btn1" class="btn btn-primary">ADD</button>
                            </div>
                            </div>
                        </form>

                        <div>
                            <hr>
                        </div>

                        <div>
                            <form>
                              
                                <button type="button" id="btn_send_quotation" class="btn btn-primary send_quotation "  onclick="send_quotation()">Send Quotation</button>
                                
                            </form>
                        </div>
                                                
                    </div>  
                    {{--  end form-viewer    --}}
            </div>  
            
             
            {{--  end right-side  --}}
    </div> 
        {{--  end main-page    --}}
        
    
    <script>
        
        const mainImage = document.querySelector('.main-image img');
        const thumbnails = document.querySelectorAll('.thumbnail');

        thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', () => {
                const imagePath = thumbnail.src;
                mainImage.src = imagePath;
            });
        });

    </script>
    
    <script>
        var btn1 = document.getElementById("btn1");
        const myArray = [];
        btn1.onclick= function() {
            var drug_name = document.getElementById("drug_name").value;
             
            var quantity_input = document.getElementById("quantity_input").value;

            document.getElementById("drug_name").value="";
            document.getElementById("quantity_input").value="";
            
            $.ajax({
                    type: "GET",
                    url: '/prescription_bill',
                    data: {drug_name: drug_name,quantity_input:quantity_input},
                    success: function(response) {
                     
                       
                        var table = document.getElementById("prescriptionTable");
                        var newRow = table.insertRow();
                        var cell1 = newRow.insertCell();
                        cell1.style.color = "white"; 
                        cell1.innerHTML = response.drug_name;
                        
                        var cell2 = newRow.insertCell();
                        cell2.style.color = "white"; 
                        cell2.innerHTML = response.quantity_input+"*"+"20";

                        var cell3 = newRow.insertCell();
                        cell3.innerHTML = response.quantity_input * 20;
                        cell3.style.color = "white"; 
                        var cell3Value = cell3.innerHTML;
                        document.getElementById('display_total').style.display = 'block';
                        var total_pay=response.total_pay;
                        myArray.push(total_pay);
                        const total = myArray.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
                        document.getElementById('total').value=total;
                       
                     
                    },
                });   
        };

        function send_quotation(){
            console.log("isuru test send_quotation");
            var user_id=document.getElementById('user_id_for_send_quotation').value;
            console.log(user_id);
            var total_value =document.getElementById('total').value;
            console.log("Total value"+total_value);
            var url = "{{ url('send_quotation') }}/" + user_id;

            $.ajax({
                type: "GET",
                url: url,
                data: {total_value: total_value, user_id:user_id},

                success: function (response) {
                    console.log("Response received:", response);
            
                    if (response.message === 'Email sent successfully') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Email Sent Successfully',
                            text: 'The email has been sent successfully.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Email Sending Failed',
                            text: 'There was an error sending the email.',
                        });
                    }
                   
                },
            });   
        }

    </script>
        
</body>
</html>

 


        





