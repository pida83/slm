<?php


namespace App\Domain\Interfaces;


interface TemplateView
{
    public function getBoardRow(int $id);
    public function getBoardList(int $limit);
    public function delBoardRow(int $id);
    public function editBoardRow(int $id);
    public function createBoardRow(array $aData);
    public function searchBoardRow(array $aWhere);
}