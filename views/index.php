<?php
require_once '../templates/cabecalho.php';
?>
<!-- container do carrossel -->
<div class="container-carrossel">
    <!-- container dos slides -->
    <div class="slideshow-container">

        <!-- imagens com largura maxima com numero e texto de legenda -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="https://source.unsplash.com/random/1920x1080/?landscape,mountain" style="width:100%">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="https://source.unsplash.com/random/1920x1080/?landscape,night" style="width:100%">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="https://source.unsplash.com/random/1920x1080/?landscape,city" style="width:100%">
            <div class="text">Caption Three</div>
        </div>

        <!-- botoes "proximo" e "anterior" -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- os circulos -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>

<!-- container dos cards -->
<div class="container_cards">
    <div class="card">
        <a href="produto.php">
            <img src="https://source.unsplash.com/random/1920x1080/?apple" alt="Denim Jeans" style="width:100%">
            <h1>Quadro o Grito</h1>
            <p class="price">$19.99</p>
            <p>Esse é o quadro o Grito</p>
            <p><button>Confira</button></p>
        </a>
    </div>

    <div class="card">
        <a href="produto.php">
            <img src="https://source.unsplash.com/random/1920x1080/?motorola" alt="Denim Jeans" style="width:100%">
            <h1>Quadro o Grito</h1>
            <p class="price">$19.99</p>
            <p>Esse é o quadro o Grito</p>
            <p><button>Confira</button></p>
        </a>
    </div>

    <div class="card">
        <a href="produto.php">
            <img src="https://source.unsplash.com/random/1920x1080/?samsung" alt="Denim Jeans" style="width:100%">
            <h1>Quadro o Grito</h1>
            <p class="price">$19.99</p>
            <p>Esse é o quadro o Grito</p>
            <p><button>Confira</button></p>
        </a>
    </div>

    <div class="card">
        <a href="produto.php">
            <img src="https://source.unsplash.com/random/1920x1080/?xiaomi" alt="Denim Jeans" style="width:100%">
            <h1>Quadro o Grito</h1>
            <p class="price">$19.99</p>
            <p>Esse é o quadro o Grito</p>
            <p><button>Confira</button></p>
        </a>
    </div>
</div>


<?php
require_once '../templates/rodape.php';
?>