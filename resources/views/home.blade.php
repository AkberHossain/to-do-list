@extends('layouts.app')

@section('content')
<div class="container text-center" id="box">
    <h1>TO DO LIST</h1>
    <br>
    
    
    <input type="text" name="todo" class="form-control" id="text-box">
    <br>
    
    
    
    <a href="#" class="btn btn-success btn-lg" id="add-btn">Add to your list</a>
    <br>
    <br>




    <div class="alert alert-primary" id="todo-box" role="alert">
        <strong>A simple primary alert with an example link. Give it a click if you like.</strong>
        <button type="button" class="btn btn-warning btn-sm float-left">
            <span>Mark as Completed</span>
        </button>
        <button type="button" class="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <script>

        $(document).ready(function(){

            // $("#add-btn").on("click" , function(){

            //     var text = $("#text-box").val();

            //     $("#todo-box").clone().appendTo("#box").find("strong").html(text);

            // });

        });

    </script>

</div>
@endsection
