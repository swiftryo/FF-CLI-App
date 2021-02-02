<?php

class Human
{
    // プロパティ
    const MAX_HITPOINT = 100;
    // 最大HP const=定数=再代入できない
    private $name;
    // キャラの名前
    private $hitPoint = 100;
    // 現在のHP
    private $attackPoint = 20;
    // 攻撃力
    
    
    public function doAttack($enemy)
    // 攻撃するメソッド
    // メソッドを定義(メソッド名) (関数名)
    {
        // $this 自分自身のクラスを指すキーワード(Humanクラス)
        echo "『" .$this->name . "』の攻撃!\n";
        echo "【" .$enemy->name . "】に" .$this->attackPoint. "のダメージ!!\n";
        $enemy->tookDamage($this->attackPoint);
    }
    
    public function tookDamage($damage)
    // ダメージを受けるメソッド
    {
        $this->hitPoint -= $damage;
        // 引数でもらう$damageの分だけ自身のhitPointを引き算する
        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
        // HPが0未満に成らないための処理 0未満は0
    }
}