<!-- Session -->
@if(Session::has('success'))
    <div class="alert" id="success">
        <i class="fa fa-check-circle"></i>
        <h4 class="msg">{{Session::get('success')}}</h4>
        <a href="#" data-dismiss="alert" class="btn">Close</a>
    </div>
@elseif(Session::has('error'))
    <div class="alert" id="error">
        <i class="fa fa-times-circle"></i>
        <h4 class="msg">{{Session::get('error')}}</h4>
        <a href="#" data-dismiss="alert" class="btn">Close</a>
    </div>
@endif