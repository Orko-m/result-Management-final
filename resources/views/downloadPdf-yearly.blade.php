<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>attendance report</title>
    <style>
        table,
        td,
        th {
            border: 0.001px solid rgb(12, 10, 10);
            text-align: center;
       font-size: 18px;
       margin-left: 50px;
          
        }


     
.imgdiv{
    width:auto;
    display:block;
    height: 50px;
}
.img{
    float: left;

}
.company{
  float: right;
}
.short{
    width:auto;
    display:block; 
    height: 50px;  

}
.hr{
    display:block;
}
.footer{
    width:auto;
    display:block;
}
.contact{
    width: 400px;;
    float: left;

}
.details{
    width: 250px;;

  float: right;
}

section{
    height: 500px;
}


 


    </style>
</head>

<body>
<header>
<div class="imgdiv"> 
    <div class="img">
    <img src="{{public_path('excelitai.png')}}" style="width: 50px; height: 50px;"alt="excelitai">

    </div>
    <div class="company">
        <h1>EXCEL IT AI</h1>
    </div>
</div>
<hr>

</header>

 <section>
<div class="short">
        {{-- <div class="shortspan">
             <span><strong>TP</strong>=Total Present.</span>
            <span><strong>TA</strong>=Total Absent.</span>
            <span><strong>TL</strong>=Total Leave.</span>
            <span><strong>TOD</strong>=Total off day.</span>
        </div>
        <div class="shortspan2">
             <span><strong>P</strong>= Present.</span>
            <span><strong>A</strong>= Absent.</span>
            <span><strong>L</strong>=leave.</span>
            <span><strong>O</strong>=off day.</span>
            <span><strong>Date: </strong>{{$year}}.</span>
           
        </div> --}}

    </div>
    <div>
    </section>
    <section>
      
    <table  class="table align-items-center table-flush">
        <thead>
        
            <tr>
                <th>Sl</th>
                <th>Employee</th>
                <th>Present</th>
                <th>Absent</th>
                <th>Leaves</th>
                <th>Off Day</th>
                {{-- <th>{{ $year}}</th> --}}
              
            </tr>

        </thead>
        <tbody>
          
        @foreach($employeeList as $key => $employee  )
            <tr>
                <td>{{ $key + 1}}</td>
                
                <td>{{ $employee->first_name." ".$employee->last_name}}</td>
                @php 
                   $present = $employee->attendances()->present()->whereYear('date',$year)->count() ;
                   $absent = $employee->attendances()->absent()->whereYear('date',$year)->count() ;
                   $leave = $employee->attendances()->leave()->whereYear('date',$year)->count() ;
                   $offDay = $employee->attendances()->offDay()->whereYear('date',$year)->count() ;

                @endphp
                <td style="color: rgb(0, 102, 255)"><i class="fa fa-check text-success"></i><strong>{{ $present }}</strong></td>
                <td style="color: red"><i class="fa fa-times text-danger"></i><strong>{{ $absent}}</strong> </td>
                <td style="color: rgb(7, 53, 56)"><i class="fa fa-sign-out-alt text-warning"></i><strong>{{ $leave }}</strong> </td>
                 <td style="color: rgba(155, 12, 136, 0.74)"><i class="fa fa-power-off text-info"></i><strong>{{ $offDay }}</strong> </td>
               </tr>
               @endforeach
        </tbody>
    </table>

    </section>
    <footer>
    <hr>
    <div class="footer">
        <div class="contact">

        <strong>Office Location:</strong><br>
        17, Alhaz Samsuddin Mansion (9th Floor),<br>
         Moghbazar, New Easkaton, Ramna, Dhaka-1217
        </div>
        <div class="details">
        <strong>Contact:</strong>+88 01611 815656
        <br>
        <strong>Email:</strong> info@excelitai.com
        </div>
    </div>
</footer>

</body>


</html>
