<!-- Logo -->
<h1>
    <a href="{{ url(env('APP_URL', 'http://marcapersonalfp.test')) }}">
        <img src="{{ asset('/images/mp-logo.png') }}" alt="Logo Marca Personal FP" width="200px"/>
    </a>
</h1>
<!-- Nav -->
<nav id="nav">
    <ul>
        <li class="current"><a href="index.html">Home</a></li>
        <li>
            <a href="#">Dropdown</a>
            <ul>
                <li><a href="#">Lorem ipsum dolor</a></li>
                <li><a href="#">Magna phasellus</a></li>
                <li><a href="#">Etiam dolore nisl</a></li>
                <li>
                    <a href="#">Phasellus consequat</a>
                    <ul>
                        <li><a href="#">Magna phasellus</a></li>
                        <li><a href="#">Etiam dolore nisl</a></li>
                        <li><a href="#">Veroeros feugiat</a></li>
                        <li><a href="#">Nisl sed aliquam</a></li>
                        <li><a href="#">Dolore adipiscing</a></li>
                    </ul>
                </li>
                <li><a href="#">Veroeros feugiat</a></li>
            </ul>
        </li>
        <li><a href="left-sidebar.html">Left Sidebar</a></li>
        <li><a href="right-sidebar.html">Right Sidebar</a></li>
        <li><a href="no-sidebar.html">No Sidebar</a></li>
    </ul>
</nav>
