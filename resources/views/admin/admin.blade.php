@extends('layouts.apps')
@section('content')


<?php 
$totalcakes = 0;
$totalteams = 0;
$totalusers = 0; 
$totaltestimonials = 0;
?>

@foreach($newcakes as $cakes)
<?php 

$totalcakes += 1; 
?>


@endforeach

@foreach($teams as $teams)
<?php 

$totalteams += 1; 
?>
@endforeach

@foreach($users as $user)
<?php 

$totalusers += 1; 
?>
@endforeach


@foreach($testimonials as $testimonials)

<?php 

$totaltestimonials += 1; 
?>
@endforeach


<div class="row">
    <div class="col-md-3 ">
        <a class="text-decoration-none text-dark" href="">
        <div class="card shadow my_card text-center p-3">
            <h4>Cake <i></i></h4>
            <h3><?php echo $totalcakes;?></h3>
        </div>
        </a>
    </div>

    <div class="col-md-3 ">
        <a class="text-decoration-none text-dark" href="">
        <div class="card shadow my_card text-center p-3">
            <h4>Teams <i></i></h4>
            <h3><?php echo $totalteams;?></h3>
        </div>
        </a>
    </div>

    <div class="col-md-3 ">
        <a class="text-decoration-none text-dark" href="">
        <div class="card shadow my_card text-center p-3">
            <h4>Testimonials <i></i></h4>
            <h3><?php echo $totaltestimonials; ?> </h3>
        </div>
        </a>
    </div>

    <div class="col-md-3 ">
        <a class="text-decoration-none text-dark" href="">
        <div class="card shadow my_card text-center p-3">
            <h4>Users <i></i></h4>
            <h3><?php echo $totalusers;?></h3>
        </div>
        </a>
    </div>
</div>









@stop