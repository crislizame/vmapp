$(document).ready(function () {
    $("#login").submit(function(){
        
                var username,pass,response,session;
                username = document.getElementById('name').value;
                pass = document.getElementById('password').value;
                session= $('#sessionn').is(':checked');
                //alert(session);
                if(username != '' && pass != ''){
        
                    $.ajax({
                        // la URL para la petición
                        url : 'index.php/home/login',
                        data : { username : username,
                            pass : pass,
                            session : session},
                        type : 'POST',
                        dataType : 'text',
                        beforeSend: function(){
                            response = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Cargando!</h4>Cargando datos...</div>';
                            $("#response").html(response);
                        },
                        success : function(data) {
                            if(data == 2){
                                response = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Error!</h4>Datos Incorrectos.</div>';
                                $("#response").html(response);
                            }else if (data == 1) {
                                response = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Estás dentro!</h4>Estamos limpiando todo, para que puedas llegar!</div>';
                                $("#response").html(response);
                                location.href = '';
                            }else if (data == 3) {
                                response = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Error!</h4>Tipo de usuario incorrecto.</div>';
                                $("#response").html(response);
                            }
                        }
                    });
        
                }else{
                    response = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Error!</h4>Datos Incorrectos intente nuevamente.</div>';
                    $("#response").html(response);
        
                }
                return false;
            });
});