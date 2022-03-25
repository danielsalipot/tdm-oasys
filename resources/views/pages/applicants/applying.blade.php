@extends('layout.app')
    @section('content')
    <div class='row'>
      <div class ='col text-center p-5'>

        <form action="crudapply" method="post">
          @csrf
          <div class='row m-auto text-primary'>
            <h1 class='display-3'>I am applying for</h1>

              <div class='row  text-primary m-auto w-50 mt-3 mb-3'>
                  <label for="inputState">Choose a position</label>
                  <select id="inputState" name="position" class="form-control">
                      <option class="dropdown-item" selected>Teacher</option>
                      <option class="dropdown-item">Staff</option>    
                      <option class="dropdown-item">Principal</option>
                  </select>
                </div>
              </div>

              <div class='row m-auto pt-4'>
                <h3 class='text-primary'>Send us your resume</h3>
              </div>
          
              <div class='col justify-content-center'>
                <input type="file" name="resume" class="input-resume m-auto" id="resume">
              </div>
          
              <div class='mt-2'>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-50 m-1">PROCEED</button>
                    </div>
                </div>
              </div> 

              <div class='row' style="height: 21vh"> </div>
                  <div class="row">
                      <div class="col">
                        <a href="/" class="btn btn-outline-primary w-25 m-1 ps-5 pe-5">CANCEL</a>
                    </div>
                </div>
              </div>
        </form>
        <div class ='col text-center p-5'>
            <h6 class="text-primary p-4">step 3 out of 3</h6>
        </div>
    </div>
    @endsection

    