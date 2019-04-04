<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = ['name'];

    protected $policies = [
        'App\Task' => 'App\Policies\TaskPolicy',
    ];

    // タスク所有ユーザーの取得
    public function user(){
        return $this->belongsTo(User::class);
    }
}
