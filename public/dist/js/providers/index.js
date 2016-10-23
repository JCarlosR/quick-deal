$(function () {
    $('[data-show]').on('click', showModalData);
});

function showModalData()
{
    var request_id = $(this).data('show');
    $('#modal-'+request_id).modal('show');
}