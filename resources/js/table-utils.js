export const TableUtils = {
    initTable(selector, resourceUtils) {
        window.TableUtilsData = {
            'last-edit-field-id': ''
        };

        const table = $(selector)
        $('.record-field').click(function () {
            const _this = $(this);
            TableUtils.closeEditModePreviousField()
            _this.removeClass('readonly')
            const inlineForm = _this.find('.cell-form-inline')
            if (inlineForm.find('.record-field-upgrade').length === 0) {
                inlineForm.append('<span class="btn btn-primary record-field-upgrade">Update</span>')
            }
            inlineForm.find('.form-control').focus();
            TableUtilsData['last-edit-field-id'] = _this.attr('id');
        })

        $(document).on('click', '.record-field-upgrade', function () {
            const _this = $(this);
            const field = _this.closest('.record-field')
            const row = _this.closest('.record-row')
            const id = row.attr('data-id');
            const input = field.find('.cell-form-inline .form-control')
            const mask = field.find('.mask')
            const currentValue = $.trim(mask.text())
            const fieldName = field.attr('data-field')
            const fieldValue = input.val()
            let toggleFieldOff = true

            if (currentValue !== fieldValue) {
                let payload = {
                    id: id,
                    data: {}
                }
                payload['data'][fieldName] = fieldValue

                resourceUtils.update(payload, function (response) {
                    mask.text(fieldValue)
                }, function (jqXHR) {
                    const errorMessage = jqXHR.responseJSON.message
                    toggleFieldOff = false
                    input.addClass('error')
                    input.val(currentValue)
                    alert(errorMessage)
                }, function () {
                    if (toggleFieldOff) {
                        field.addClass('readonly')
                    }
                });
            } else {
                if (toggleFieldOff) {
                    field.addClass('readonly')
                }
            }
        })
    },

    closeEditModePreviousField() {
        if (TableUtilsData['last-edit-field-id']) {
            const previousFieldId = '#' + TableUtilsData['last-edit-field-id'];
            const field = $(previousFieldId)
            const input = field.find('.cell-form-inline .form-control');
            field.addClass('readonly')
            input.removeClass('error')
        }
    }
}
