<!-- Modal edit employee -->
<div class="modal" id="updateEmployee">
    <div class="modal-dialog">
      <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
        <div class="modal-body">
          <h3>Edit employee</h3>
          <form method="POST" action="{{route('employee.update', $user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <input id="firstName" value="{{$user->firstName}}" type="text" class="form-control" placeholder="Firstname" name="firstName" required autocomplete="firstName">
                </div>
                <div class="form-group">
                  <input id="lastName" value="{{$user->lastName}}" type="text" class="form-control" placeholder="LastName" name="lastName" required autocomplete="lastName">
                </div>
                <div class="form-group">
                  <select class="form-control" name="department">
                    <option selected disabled>Department</option>
                   @foreach($departments as $department)
                      <option value="{{$department->id}}" {{ ($user->department_id == $department->id) ? 'selected' : '' }}>{{$department->department}}</option> 
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                  <select class="form-control" name="position">
                    <option selected disabled>Position</option>
                   @foreach($positions as $position)
                   <option value="{{$position->id}}" {{ ($user->position_id == $position->id) ? 'selected' : '' }}>{{$position->position}}</option> 
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                  <input type="date" data-date="" value="{{$user->startDate}}" data-date-format="DD MMMM YYYY" class="form-control" id="startDate" name="startDate">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <img class="card-img-top mb-2" style="width: 80px;height:80px" class="mx-auto d-block" src="{{asset('img/'.$user->profile)}}"/>
                </div>
                <div class="form-group">
                  <label for="picture" style="cursor: pointer"><i class="material-icons">add</i></label>
                  <input type="file" id="picture" name="image" autocomplete="picture" style="display:none">
                  <label for="editProfile" style="cursor: pointer"><i class="material-icons">edit</i></label>
                  <input type="file" id="editProfile" name="image" autocomplete="editProfile" style="display:none">
                  <label for="deleteProfile" style="cursor: pointer"><i class="material-icons">delete</i></label>
                  <input type="file" id="deleteProfile" name="image" autocomplete="deleteProfile" style="display:none">
                </div>
              </div>
            </div>
            <div class="form-group">
            <a href="" data-dismiss="modal" style="margin-left:50%" class=" text-dark font-weight-bold">DISCARD</a>&nbsp;
             <button type="submit" class="btn text-warning btn-link">UPDATE</button>
            <div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!--End Modal -->