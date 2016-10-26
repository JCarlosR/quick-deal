$(function () {
    $('[data-show]').on('click', showModalData);

    // Pending actions
    $('[data-edit]').on('click', showEditModal);
    $('[data-delete]').on('click', showDeleteModal);
});

function showModalData()
{
    var request_id = $(this).data('show');
    $('#modal-'+request_id).modal('show');
}

function showEditModal()
{
    alert('Esta característica se implementara en la 2da fase');
}

function showDeleteModal()
{
    alert('Esta característica se implementara en la 2da fase');
}
