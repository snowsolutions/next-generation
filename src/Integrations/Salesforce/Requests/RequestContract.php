<?php

namespace Src\Integrations\Salesforce\Requests;

interface RequestContract
{
    public function getMethod();

    public function getHeaders();

    public function getRequestUrl();

    public function getParams();
}
