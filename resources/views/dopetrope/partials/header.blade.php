<section id="header">

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

    <!-- Banner -->
    <section id="banner">
        <header>
            <h2>Howdy. This is Dopetrope.</h2>
            <p>A responsive template by HTML5 UP</p>
        </header>
    </section>

    <!-- Intro -->
    <section id="intro" class="container">
        <div class="row">
            <div class="col-4 col-12-medium">
                <section class="first">
                    <i class="icon solid featured fa-cog"></i>
                    <header>
                        <h2>Ipsum consequat</h2>
                    </header>
                    <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
                </section>
            </div>
            <div class="col-4 col-12-medium">
                <section class="middle">
                    <i class="icon solid featured alt fa-bolt"></i>
                    <header>
                        <h2>Magna etiam dolor</h2>
                    </header>
                    <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
                </section>
            </div>
            <div class="col-4 col-12-medium">
                <section class="last">
                    <i class="icon solid featured alt2 fa-star"></i>
                    <header>
                        <h2>Tempus adipiscing</h2>
                    </header>
                    <p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
                </section>
            </div>
        </div>
        <footer>
            <ul class="actions">
                <li><a href="#" class="button large">Get Started</a></li>
                <li><a href="#" class="button alt large">Learn More</a></li>
            </ul>
        </footer>
    </section>

</section>
