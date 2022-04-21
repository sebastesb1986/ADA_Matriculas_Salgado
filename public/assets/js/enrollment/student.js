$(function() {


    $('#students-table').DataTable({
        "language": {
                "url": "/assets/js/spanish.json"
        },
        processing: false,
        responsive: true,
        serverSide: true,
        ajax: '/students',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            { data: 'name', name: 'name'},
            { data: 'lastname', name: 'lastname'},
            { data: 'email', name: 'email'},
            { data: 'age', name: 'age'},
            { data: 'country', name: 'country'},
            { data: 'subjects', name: 'subjects'},
            { data: 'students', name: 'students'},
        ],
        "order": [[ 1, "asc" ]]
    });

    

});

function Cargar()
{
    let table = $('#students-table').DataTable();
    table.search('').draw();
    table.ajax.reload();
}

$("#city").select2({
    width: '100%',
    placeholder: 'Seleccione...',
    language: {
        noResults: function () {
            return "No hay resultado";
        },
        searching: function () {
            return "Buscando..";
        }
    },
    ajax: {
        url: 'country',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            let cnt = data.country;
            
            return {
                results: $.map(cnt, (item) => {
                    return {
                        text: item.name,
                        id: item.idmunicipio
                    }
                })
            };
        },
        cache: true
    }
});

function regStd()
{
    $('#myModal').modal();
    $('#exampleModalLabel').html('Agregar alumno');

     // LIMPIAR CAMPOS
     $('#name').val('');
    $('#lastname').val('');
    $('#email').val('');
    $('#age').val('');
    $('#city').val(null).trigger('change');
    
    // FIN LIMPIAR CAMPOS

    let r = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'+
            '<button id="registro" class="btn btn-primary" onclick="registerStd()" >Agregar</button>';
            
    $(".modal-footer").html(r);

}

function upStd(btn)
{
    $('#myModal').modal();
    $('#exampleModalLabel').html('Modificar alumno');

    // LIMPIAR CAMPOS
    $('#name').val('');
    $('#lastname').val('');
    $('#email').val('');
    $('#age').val('');
    $('#city').val(null).trigger('change');

    $.get("/student/"+btn+"/show", (response) => {

            let std = response.student;

            $('#name').val(std.name);
            $('#lastname').val(std.lastname);
            $('#email').val(std.email);
            $('#age').val(std.age);
            $("#city").html(`<option value=${std.country.idmunicipio}>${std.country.name}</option>`);

    });
    // FIN LIMPIAR CAMPOS

    let u = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'+
            '<button id="editar" class="btn btn-warning" onclick="updateStd('+btn+')">Editar</button>';

    $(".modal-footer").html(u);

}

// Register Student
function registerStd()
{
    let route = '/student-store';

    let ajax_data = {

        name: $('#name').val(),
        lastname: $('#lastname').val(),
        email: $('#email').val(),
        age: $('#age').val(),
        city: $('#city').val(),

    };

    $.ajax({
        url: route,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        dataType: 'json',
        data: ajax_data,
    }).then(response => {
        
        Cargar();
        $('#myModal').modal('toggle');
        
    })
    .catch(error => {
        // handle error
        console.log(error);
    });

}

// Update Student
function updateStd(btn)
{  
    $('#myModal').modal();
   
    let route = "/student/"+btn+"/update";

    let ajax_data = {

        name: $('#name').val(),
        lastname: $('#lastname').val(),
        email: $('#email').val(),
        age: $('#age').val(),
        city: $('#city').val(),

    };

    $.ajax({
        url: route,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'X-HTTP-Method-Override': 'PUT' },
        type: 'POST',
        dataType: 'json',
        data: ajax_data,
    }).then(response => {

        Cargar();
        $('#myModal').modal('toggle');
       
    })
    .catch(error => {
         // handle error
        console.log(error);
    });

}

// Enrollment student
function unEnRll(btn)
{
    let route = "/unenroll/"+btn;

    let conf= confirm("¿Desea desmatricular completamente al estudiante");

    let ajax_data = {

        name: $('#name').val(),
        lastname: $('#lastname').val(),
        email: $('#email').val(),
        age: $('#age').val(),
        city: $('#city').val(),

    };

    if(conf){
        $.ajax({
            url: route,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'X-HTTP-Method-Override': 'PUT' },
            type: 'POST',
            dataType: 'json',
            //data: ajax_data,
        }).then(response => {

            Cargar();

        
        })
        .catch(error => {
            // handle error
            console.log(error);
        });
    }
}
