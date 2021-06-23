<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/ucn.ico" type="image/x-icon">
    <title>Importar carga masiva alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <style>

    	div{
    		    	
    	}
    	.bg{
            height: 1px;
            overflow: scroll;
    		
    	}
    	</style>
</head>
<body>   
    <nav class ="navbar navbar-light navbar-expand-md fixed-top" style ="background-color: #003057"  >
        <div class="container" >
         <a href="https://ucn.cl" class="navbar-brand">
          <img src="/images/logo_ucn_fondo_oscuro.png" alt="Logo UCN" width="400px" height="auto">
         </a>                
        </div>
      </nav>
    


    <section class="container d-flex py-4 mt-5">
        <!--- Esto existe para separar el título de la nav-bar, sin esto el titulo queda pegado -->
        <div class="container d-flex justify-content-center py-4 mt-5"> 
        <h1> Importar Archivos </h1>
        </div>
    </section>




    <section class=" container py-1 mt-1 justify-content-center", style="padding-top:60px; ">
        <div>
            <div class="row justify-content-center">
                <div class="card justify-content-center">
                    <div class="card-header py-2 mt-2 text-center justify-content-center">
                       <h3> Carga Masiva de Docentes </h3>

                    </div>
                    <div class= "d-flex card-body py-4 mt-4 justify-content-center">
                        <form method="POST" enctype="multipart/form-data" action="{{route('profesor.import')}}">
                            @csrf
                            <div class=" d-flex form-group justify-content-center">
                                <label for="file py-2 mt-2"></label>
                                <input type="file" name="file" class="form-control"/>

                            </div>
                            <div class ="container d-flex justify-content-center">
                            <button type="submit" class=" btn btn-primary py-3 mt-3"> Subir Archivo </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </section>
    
    <section class = "container d-flex justify-content-center py-2 mt-2" >
        <h2>Listas</h2>
    </section>
    <section style="padding-left:128px;">
        <h1>Listas</h1>

        <table border="1">
            <tr>
                <td>Rut del profesor</td>
                <td>Nombre del profesor</td>
                <td>Rut del profesor</td>
                <td>Correo del profesor</td>

            <tr>

            @foreach ($profesors as $profesors)
            <tr>

                <td>{{$profesors['rut_profesor']}}</td>
                <td>{{$profesors['nombre_profesor']}}</td>
                <td>{{$profesors['correo']}}</td>

            @endforeach

        </table>
    </section>
</body>
</html>
