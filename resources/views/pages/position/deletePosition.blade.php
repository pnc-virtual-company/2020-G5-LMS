

    <!-- Button to Open the Modal -->
    <a href="#"data-toggle="modal" data-target="#myModal{{$position->id}}"><span class="material-icons text-danger float-right glyphicon">delete</span></a>

    <!-- The Modal -->
    <div class="modal" id="myModal{{$position->id}}">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 20px;">
        
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Remove Position ?</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="{{route('deletePosition',$position->id)}}" method="post">
            <div class="modal-body">
                @csrf
                @method('PATCH')
                <div class="row mt-3">
                    <div class="col">
                        <p>
                            Are you sure you want to reomve the selected position?
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">DON"T REMOVE</button>
                <button type="submit" class="btn text-warning" data-toggle="modal" data-target="#myModal">REMOVE</button>
            </div>
        </form>
        
        </div>
    </div>
    </div>