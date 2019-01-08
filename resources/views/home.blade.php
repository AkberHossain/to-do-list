@extends('layouts.app')

@section('content')
<div class="container text-center" id="box">
    <h1>TO DO LIST</h1>
    <br>
    
    <form method="POST" action=""  id="form-todo">
        {{ csrf_field() }}
        <input type="text" name="todo" class="form-control" id="text-box">
        <br>
        
        <input type="submit" name="submit" class="btn btn-success btn-lg" id="add-btn" value="Add to your list" >
    <form>
    <br>
    <br>

    @foreach($todos as $todo)

        <div class="alert alert-primary" id="todo-box" role="alert">
            <strong>{{ $todo->todo }}</strong>
            <button type="button" class="btn btn-warning btn-sm float-left">
                <span>Mark as Completed</span>
            </button>
            <button type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endforeach

    <script>

        $(document).ready(function(){

            $("#form-todo").submit(function(){

                $.ajax({
                    url:{{route('todo.store')}} ,
                    type:"POST" ,
                    data: ,
                    success:function(){
                        alert("done");
                    }
                });

            });

            // $("form").submit(function(){

            //     $.ajax({
            //         url:"{{route('todo.store')}}" , 
            //         data:$(this).serialize() ,
            //         type:"GET" ,
            //         success:function(data){

            //             alert("ss");

            //         }
            //     });

            // });



            // $("#add-btn").on("click" , function(){

            //     var text = $("#text-box").val();

            //     $("#todo-box").clone().appendTo("#box").find("strong").html(text);

            // });

        });

    </script>

</div>
@endsection
