<nav id="sidebar">
    <div class="sidebar-header">
        <img class="logo" src="<?=base_url()?>assets/admin/img/logo.png" width="200"></a>
    </div>
    <ul class="list-unstyled components">
        <p>

        </p>
        <li class="nav-item">
            <a href="<?=base_url()?>Admin-Dashboard"><i class="fas fa-tachometer-alt">&nbsp</i> Dashboard </a>
        </li>
        <li class="nav-item">
            <a href="<?=base_url()?>Admin-AAirdrops"><i class="fas fa-parachute-box">&nbsp</i> Airdrops </a>
        </li>
        <li class="nav-item">
            <a href="<?=base_url()?>Admin-FeaturedAirdrops"><i class="fas fa-star">&nbsp</i> Featured </a>
        </li>
        <li class="nav-item">
            <a href="<?=base_url()?>Admin-Requests"><i class="fas fa-book-open">&nbsp</i> Requests </a>
        </li>
        <li class="nav-item">
            <a href="<?=base_url()?>Admin-Expired-Airdrops"><i class="fas fa-calendar-times">&nbsp</i> Expired </a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cogs">&nbsp</i> Option </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <?php
                if ($this->session->userdata('is_Admin') == 1) {
                    echo '<li class="nav-item">
                    <a href="'.base_url().'Admin-list"><i class="fas fa-user-tie">&nbsp</i> Admins </a>
                    </li>';
                }
                ?>
                <li class="nav-item">
                    <a href="<?=base_url()?>Admin-Pricing"><i class="fas fa-barcode">&nbsp</i> Pricing </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>Admin-AllUsers"><i class="fas fa-users">&nbsp</i> Users </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url()?>Admin-Faqs"><i class="fas fa-question">&nbsp</i> FAQ's </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="https://airdropcoinstation.com/" target="_blank"><i class="fas fa-link">&nbsp</i> Visit Website </a>
        </li>
    </ul>
</nav>