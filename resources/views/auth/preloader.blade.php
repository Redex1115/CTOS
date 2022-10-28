<!-- Styles -->
<style>
    .loader-wrapper {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #242f3f;
        display:flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    .loader {
        display: inline-block;
        width: 30px;
        height: 30px;
        position: relative;
        border: 4px solid #Fff;
        animation: loader 2s infinite ease;
    }
    .loader-inner {
        vertical-align: top;
        display: inline-block;
        width: 100%;
        background-color: #fff;
        animation: loader-inner 2s infinite ease-in;
    }

    .fade-out{
        animation: fade-out 1s forwards ease-in;
    }

    @keyframes loader {
        0% { transform: rotate(0deg);}
        25% { transform: rotate(180deg);}
        50% { transform: rotate(180deg);}
        75% { transform: rotate(360deg);}
        100% { transform: rotate(360deg);}
    }

    @keyframes loader-inner {
        0% { height: 0%;}
        25% { height: 0%;}
        50% { height: 100%;}
        75% { height: 100%;}
        100% { height: 0%;}
    }

    @keyframes fade-out {
        0% { opacity: 1; }
        100% { opacity: 0; visibility: hidden; }
    }
</style>

<!-- Preloader -->
<div class="loader-wrapper" id="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>


<!-- Script -->
<script>
    var loaderWrapper = document.getElementById('loader-wrapper');

    window.addEventListener('load',function(){
        loaderWrapper.classList.add('fade-out');
    });
</script>
