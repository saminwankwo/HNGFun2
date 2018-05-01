<?php
include_once("header.php");
?>

<style>
    body {
        /* background-color: firebrick; */
        font-family: 'Fruktur';
    }

    .whole-background {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .header-font-one {
        font-size: large;
        font-family: "serif";
        color: white;
    }

    .header-font-two {
        font-size: small;
        font-family: "Apple Color Emoji";
        text-align: center;

    }

    .search-container {
        height: 70px;
        width: 100%;
        justify-content: center;
    }

    .header-container {
        height: 200px;
        width: 100%;
        background-color: #3fb3fa;
        justify-content: center;
    }
</style>
<main>
    <div>

        <div class="header-container text-center">
            <div class="header-font-one">
                <span style="color: white; ">This is some text!</span>
            </div>
        </div>

    </div>
    <div class="search-container">

    </div>
</main>


<?php
include_once("footer.php");
?>
