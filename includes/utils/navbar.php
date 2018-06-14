<?php
echo <<<BLOCKINI
<nav class="navbar navbar-dark navbar-static bg-faded d-md-block" role="navigation">
    <ul class="nav navbar-nav">
        <!-- insert more nav-items if you so choose -->
        <button class="navbar-toggler pull-left" id="navbarSideButton" type="button">&#9776;</button>
    </ul>

    <!-- Navbar side -->
    <ul class="navbar-side nav-top" id="navbarSide">
        <li class="nav-item active navbarSide pt-2">
            <a class="nav-link" href="/app/dashboard"><i data-toggle="tooltip" data-placement="right" title="Dashboard" class="fas fa-tachometer-alt"></i> <font id="LinkText">Dashboard</font></a>
        </li>
        <li class="nav-item navbarSide">
            <a class="nav-link" href="/app/containers"><i data-toggle="tooltip" data-placement="right" title="Containers" class="fas fa-cube"></i> <font id="LinkText">Containers</font></a>
        </li>
        <li class="nav-item navbarSide">
            <a class="nav-link" href="/app/stacks"><i data-toggle="tooltip" data-placement="right" title="Misc." class="fas fa-cubes"></i> <font id="LinkText">Stacks</font></a>
        </li>
        <li class="nav-item navbarSide">
            <a class="nav-link" href="/app/misc"><i data-toggle="tooltip" data-placement="right" title="Misc." class="fas fa-flask"></i> <font id="LinkText">Misc.</font></a>
        </li>        
        <li class="nav-item navbarSide">
            <a class="nav-link" href="/app/services"><i data-toggle="tooltip" data-placement="right" title="Services" class="fas fa-hdd"></i> <font id="LinkText">Services</font></a>
        </li>
        <li class="nav-item navbarSide">
            <a class="nav-link" href="/app/swarm"><i data-toggle="tooltip" data-placement="right" title="Swarm" class="fas fa-server"></i> <font id="LinkText">Swarm</font></a>
        </li>
        <li class="nav-item navbarSide">
            <a class="nav-link" href="../includes/logout"><i data-toggle="tooltip" data-placement="right" title="Log out" class="fas fa-sign-out-alt"></i> <font id="LinkText">Logout</font></a>
        </li>
        <!-- insert more side-items if you so choose -->
    </ul>
    <a class="navbar-brand" href="/app/dashboard">
        <h3>Swarmboard</h3>
    </a>
    <!-- other navbar code omitted -->
    <div class="overlay"></div>
</nav>
BLOCKINI;
?>
