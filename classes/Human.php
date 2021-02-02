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
    
    public function getName()
    // ゲッター
    {
        return $this->name;
    }
    
    
    // セッター クラス定義に初期値が与えられているものはセッターは不要
    
    public function getHitPoint()
    {
        return $this->hitPoint;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }
    
    // コンストラクタ
    // phpのコンストラクタメソッドの書き方は必ずこのフォーマット
    public function __construct($name, $hitPoint = 100, $attackPoint = 20)
    {
        $this->name = $name;
        $this->hitPoint = $hitPoint;
        $this->attackPoint = $attackPoint;
    }
    
    public function doAttack($enemy)
    // 攻撃するメソッド
    // メソッドを定義(メソッド名) (関数名)
    {
        // $this 自分自身のクラスを指すキーワード(Humanクラス)
        echo "『" .$this->getName() . "』の攻撃!\n";
        echo "【" .$enemy->getName() . "】に" .$this->attackPoint. "のダメージ!!\n";
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
    
    public function recoveryDamage($heal, $target)
    {
        $this->hitPoint += $heal;
        if ($this->hitPoint > $target::MAX_HITPOINT) {
            $this->hitPoint = $target::MAX_HITPOINT;
        }
    }
    
}