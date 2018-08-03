<div class="wrapper">
        <header>

                <nav>

                    <div class="menu-icon">
                        <i class="fa fa-bars fa-2x"></i>
                    </div>

                    <div class="logo">
                       <a href="index.php"><img src="educomm.jpg"></a>
                    </div>
					<div class="menu">
                              <ul>
                                <li><a href="index.php" class="a">Home</a></li>
                                <li><a href="login.php" class="a">Login</a></li>
                                <li><a href="reg.php" class="a">Register</a></li>
                            </ul>
                    </div>
                </nav>

        </header>
</div>
<script type="text/javascript">

      // Menu-toggle button
$(document).ready(function() 
{
  $(".menu-icon").on("click", function() 
  {
        $("nav ul").toggleClass("showing");
    });
  });
	// Scrolling Effect
$(window).on("scroll", function()
{
    if($(window).scrollTop()) {
        $('nav').addClass('black');
    }
	else {
    $('nav').removeClass('black');
        }
      })
</script>
	  