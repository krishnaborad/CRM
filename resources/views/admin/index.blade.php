@extends('admin.layouts.adminapp')
@section('content')
<section class="box-body"><br><br>

         <section class="content">

             <div class="box-header">
                 <center><h2><label for=""></label></h2>
                <center><h2><font color="#3C8DBC">{{ Auth::user()->name }}</font></h2><center>
                <center><h4><font color="#3C8DBC">{{ Auth::user()->email }}</font></h4><center>
             </div>

        </section>
</section>
@endsection
