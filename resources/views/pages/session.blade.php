<style>
    #success{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 998;
        user-select: none;
        background:  #f2f2f2;
        width: 310px;
        text-align: center;
        align-items: center;
        padding: 40px;
        border: 1px solid #b3b3b3;
        box-shadow: 0px 5px 10px rgb(0, 0, 0, 0.2);
    }

    #success i{
        font-size: 60px;
        color:rgb(15, 180, 15);
        padding: 20px 40px;
        margin: -50px 0 0 0;
    }

    #success .btn{
        margin: 20px 0 -10px 0;
        text-decoration: none;
        background: #999999;
        color: white;
        font-size: 18px;
        padding: 10px 13px;
        width: 100px;
        border-radius: 12px;
    }

    @media only screen and (max-width: 300px){
        #success{
            width: 230px;
        }
    }

    #error{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 998;
        user-select: none;
        background:  #f2f2f2;
        width: 310px;
        text-align: center;
        align-items: center;
        padding: 40px;
        border: 1px solid #b3b3b3;
        box-shadow: 0px 5px 10px rgb(0, 0, 0, 0.2);
    }

    #error i{
        font-size: 60px;
        color:rgb(189, 19, 19);
        padding: 20px 40px;
        margin: -50px 0 0 0;
    }

    #error .btn{
        margin: 20px 0 -10px 0;
        text-decoration: none;
        background: #999999;
        color: white;
        font-size: 18px;
        padding: 10px 13px;
        width: 100px;
        border-radius: 12px;
    }

    @media only screen and (max-width: 300px){
        #error{
            width: 230px;
        }
    }
</style>

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