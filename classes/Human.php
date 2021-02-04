<?php

class Human extends Lives
{
    // プロパティ
    const MAX_HITPOINT = 100;
    // 最大HP const=定数=再代入できない

    // コンストラクタ
    // phpのコンストラクタメソッドの書き方は必ずこのフォーマット
     public function __construct($name, $hitPoint = 100, $attackPoint = 20, $intelligence = 0 )
    {
        parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
    }
}