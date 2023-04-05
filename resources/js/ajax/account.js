export const AccountAjax = {
    update(payload, successCallback, errorCallback, finalCallback) {
        $.ajax({
                url: '/accounts/ajax/update',
                type: 'PATCH',
                data: payload,
                dataType: 'json',
                success: function (response) {
                    if (successCallback) {
                        successCallback(response)
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown)
                    if (errorCallback) {
                        errorCallback({jqXHR, textStatus, errorThrown})
                    }
                }
            }
        ).always(function () {
            if (finalCallback) {
                finalCallback()
            }
        })
    }
}
