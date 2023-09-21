<!-- Dit is een lijstitem voor de eerste paginaknop. Als de huidige pagina de eerste pagina is, wordt 'active' toegevoegd aan de class van het element, anders wordt het vorige paginanummer of de volgende pagina minus 2 weergegeven. -->
<li class="page-item <?= ($data['pageNumber'] == 1) ? 'active' : ''; ?>"><a class="page-link" href="#">
        <?php
        if($data['pageNumber'] == 1)
        {
            echo $data['pageNumber'];
        } else {
            if($data['pageNumber'] == $data['totalPages']) {
                echo $data['pageNumber'] - 2;
            }else {
                echo $data['pageNumber'] - 1;
            }
        }
        ?>
    </a></li>

<!-- Dit is een lijstitem voor de middelste paginaknoppen. Als de huidige pagina niet de eerste of de laatste is, wordt 'active' toegevoegd aan de class van het element. Het paginanummer dat wordt weergegeven, is afhankelijk van de huidige pagina en of deze de laatste pagina is. -->
<li class="page-item <?= ($data['pageNumber'] != 1 && $data['totalPages'] != $data['pageNumber']) ? 'active' : ''; ?>"><a class="page-link" href="#">
        <?php
        if($data['pageNumber'] != 1)
        {
            if($data['pageNumber'] == $data['totalPages']) {
                echo $data['pageNumber'] - 1;
            }else {
                echo $data['pageNumber'];
            }
        }else {
            echo $data['pageNumber'] + 1;
        }
        ?>
    </a></li>

<!-- Dit is een lijstitem voor de laatste paginaknop. Hier wordt 3 weergegeven als de huidige pagina de eerste of tweede pagina is, anders wordt het huidige paginanummer plus 1 weergegeven. 'active' wordt toegevoegd als de huidige pagina de laatste is. -->
<li class="page-item <?= ($data['pageNumber'] == $data['totalPages']) ? 'active' : ''; ?>"><a class="page-link" href="#">
        <?php
        if($data['pageNumber'] == 1 || $data['pageNumber'] == 2)
        {
            echo 3;
        }elseif ($data['pageNumber'] == $data['totalPages']) {
            echo $data['pageNumber'];
        }else {
            echo $data['pageNumber'] + 1;
        }
        ?>
    </a></li>