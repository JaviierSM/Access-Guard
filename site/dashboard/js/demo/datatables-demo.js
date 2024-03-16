$(document).ready(function () {
  $("#dataTable").DataTable({
    language: {
      lengthMenu: "Mostrar _MENU_ registros por página",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando página _PAGE_ de _PAGES_",
      infoEmpty: "No hay registros disponibles",
      infoFiltered: "(filtrado de _MAX_ registros totales)",
      search: "Buscar:",
      paginate: {
        previous: "Anterior",
        next: "Siguiente",
      },
    },
    order: [[0, "desc"]], // Ordenar por la primera columna (ID) de mayor a menor por defecto
  });
});
