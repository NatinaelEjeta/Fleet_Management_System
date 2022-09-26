<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid" style="background: orange;">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="dashboard.php" style="color: #3b7bbf; font-size: 13px;"> <strong>
                    Fleet Management System </strong> </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn-rotate" href="javascript:;" style="color: #3b7bbf; font-size: 11px;"
                        title="Last Signed on <?php $lastLogged = date("F j, Y", strtotime($date));  echo $lastLogged;  ?>">
                        <strong> <?php 
                                        echo $user; 
                                    ?>
                        </strong>
                        <p>
                            <span class="d-lg-none d-md-block"></span>
                        </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>