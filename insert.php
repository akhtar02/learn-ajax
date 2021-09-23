<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <title>Class 01</title>
   

    <style>
        #success-message{
            background: #def1d8;
            /* background-color: #DEF1D8; */
            color: green;
            padding: 10px;
            margin: 10px;
            display: none;
            position: absolute;
            right: 15px;
            top: 15px;

        }

        #error-message{
            background: #edfcdd;
            /* background-color: #DEF1D8; */
            color: red;
            padding: 10px;
            margin: 10px;
            display: none;
            position: absolute;
            right: 15px;
            top: 15px;

        }
    </style>
</head>
<body>
    <table id="main"  cellspacing='0'>
        <tr>
            <td id="header">
                <h1>add record Php with Ajax</h1>
            </td>
            <tr>
                <td id="table-form">
                    <form action="" id="addForm">
                <input type="text" placeholder = "First Name" id="fname" value="" />    
                <input type="text" placeholder = "Last Name"  id="lname" value="" />    
                <input type="button" id="save-button" value="Save" /> 
                </form>   
                </td>
            </tr>
            <tr>
                <td id="table-data">
                 
                </td>
            </tr>
        </tr>
    </table>
    <div id="error-message"></div>
<div id="success-message"></div>

    <!-- Custom Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            function loadTable(){
              $.ajax({
                  url: "ajax-load.php",
                  type: 'POST',
                  success: function(data){
                      $('#table-data').html(data);
                  }
              });  
            };
            loadTable();

            $('#save-button').on('click', function(e){
                e.preventDefault();
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                
                if(fname == "" || lname == ""){
                    $("#error-message").html('All fields are required.').slideDown();
                    $('#success-message').slideUp();
                }
                else{
                    $.ajax({
                  url: 'ajax-insert.php',
                  type: 'POST',
                  data: {first_name: fname, last_name: lname},
                  success: function(data){
                    // loadTable();
                    if(data == 1){
                        loadTable();
                        $("#addForm").trigger('reset')
                           
                        $(" #success-message").html("Data Inserted Successfully").slideDown();
                    $('#error-message').slideUp();
                    }
                    else{
                     
                        $("#error-message").html("can't save Record.").slideDown();
                    $('#success-message').slideUp();
                    }

                  }
              }) 


                }

                
            });

           
        });
       


         
       


         

       
                
                
            
          
   
    </script>
</body>
</html>