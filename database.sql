DROP TABLE `access_record`;
DROP TABLE `comment_record`;
DROP TABLE `post_record`;
DROP TABLE `user`;

CREATE TABLE `user`(UserID int NOT NUll, Username VARCHAR (100) NOT NULL, Password VARCHAR(100) NOT NULL, PRIMARY KEY(UserID));

CREATE TABLE `post_record`(PostID int NOT NULL, Posttype TEXT (65535) NOT NULL, Posttitle TEXT (30) NOT NULL, Postcontent TEXT (65535) NOT NULL, Posttime TIMESTAMP NOT NULL, UserID int NOT NULL, FOREIGN KEY (UserID) REFERENCES user(UserID));
ALTER TABLE `post_record` ADD PRIMARY KEY (PostID);

CREATE TABLE `access_record`(Accesstime TIMESTAMP NOT NULL, PostID int NOT NULL,FOREIGN KEY (PostID) REFERENCES post_record(PostID), UserID int NOT NUll, FOREIGN KEY (UserID) REFERENCES user(UserID));

CREATE TABLE `comment_record`(CommentID int NOT NULL, PostID int NOT NULL ,FOREIGN KEY (PostID) REFERENCES post_record(PostID), UserID int NOT NUll, FOREIGN KEY (UserID) REFERENCES user(UserID), Commentcontent TEXT (65535) NOT NULL,Commenttime TIMESTAMP NOT NULL);
ALTER TABLE `comment_record` ADD PRIMARY KEY (CommentID);

-- table user
INSERT INTO user VALUES (00001, 'Adams Willsink', 'DIls2223ed');
INSERT INTO user VALUES (00002, 'William Felix', 'djHJ-0dc~');
INSERT INTO user VALUES (00003, 'Brett Howe', 'jdkkUDDUvh1~~');
INSERT INTO user VALUES (00004, 'Raphael Gilbert', '-iofDWA8iedjj');
INSERT INTO user VALUES (00005, 'Troy Molina', 'coVBHDgg34o');
INSERT INTO user VALUES (00006, 'Adams Nosan', 'jkOP93!oif0=');
INSERT INTO user VALUES (00007, 'Tom Johns', 'djhuiu2PL2222');
INSERT INTO user VALUES (00008, 'Roosevelt Savage', 'di2334snisia');
INSERT INTO user VALUES (00009, 'Conner Lynch', 'kdLks88xxp-');
INSERT INTO user VALUES (00010, 'Haider Lester', 'dklk---dxLO');
INSERT INTO user VALUES (00011, 'Jack Au', 'Jack123!!');
INSERT INTO user VALUES (00012, 'Daniel Yu', 'Daniel456~~');
INSERT INTO user VALUES (00013, 'Winnie', 'Winnie789-=');
INSERT INTO user VALUES (00014, 'Gabriel', 'Gabriel101');

-- table post record
INSERT INTO post_record VALUES (00001, 'PolyU Life', 'Handsome guy Gabriel', 'Gabriel, the most handsome guy in comp department, trust me!','2023-03-25 07:52:11', 00014);
INSERT INTO post_record VALUES (00002, 'Faculty News', 'Winnie is getting Microsoft Azure Offer!!!', 'Congrats','2023-03-25 09:30:55', 00005);
INSERT INTO post_record VALUES (00003, 'PolyU Life', 'I am getting 1.7 gpa', 'Who can carry me!!!!!!!', '2023-03-25 09:52:46', 00011);
INSERT INTO post_record VALUES (00004, 'PolyU Life', 'Daniel Yu is nto having offer from microsoft', 'Can someone comfort me...', '2023-03-25 10:56:55', 00012);
INSERT INTO post_record VALUES (00005, 'Most Popular', 'Daniel Yu is tall', 'DM me for gf', '2023-03-26 09:56:05', 00001);

-- table access record 
INSERT INTO access_record VALUES('2023-03-25 11:30:55', 4, 1);
INSERT INTO access_record VALUES('2023-03-25 12:30:23', 2, 3);
INSERT INTO access_record VALUES('2023-03-25 13:45:22', 1, 9);
INSERT INTO access_record VALUES('2023-03-25 16:35:12', 3, 10);
INSERT INTO access_record VALUES('2023-03-25 18:40:02', 4, 9);
INSERT INTO access_record VALUES('2023-03-26 01:24:34', 4, 11);
INSERT INTO access_record VALUES('2023-03-26 02:26:13', 3, 12);
INSERT INTO access_record VALUES('2023-03-27 17:59:05', 1, 14);

-- table comment record
INSERT INTO comment_record VALUES(1, 4, 11, 'No byebye', '2023-03-26 01:29:58');
INSERT INTO comment_record VALUES(2, 3, 12, 'hehe', '2023-03-26 02:28:41');
INSERT INTO comment_record VALUES(3, 1, 14, 'lets goooooooo', '2023-03-27 18:02:56');
