<?php
define("MY_ACCESS_TOKEN", "your-access-token");
define("MY_DEVICE_NAME", MY_DEVICE_NAME);

require 'vendor/autoload.php';

$pb = new Pushbullet\Pushbullet(MY_ACCESS_TOKEN);

// PushBullet で接続しているデバイス一覧を取得
$pb->getDevices();

// 一台にだけメッセージを送る
$pb->device(MY_DEVICE_NAME)->pushNote("This is title", "Hello World");

// 対象となる全てのデバイスにメッセージを送る
$pb->allDevices()->pushNote("Hello world!", "send to message for all devices");

// 対象となるデバイスにリンクを送る
$pb->device(MY_DEVICE_NAME)->pushLink("Link Title", "https://google.com/", "Goooooooogle!"); 

// 対象となるデバイスに場所の名前と検索するためのクエリーを送る
$pb->device(MY_DEVICE_NAME)->pushAddress("東京駅", "tokyo station 東京駅");

// リスト形式のデータを送る
$pb->device(MY_DEVICE_NAME)->pushList("今日のタスク", [
    "起きる",
    "ご飯を食べる",
    "寝る"
]);

// ファイルを送る
$pb->device(MY_DEVICE_NAME)->pushFile(
    "/dogs.jpg", // ファイルの場所
    "image/jpeg", // MIME タイプ
    "Look at this photo!", // タイトル
    "I think it's pretty cool", // メッセージ
    "coolphoto.jpg" // ファイル名
);

// sms でメッセージ送信
$pb->device(MY_DEVICE_NAME)->sendSms("+00000000", "SMSでメッセージ");

// 購読しているチャンネルを取得
$pb->getChannelSubscriptions();

// チャンネルを購読または非購読する
$pb->channel("greatchannel")->subscribe(); // チャンネルを購読する
$pb->channel("mehchannel")->unsubscribe(); // チャンネルの購読を解除する

// チャンネルを作ったユーザーを取得する
$pb->getMyChannels();

// チャンネルを作る
$pb->channel("mychannel")->create("チャンネルの名前", "チャンネルの説明");

// 自分のチャンネルを消す
$pb->channel("mychannel")->delete();

// 自分のコンタクトリストを取得する
$pb->getContacts();

// 新しい送信先を作成する
$pb->createContact("田中太郎", "tanaka@example.com");

// 特定の連絡先へメッセージを送る
$pb->contact("mail@turusuke.com")->pushNote("Hey turusuke!", "How are you?");

// 連絡先の削除
$pb->contact("turusuke")->delete(); // turusuke という名前のユーザーを削除する

// 連絡先の情報を変更する
$pb->contact("turusuke")->changeName("yamisuke"); // 名前を変更する

?>
