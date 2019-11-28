<?php


namespace App\Domain;


Interface DataInterface
{
    public function getRow(int $id);
    public function getList(int $limit);
    public function delRow(int $id);
    public function setRow(array $aEdit);
    public function createRow(array $aData);
    public function searchRow(array $aWhere);
}