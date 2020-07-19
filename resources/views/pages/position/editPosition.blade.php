

    <!-- Button to Open the Modal -->
<a href="#"data-toggle="modal" data-target="#modal{{$position->id}}"><span class="material-icons text-success float-right glyphicon">edit</span></a>

<!-- The Modal -->
<div class="modal" id="modal{{$position->id}}">
<div class="modal-dialog">
    <div class="modal-content" style="border-radius: 20px;">
    
    <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title">Edit Position</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <!-- Modal body -->
    <form action="{{route('editPosition',$position->id)}}" method="post">
        <div class="modal-body">
            @csrf
            @method('PATCH')
            <div class="row mt-3">
                <div class="col">
                <input type="text" class="form-control" id="position" value="{{$position->position}}" placeholder="Position name" name="position">
                </div>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">DISCARD</button>
            <button type="submit" class="btn text-warning" data-toggle="modal" data-target="#myModal">EDIT</button>
        </div>
    </form>
    
    </div>
</div>
</div>