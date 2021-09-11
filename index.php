<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <title>Class 01</title>
   
</head>
<body>
    <table id="main"  cellspacing='0'>
        <tr>
            <td id="header">
                <h1>Php with Ajax</h1>
            </td>
            <tr>
                <td id="table-load">
                <input type="button" id="load-button" value="Load Data" />    
                </td>
            </tr>
            <tr>
                <td id="table-data">
                    <table border="1" width = "100%"  >
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                        </tr>
                        <tr>
                            <td align="center">1</td>
                            <td align="center">Yahoo Baba</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tr>
    </table>


    <!-- Custom Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#load-button").on('click', function(e){
              $.ajax({
                  url: "ajax-load.php",
                  type: 'POST',
                  success: function(data){
                      $('#table-data').html(data);
                  }
              })  
            })
        })
    </script>
</body>
</html>