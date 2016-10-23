$(function () {
    $('[data-request]').on('click', showModalData);
});

function showModalData()
{
    var request_id = $(this).data('request');
    $('#modal-'+request_id).modal('show');
}