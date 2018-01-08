宿題
CRUDの例文を作っていく

-INSERT文
クラスメイトのニックネームでひとり一つぶやきのデータが作成出来るようなINSERT文を作りましょう

INSERT INTO `survey` (`nickname`,`email`,`content`) VALUES ("出木杉","deki@gmail.com","ぼくのつぶやきです");

-SELECT文
語尾に「です」とついているコメントを書いているデータを検索できるSELECT文を作りましょう
SELECT * FROM `survey` WHERE `content` LIKE "%です";

-UPDATE文
語尾に「です」とついているコメントを書いているデータを「セブ最高だぜ」に変更するUPDATE文を作りましょう
UPDATE `survey` SET `content` = "セブ最高だぜ" WHERE `content` LIKE "%です";

-DELETE文
コメントが「セブ最高だぜ」に変えられてしまったデータをすべて削除する
DELETE FROM `survey` WHERE `content` = "セブ最高だぜ";


crud.sqlファイルを作成して、上のSQL文全てを記述して提出してください
