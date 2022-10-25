<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>

<style>
    .refresh-container{
        width: 50px;
        height: 50px;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 100%;
        transition: margin-top 0.5s;
        margin-bottom: -50px;
    }

    .refresh-container .spinner {
        width: 30px;
        height: 30px;
        z-index: 5;
        transition: transform 0.5s;
    }

    .refresh-container.load-init .spinner * {
        fill: #ffffff;
    }

    .refresh-container.load-init::after {
        min-width: 50px;
        height: 50px;
        border-radius: 100%;
        position: absolute;
        z-index: 4;
        transition: 1.5s;
    }

    .refresh-container.load-start .spinner {
        animation: spin 0.5s linear infinite;
    }

    .refresh-container.load-start .spinner * {
        fill: #000000;
    }

    .refresh-container.load-start::after {
        content: "";
        background-color: transparent;
        transform: scale(50);
        z-index: 999;
    }
</style>

<div class="refresh-container">
    <svg class="spinner">
        <i class="fa fa-spinner"></i>
    </svg>    
</div>

<script>
    const refreshContainer = document.querySelector(".refresh-container");
    const spinner = document.querySelector(".fa");

    let isLoading = false;
    let pStartY = 0;
    let pCurrentY = 0;

    const loadInit = () => {
        refreshContainer.classList.add("load-init");
        isLoading = true;
    };

    const swipeStart = (e) => {
        if (!isLoading) {
        let touch = e.targetTouches[0];
        pStartY = touch.screenY;
        }
    };

    const swipe = (e) => {
        if (!isLoading) {
        let touch = e.changedTouches[0];
        pCurrentY = touch.screenY;
    
        let changeY = pStartY < pCurrentY ? Math.abs(pStartY - pCurrentY) : 0;
    
        if (changeY <= 80) {
            refreshContainer.style.marginTop = `${changeY + 50}px`;
            spinner.style.transform = `rotate(${changeY * 13.5}deg)`;
            if (changeY >= 80) return loadInit();
        }
        }
    };

    const swipeEnd = (e) => {
        let touch = e.changedTouches[0];
        pCurrentY = touch.screenY;
    
        if (isLoading) {
        refreshContainer.classList.add("load-start");
    
        setTimeout(() => {
            isLoading = false;
            refreshContainer.style.marginTop = "0px";
            refreshContainer.classList.remove("load-init");
            refreshContainer.classList.remove("load-start");
        }, 3000);
        }
    
        if (!isLoading) {
        refreshContainer.style.marginTop = "0px";
        spinner.style.transform = `rotate(0deg)`;
        // setTimeout(() => {
        //     window.location.reload();
        // }, 1000);
        }
    };

    document.addEventListener("touchstart", (e) => swipeStart(e));
    document.addEventListener("touchmove", (e) => swipe(e));
    document.addEventListener("touchend", (e) => swipeEnd(e));
</script>
