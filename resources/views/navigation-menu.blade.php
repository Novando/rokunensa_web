<nav>
    <ul>
        <li>
            <a href="#">
                <span class="icon"></span>
                <span class="title"><h2>Brand Name</h2></span>
            </a>
        </li>
        <li>
            <b class="roundout active"></b>
            <b class="roundout active"></b>
            <a href="#" class="active">
                <span class="icon"><i class="fas fa-tv"></i></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <b class="roundout"></b>
            <b class="roundout"></b>
            <a href="#">
                <span class="icon"><i class="fas fa-envelope"></i></span>
                <span class="title">Message</span>
            </a>
        </li>
        <li>
            <b class="roundout"></b>
            <b class="roundout"></b>
            <a href="#">
                <span class="icon"><i class="fas fa-cubes"></i></span>
                <span class="title">Order</span>
            </a>
        </li>
        <li>
            <b class="roundout"></b>
            <b class="roundout"></b>
            <a href="#">
                <span class="icon"><i class="fas fa-users"></i></span>
                <span class="title">Users</span>
            </a>
        </li>
        <li>
            <b class="roundout"></b>
            <b class="roundout"></b>
            <a href="#">
                <span class="icon"><i class="fas fa-chart-pie"></i></span>
                <span class="title">Statistic</span>
            </a>
        </li>
        <li>
            <b class="roundout"></b>
            <b class="roundout"></b>
            <a href="#">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span class="title">Settings</span>
            </a>
        </li>
        <li>
            <b class="roundout"></b>
            <b class="roundout"></b>
            <a href="#">
                <span class="icon"><i class="fas fa-door-closed"></i></span>
                <span class="title">Sign Out</span>
            </a>
        </li>
    </ul>
    <div class="user">
        <div class="profile">
            <div class="details">
                <img src="img/tes.jpg">
                <div class="credential">
                    <div class="name">{{$detail->username}}</div>
                    <div class="job">
                        @switch($account->utype)
                            @case('ADM')
                                Administrator
                                @break
                            @case('SUR')
                                Super User
                                @break
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>