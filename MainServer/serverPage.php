<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>PAPERFRAME - server management page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/main-layout.css" type="text/css">
    <script type="text/javascript" src="assests/js/main.js"></script>
    <?php include "login.php"; ?>
</head>
<body>
    <div class="wrapper row1">
        <header id="header" class="clear">
            <div id="hgroup">
                <h1><a href="/main.php">Paper<span>frame</span></a></h1>
                <h2>server management page powered from Odroid</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="/upload.php?serverno=1">Server1</a></li>
                    <li><a href="/upload.php?serverno=2">Server2</a></li>
                    <li><a href="/upload.php?serverno=3">Server3</a></li>
                    <li><a href="/hash.php">HASH</a></li>
                    <li class="last"><a href="/">LOGOUT</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <!-- content body -->
            <div id="homepage">
                <!-- One Quarter -->

                <h1>Server List</h1>
                <section id="services" class="clear">
                    <article>
                        <figure><img src="assets/images/ethernet_green.png" width="32" height="32" alt=""></figure>
                        <strong>Server1 - Odroid HC1</strong>
                        <p>This is a W3C compliant free website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. For full terms of use of this template please read our <a href="http://www.os-templates.com/template-terms">website template licence</a>.</p>
                        <p class="more"><a href="#">Detailed Info &raquo;</a></p>
                    </article>
                    <article>
                        <figure><img src="assets/images/ethernet_orange.png" width="32" height="32" alt=""></figure>
                        <strong>Server2 - RasPi 2B</strong>
                        <p>You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files.</p>
                        <p class="more"><a href="#">Detailed Info &raquo;</a></p>
                    </article>
                    <article class="last">
                        <figure><img src="assets/images/ethernet_grey.png" width="32" height="32" alt=""></figure>
                        <strong>Server3 - </strong>
                        <p>For more HTML5 templates visit <a href="http://www.os-templates.com/">free website templates</a>. Orciinterdum condimenterdum nullamcorper elit nam curabitur laoreet met praesenean et iaculum.</p>
                        <p class="more"><a href="#">Detailed Info &raquo;</a></p>
                    </article>
                </section>

                <section id="code">
                    <p>code to view PHP errors:</br></br>
                        ini_set('display_errors', 1);</br>
                        ini_set('display_startup_errors', 1);</br>
                        error_reporting(E_ALL);</p>
                </section>

                <!-- / One Quarter -->
                <section id="shout">
                </br></br>
                <hr>
                    <p>Below may not be very useful.</p>
                </section>

                <!-- 4pics -->
                <!-- <section id="latest" class="clear">
                    <article class="one_quarter">
                        <figure><img src="assets/images/demo/215x315.gif" width="215" height="315" alt="">
                            <figcaption>Image Caption Here</figcaption>
                        </figure>
                    </article>
                    <article class="one_quarter">
                        <figure><img src="assets/images/demo/215x315.gif" width="215" height="315" alt="">
                            <figcaption>Image Caption Here</figcaption>
                        </figure>
                    </article>
                    <article class="one_quarter">
                        <figure><img src="assets/images/demo/215x315.gif" width="215" height="315" alt="">
                            <figcaption>Image Caption Here</figcaption>
                        </figure>
                    </article>
                    <article class="one_quarter lastbox">
                        <figure><img src="assets/images/demo/215x315.gif" width="215" height="315" alt="">
                            <figcaption>Image Caption Here</figcaption>
                        </figure>
                    </article>
                </section> -->

                <!-- coode snippets -->
                <!-- <section id="code">
                    <p>I can place code sniffets in here</p>
                </section> -->

            </div>

            <!-- left column -->
            <container>
                <aside id="left_column">
                    <h2 class="title">Links</h2>
                    <nav>
                        <ul>
                            <li><a href="www.dothome.co.kr">Dothome Hosting</a></li>
                            <li><a href="/">Paperframe</a></li>
                            <li><a href="/myadmin">paperframe - PHPMyAdmin</a></li>
                            <li><a href="#">Free XHTML Templates</a></li>
                            <li class="last"><a href="https://dribbble.com/shots/4081186-Type-widget-for-web">Dribble-theme</a></li>
                        </ul>
                    </nav>
                    <!-- /nav -->
                </aside>
            </container>


            <!-- main content -->
            <div id="content">
                <section id="services" class="last clear">
                    <ul>
                        <li>
                            <article class="clear">
                                <figure><img src="assets/images/demo/180x150.gif" alt="">
                                    <figcaption>
                                        <h2>우리학교 너무춥다</h2>
                                        <p>구글이 최고지 <a href="https://www.google.com">GOOGLE</a></p>
                                        <footer class="more"><a href="#">Read More &raquo;</a></footer>
                                    </figcaption>
                                </figure>
                            </article>
                        </li>
                        <li class="last">
                            <article class="clear">
                                <figure><img src="assets/images/demo/180x150.gif" alt="">
                                    <figcaption>
                                        <h2>방과후실 와이파이는 FTP도 막아놨어</h2>
                                        <p>그래도 노트북할 수 있는게 어디야</p>
                                        <footer class="more"><a href="#">Read More &raquo;</a></footer>
                                    </figcaption>
                                </figure>
                            </article>
                        </li>
                    </ul>
                </section>
            </div>

        </div>
    </div>
    <!-- Footer -->
    <div class="wrapper row3">
        <footer id="footer" class="clear">
            <p class="fl_left">Paperframe - Server powered from Odroid</a></p>
            <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
        </footer>
    </div>
</body>
</html>
