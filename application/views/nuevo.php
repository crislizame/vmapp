<?php include 'include/head.php'; ?>
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>
        <?php include 'include/nav.php'; ?>
        <!-- /.nav-list -->
        
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Inicio</a>
                    </li>

                    <li>
                        <a href="#"><?= ucfirst($tipopagina); ?></a>
                    </li>
                    <li class="active"><?= ucfirst($accionpagina); ?></li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
		<span class="input-icon">
			<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
			<i class="ace-icon fa fa-search nav-search-icon"></i>
		</span>
                    </form>
                </div><!-- /.nav-search -->
            </div>

            <div class="page-content">
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="ace-icon fa fa-cog bigger-130"></i>
                    </div>

                    <div class="ace-settings-box clearfix" id="ace-settings-box">
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hide">
                                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; Choose Skin</span>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                                <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                                <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                                <label class="lbl" for="ace-settings-add-container">
                                    Inside
                                    <b>.container</b>
                                </label>
                            </div>
                        </div><!-- /.pull-left -->

                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                                <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                                <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                                <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                            </div>
                        </div><!-- /.pull-left -->
                    </div><!-- /.ace-settings-box -->
                </div><!-- /.ace-settings-container -->

                <div class="page-header">
                    <h1>
                        <?= ucfirst($tipopagina); ?>
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                             <?= ucfirst($accionpagina); ?> <?= ucfirst($tipopagina); ?>.
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" role="form"  autocomplete="off" method="post" id="formulario">
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="nombclient"> Nombre Completo <?= ucfirst($tipopagina); ?> </label>

                                <div class="col-sm-4">
                                    <input type="text" id="nombclient" name="nombclient" placeholder="Nombre/Razon Social" class="col-xs-10 col-sm-12" />
                                </div>

                                <label class="col-sm-1 control-label no-padding-right" for="rucclient"> Ruc/Cédula </label>

                                <div class="col-sm-4">
                                    <input type="text" id="rucclient" name="rucclient" placeholder="Ruc/Cedula" class="form-control" />
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label for="form-field-mask-2" class="col-sm-2 control-label no-padding-right">

                                    Telefono 1
                                    <small class="text-warning">(04) 248-9848</small>
                                </label>
                                <div class="col-sm-3">
                                <div style="" class="input-group">

                                    <input autocomplete="off" name="telefono1" class="input-mask-phone col-xs-10 col-sm-12" type="text" id="form-field-mask-2">
                                </div>
                                </div>


                                <label for="form-field-mask-22" class="col-sm-2 control-label no-padding-right">

                                    Telefono 2
                                    <small class="text-warning">(04) 248-9848</small>
                                </label>
                                <div class="col-sm-3">
                                <div style="" class="input-group">
																<span   class="input-group-addon">
																	<i class="ace-icon fa fa-phone"></i>
																</span>

                                    <input autocomplete="off" name="telefono2" class="input-mask-phone col-xs-10 col-sm-12" type="text" id="form-field-mask-22">
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-field-mask-3" class="col-sm-2 control-label no-padding-right">

                                    Telefono 3
                                    <small class="text-warning">(04) 248-9848</small>
                                </label>
                                <div class="col-sm-3">
                                <div style="" class="input-group">
																<span   class="input-group-addon">
																	<i class="ace-icon fa fa-phone"></i>
																</span>

                                    <input autocomplete="off" name="telefono3" class="input-mask-phone col-xs-10 col-sm-12" type="text" id="form-field-mask-3">
                                </div>
                                </div>

                                <label for="form-field-mask-4" class="col-sm-2 control-label no-padding-right">

                                    Numero Celular
                                    <small class="text-warning">(099) 999-9999</small>
                                </label>
                                <div class="col-sm-3">
                                <div style="" class="input-group">
																<span   class="input-group-addon">
																	<i class="ace-icon fa fa-phone"></i>
																</span>

                                    <input autocomplete="off" name="celular" class="input-mask-phone col-xs-10 col-sm-12" type="text" id="form-field-mask-4">
                                </div>
                                </div>
                            </div>

                            <div class="space-4"></div>
                            <div class="form-group">

                            <label for="id-date-picker-1" class="col-sm-2 control-label no-padding-right">

                                Fecha de Nacimiento
                            </label>
                            <div class="col-xs-8 col-sm-2">
                                <div class="input-group">
                                    <input class="form-control date-picker" name="fechnaci" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy">
                                    <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                </div>
                            </div>


                                    <label class="col-sm-1 control-label no-padding-right" for="tipocliente">Tipo de Cliente</label>
                                <div class="col-xs-8 col-sm-2">

                                    <select class="form-control" name="tipocliente" id="tipocliente">
                                        <?php echo $tipolist; ?>
                                    </select>
                                </div>
                                <label class="col-sm-1 control-label no-padding-right" for="ciudadcliente">Ciudad</label>
                                <div class="col-xs-8 col-sm-2">

                                    <select class="form-control" name="ciudadcliente" id="ciudadcliente">
                                       <?php echo $ciulist; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label no-padding-right" for="zonacliente">Zona de Cliente</label>
                                <div class="col-xs-8 col-sm-2">

                                    <select class="form-control" name="zonacliente" id="zonacliente">
                                        <?php echo $zonlist; ?>
                                    </select>
                                </div>
                                <label class="col-sm-1 control-label no-padding-right" for="profcliente">Profesión</label>
                                <div class="col-xs-8 col-sm-2">

                                    <input  type="text" class="col-xs-10 col-sm-12" name="profcliente" id="profcliente" placeholder="Profesión del cliente" value="" />

                                </div>
                                <label class="col-sm-1 control-label no-padding-right" for="espcliente">Especialidad</label>
                                <div class="col-xs-8 col-sm-2">

                                    <input  type="text" class="col-xs-10 col-sm-12" name="espcliente" placeholder="Especialidad del cliente" id="espcliente" value="" />

                                </div>

                            </div>
                            <div class="form-group">

                                <label class="col-sm-2 control-label no-padding-right" for="correo">Correo Electronico</label>
                                <div class="col-xs-8 col-sm-3">

                                    <input  type="text" class="col-xs-10 col-sm-12 form-control" name="correo" id="correo" placeholder="ejemplo@empresa.com" value="" />

                                </div>
                                <label class="col-sm-1 control-label no-padding-right" for="website">Website</label>
                                <div class="col-xs-8 col-sm-3">

                                    <input  type="text" class="col-xs-10 col-sm-12" name="website" placeholder="www.grieta.net" id="website" value="" />

                                </div>

                            </div>
                            <div class="form-group">

                                <label class="col-sm-2 control-label no-padding-right" for="dirfar">Direccion Farmacia</label>
                                <div class="col-xs-8 col-sm-3">

                                    <input  type="text" class="col-xs-10 col-sm-12 form-control" name="dirfar" id="dirfar" placeholder="" value="" />

                                </div>
                                <label class="col-sm-2 control-label no-padding-right" for="dirconsul">Direccion Consultorio</label>
                                <div class="col-xs-8 col-sm-3">

                                    <input  type="text" class="col-xs-10 col-sm-12" name="dirconsul" placeholder="" id="dirconsul" value="" />

                                </div>

                            </div>

 
                              <div class="form-group">

                                <label class="col-sm-2 control-label no-padding-right" for="diavisita">Día de visita</label>
                                <div class="col-xs-8 col-sm-1">

                                    <input  type="text" class="col-xs-10 col-sm-12 form-control" name="diavisita" id="diavisita" placeholder="" value="" />

                                </div>
                                <label class="col-sm-2 control-label no-padding-right" for="horadesde">Hora visita desde</label>
                                <div class="col-xs-8 col-sm-1">

                                    <input  type="text" class="col-xs-10 col-sm-12" name="horadesde" placeholder="" id="horadesde" value="" />

                                </div>
                                <label class="col-sm-2 control-label no-padding-right" for="horahasta">Hora visita hasta</label>
                                <div class="col-xs-8 col-sm-1">

                                    <input  type="text" class="col-xs-10 col-sm-12" name="horahasta" placeholder="" id="horahasta" value="" />

                                </div>

                            </div>
                              <div class="form-group">

                                <label class="col-sm-2 control-label no-padding-right" for="diapago">Dìa de Pago</label>
                                <div class="col-xs-8 col-sm-1">

                                    <input  type="text" class="col-xs-10 col-sm-12 form-control" name="diapago" id="diapago" placeholder="" value="" />

                                </div>
                                <label class="col-sm-2 control-label no-padding-right" for="diaped">Dìa Entrega Pedido</label>
                                <div class="col-xs-8 col-sm-1">

                                    <input  type="text" class="col-xs-10 col-sm-12" name="diaped" placeholder="" id="diaped" value="" />

                                </div>
                                <label class="col-sm-1 control-label no-padding-right" for="sexo">Sexo</label>
                                <div class="col-xs-8 col-sm-2">

                                    <select class="form-control" name="sexo" id="sexo">
                                                                        <option value="1">Masculino</option>
                                                                        <option value="2">Femenino</option>
                                                                        <option value="3">Otro</option>
                                                                        </select>

                                </div>

                            </div>
                             <div class="form-group">

                                <label class="col-sm-2 control-label no-padding-right" for="obser">Observación</label>
                                <div class="col-xs-8 col-sm-5">

                                    <textarea class=" col-sm-12 form-control" name="obser" id="obser" ></textarea>
                                </div>
                                <label class="col-sm-1 control-label no-padding-right" for="catego">Categoría</label>
                                <div class="col-xs-8 col-sm-2">

                                    <select  name="catego" class="form-control" id="catego">
                                                                        <option value="A">A</option>
                                                                        <option value="AA">AA</option>
                                                                        <option value="AAA">AAA</option>
                                                                        <option value="B">B</option>
                                                                        <option value="C">C</option>
                                                                        </select>

                                </div>

                            </div>

                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="button" id="btn-ingresar">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Ingresar
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        Borrar Todo
                                    </button>
                                </div>
                            </div>
                        </form>





                        <div id="modal-form" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="blue bigger">Please fill the following form fields</h4>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5">
                                                <div class="space"></div>

                                                <input type="file" />
                                            </div>

                                            <div class="col-xs-12 col-sm-7">
                                                <div class="form-group">
                                                    <label for="form-field-select-3">Location</label>

                                                    <div>
                                                        <select class="chosen-select" data-placeholder="Choose a Country...">
                                                            <option value="">&nbsp;</option>
                                                            <option value="AL">Alabama</option>
                                                            <option value="AK">Alaska</option>
                                                            <option value="AZ">Arizona</option>
                                                            <option value="AR">Arkansas</option>
                                                            <option value="CA">California</option>
                                                            <option value="CO">Colorado</option>
                                                            <option value="CT">Connecticut</option>
                                                            <option value="DE">Delaware</option>
                                                            <option value="FL">Florida</option>
                                                            <option value="GA">Georgia</option>
                                                            <option value="HI">Hawaii</option>
                                                            <option value="ID">Idaho</option>
                                                            <option value="IL">Illinois</option>
                                                            <option value="IN">Indiana</option>
                                                            <option value="IA">Iowa</option>
                                                            <option value="KS">Kansas</option>
                                                            <option value="KY">Kentucky</option>
                                                            <option value="LA">Louisiana</option>
                                                            <option value="ME">Maine</option>
                                                            <option value="MD">Maryland</option>
                                                            <option value="MA">Massachusetts</option>
                                                            <option value="MI">Michigan</option>
                                                            <option value="MN">Minnesota</option>
                                                            <option value="MS">Mississippi</option>
                                                            <option value="MO">Missouri</option>
                                                            <option value="MT">Montana</option>
                                                            <option value="NE">Nebraska</option>
                                                            <option value="NV">Nevada</option>
                                                            <option value="NH">New Hampshire</option>
                                                            <option value="NJ">New Jersey</option>
                                                            <option value="NM">New Mexico</option>
                                                            <option value="NY">New York</option>
                                                            <option value="NC">North Carolina</option>
                                                            <option value="ND">North Dakota</option>
                                                            <option value="OH">Ohio</option>
                                                            <option value="OK">Oklahoma</option>
                                                            <option value="OR">Oregon</option>
                                                            <option value="PA">Pennsylvania</option>
                                                            <option value="RI">Rhode Island</option>
                                                            <option value="SC">South Carolina</option>
                                                            <option value="SD">South Dakota</option>
                                                            <option value="TN">Tennessee</option>
                                                            <option value="TX">Texas</option>
                                                            <option value="UT">Utah</option>
                                                            <option value="VT">Vermont</option>
                                                            <option value="VA">Virginia</option>
                                                            <option value="WA">Washington</option>
                                                            <option value="WV">West Virginia</option>
                                                            <option value="WI">Wisconsin</option>
                                                            <option value="WY">Wyoming</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="space-4"></div>

                                                <div class="form-group">
                                                    <label for="form-field-username">Username</label>

                                                    <div>
                                                        <input type="text" id="form-field-username" placeholder="Username" value="alexdoe" />
                                                    </div>
                                                </div>

                                                <div class="space-4"></div>

                                                <div class="form-group">
                                                    <label for="form-field-first">Name</label>

                                                    <div>
                                                        <input type="text" id="form-field-first" placeholder="First Name" value="Alex" />
                                                        <input type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-sm" data-dismiss="modal">
                                            <i class="ace-icon fa fa-times"></i>
                                            Cancel
                                        </button>

                                        <button class="btn btn-sm btn-primary">
                                            <i class="ace-icon fa fa-check"></i>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <?php include 'include/footer.php'; ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?= base_url() ?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url() ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="<?= base_url() ?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/daterangepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?= base_url() ?>assets/js/ace-elements.min.js"></script>
<script src="<?= base_url() ?>assets/js/ace.min.js"></script>
<script type="text/javascript">
    $.mask.definitions['~']='[+-]';
    //$('.input-mask-date').mask('99/99/9999');
    $('#form-field-mask-2').mask('(99) 999-9999');
    $('#form-field-mask-22').mask('(99) 999-9999');
    $('#form-field-mask-3').mask('(99) 999-9999');
    $('#form-field-mask-4').mask('(999) 999-9999');
    //datepicker plugin
    //link
    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
    })
    //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){
        $(this).prev().focus();
    });

$(document).on('ready',function(){       
    $('#btn-ingresar').click(function(){
        var url = "<?php echo base_url(); ?>index.php/motor/crearcliente";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#formulario").serialize(), 
           success: function(data)             
           {
             alert(data);           
             location.reload();
           }
       });
    });
});
</script>
<!-- inline scripts related to this page -->
</body>
</html>
