<?php

namespace Src\Integrations\Salesforce\Clients\Bulk;

use Src\Integrations\Salesforce\Clients\AbstractClient;
use Src\Integrations\Salesforce\Requests\RequestContract;

class BulkClient extends AbstractClient
{
    public function call(RequestContract $request)
    {
        $headers = $request->getHeaders();
        $params = $request->getParams();
        $method = $request->getMethod();
        $requestUrl = $request->getRequestUrl();
        $cURLConnection = curl_init();

//        dd($headers, $params, $method, $requestUrl);

        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        /**
         * Parse headers
         */
        $parsedHeaders = [];
        foreach ($headers as $headerKey => $headerValue) {
            $parsedHeaders[] = "$headerKey: $headerValue";
        }

        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $parsedHeaders);

        curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST, $method);

        switch ($request->getMethod()) {
            case 'GET':
            case 'DELETE':

                $paramCount = 1;
                foreach ($params as $paramKey => $paramValue) {
                    $separator = $paramCount == 1 ? '?' : '&';
                    $requestUrl .= "$separator$paramKey=$paramValue";
                    $paramCount++;
                }

                break;

            case 'POST':
            case 'PUT':
            case 'PATCH':
                switch ($headers['Content-Type']) {
                    case 'application/x-www-form-urlencoded':
                        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, http_build_query($request->getParams()));
                        break;
                    case 'text/csv':
                        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $request->getParams());
                        break;
                    case 'application/json':
                    default:
                        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, json_encode($request->getParams()));
                        break;
                }

                break;
        }
        curl_setopt($cURLConnection, CURLOPT_URL, $requestUrl);

        $rawResponse = curl_exec($cURLConnection);

        curl_close($cURLConnection);

        return $rawResponse;
    }
}
