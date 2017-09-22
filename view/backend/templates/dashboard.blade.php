<header>
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <ul class="left">
                    <li class="hide-on-large-only">
                        <a href="javascript:void(0);" data-activates="open-left-menu" class="side-nav-button waves-effect waves-block waves-light"> <i class="material-icons">menu</i> </a>
                    </li>
                    <li>
                        <h1 class="logo-wrapper"> <a href="#!" class="brand-logo"> <span class="m">M</span> <span class="o">o</span> <span class="d">d</span> <span class="s">s</span> </a> </h1> 
                    </li>
                </ul>
                 {!! $block->getTopMenu() !!}                
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<div id="main">
    <div class="wrapper">
        <aside id="sidebar--left">
            {!! $block->getSideMenu() !!}
        </aside>
        <section id="content">
            <div class="container">
                
            </div>
        </section>
    </div>
</div>
    
<script>
    $(document).ready(function() {
        $(".dropdown-button").dropdown();
        $('.tooltipped').tooltip({
            delay: 50
        });
        $(".side-nav-button").sideNav();
        $('.collapsible').collapsible();
        $('.modal').modal();
    });
</script>