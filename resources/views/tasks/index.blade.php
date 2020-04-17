@extends('layouts.layouts')

@section('content')
<form action="{{route('tasks.store')}}" method="POST">
    <div id="myDIV" class="header">
      <h2>My To Do List</h2>

@if(count($errors) > 0)
<div class="alert alert-danger">
    <strong>Error: </strong>
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif

      <input type="text" name="task" placeholder="Title...">
      <button type="submit" class="addBtn">Add</button>
      @csrf
    </div>
</form>
<ul id="myUL">
    @if (count($tasks) > 1)
        @foreach($tasks as $task)
            <li>
                <div class="task">
                    {{$task->title}}
                </div>
                <div class="action">
                    <a href=""><i class="fa fa-edit"></i></a>
                </div>
                <div class="action">
                <a href="{{route('tasks.destroy', ['tasks'=>$task->id])}}"><i class="fa fa-trash-alt"></i></a> 
                </div>
            </li>  
            @endforeach
    @else 
            <li>
                <div class="task">
                    You have nothing to do
                </div>
            </li>
    @endif
</ul>
@endsection