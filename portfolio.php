<!DOCTYPE html>
<html>
<head>
    <title>Orion's Portfolio</title>
    <link rel="stylesheet" type="text/css" href="/styles/styles.css">
</head>
<body>
    <img id="background" src="images/orion-nebula_2000x2000.jpg" alt="" />
    <?php include "navigation_menu-main.html"; ?>
    <div class="spacer-100"></div>
    <div class="grid-wrapper">
        <a class="button-link" href="artwork/list.php">
            <div class="content-reactive-grid">
                <div class="port-img">
                    <img src="images/paintbrush.jpg" alt="Artwork" title="Artwork" height="180" width="180" />
                </div>
                <div class="port-desc">
                    <h1 class="thin-border" id="large">Artwork</h1>
                    <p>The paintings, drawings, and more that I've created over the years</p>
                </div>
            </div>
        </a>
        <a class="button-link" href="programming/list.php">
            <div class="content-reactive-grid">
                <div class="port-img">
                    <img src="images/computer.jpg" alt="Programming" title="Programming" height="180" width="180" />
                </div>
                <div class="port-desc">
                    <h1 class="thin-border" id="large">Programming</h1>
                    <p>All of the projects of note that I've created thus far</p>
                </div>
            </div>
        </a>
    </div>
</body>


