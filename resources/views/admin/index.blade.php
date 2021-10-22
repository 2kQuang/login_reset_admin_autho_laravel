@extends('main')
@section('content')
<?php
use Illuminate\Support\Facades\Auth;

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <?php 
                    $check =  Auth::user()->role_id ;
                    if ($check == '1') {
                        echo "<h4>Hello Admin</h4>";
                    }
                    if ($check == '2') {
                        echo "<h4>Hello Employee</h4>";
                    }
                    ?>
                </div>
                <div class="card-body">
                <p>  {{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection