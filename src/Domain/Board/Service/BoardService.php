<?php
namespace App\Domain\Board\Service;

use App\Domain\DataInterface;
use App\Domain\Board\Data\BoardModel;

class BoardService implements DataInterface
{
    public function getRow(int $id)
    {
        return BoardModel::where("id",$id)->where("deleted","0")->first();
    }

    public function getList(int $limit = 100)
    {
        return BoardModel::where("deleted","0")->take($limit)->get();
    }

    public function delRow(int $id)
    {
        /**
         * @var $row BoardModel
         */
        $row = BoardModel::find($id);

        if ($row->deleted == 1) {
            return false;
        } else {
            $row->deleted = 1;
            return $row->save();
        }
    }

    public function setRow(array $aEdit)
    {
        /**
         * @var $row \Illuminate\Database\Eloquent\Model;
         */
        $row = BoardModel::find($aEdit['id']);
        $row -> user_name = $aEdit['user_name'];
        $row -> contents = $aEdit['contents'];
        $row -> user_id = $aEdit['user_id'];

        return ($row->save())? $row : false;
    }

    public function createRow(array $aData)
    {
        $boardRow = new BoardModel();

        $boardRow->user_name = $aData['user_name'];
        $boardRow->contents = $aData['contents'];
        $boardRow->user_id = $aData['user_id'];
        $boardRow->user_seq = $aData['user_seq'];

        $boardRow->save();

        return $boardRow->id;
    }

    public function searchRow(array $aWhere)
    {
        // TODO: Implement searchRow() method.
    }
}