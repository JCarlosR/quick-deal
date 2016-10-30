$(function () {
    $('[data-application]').on('click', showModalData);
});

function showModalData()
{
    var application_id = $(this).data('application');
    $('#modal-'+application_id).modal('show');
}