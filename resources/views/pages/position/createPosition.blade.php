<div class="container">
        <!-- Button to Open the Modal -->
        <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-warning float-right text-white btn-lg" style="border-radius: 25px; "><strong>+ Create</strong></a>
    <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content"  style="border-radius: 20px;">
        
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Create Position</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="{{route('addPosition')}}" enctype="multipart/form-data" method="post">
            <div class="modal-body">
                @csrf
                @method('POST')
                <div class="row mt-3">
                    <div class="col">
                        <input type="text" class="form-control" id="position" placeholder="Position name" name="position">
                    </div>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">DISCARD</button>
                <button type="submit" class="btn text-warning" data-toggle="modal" data-target="#myModal">CREATE</button>
            </div>
        </form>
        
        </div>
    </div>
    </div>
</div>