<?php


namespace App\Domain\Board\Data;
use Illuminate\Database\Eloquent\Model;

class BoardModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var table
     */
    protected $table = "board";
    /**
     * The attributes that are mass assignable.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_name','contents','user_id','user_seq'];

}