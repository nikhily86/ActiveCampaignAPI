<!-- <h1>Contact List</h1> -->
<!-- 
<table border="1">
    <thead>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Phone</td>
        </tr>
    </thead>
    <tbody>
       
            @foreach($result['contacts'] as $results) 
            <tr>
            <td>{{ $results['email'] }}</td>
            <td>{{ $results['firstName'] }}</td>
            <td>{{ $results['lastName'] }}</td>
            <td>{{ $results['phone'] }}</td> 
            </tr>
            @endforeach
        
    </tbody>
   
</table> -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Displaying Data</title>
  </head>
  <body>
    
    <h1 class="text-center my-4">Contact List</h1>

    <div class="container">
        <div class="text-end mb-4">
            <a href="/" class="btn btn-primary ">Go Home</a>
        </div>

        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Email</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Phone</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
            
                    @foreach($result['contacts'] as $results) 
                    <tr>
                    <td>{{ $results['id'] }}</td>
                    <td>{{ $results['email'] }}</td>
                    <td>{{ $results['firstName'] }}</td>
                    <td>{{ $results['lastName'] }}</td>
                    <td>{{ $results['phone'] }}</td> 
                    <td><a href="update/{{ $results['id'] }}" id="{{ $results['id'] }}" class="btn btn-warning">Update</a></td>
                    <td><a href="deleteData/{{ $results['id'] }}" id="{{ $results['id'] }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                
            </tbody>
        </table>
    </div>
  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>