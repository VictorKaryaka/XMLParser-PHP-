<?php

namespace dao;

interface DaoCategoryInterface
{
    public function createCategory($codeCategory, $name);
}