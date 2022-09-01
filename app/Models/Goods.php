<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    protected $table = 'good';

    public function good_exist($id, $question_id)
    {
        $exist = Goods::where('user_id', '=', $id)
            ->where('question_id', '=', $question_id)
            ->get();

        if (!$exist) {
            return true;
        } else {
            return false;
        }
    }

    //いいねしているユーザー
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //いいねしている投稿
    public function response()
    {
        return $this->belongsTo(Response::class);
    }

    protected $fillable = [
        'user_id', 'question_id',
    ];
}
