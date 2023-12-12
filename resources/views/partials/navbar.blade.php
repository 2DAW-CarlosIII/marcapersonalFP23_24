<style>
#header {
    padding-top: 0px;
}

#nav {
    padding: 0px;
    margin: 0px;
}

/* Important styles */
#toggle {
  display: block;
  width: 28px;
  height: 30px;
  margin: 30px auto 10px;
}

#toggle span:after,
#toggle span:before {
  content: "";
  position: absolute;
  left: 0;
  top: -9px;
}
#toggle span:after{
  top: 9px;
}
#toggle span {
  position: relative;
  display: block;
}

#toggle span,
#toggle span:after,
#toggle span:before {
  width: 100%;
  height: 5px;
  background-color: #888;
  transition: all 0.3s;
  backface-visibility: hidden;
  border-radius: 2px;
}

/* on activation */
#toggle.on span {
  background-color: transparent;
}
#toggle.on span:before {
  transform: rotate(45deg) translate(5px, 5px);
}
#toggle.on span:after {
  transform: rotate(-45deg) translate(7px, -8px);
}
#toggle.on + #menu {
  opacity: 1;
  visibility: visible;
  height: auto;
}

/* menu appearance*/
#menu {
  position: relative;
  color: #999;
  height: 0px;
  width: 200px;
  padding: 0px;
  margin: auto;
  text-align: center;
  border-radius: 4px;
  background: white;
  box-shadow: 0 1px 8px rgba(0,0,0,0.05);
  opacity: 0;
  visibility: hidden;
  transition: all .4s;
}

#menu:after {
  position: absolute;
  top: -20px;
  left: 85px;
  content: "";
  display: block;
  border-left: 15px solid transparent;
  border-right: 15px solid transparent;
  border-bottom: 20px solid white;
}
nav ul, li, li a {
  list-style: none;
  display: block;
  margin: 0;
  padding: 0;
}
nav li a {
  margin: 5px;
  padding: 5px;
  color: #d52349;
  text-decoration: none;
  transition: all .2s;
}
nav li a:hover,
nav li a:focus {
  background: #d52349;
  color: #fff;
}

/* demo styles */
nav.p, nav.p a { font-size: 12px;text-align: center; color: #888; }
</style>
<nav id="nav" class="menu" >
    <a href="#menu" id="toggle"><span></span></a>
    <div id="menu">
        <ul>
            <li><a href="{{ route('home') }}" >Home</a></li>
            <li><a href="{{ route('proyectos') }}" >Proyectos</a></li>
            <li><a href="{{ route('estudiantes') }}" >Estudiantes</a></li>
            <li><a href="{{ route('curriculos') }}" >Currículos</a></li>
            <li><a href="{{ route('actividades') }}" >Actividades</a></li>
            <li><a href="{{ route('reconocimientos') }}" >Reconocimientos</a></li>
            <li><a href="{{ route('docentes') }}" >Docentes</a></li>
            <li><a href="{{ route('login') }}" >Login</a></li>
        </ul>
    </div>
  </nav>
<script>
    var theToggle = document.getElementById('toggle');

    // based on Todd Motto functions
    // https://toddmotto.com/labs/reusable-js/

    // hasClass
    function hasClass(elem, className) {
        return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
    }
    // addClass
    function addClass(elem, className) {
        if (!hasClass(elem, className)) {
            elem.className += ' ' + className;
        }
    }
    // removeClass
    function removeClass(elem, className) {
        var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ') + ' ';
        if (hasClass(elem, className)) {
            while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
                newClass = newClass.replace(' ' + className + ' ', ' ');
            }
            elem.className = newClass.replace(/^\s+|\s+$/g, '');
        }
    }
    // toggleClass
    function toggleClass(elem, className) {
        var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, " " ) + ' ';
        if (hasClass(elem, className)) {
            while (newClass.indexOf(" " + className + " ") >= 0 ) {
                newClass = newClass.replace( " " + className + " " , " " );
            }
            elem.className = newClass.replace(/^\s+|\s+$/g, '');
        } else {
            elem.className += ' ' + className;
        }
    }

    theToggle.onclick = function() {
    toggleClass(this, 'on');
    return false;
    }
</script>
