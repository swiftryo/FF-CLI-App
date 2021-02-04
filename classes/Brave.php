<?php

class Brave extends Human
// class [クラス名] extends [継承元クラス名]
{
    const MAX_HITPOINT = 120;
    private $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 30;
    
    public function __construct($name)
    // 明示的にプロパティを書き換える必要がある
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }
    
    public function doAttack($enemies)
    {
        
        // 自分のHPが0以上か、敵のHPが0以上かなどをチェックするメソッドを用意。
        if (!$this->isEnableAttack($enemies)) {
            return false;
        }
        // ターゲットの決定
        $enemy = $this->selectTarget($enemies);
         
        // 乱数の発動
        if (rand(1,3) === 1){
            // 1/3の確率でスキルを発動
            // スキルの発動
            echo "『" .$this->getName() . "』のスキルが発動した!\n";
            echo "『ぜんりょくぎり』!!\n";
            echo $enemy->getName() . "に" . $this->attackPoint * 1.5 . "のダメージ!\n";
            $enemy->tookDamage($this->attackPoint * 1.5);
        } else {
            parent::doAttack($enemies);
        }
        return true;
    }
}

// オブジェクト指向3原則
// オーバーライド 
// ポリモーフィズム

// カプセル化
// private : 宣言されたクラスの中でのみ使用可能
// protected : 宣言されたクラスまたは、継承先クラスでのみ使用可能
// public : クラスの中ｍ外関係なく使用可能 
// すべてpublicは良くない 適切なアクセスレベルが設定されていないことはバグを生みやすくなる
// 基本原則としてプロパティはprivate(場合によってはprotected)にすることを目指す

// アクセサーメソッド1　コンストラクタ2　オブジェクト指向に欠かせない存在
// 1 プロパティにアクセスするためのメソッド ゲッター、セッター プロパティ名の1文字目は大文字
// 2 一つのクラスに一つのみ存在しプロパティの初期値を与えるのによく使われる