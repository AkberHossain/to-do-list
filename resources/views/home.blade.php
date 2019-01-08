@extends('layouts.app')

@section('content')
<div class="container text-center" id="box">
    <h1>TO DO LIST</h1>
    <br>
    
    <form method="POST" action="" onsubmit="" id="form-todo">
        {{ csrf_field() }}
        <input type="text" name="todo" class="form-control" id="text-box">
        <br>
        
        <button type="button"  class="btn btn-success btn-lg" id="add-btn" > Add to your list </button>
    <form>
    <br>
    <br>

    @foreach($todos as $todo)

        <div <?php if($todo->completed == 0){ echo "class = 'alert alert-danger' ";  } else{ echo "class = 'alert alert-success' "; } ?> data-id="{{ $todo->id }}" id="todo-box" role="alert">
            <strong>{{ $todo->todo }}</strong>
            {{ csrf_field() }}
            <button type="button" id="mark" class="btn btn-warning btn-sm float-left">
                <span><?php if($todo->completed == 0){ echo "Mark As Completed ";  } else{ echo "Mark As Incompleted "; } ?></span>
            </button>
            <button type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endforeach


    <script>

        $(document).ready(function(){

            $(document).on("click" , "#mark" ,function(){
                
                var id = $(this).parent().attr("data-id");

                $.ajax({
                    url:"/update/"+id , 
                    type:"POST",
                    data:{'_token':$("input[name=_token").val()},
                    success:function(){
                        window.location.reload();
                    }
                });

            });

            $(document).on("click" , ".close" , function(){

                var id = $(this).parent().attr("data-id");

                $.ajax({
                    url:"/delete/"+id ,
                    //type:"POST",
                    method:"DELETE" ,
                    data:{'_token':$("input[name=_token]").val()} ,
                    success:function(){
                        window.location.reload();  
                    }
                });

            });


            $("#add-btn").click(function(){

                $.ajax({
                    url:`{{route('todo.store')}}` ,
                    type:"POST" ,
                    data: $("#form-todo").serialize(),
                    success:function(){
                        window.location.reload();
                    }
                });

            });

            
            




            // $("#add-btn").on("click" , function(){

            //     var text = $("#text-box").val();

            //     $("#todo-box").clone().appendTo("#box").find("strong").html(text);

            // });

        });

    </script>

</div>
@endsection
