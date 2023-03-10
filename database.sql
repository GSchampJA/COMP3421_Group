DROP TABLE USER;
DROP TABLE ACCESS_RECORD;
DROP TABLE POST_RECORD;
DROP TABLE COMMENT_RECORD;

CREATE TABLE USER(UserID NUMBER(5) NOT NUll, username VARCHAR (30) NOT NULL, password VARCHAR(30) NOT NULL);
ALTER TABLE CUSTOMER ADD PRIMARY KEY (CID);

CREATE TABLE POST_RECORD(PostID int NOT NULL, PostNAME TEXT (100) NOT NULL, PostCONTENT TEXT (65535) NOT NULL, PostTIME TIME() NOT NULL);

CREATE TABLE ACCESS_RECORD(TIME(), FOREIGN KEY (PostID) REFERENCES POST_RECORD(PostID), FOREIGN KEY (UserID) REFERENCES USER(UserID));

CREATE TABLE COMMENT_RECORD();


-- table customer
INSERT INTO CUSTOMER VALUES (00001, 'Adams Willsink', 'DIls2223ed');
INSERT INTO CUSTOMER VALUES (00002, 'William Felix', 'djHJ-0dc~','M');
INSERT INTO CUSTOMER VALUES (00003, 'Brett Howe', 'jdkkUDDUvh1~~','M');
INSERT INTO CUSTOMER VALUES (00004, 'Raphael Gilbert', '-iofDWA8iedjj','M');
INSERT INTO CUSTOMER VALUES (00005, 'Troy Molina', 'coVBHDgg34o','F');
INSERT INTO CUSTOMER VALUES (00006, 'Adams Nosan', 'jkOP93!oif0=','M');
INSERT INTO CUSTOMER VALUES (00007, 'Tom Johns', 'djhuiu2PL2222','M');
INSERT INTO CUSTOMER VALUES (00008, 'Roosevelt Savage', 'di2334snisia','M');
INSERT INTO CUSTOMER VALUES (00009, 'Conner Lynch', 'kdLks88xxp-','M');
INSERT INTO CUSTOMER VALUES (00010, 'Haider Lester', 'dklk---dxLO','M');
INSERT INTO CUSTOMER VALUES (00011, 'Jack Au', 'Jack123!!','M');
INSERT INTO CUSTOMER VALUES (00012, 'Daniel Yu', 'Daniel456~~','M');
INSERT INTO CUSTOMER VALUES (00013, 'Winnie', 'Winnie789-=','M');
INSERT INTO CUSTOMER VALUES (00014, 'Gabriel', 'Gabriel101','M');

-- table access record