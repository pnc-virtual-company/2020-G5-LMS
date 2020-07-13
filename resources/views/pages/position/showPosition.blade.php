@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4"><h1>Position</h1></div>
        <div class="col-4">
            <a href="#" class="btn btn-warning float-right text-white btn-lg" style="border-radius: 25px; "><strong>+ Create</strong></a>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($positions as $position)
                <tbody>
                    <tr>
                    <td>{{$position->position}}</td>
                        <td class="float-right" >
                            <a href="#"><span class="material-icons text-secondary">edit</span></a>
                            <a href="#"><span class="material-icons text-secondary">delete</span></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection