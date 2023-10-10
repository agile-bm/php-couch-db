<?php

namespace AgileBM\PhpCouchDb\Request;

interface IRequest {
    public function GetMethod(): string;
    public function GetURI(): string;
    public function GetOptions(): array;
}