<?php include 'include/head.php'; 
//echo >count($clientesall);
?>
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
                    <li class="active"><?= ucfirst($accionpagina); ?> y Eliminar</li>
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
                             <?= ucfirst($accionpagina); ?> y Eliminar <?= ucfirst($tipopagina); ?>.
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <!-- PAGE CONTENT BEGINS -->
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="hidden">Id</th>
														<th>Nombre o Razon Social</th>
														<th>RUC</th>
														<th class="hidden-480">Direccion</th>

														<th>
															<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
															Categoria
														</th>
														<th class="hidden-480">Status</th>

														<th></th>
													</tr>
												</thead>

                                                                                                <tbody id="tablaactualizar">
                                                                                                    <?php 
                                                                                                          for( $i = 0 ; $i <= count($clientesall)-1; $i++){
                                                                                                              
                                                                                                         
                                                                                                    ?>
                                                                                                    
													<tr>
								
													<td class="hidden">
															<?php
                                                                                                                                                                                                                                                                                                                        echo $clientesall[$i]['clicodigo'];
                                                                                                                                                                                                                                                                                                                             ?>
														</td>
														<td>
															<?php
                                                                                                                                                                                                                                                                                                                        echo $clientesall[$i]['clinombre'];
                                                                                                                                                                                                                                                                                                                             ?>
														</td>
														<td><?php
                                                                                                                                                                                                                                                                                                                        echo $clientesall[$i]['cliruc'];
                                                                                                                                                                                                                                                                                                                             ?></td>
														<td class="hidden-480"><?php
                                                                                                                                                                                                                                                                                                                        echo $clientesall[$i]['clidirec'];
                                                                                                                                                                                                                                                                                                                             ?></td>
														<td><?php
                                                                                                                                                                                                                                                                                                                        echo $clientesall[$i]['cliecategoria'];
                                                                                                                                                                                                                                                                                                                             ?></td>

														<td class="hidden-480">
															<?php
                                                                                                                                                                                                                                                                                                                        echo $clientesall[$i]['clistatus'];
                                                                                                                                                                                                                                                                                                                             ?>
                                                                                                                                                                                                                                                                                                                             
														</td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="blue" href="#">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a>

																<a class="green" href="#" data-toogle="modal" data-target="#editarcli">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" href="#">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip"  title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
                                                                                                    <?php 
                                                                                                     }
                                                                                                    ?>
							
												</tbody>
											</table>





                        <div id="editarcli" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="blue bigger">EDITAR CLIENTE</h4>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5">
                                                <div class="space"></div>

                                                        <input type="text" id="clinombre" placeholder="Nombre" value="" />
                                            </div>

                                            <div class="col-xs-12 col-sm-7">
                                                <div class="form-group">

                                                 <div>
                                                        <input type="text" id="cliruc" placeholder="Ruc" value="" />
                                                    </div>
                                                </div>

                                                <div class="space-4"></div>

                                                <div class="form-group">

                                                    <div>
                                                        <input type="text" id="clidirecc" placeholder="direc" value="" />
                                                        <input type="hidden" id="clicodigo" placeholder="" value="" />
                                                    </div>
                                                </div>

                                                <div class="space-4"></div>

                                                <div class="form-group">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-sm" data-dismiss="modal">
                                            <i class="ace-icon fa fa-times"></i>
                                            Cancelar
                                        </button>

                                        <button class="btn btn-sm btn-primary">
                                            <i class="ace-icon fa fa-check"></i>
                                            Actualizar
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
		<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url() ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?= base_url() ?>assets/js/dataTables.buttons.min.js"></script>
		<script src="<?= base_url() ?>assets/js/buttons.flash.min.js"></script>
		<script src="<?= base_url() ?>assets/js/buttons.html5.min.js"></script>
		<script src="<?= base_url() ?>assets/js/buttons.print.min.js"></script>
		<script src="<?= base_url() ?>assets/js/buttons.colVis.min.js"></script>
		<script src="<?= base_url() ?>assets/js/dataTables.select.min.js"></script>

<script src="<?= base_url() ?>assets/js/ace-elements.min.js"></script>
<script src="<?= base_url() ?>assets/js/ace.min.js"></script>
<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable();
			
			
			})
		</script>
                <script type="text/javascript">
                    $(document).ready(function (){
						$('#editarcli').on('show.bs.modal',function (e) {
							var id = $(e.relatedTarget);
							var idd = id.parent().parent().find('td').html();
							console.log(idds);
						});
                        //incluir datos actualizados a la tabla con id tablaactualizar cuando se edite o elimine algo
                    });
                </script>
<!-- inline scripts related to this page -->
</body>
</html>
