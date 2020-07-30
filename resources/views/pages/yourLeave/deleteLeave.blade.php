{{-- <!-- Start modal delete leave request -->
<div class="modal" id="deleteYourLeave{{$leave->id}}">
  <div class="modal-dialog">
  <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
      <!-- Modal body -->
      <div class="modal-body">
          <form action="{{route('deleteYourLeave',$leave->id)}}" method="POST">
              @csrf
              @method('DELETE')
          <div class="from-group">
              <h2>Remove items ?</h2>
              <p>Are you sure you want to remove the selected leave request?</p>
              <button type="submit" class="btn text-warning float-right">REMOVE</button>
              <button type="button" class="btn float-right" data-dismiss="modal">DON'T REMOVE</button>
          </div>
      </form>
      </div>
  </div>
  </div>
</div>
<!-- End modal delete leave request --> --}}
