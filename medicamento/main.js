$(document).ready(function() {
var id, opcion;
opcion = 4;
    
tablaUsuarios = $('#tablaUsuarios').DataTable({  
    "ajax":{            
        "url": "bd/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "id"},
        {"data": "medicamento"},
        {"data": "fecha"},
        {"data": "descripcion"},
        {"data": "cantidad"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formUsuarios').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    medicamento = $.trim($('#medicamento').val());    
    fecha = $.trim($('#fecha').val());
    descripcion= $.trim($('#descripcion').val());    
    cantidad = $.trim($('#cantidad').val());                                
        $.ajax({
          url: "bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {id:id, medicamento:medicamento, fecha:fecha, descripcion:descripcion, cantidad:cantidad ,opcion:opcion},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    user_id=null;
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css( "background-color", "#369773");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Registro Medicamento");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    medicamento = fila.find('td:eq(1)').text();
    fecha = fila.find('td:eq(2)').text();
    descripcion = fila.find('td:eq(3)').text();
    cantidad = fila.find('td:eq(4)').text();
    $("#medicamento").val(medicamento);
    $("#fecha").val(fecha);
    $("#descripcion").val(descripcion);
    $("#cantidad").val(cantidad);
    $(".modal-header").css("background-color", "#369773");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar ");		
    $('#modalCRUD').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+id+"?");                
    if (respuesta) {            
        $.ajax({
          url: "bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, user_id:user_id},    
          success: function() {
              tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
     
});    