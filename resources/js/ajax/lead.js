export const LeadAjax = {
    update(payload, successCallback, errorCallback, finalCallback) {
        $.ajax({
                url: '/leads/ajax/update',
                type: 'PATCH',
                data: payload,
                dataType: 'json',
                success: function (response) {
                    if (successCallback) {
                        successCallback(response)
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (errorCallback) {
                        errorCallback(jqXHR)
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
