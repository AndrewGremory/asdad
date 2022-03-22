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
        {"data": "fecha"},
        {"data": "nom_alimento"},
        {"data": "num_lote"},
        {"data": "peso"},
        {"data": "cantidad"},
        {"data": "descripcion"},
        {"data": "promedio"}, 
        {"data": "conversion"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formUsuarios').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    fecha = $.trim($('#fecha').val());    
    nom_alimento = $.trim($('#nom_alimento').val());
    num_lote = $.trim($('#num_lote').val());    
    peso = $.trim($('#peso').val());    
    cantidad = $.trim($('#cantidad ').val());
     descripcion= $.trim($('#descripcion').val());      
     promedio= $.trim($('#promedio').val());                            
     conversion= $.trim($('#conversion').val());                                                  
     $.ajax({
          url: "bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {id:id, fecha:fecha, nom_alimento:nom_alimento, num_lote:num_lote, peso:peso, cantidad:cantidad , descripcion:descripcion,  promedio:promedio ,  conversion:conversion ,opcion:opcion},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id=null;
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css( "background-color", "#fc7323");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Registro Cerda");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    fecha = fila.find('td:eq(1)').text();
    nom_alimento = fila.find('td:eq(2)').text();
    num_lote = fila.find('td:eq(3)').text();
    peso = fila.find('td:eq(4)').text();
    cantidad = fila.find('td:eq(5)').text();
    descripcion = fila.find('td:eq(6)').text();
    promedio = fila.find('td:eq(7)').text();
    conversion = fila.find('td:eq(8)').text();
    $("#fecha").val(fecha);
    $("#nom_alimento").val(nom_alimento);
    $("#num_lote").val(num_lote);
    $("#peso").val(peso);
    $("#cantidad").val(cantidad);
    $("#descripcion").val(descripcion);
    $("#promedio").val(promedio);
    $("#conversion").val(conversion);
    $(".modal-header").css("background-color", "#fc7323");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Cerda");		
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
          data:  {opcion:opcion, id:id},    
          success: function() {
              tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
     
});    