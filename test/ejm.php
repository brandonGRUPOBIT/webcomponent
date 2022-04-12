
<div class="header-top " >
    <div class="layout-1 flex">
        <div class="flex top-menu">
            <div>
                <?php print render($page['header_top']); ?>
            </div>
           
        </div>
        <div class="flex top-menu-right">
            <div class="flex items-social">
                <div class="item-social"> 
                    <div class="bg">  
                        <a href="https://es-la.facebook.com/utpl.loja/"> <img src="/sites/all/themes/utpl/images/icon-fb.png" alt="fb"/>  </a>
                    </div>
                    <div class="mouseover">   
                        <a href="https://es-la.facebook.com/utpl.loja/"> <img src="/sites/all/themes/utpl/images/icon-fb-over.png" alt="fb"/>  </a>
                    </div>
                </div>

                <div class="item-social"> 
                    <div class="bg">  
                        <a href="https://twitter.com/utpl?lang=es"> <img src="/sites/all/themes/utpl/images/icon-tw.png" alt="tw"/>  </a>
                    </div>
                    <div class="mouseover">   
                        <a href="https://twitter.com/utpl?lang=es"> <img src="/sites/all/themes/utpl/images/icon-tw-over.png" alt="tw"/>  </a>
                    </div>
                </div>
                <div class="item-social"> 
                    <div class="bg">  
                        <a href="https://www.youtube.com/user/utpl/"> <img src="/sites/all/themes/utpl/images/icon-youtube.png" alt="youtube"/>  </a>
                    </div>
                    <div class="mouseover">   
                        <a href="https://www.youtube.com/user/utpl/"> <img src="/sites/all/themes/utpl/images/icon-youtube-over.png" alt="youtube"/>  </a>
                    </div>
                </div>
                <div class="item-social"> 
                    <div class="bg">  
                        <a href="https://www.instagram.com/utpl/?hl=es-la"> <img src="/sites/all/themes/utpl/images/icon-inst.png" alt="instagram"/>  </a>
                    </div>
                    <div class="mouseover">   
                        <a href="https://www.instagram.com/utpl/?hl=es-la"> <img src="/sites/all/themes/utpl/images/icon-inst-over.png" alt="instagram"/>  </a>
                    </div>
                </div>

                <div class="item-social"> 
                    <div class="bg">  
                        <a href="https://www.flickr.com/photos/utpl/"> <img src="/sites/all/themes/utpl/images/icon-flickr.png" alt="flickr"/>  </a>
                    </div>
                    <div class="mouseover">   
                        <a href="https://www.flickr.com/photos/utpl/"> <img src="/sites/all/themes/utpl/images/icon-flickr-over.png" alt="flickr"/>  </a>
                    </div>
                </div>
            </div>
            <?php print render($page['search_top']); ?>


        </div>

    </div>

</div>
<div class="header-wrapper">
    <div class="layout-1 flex">
        <header id="header">
            <div id="logo"><a href="https://utpl.edu.ec/" title="Inicio"><img src="/sites/all/themes/utpl/logo.png"></a></div>
        </header>  
        <nav  class="main-menu " >
            <div class="title-menu"> 
                <a class="mainmenu-toggle " href="#">
                    <i class="material-icons">menu</i>
                </a>
            </div>
            <div class="nav-menu navigation flex">
                <?php print drupal_render($main_menu_tree); ?>

            </div>
        </nav>
    </div>
</div>

<div class="carrusel">
    <?php print render($page['carousel']); ?>
</div>


<div class="submenu">
    <div class="layout-1 flex">
        <div class="logo">
            <a href="<?php print $front_page; ?>"><img src="/sites/all/themes/utpl/logo.png"/></a>
        </div>
        <nav class="sub-menu">
            <div class="title-menu"> 
                <a class="submenu-toggle flex " href="#sub-menu">
                    <p> IR A LA SECCIÓN </p>
                    <i class="material-icons">menu</i>
                </a>
            </div>
            <div class="nav-submenu navigation">
                <?php print render($page['submenu']); ?>
            </div> 
        </nav>

        <div class="gototop">
            <a id="gototop" href="#">
                <img src="https://becas.utpl.edu.ec/sites/default/files/arrow-up.png">
            </a>
        </div>

    </div>
</div> 

<?php if (drupal_is_front_page()) {?>

  <div class="wrapper-becas padding2">
<div class="layout-1 ">
<h2 class="rtecenter"><strong>Tipos de</strong> becas</h2>
<p>A través de nuestro programa de becas ofrecemos una oportunidad a todos nuestros alumnos cuya situación económica no les permite cubrir los gastos universitarios y que se destacan por sus méritos académicos o pertenecen a grupos minoritarios.</p>
<p><strong>Pueden postular a nuestras becas</strong> todos los alumnos nuevos (primer ciclo) y los alumnos actuales (segundo ciclo en adelante) de grado, tecnologías y posgrado en nuestras dos modalidades de estudio.</p>


<div class="wrapper-desplegables ">
<div class="movil-seleccione">Seleccione las opciones</div>
<div class="section1 desplegable-opciones">
<div class="section">
    <div class="general selected" id="item" > Todas las becas</div>
</div>
    <h2>Tipos de becas</h2>

    <div class="section">
    <div class="general" id="Apoyo"> Becas de Apoyo Económico</div>
    <div class="general" id="Excelencia"> Becas de Excelencia</div>
    <div class="general" id="Inclusión"> Becas de Inclusión</div>
    <div class="general" id="Estratégica"> Becas Estratégicas</div>
    </div>

    <h2>Becas por modalidad</h2>
    <div class="section">
    <div class="general" id="Presencial"> Modalidad Presencial <img style="width: 10px; height: 10px;" src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png"></div>
    <div class="general" id="Distancia"> Modalidad Abierta y Distancia <img style="width: 10px; height: 10px;" src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png"></div>
    </div>


</div>

<div class="section2 desplegable-contenido">
<h2 class="desplegable-title">Grado</h2>
<div class="grado">
<?php
$data1 = file_get_contents("https://becas.utpl.edu.ec/servicios/becasgeneral.json");
$data2 = file_get_contents("https://becas.utpl.edu.ec/servicios/becasposgrado.json");
$data3 = file_get_contents("https://becas.utpl.edu.ec/servicios/becastecnologia.json");
$array1 = json_decode($data1, true);
$array2 = json_decode($data2, true);
$array3 = json_decode($data3, true);


foreach ($array1 as $value1) {
?>
<div class="item <?php print $value1['field_tipo_de_beca'];
 print str_replace("Modalidad","",$value1['Aplica'][0]);
 if(isset($value1['Aplica'][1])){
print str_replace("Modalidad Abierta y a Distancia","Distancia",$value1['Aplica'][1]);
} ?>">
 <?php if(isset($value1['Aplica'][1])){    ?>
 <img src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png">
     <?php } ?>
<?php 
if (strcmp($value1['Aplica'][0] ,' Modalidad Presencial' ) == 0) {
 ?>
 <img src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png">
 <?php }else{     ?>
 <img src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png">
     <?php }  ?>
<?php print $value1['title'];?>
</div>
<?php
}

?>
</div>
    <h2 class="desplegable-title">Posgrado</h2>
    <div class="posgrado">
        <?php foreach ($array2 as $value1) {?>
        <div class="item <?php print $value1['field_tipo_de_beca'];?> Presencial Distancia">
            <img src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png">
            <img src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png">
            <?php print $value1['title'];?>
        </div>
        <?php
        } ?> 
    </div>
    <h2 class="desplegable-title">Tecnologías</h2>
    <div class="tecnologia">
        <?php foreach ($array3 as $value1) {?>
        <div class="item <?php print $value1['field_tipo_de_beca'];?> Distancia">
            <img src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png">
            <?php print $value1['title'];?>
        </div>
        <?php
        } ?> 
    </div>

</div>
</div>
</div>
</div>



<?php } ?>

<?php if (!drupal_is_front_page()) { ?> 

    <div id="container">
        <div class="breadcrumbs">
            <div class="layout-1">
                <?php
                if ($breadcrumb): print $breadcrumb;
                endif;
                ?>
            </div>
        </div>
        <div class="content-sidebar-wrap layout-1">
            <div id="content">
                <section id="post-content" role="main">

                    <?php print $messages; ?>
                    <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
                    <?php print render($title_prefix); ?>
                    <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
                    <?php print render($title_suffix); ?>


                    <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
                    <?php print render($page['help']); ?>
                    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                    <?php print render($page['content']); ?>
                </section> <!-- /#main -->
            </div>
            <?php if ($page['sidebar_first']): ?>
                <aside id="sidebar-first" role="complementary">
                    <?php print render($page['sidebar_first']); ?>
                </aside>  <!-- /#sidebar-first -->
            <?php endif; ?>


            <?php if ($page['sidebar_second']): ?>
                <aside id="sidebar-second" role="complementary">
                    <?php print render($page['sidebar_second']); ?>
                </aside>  <!-- /#sidebar-first -->
            <?php endif; ?>
        </div>
    </div>

<?php } ?>


<div class="seccions">
    <?php print render($page['seccions']); ?>
</div>
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/3056987.js"></script>
<!-- End of HubSpot Embed Code -->

<div class="gototopfoot">
    <a id="gototopfoot" href="#">
     <img src="https://becas.utpl.edu.ec/sites/default/files/arrow-up.png"> </a>
</div>
<div class=" footer-wrapper blue-bg">
    <div id="footer" class="white-text  layout-1 "> 
        <div class="footer_credit padding2">
            <?php if ($page['footer']): ?>
                <?php print render($page['footer']) ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="padding1 copyright">
        <div class="flex layout-1 blocks">
            <div><p>Copyright 2020. Universidad Técnica Particular de Loja </p> </div>
            <div>   <div class="flex items-social">
                    <div class="item-social"> 
                        <div class="bg">  
                            <a href="https://es-la.facebook.com/utpl.loja/"> <img src="/sites/all/themes/utpl/images/icon-fb.png" alt="fb"/>  </a>
                        </div>
                        <div class="mouseover">   
                            <a href="https://es-la.facebook.com/utpl.loja/"> <img src="/sites/all/themes/utpl/images/icon-fb-over.png" alt="fb"/>  </a>
                        </div>
                    </div>

                    <div class="item-social"> 
                        <div class="bg">  
                            <a href="https://twitter.com/utpl?lang=es"> <img src="/sites/all/themes/utpl/images/icon-tw.png" alt="tw"/>  </a>
                        </div>
                        <div class="mouseover">   
                            <a href="https://twitter.com/utpl?lang=es"> <img src="/sites/all/themes/utpl/images/icon-tw-over.png" alt="tw"/>  </a>
                        </div>
                    </div>
                    <div class="item-social"> 
                        <div class="bg">  
                            <a href="https://www.youtube.com/user/utpl/"> <img src="/sites/all/themes/utpl/images/icon-youtube.png" alt="youtube"/>  </a>
                        </div>
                        <div class="mouseover">   
                            <a href="https://www.youtube.com/user/utpl/"> <img src="/sites/all/themes/utpl/images/icon-youtube-over.png" alt="youtube"/>  </a>
                        </div>
                    </div>
                    <div class="item-social"> 
                        <div class="bg">  
                            <a href="https://www.instagram.com/utpl/?hl=es-la"> <img src="/sites/all/themes/utpl/images/icon-inst.png" alt="instagram"/>  </a>
                        </div>
                        <div class="mouseover">   
                            <a href="https://www.instagram.com/utpl/?hl=es-la"> <img src="/sites/all/themes/utpl/images/icon-inst-over.png" alt="instagram"/>  </a>
                        </div>
                    </div>

                    <div class="item-social"> 
                        <div class="bg">  
                            <a href="https://www.flickr.com/photos/utpl/"> <img src="/sites/all/themes/utpl/images/icon-flickr.png" alt="flickr"/>  </a>
                        </div>
                        <div class="mouseover">   
                            <a href="https://www.flickr.com/photos/utpl/"> <img src="/sites/all/themes/utpl/images/icon-flickr-over.png" alt="flickr"/>  </a>
                        </div>
                    </div>
                </div></div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>