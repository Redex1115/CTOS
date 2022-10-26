@extends('auth.layout')
@section('content')
<title>Home Page</title>
<style>
    .mainFunction{
        display: flex;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        padding-right: 10px;
        background: white;
        color: black;
        border-radius: 3px;
        margin-top: -5px;
        border: 1px white;
        box-shadow: 1px 1px #888888;;
    }
    .content{
        color: transparent;
        background: white;
    }

    .col-sm-6{
        padding: 0;
    }

    * {box-sizing: border-box}
        body {font-family: Verdana, sans-serif; margin:0}
        .mySlides {display: none}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
        background-color: #717171;
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
    .prev, .next,.text {font-size: 11px}
    }

    .tabcontent{
        color: black;
        display: none;
        z-index: 3;
    }

    .tablink {
        background-color: white;
        color: black;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        font-size: 10px;
        width: 25%;
        border-bottom: 3px solid transparent;
    }

    .tablink:hover{
        border-bottom: 3px solid #FC415A;
    }

    .tablink.active{
        border-bottom: 3px solid #FC415A;
    }

    .fa{
        font-size: 2.5rem;
    }

    h4{
        font-size: 0.7rem !important;
        padding-top: 2px;
    }
    
    .card-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .function{
        display: flex;
        align-items: center;
    }

    .bs-example{
        margin: 5px;
    }

    ul{
        display: flex;
        justify-content: space-around;
    }

    .tab-pane{
        background-color: white;
    }

    .pagination {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
    }
            
    .pagination li {
        margin: 0 1px;
    }
    
</style>

<div class="container content">
    <div class="row">
        <div class="col-12">
            <div class="mainFunction">
                <div class="bs-example">
  	                <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item">
                            <a href="#sectionA" class="nav-link active" data-toggle="tab"><i class="fa fa-user-secret" style="color: black;"><h4>Agent</h4></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="#sectionB" class="nav-link" data-toggle="tab"><i class="fa fa-group" style="color: black;"><h4>Member</h4></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="#sectionC" class="nav-link" data-toggle="tab"><i class="fa fa-ban" style="color: black;"><h4>BlackList</h4></i></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="sectionA" class="tab-pane show active">
                            <br>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10">
                                    @foreach($agents as $agent)
                                    <div class="card">
                                        <div class="card-header">
                                            {{$agent->name}}
                                            <div class="function">
                                                <a href="{{ route('agent.edit',['id'=>$agent->id]) }}"><i class="fa fa-cog" style="color: black; font-size: 25px;"></i></a>
                                                <a href="{{ route('agent.delete',['id'=>$agent->id]) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" style="color: black; font-size: 25px;"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-4" style="border-right: 1px solid grey;">
                                                    <p class="card-text">Email: {{$agent->email}}</p>
                                                    <p class="card-text">Ic: {{$agent->ic}}</p>
                                                </div>
                                                <div class="col-4" style="border-right: 1px solid grey;">
                                                    <p class="card-text">Bank Account: {{$agent->bank_account_number1}}</p>
                                                    <p class="card-text">Bank Account: {{$agent->bank_account_number2}}</p>
                                                    <p class="card-text">Bank Account: {{$agent->bank_account_number3}}</p>
                                                </div>
                                                <div class="col-4">
                                                    <p class="card-text">Hp no: {{$agent->handphone_number}}</p>
                                                    <p class="card-text">Gender: {{$agent->gender}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    @endforeach
                                </div>
                                <div class="page" style="padding-left: 410px">
                                   {{$agents->links("pagination::bootstrap-4")}} 
                                </div> 
                                <div class="col-1"></div>
                            </div>
                        </div>
                        <div id="sectionB" class="tab-pane">
                        <br>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10">
                                    @foreach($members as $member)
                                    <div class="card">
                                        <div class="card-header">
                                            {{$member->name}}
                                            <div class="function">
                                                <a href="{{ route('agent.edit',['id'=>$member->id]) }}"><i class="fa fa-cog" style="color: black; font-size: 25px;"></i></a>
                                                <a href="{{ route('member.delete',['id'=>$member->id]) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" style="color: black; font-size: 25px;"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-4" style="border-right: 1px solid grey;">
                                                    <p class="card-text">Email: {{$member->email}}</p>
                                                    <p class="card-text">Ic: {{$member->ic}}</p>
                                                </div>
                                                <div class="col-4" style="border-right: 1px solid grey;">
                                                    <p class="card-text">Bank Account: {{$member->bank_account_number1}}</p>
                                                    <p class="card-text">Bank Account: {{$member->bank_account_number2}}</p>
                                                    <p class="card-text">Bank Account: {{$member->bank_account_number3}}</p>
                                                </div>
                                                <div class="col-4">
                                                    <p class="card-text">Hp no: {{$member->handphone_number}}</p>
                                                    <p class="card-text">Gender: {{$member->gender}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    @endforeach
                                </div>
                                <div class="page" style="padding-left: 410px">
                                   {{$members->links("pagination::bootstrap-4")}} 
                                </div>               
                                <div class="col-1"></div>
                            </div>
                            
                        </div>
                        <div id="sectionC" class="tab-pane">
                            <h3>Section C</h3>
                            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="slideshow-container">
        <div class="mySlides">
            <div class="numbertext">1 / 3</div>
            <img src="{{ asset('img/') }}/1.jpg" style="width:100%">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 3</div>
            <img src="{{ asset('img/') }}/2.jpg" style="width:100%">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 3</div>
            <img src="{{ asset('img/') }}/3.jpg" style="width:100%">
            <div class="text">Caption Three</div>
        </div>

        <a class="prev text-white" onclick="plusSlides(-1)">❮</a>
        <a class="next text-white" onclick="plusSlides(1)">❯</a>
    </div>  
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
    <br>
    <div class="container">
	    <div class="category-wrap">
		    <div class="row g-3">
                <div class="col-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <a href="#">
                                <div class="image-holder">
                                    <img src="#" alt="a">
                                </div>
                                <span>a</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <a href="#">
                                <div class="image-holder">
                                    <img src="#" alt="b">
                                </div>
                                <span>b</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <a href="#">
                                <div class="image-holder">
                                    <img src="#" alt="b">
                                </div>
                                <span>b</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row g-3">
                <div class="col-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <a href="#">
                                <div class="image-holder">
                                    <img src="#" alt="a">
                                </div>
                                <span>a</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <a href="#">
                                <div class="image-holder">
                                    <img src="#" alt="b">
                                </div>
                                <span>b</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <a href="#">
                                <div class="image-holder">
                                    <img src="#" alt="b">
                                </div>
                                <span>b</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row g-3"  style="padding-bottom: 80px;">
                <div class="col-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <a href="#">
                                <div class="image-holder">
                                    <img src="#" alt="a">
                                </div>
                                <span>a</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <a href="#">
                                <div class="image-holder">
                                    <img src="#" alt="b">
                                </div>
                                <span>b</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <a href="#">
                                <div class="image-holder">
                                    <img src="#" alt="b">
                                </div>
                                <span>b</span>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    //Slide Show
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    }

    //Main
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>
@endsection

@endsection