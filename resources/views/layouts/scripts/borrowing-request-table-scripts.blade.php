
@push('borrowing-request-table-scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        
        
        $(function () {
            $("#dataTable").DataTable({
                order: [[0, 'desc']],
                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
        
        window.livewire.on('EmitTable', () => {
            if ($.fn.DataTable.isDataTable("#dataTable")) {
                $('#dataTable').DataTable().destroy();
            }
            $("#dataTable").DataTable({
                order: [[0, 'desc']],
                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
        
        window.livewire.on('openEquipmentBorrowingModal', () => {
            $('#EquipmentBorrowingModal').modal('show');
        });
        
        window.livewire.on('closeEquipmentBorrowingModal', () => {
            $('#EquipmentBorrowingModal').modal('hide')
        });
        
        window.livewire.on('openRemarkModal', () => {
            $('#RemarkModal').modal('show')
        });
        
        window.livewire.on('closeRemarkModal', () => {
            $('#RemarkModal').modal('hide')
        });
        
        
        
        window.livewire.on('openSwalDelete', (EquipmentBorrowingID) => {
            swal("Are you sure you want to delete this Data?", {
                dangerMode: true,
                buttons: true,
            }).then(okay => {
                if (okay) {
                    window.Livewire.emit('DeleteData', EquipmentBorrowingID)
                }else{
                    window.Livewire.emit('refresh_equipmentborrowing_table')
                }
                });
        });
        
        
        // for store alert
        window.livewire.on('alert_store', () => {
            Toastify({
            text: "Successfully stored.",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
            background: "linear-gradient(to right, #1cc88a, #1cc88a)",
            },
            onClick: function(){}
        }).showToast();
        });
        // for update alert
        window.livewire.on('alert_update', () => {
            Toastify({
            text: "Successfully updated.",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
            background: "linear-gradient(to right, #4e73df, #4e73df)",
            },
            onClick: function(){}
        }).showToast();
        });
        // for delete alert
        window.livewire.on('alert_delete', () => {
            Toastify({
            text: "Successfully deleted.",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
            background: "linear-gradient(to right, #e74a3b, #e74a3b)",
            },
            onClick: function(){}
        }).showToast();
        });
        // for warning alert
        window.livewire.on('alert_warning', () => {
            Toastify({
            text: "Your are not allowed to edit this record right now.",
            duration: 6000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
            background: "linear-gradient(to right, #f6c23e, #f6c23e)",
            },
            onClick: function(){}
        }).showToast();
        });
        
        
    })

</script>
@endpush