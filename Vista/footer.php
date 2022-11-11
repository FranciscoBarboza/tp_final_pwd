<html>
    <head>
<style>
    .dropdownmenu ul, .dropdownmenu li {
	margin: 0;
	padding: 0;
}
.dropdownmenu ul {
	background: gray;
	list-style: none;
	width: 100%;
}
.dropdownmenu li {
	float: left;
	position: relative;
	width:auto;
}
.dropdownmenu a {
	background: #30A6E6;
	display: block;
	font: bold 12px/20px sans-serif;
	padding: 10px 25px;
	text-align: center;
	text-decoration: none;
	-webkit-transition: all .25s ease;
	-moz-transition: all .25s ease;
	-ms-transition: all .25s ease;
	-o-transition: all .25s ease;
	transition: all .25s ease;
    


    
}
.dropdownmenu li:hover a {
	background: #000000;
}
#submenu {
	left: 0;
	opacity: 0;
	position: absolute;
	top: 35px;
	visibility: hidden;
	z-index: 1;
}
li:hover ul#submenu {
	opacity: 1;
	top: 40px;	/* adjust this as per top nav padding top & bottom comes */
	visibility: visible;
}
#submenu li {
	float: none;
	width: 100%;
}
#submenu a:hover {
	background: #DF4B05;
}
#submenu a {
	background-color:#000000;
}

#footer{
    display: flex;
    justify-content: space-between;
    align-items: center;
    animation: Animacion 10s ease-in-out infinite alternate both;
    font-family: 'M PLUS Rounded 1c', sans-serif;
    
}

.dropdownmenu{
    vertical-align: middle;
    justify-content: center;
}

@keyframes Animacion{
    0%{
        background-color: #d8b4b4;
    }
    25%{
        background-color: rgb(182, 141, 209);
    }
    50%{
        background-color: #beb7fd;
    }
    75%{
        background-color: #ff9bfa;
    }
    100%{
        background-color: #ffadad;
    }
}
</style>
    </head>
    <body>
<div id="footer" style="height: 80px; width: 100%;">

    <div id="titulo" style="margin-left: 2em;">
        <h1>TP GRUPO 2</h1>
    </div>

        
    <nav class="dropdownmenu" style="margin-right: 2em;">
        <div id="menu">
  <ul>
    
    <li><a href="#">TP 1</a>
      <ul id="submenu">
        <li><a href="http://www.jochaho.com/wordpress/difference-between-svg-vs-canvas/">TP 1</a></li>
        <li><a href="http://www.jochaho.com/wordpress/new-features-in-html5/">TP 2</a></li>
        <li><a href="http://www.jochaho.com/wordpress/creating-links-to-sections-within-a-webpage/">TP 3</a></li>
      </ul>
    </li>
    <li><a href="http://www.jochaho.com/wordpress/category/news/">TP 2</a></li>
    <li><a href="http://www.jochaho.com/wordpress/about-pritesh-badge/">TP 3</a></li>
  </ul>
  </div>
    </nav>

    </div> 
    </body>
</html>