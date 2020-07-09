-- futsal_teamというデータベース(がなければ)作成。IF NOT EXISTSで判断。
CREATE DATABASE IF NOT EXISTS futsal_team DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GRANT文で権限をユーザーに付与、ユーザーはfutsal_team内の全てのテーブルを操作できる。
GRANT ALL PRIVILEGES ON *.* TO 'bs_user'@'localhost' IDENTIFIED BY 'futsal_team';
FLUSH PRIVILEGES;
-- データベースfutsal_team使用。
USE futsal_team;
-- テーブル作成後、カラム設定。
CREATE TABLE futsal_a (
id integer AUTO_INCREMENT NOT NULL,
name varchar(255) NOT NULL,
age integer NOT NULL,
position varchar(255) NOT NULL,
PRIMARY KEY (id)
);
-- カラムにそれぞれ値を入れてレコードを作成。idはシーケンス番号がauto_incrementオプションの効果で自動で追加される。
INSERT INTO futsal_a VALUES (null, '加藤A太郎', 25, 'ピヴォ');
INSERT INTO futsal_a VALUES (null, '佐藤B次郎', 27, 'アラ');
INSERT INTO futsal_a VALUES (null, '田中C三郎', 32, 'アラ');
INSERT INTO futsal_a VALUES (null, '山本D五郎', 38, 'フィクソ');
INSERT INTO futsal_a VALUES (null, '中島E十郎', 30, 'ゴレイロ');