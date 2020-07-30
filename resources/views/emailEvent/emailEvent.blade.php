@extends('layouts.app')

@section('title','| content')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Contact Me</h3>
        <hr>
        <form action="#">
            <div class="form-group">
            <label name="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
            </div>
          <div class="form-group">
              <label name="subject"></label>
              <input type="text" name="subject" id="subject" placeholder="Subjecr" class="form-control">
          </div>
          <div class="form-group">
              <label name="message">Message</label>
               <textarea name="message" id="message" cols="30" rows="10" class="form-control">Type your message here....</textarea>
          </div>
          <input type="submit" value="Send Message" class="btn btn-success">
        </form>
    </div>
</div>

@endsection

