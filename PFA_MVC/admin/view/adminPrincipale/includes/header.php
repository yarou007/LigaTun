<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <li class="nav-item nav-link">
            <h2 class="primary "> <?= $nom ?></h2>
        </li>
        <li class="nav-item nav-link">
            <a href="../../index.php?action=listeClient" class="nav-link active">Listes Clients</a>
        </li>

        <li class="nav-item nav-link">
            <div class="dropdown">
                <button class="nav-item nav-link dropbtn">Administration
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="../../index.php?action=chiffres">Overall</a>
                    <a href="../../index.php?action=listeAdmin">Listes Admin</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        </li>
        <!--  <li class="nav-item nav-link">
            <a href="index.php?action=listeAdmin" class="nav-link">Administration</a>
        </li> -->
        <li class="nav-item nav-link">
            <a href="../../index.php?action=listeRes" class="nav-link">Reservation </a>
        </li>

        <li class="nav-item nav-link">
            <a href="../../index.php?action=listeTerrain" class="nav-link">Listes Terrain</a>
        </li>
        <li class="nav-item nav-link" style="margin-left:450px;">
            <a href="./index.php?action=setting" class="nav-link">Setting</a>
        </li>
        <li class="nav-item nav-link" style="margin-left:2px;">
            <a href="../.././index.php?action=logout" class="nav-link">Logout</a>

        </li>
    </div>
</nav>

<style>
    
.nav-item .nav-link .dropdown {
  float: left;
  overflow: hidden;
}



.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</style>